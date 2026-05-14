import { showToast } from "./toast";
import { initEquipmentSearch } from "./equipmentSearch";
  document.addEventListener("DOMContentLoaded", () => {

    const facilitySelect = document.getElementById('facilitySelect');

let facilitiesData = []; // store API response

fetch('http://127.0.0.1:8001/api/facilities') // change port if needed
  .then(res => res.json())
  .then(data => {
    facilitiesData = data;

    facilitySelect.innerHTML = '<option value="">Select a facility</option>';

    data.forEach(facility => {
      const option = document.createElement('option');
      option.value = facility.id;
      option.textContent = facility.name;
      facilitySelect.appendChild(option);
    });
  })
  .catch(err => {
    console.error('Error fetching facilities:', err);
    facilitySelect.innerHTML = '<option>Error loading</option>';
  });

  facilitySelect.addEventListener('change', function () {

  const selectedId = this.value;

  const facility = facilitiesData.find(f => f.id == selectedId);

  const equipmentSelects = document.querySelectorAll('.equipment-select');

  equipmentSelects.forEach(select => {

    select.innerHTML = '<option value="">Select equipment</option>';

    if (!facility) return;

    facility.equipment.forEach(eq => {
    const option = document.createElement('option');

    option.value = eq.name;
    option.textContent = eq.name;

    // STORE AVAILABLE QUANTITY
    option.dataset.availableQty = eq.quantity;

  select.appendChild(option);
});

  });

});
    
  // -----------------------------
  // OTHER EQUIPMENT ACCORDION
  // -----------------------------
  const needEquipmentRadios = document.querySelectorAll('input[name="needEquipment"]');
  const otherEquipAccordion = document.getElementById('otherEquipmentAccordion');
  function updateAccordionHeight() {

  // only update if accordion is open
  if (
    document.querySelector('input[name="needEquipment"]:checked')?.value !== 'yes'
  ) return;

  // reset height first
  otherEquipAccordion.style.maxHeight = 'none';

  // calculate new height
  const newHeight = otherEquipAccordion.scrollHeight;

  // apply new height
  otherEquipAccordion.style.maxHeight = newHeight + 'px';
}

// make globally accessible
window.updateAccordionHeight = updateAccordionHeight;

  // Initialize collapsed state
  otherEquipAccordion.style.overflow = 'hidden';
  otherEquipAccordion.style.transition = 'max-height 0.5s ease, opacity 0.5s ease';
  otherEquipAccordion.style.maxHeight = '0';
  otherEquipAccordion.style.opacity = '0';

  needEquipmentRadios.forEach(radio => {
    radio.addEventListener('change', () => {
      if (radio.value === "yes" && radio.checked) {
        // expand accordion smoothly
        otherEquipAccordion.style.maxHeight = otherEquipAccordion.scrollHeight + "px";
        otherEquipAccordion.style.opacity = '1';
      } else {
        // collapse accordion visually
        otherEquipAccordion.style.maxHeight = '0';
        otherEquipAccordion.style.opacity = '0';
        //  do NOT clear inputs or remove rows
      }
    });
  });

  // ---------- PERSONAL EQUIPMENT ----------
  const personalRadios = document.querySelectorAll('input[name="personalEquipment"]');
  const personalDetails = document.getElementById('personalEquipmentInput');

  personalDetails.style.overflow = 'hidden';
  personalDetails.style.transition = 'max-height 0.5s ease, opacity 0.5s ease';
  personalDetails.style.maxHeight = '0';
  personalDetails.style.opacity = '0';

  personalRadios.forEach(radio => {
    radio.addEventListener('change', () => {
      if (radio.value === "yes" && radio.checked) {
        personalDetails.style.maxHeight = personalDetails.scrollHeight + "px";
        personalDetails.style.opacity = '1';
      } else {
        personalDetails.style.maxHeight = '0';
        personalDetails.style.opacity = '0';
        const input = personalDetails.querySelector('input[name="personalEquipmentDetails"]');
        if (input) input.value = "";
      }
    });
  });

  // ---------- DYNAMIC ADD/REMOVE EQUIPMENT ROWS ----------
  const equipmentContainer = document.getElementById('equipmentRows');
  const addBtn = document.querySelector('.add-equipment-btn');
  let equipmentIndex = equipmentContainer.children.length + 1;

  // -----------------------------
// FILTER OTHER EQUIPMENT OPTIONS
// -----------------------------
function updateEquipmentOptions() {
  const allRows = equipmentContainer.querySelectorAll('.equipment-row');
  const selectedValues = Array.from(allRows)
    .map(row => row.querySelector('select')?.value)
    .filter(val => val); // only non-empty

  allRows.forEach(row => {
    const select = row.querySelector('select');
    const currentValue = select.value;

    select.querySelectorAll('option').forEach(option => {
      if (option.value === "") {
        option.style.display = ''; // always show placeholder
        return;
      }
      if (option.value === currentValue) {
        option.style.display = ''; // keep currently selected visible
      } else if (selectedValues.includes(option.value)) {
        option.style.display = 'none'; // hide already selected
      } else {
        option.style.display = ''; // show available options
      }
    });
  });
}



  function createRow() {
    const templateRow = document.querySelector('.equipment-row').cloneNode(true);

// Clear input values
templateRow.querySelectorAll('input').forEach(i => i.value = '');

// Reset select to empty
const select = templateRow.querySelector('select');

const selectedFacilityId = facilitySelect.value;
const facility = facilitiesData.find(f => f.id == selectedFacilityId);

select.innerHTML = '<option value="">Select equipment</option>';

if (facility) {
  facility.equipment.forEach(eq => {
  const option = document.createElement('option');

  option.value = eq.name;
  option.textContent = eq.name;

  // STORE AVAILABLE QUANTITY
  option.dataset.availableQty = eq.quantity;

  select.appendChild(option);
});
}

select.value = '';

if (facility) {
  select.innerHTML = '<option value="">Select equipment</option>';

  facility.equipment.forEach(eq => {
  const option = document.createElement('option');

  option.value = eq.name;
  option.textContent = eq.name;

  // STORE AVAILABLE QUANTITY
  option.dataset.availableQty = eq.quantity;

  select.appendChild(option);
});
}
select.value = '';

      // Show delete button
    const deleteBtn = templateRow.querySelector('.delete-equipment');
    deleteBtn.classList.remove('hidden');
    deleteBtn.addEventListener('click', () => {
      templateRow.remove();
      // adjust parent accordion height
      if (document.querySelector('input[name="needEquipment"]:checked')?.value === 'yes') {
        otherEquipAccordion.style.maxHeight = otherEquipAccordion.scrollHeight + "px";
      }
    });

    // Update names to new index
    templateRow.querySelector('select').setAttribute('name', `otherEquipment[${equipmentIndex}]`);
    templateRow.querySelector('input').setAttribute('name', `numberUnits[${equipmentIndex}]`);

// Append row to container
equipmentContainer.appendChild(templateRow);

// Update options to disable already selected equipment
updateEquipmentOptions();

// Adjust parent accordion height if still expanded
if (document.querySelector('input[name="needEquipment"]:checked')?.value === 'yes') {
  otherEquipAccordion.style.maxHeight = otherEquipAccordion.scrollHeight + "px";
}


    equipmentIndex++;
  }

  // Update options whenever a select changes
equipmentContainer.addEventListener('change', (e) => {

  // EQUIPMENT SELECT CHANGED
  if (e.target.tagName.toLowerCase() === 'select') {
    updateEquipmentOptions();
  }

  // QUANTITY INPUT CHANGED
  if (e.target.type === 'number') {

  const row = e.target.closest('.equipment-row');

  const facilitySelected = facilitySelect.value;

  const select = row.querySelector('select');
  const selectedOption = select.options[select.selectedIndex];

  // remove old message
  let existingMsg = row.querySelector('.qty-error');
  if (existingMsg) existingMsg.remove();

  const enteredQty = parseInt(e.target.value || 0);

  // 1. NO FACILITY YET
  if (!facilitySelected) {
    e.target.value = '';

    const error = document.createElement('span');
    error.className = 'qty-error text-xs text-red-700 block mt-1';
    error.textContent = 'Please choose a facility first';

    e.target.parentElement.appendChild(error);
    return;
  }

  // 2. NO EQUIPMENT YET
  if (!select.value) {
    e.target.value = '';

    const error = document.createElement('span');
    error.className = 'qty-error text-xs text-red-700 block mt-1';
    error.textContent = 'Please choose an equipment first';

    e.target.parentElement.appendChild(error);
    return;
  }

  const availableQty = parseInt(selectedOption.dataset.availableQty || 0);

  // 3. STOCK VALIDATION
  if (enteredQty > availableQty) {

    e.target.value = '';

    const error = document.createElement('span');
    error.className = 'qty-error text-xs text-red-700 block mt-1';
    error.textContent = `Only ${availableQty} available for this equipment`;

    e.target.parentElement.appendChild(error);
  }
}
});


  addBtn.addEventListener('click', () => {

  const rows = equipmentContainer.querySelectorAll('.equipment-row');
  let hasIncomplete = false;

  rows.forEach(row => {

    const equipment = row.querySelector('select')?.value.trim();
    const units = row.querySelector('input')?.value.trim();

    if (!equipment || !units) {
      hasIncomplete = true;
    }

  });

  if (hasIncomplete) {
    showToast("Please complete the current equipment row first");
    return; //  STOP adding new row
  }

  createRow(); //  only runs if valid
});

  //  INIT SEARCH COMPONENT (CORRECT PLACE)
  initEquipmentSearch();

  // Enable delete for default row
  const defaultDeleteBtn = equipmentContainer.querySelector('.delete-equipment');
  if (defaultDeleteBtn) {
    defaultDeleteBtn.addEventListener('click', () => {
      defaultDeleteBtn.closest('.equipment-row').remove();
      if (document.querySelector('input[name="needEquipment"]:checked')?.value === 'yes') {
        otherEquipAccordion.style.maxHeight = otherEquipAccordion.scrollHeight + "px";
      }
    });
  }

  });


