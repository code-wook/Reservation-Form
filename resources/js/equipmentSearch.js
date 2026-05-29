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

    //  GET ALL EQUIPMENT INTO ONE LIST
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
//  DROPDOWN AUTOCOMPLETE (IMPROVED)
// =========================

function renderSuggestions(keyword = "") {
    const allEquipment = getAllEquipment();

    let matches = allEquipment;

    if (keyword.trim()) {
        matches = allEquipment.filter(eq =>
            eq.toLowerCase().includes(keyword.toLowerCase())
        );
    }



    if (matches.length === 0) {
        suggestionBox.classList.add("hidden");
        return;
    }

    suggestionBox.innerHTML = matches.map(item => `
        <div class="px-3 py-2 hover:bg-gray-100 cursor-pointer">
            ${item}
        </div>
    `).join("");

    suggestionBox.classList.remove("hidden");

    suggestionBox.querySelectorAll("div").forEach(div => {
        div.addEventListener("click", () => {
            searchInput.value = div.textContent.trim();
            suggestionBox.classList.add("hidden");

            searchInput.blur();
        });
    });
}

// show ALL when focused
searchInput.addEventListener("focus", () => {
    renderSuggestions("");
});

// filter while typing
searchInput.addEventListener("input", () => {
    renderSuggestions(searchInput.value.trim());
});

    document.addEventListener("click", (e) => {
    if (!searchInput.contains(e.target) && !suggestionBox.contains(e.target)) {
        suggestionBox.classList.add("hidden");
    }
});

    // =========================
    //  SEARCH BUTTON
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

                    const otherEquipments = facility.equipment
                    .filter(item => item.name.toLowerCase() !== keyword)
                    .map(item => {

                       const qty = item.quantity ?? 0;

                      // singular/plural condition
                       const unitLabel = qty === 1 ? 'pc' : 'pcs';

                       return `${item.name} (${qty} ${unitLabel})`;

                     })
                              .join(', ');

                found.push({
                facility_id: facility.id,
                facility_name: facility.name,
                equipment_name: eq.name,
                quantity: eq.quantity ?? 1,
                other_equipments: otherEquipments || 'No other equipment'
});
                }

            });

        });

        //  SMART TITLE
        const title = document.querySelector("#equipmentSearchResults h4");
        title.textContent = `Facilities with available equipment: ${keywordRaw}`;

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
<tr class="facility-row">

    <td class="facility-cell border px-3 py-2 font-semibold text-red-800 cursor-pointer hover:bg-red-50 transition"
        data-facility-id="${item.facility_id}"
        data-facility-name="${item.facility_name}">
        ${item.facility_name}
    </td>

    <td class="border px-3 py-2 text-center">
        ${item.quantity}
    </td>

    <td class="border px-3 py-2 text-sm text-gray-700">
        ${item.other_equipments}
    </td>

</tr>
`;
            tableBody.innerHTML += row;
        });

        tableBody.querySelectorAll(".facility-cell").forEach(cell => {

    cell.addEventListener("click", () => {

        const row = cell.closest("tr");

        // remove highlight ONLY from cells
        tableBody.querySelectorAll(".facility-cell")
            .forEach(c => c.classList.remove("bg-red-100"));

        // highlight only clicked cell
        cell.classList.add("bg-red-100");

        const facilityId = cell.dataset.facilityId;

        const facilitySelect = document.getElementById("facilitySelect");

        if (facilitySelect) {
            facilitySelect.value = facilityId;
            facilitySelect.dispatchEvent(new Event("change"));
        }

        // auto open equipment section
        const needEquipmentYes =
            document.querySelector('input[name="needEquipment"][value="yes"]');

        if (needEquipmentYes) {

            // check if not already selected
            const wasChecked = needEquipmentYes.checked;

needEquipmentYes.checked = true;
needEquipmentYes.dispatchEvent(new Event("change"));

// SUCCESS TOAST
if (!wasChecked && window.showToast) {

    window.showToast(
        `Facility updated to "${cell.dataset.facilityName}" and equipment section enabled`,
        "success"
    );

}
        }
    });

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