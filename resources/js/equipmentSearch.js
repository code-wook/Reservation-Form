export function initEquipmentSearch() {

    const searchInput = document.getElementById('equipmentSearchInput');
    const searchBtn = document.getElementById('equipmentSearchBtn');

    const resultBox = document.getElementById('equipmentSearchResults');
    const tableBody = document.getElementById('equipmentSearchTableBody');

    // OPTIONAL: create suggestion box dynamically
    const suggestionBox = document.createElement('div');
    suggestionBox.className = "absolute left-0 top-full mt-1 bg-white border rounded shadow text-sm w-full max-h-48 overflow-auto hidden z-50";
    searchInput.parentNode.style.position = "relative";
    searchInput.parentNode.appendChild(suggestionBox);
    let facilitiesData = [];

    fetch('http://127.0.0.1:8001/api/facilities')
        .then(res => res.json())
        .then(data => {
            facilitiesData = data;
        });

    // 🔥 GET ALL EQUIPMENT INTO ONE LIST
    function getAllEquipment() {
        let list = [];

        facilitiesData.forEach(f => {
            f.equipment.forEach(eq => {
                list.push(eq.name);
            });
        });

        return [...new Set(list)]; // remove duplicates
    }

    // =========================
    // 🔥 LIVE AUTOCOMPLETE
    // =========================
    searchInput.addEventListener("input", () => {

        const keyword = searchInput.value.trim().toLowerCase();

        if (!keyword || facilitiesData.length === 0) {
            suggestionBox.classList.add("hidden");
            return;
        }

        const matches = getAllEquipment().filter(eq =>
            eq.toLowerCase().includes(keyword)
        );

        if (matches.length === 0) {
            suggestionBox.classList.add("hidden");
            return;
        }

        suggestionBox.innerHTML = matches.slice(0, 5).map(item => `
            <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer">
                ${item}
            </div>
        `).join("");

        suggestionBox.classList.remove("hidden");

        // click suggestion
        suggestionBox.querySelectorAll("div").forEach(div => {
            div.addEventListener("click", () => {
               searchInput.value = div.textContent.trim();
               suggestionBox.classList.add("hidden");

             // force reset layout repaint (fixes visual jump)
               searchInput.blur();
               searchInput.focus({ preventScroll: true });
            });
        });
    });

    document.addEventListener("click", (e) => {
        if (!searchInput.contains(e.target)) {
            suggestionBox.classList.add("hidden");
        }
    });

    // =========================
    // 🔥 SEARCH BUTTON
    // =========================
    function searchEquipment() {

        const keywordRaw = searchInput.value.trim();
        const keyword = keywordRaw.toLowerCase();

        tableBody.innerHTML = "";

        if (!keyword) {
            resultBox.classList.add('hidden');
            return;
        }

        let found = [];

        facilitiesData.forEach(facility => {

            facility.equipment.forEach(eq => {

                if (eq.name.toLowerCase().includes(keyword)) {

                    found.push({
                        facility_id: facility.id,
                        facility_name: facility.name,
                        equipment_name: eq.name,
                        quantity: eq.quantity ?? 1
                    });
                }

            });

        });

        // 🔥 SMART TITLE
        const title = document.querySelector("#equipmentSearchResults h4");
        title.textContent = `Facilities with available: ${keywordRaw}`;

        if (found.length === 0) {
           resultBox.classList.remove('hidden');

if (window.updateAccordionHeight) {
    window.updateAccordionHeight();
}
            tableBody.innerHTML = `
                <tr>
                    <td colspan="3" class="text-center p-2 text-gray-500">
                        No results found
                    </td>
                </tr>
            `;
            return;
        }

        found.forEach(item => {
            const row = `
                <tr>
                    <td class="border px-2 py-1">${item.facility_id}</td>
                    <td class="border px-2 py-1">${item.facility_name}</td>
                    <td class="border px-2 py-1">${item.quantity}</td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });

       resultBox.classList.remove('hidden');

if (window.updateAccordionHeight) {
    window.updateAccordionHeight();
}
    }

    searchBtn.addEventListener('click', searchEquipment);

    // optional: enter key search
    searchInput.addEventListener("keypress", (e) => {
        if (e.key === "Enter") {
            searchEquipment();
        }
    });
}