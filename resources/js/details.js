import { showToast } from "./toast";

  document.addEventListener("DOMContentLoaded", () => {


  // -----------------------------
  // OTHER EQUIPMENT ACCORDION
  // -----------------------------
  const needEquipmentRadios = document.querySelectorAll('input[name="needEquipment"]');
  const otherEquipAccordion = document.getElementById('otherEquipmentAccordion');

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
  if (e.target.tagName.toLowerCase() === 'select') {
    updateEquipmentOptions();
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
    showToast("Please complete the current equipment row before adding another.");
    return;
  }

  

  createRow();

});



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
