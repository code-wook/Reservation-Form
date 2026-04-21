// =========================
// STEPPER WITH VALIDATION
// =========================
import $ from "jquery";
import { showToast } from "./toast";

document.addEventListener("DOMContentLoaded", () => {

    const steps = document.querySelectorAll(".stepper-step");
    const panes = document.querySelectorAll(".stepper-pane");
    const progressLine = document.querySelector(".stepper-line-progress");

    const nextBtns = document.querySelectorAll(".next-btn");
    const backBtns = document.querySelectorAll(".btn-back");

    let currentStep = 0;
    let maxStepReached = 0;

 function animatePaneChange(newStep) {
    const currentPane = document.querySelector(`.stepper-pane[data-step="${currentStep}"]`);
    const nextPane = document.querySelector(`.stepper-pane[data-step="${newStep}"]`);

    if (!currentPane || !nextPane) return;

    currentPane.classList.add("hidden");
    nextPane.classList.remove("hidden");
}

function updateViewportHeight() {
    const viewport = document.querySelector(".stepper-viewport");
    const activePane = document.querySelector(`.stepper-pane[data-step="${currentStep}"]`);

    if (!viewport || !activePane) return;

    viewport.style.height = activePane.offsetHeight + "px";
}


    // =========================
    // UPDATE UI
    // =========================
function updateStepper() {

    steps.forEach((step, index) => {

        // Completed steps
        if (index < currentStep) {
            step.classList.remove("bg-white", "text-[#991B1B]");
            step.classList.add("bg-[#991B1B]", "text-white");
        }

        // Current step (waiting state)
        else if (index === currentStep) {
            step.classList.remove("bg-[#991B1B]", "text-white");
            step.classList.add("bg-white", "text-[#991B1B]");
        }

        // Future steps
        else {
            step.classList.remove("bg-[#991B1B]", "text-white");
            step.classList.add("bg-white", "text-[#991B1B]");
        }

    });

   const firstStep = steps[0];
const lastStep = steps[steps.length - 1];

const startOffset = firstStep.offsetLeft + firstStep.offsetWidth / 2;
const endOffset = lastStep.offsetLeft + lastStep.offsetWidth / 2;

const totalWidth = endOffset - startOffset;
const stepWidth = totalWidth / (steps.length - 1);

progressLine.style.width = (currentStep * stepWidth + startOffset) + "px";

}


// =========================
// VALIDATE CURRENT STEP
// =========================
function validateStep(stepIndex) {
    const currentPane = document.querySelector(`.stepper-pane[data-step="${stepIndex}"]`);
    if (!currentPane) return true;

    // -------------------------
// EXPAND PERSONAL INFO & CERTIFY (STEP 3)
// -------------------------
if (stepIndex === 2) {
    // Using the same jQuery selectors from personalInformation.js
    const $personalContent = $('#personalContent');
    const $personalArrow = $('#personalArrow');
    const $certifyContent = $('#certifyContent');
    const $certifyArrow = $('#certifyArrow');

    if ($personalContent.hasClass('hidden')) {
        $personalContent.removeClass('hidden');
        $personalArrow.addClass('rotate-90');
    }

    if ($certifyContent.hasClass('hidden')) {
        $certifyContent.removeClass('hidden');
        $certifyArrow.addClass('rotate-90');
    }
}


    const inputs = currentPane.querySelectorAll("input, select, textarea");
    let valid = true;
    const errors = []; // collect all error messages

    // Helper to push unique errors
    function pushError(msg) {
        if (!errors.includes(msg)) errors.push(msg);
    }

    // -------------------------
    // REQUIRED FIELD CHECK
    // -------------------------
   const requiredFields = [
    // Step 1 fields
    "startDate",
    "endDate",
    "timeFrom",
    "timeTo",
    // Step 2 fields
    "facility",
    "purpose",
    "otherDetails",
    "needEquipment",
    "personalEquipment",
    "personalEquipmentDetails",
    // Step 3 fields
    "lastName",
    "firstName",
    "email",
    "organization",
    "contactNumber",
    "certifyEmail",
    "certifyInfo",
    "consentData"
];


    // Determine if timeSection is visible (Tailwind hidden check)
    const timeSection = currentPane.querySelector("#timeSection");
    const timeSectionVisible = timeSection &&
                               !timeSection.classList.contains('max-h-0') &&
                               !timeSection.classList.contains('opacity-0');

    for (const input of inputs) {
        // Skip only if explicitly hidden by stepper pane
if (input.closest('.stepper-pane')?.classList.contains('hidden')) continue;

        if (!requiredFields.includes(input.name)) continue;

        // --- Skip time validation if timeSection is hidden ---
        if ((input.name === "timeFrom" || input.name === "timeTo") && !timeSectionVisible) continue;
       // Skip personalEquipmentDetails if its container is hidden
if (input.name === "personalEquipmentDetails") {
    const container = currentPane.querySelector('#personalEquipmentInput');
    if (container && container.offsetHeight === 0) continue; // skip validation if collapsed
}
// Skip Other Equipment inputs if collapsed
if (input.closest('#otherEquipmentAccordion')) {
    const otherContainer = currentPane.querySelector('#otherEquipmentAccordion');
    if (otherContainer) {
        const maxHeight = parseInt(window.getComputedStyle(otherContainer).maxHeight);
        if (maxHeight === 0) continue; // skip validation if collapsed
    }
}



        let isEmpty = false;
        if (input.type === "radio") {
    const checked = currentPane.querySelector(`input[name="${input.name}"]:checked`);
    if (!checked) isEmpty = true;

} else if (input.type === "checkbox") {
    // check if at least one checkbox with same name is checked
    const checked = currentPane.querySelector(`input[name="${input.name}"]:checked`);
    if (!checked) isEmpty = true;

} else if (input.tagName === "SELECT") {
    if (!input.value) isEmpty = true;

} else {
    if (!input.value.trim()) isEmpty = true;
}

        // -------------------------
        // INDIVIDUAL TIME VALIDATION (RUN ONLY IF VISIBLE)
        // -------------------------
        if (timeSectionVisible && (input.name === "timeFrom" || input.name === "timeTo")) {
            const from = currentPane.querySelector("#timeFrom")?.value;
            const to = currentPane.querySelector("#timeTo")?.value;

            if (from && to) {
                const fromDate = new Date(`1970-01-01T${from}:00`);
                const toDate = new Date(`1970-01-01T${to}:00`);

                if (fromDate.getTime() === toDate.getTime()) {
                    pushError("Start and end times cannot be the same.");
                    valid = false;
                } else if (fromDate > toDate) {
                    pushError("Start time must be earlier than end time.");
                    valid = false;
                }
            }
        }

        if (isEmpty) {
            valid = false;
            switch (input.name) {
                case "facility": pushError("Please select a facility."); break;
                case "purpose": pushError("Please provide a purpose."); break;
                case "otherDetails": pushError("Please add reservation details."); break;
                case "needEquipment": pushError("Please indicate if equipment is needed."); break;
                case "personalEquipment": pushError("Please indicate if bringing personal equipment."); break;
                case "personalEquipmentDetails": pushError("Please specify your personal equipment."); break;
                case "startDate": pushError("Please select a start date."); break;
                case "endDate": pushError("Please select an end date."); break;
                case "timeFrom": pushError("Please select a start time."); break;
                case "timeTo": pushError("Please select an end time."); break;
                
                case "email": pushError("Please enter your email address."); break;
                case "organization": pushError("Please enter your organization."); break;
                case "contactNumber": pushError("Please enter your contact number."); break;
                case "certifyEmail": pushError("Please confirm your email is correct."); break;
                case "certifyInfo": pushError("Please certify that the information is correct."); break;
                case "consentData": pushError("Please agree to data consent."); break;

            }
        }
    }

    // -------------------------
// SMART NAME VALIDATION
// -------------------------
if (stepIndex === 2) {
    const lastName = currentPane.querySelector('[name="lastName"]')?.value.trim();
    const firstName = currentPane.querySelector('[name="firstName"]')?.value.trim();

    if (!lastName && !firstName) {
    pushError("Please enter your complete name.");
    currentPane.querySelector('[name="lastName"]').focus();
} else if (!lastName) {
    pushError("Please enter your last name.");
    currentPane.querySelector('[name="lastName"]').focus();
} else if (!firstName) {
    pushError("Please enter your first name.");
    currentPane.querySelector('[name="firstName"]').focus();
}



// -------------------------
// CONTACT NUMBER VALIDATION (PH FORMAT)
// -------------------------
const contactNumberInput = currentPane.querySelector('[name="contactNumber"]');
const contactNumber = contactNumberInput?.value.trim();

if (!contactNumber) {

    pushError("Please enter your contact number.");

} else {

    // Check if contains non-numbers
    const numbersOnly = /^[0-9]+$/;

    if (!numbersOnly.test(contactNumber)) {

        pushError("Contact number must contain numbers only.");

    } else {

        // Philippine mobile format validation
        const phMobile = /^09\d{9}$/;

        if (!phMobile.test(contactNumber)) {

            pushError("Please enter a valid Philippine contact number starting with 09 (e.g., 09123456789).");

        }

    }

}


// -------------------------
// EMAIL FORMAT VALIDATION (LOCAL + DOMAIN)
// -------------------------
const emailInput = currentPane.querySelector('[name="email"]');
const email = emailInput?.value.trim();

if (!email) {
    pushError("Please enter your email address.");
} else {
    const parts = email.split("@");

    if (parts.length !== 2) {
        pushError("Email must contain exactly one '@' symbol.");
    } else {
        const [localPart, domainPart] = parts;

        // Check local part
        if (!localPart) pushError("Email local part (before '@') cannot be empty.");

        // Check domain part
        if (!domainPart) {
            pushError("Email domain part (after '@') cannot be empty.");
        } else {
            // Domain must have at least one dot (e.g., gmail.com)
            if (!domainPart.includes(".")) {
                pushError("Email domain must contain a dot (e.g., gmail.com).");
            }

            // Optional: simple domain format check
            const domainPattern = /^[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            if (!domainPattern.test(domainPart)) {
                pushError("Email domain is not valid.");
            }
        }
    }
}

}



    // -------------------------
    // CONDITIONAL VALIDATION (STEP 2)
    // -------------------------
    if (stepIndex === 1) {
        const personalEquipment = currentPane.querySelector('input[name="personalEquipment"]:checked');
        if (personalEquipment?.value === "yes") {
            const detailsInput = currentPane.querySelector('input[name="personalEquipmentDetails"]');
            if (detailsInput && !detailsInput.value.trim()) pushError("Please specify the personal equipment you will bring.");
        }

    const otherEquipAccordion = currentPane.querySelector('#otherEquipmentAccordion');
if (otherEquipAccordion) {
    const maxHeight = parseInt(window.getComputedStyle(otherEquipAccordion).maxHeight);
    if (maxHeight > 0) { // only run if visible
        // run validation for equipment rows...
const otherEquipAccordion = currentPane.querySelector('#otherEquipmentAccordion');

if (otherEquipAccordion) {

    const maxHeight = parseInt(window.getComputedStyle(otherEquipAccordion).maxHeight);

    // Only validate if accordion is visible
    if (maxHeight > 0) {

        const rows = currentPane.querySelectorAll('.equipment-row');

        let hasIncompleteRow = false;
        let hasAnyData = false;

        rows.forEach(row => {

            const equipment = row.querySelector('select')?.value.trim();
            const units = row.querySelector('input')?.value.trim();

            if (equipment || units) hasAnyData = true;

            if ((equipment && !units) || (!equipment && units) || (!equipment && !units)) {
                hasIncompleteRow = true;
            }

        });

        // Case 1: User never filled anything
        if (!hasAnyData) {
            pushError("Please complete the equipment details before proceeding.");
        }

        // Case 2: Some rows filled but others incomplete
        else if (hasIncompleteRow) {
            pushError("Please fill all other equipment rows.");
        }

    }
}

    }
}

    }

    // -------------------------
    // SHOW TOASTS
    // -------------------------
if (errors.length > 0) {
    showToast(errors[0]); // show ONLY first error
    valid = false;
}

    return valid;
}


// =========================
// NEXT BUTTON
// =========================
let isSubmitting = false;
let isStepLocked = false;

nextBtns.forEach(btn => {
    btn.addEventListener("click", () => {

        // prevent spam click immediately
        if (isStepLocked) return;

        if (document.activeElement?.tagName === "INPUT") {
            document.activeElement.blur();
        }

        // run validation ONLY ONCE
        const isValid = validateStep(currentStep);
        if (!isValid) return;

        // LOCK immediately after validation passes
        isStepLocked = true;
        nextBtns.forEach(b => b.disabled = true);

        // LAST STEP → submit
        if (currentStep === steps.length - 1) {

            showToast("Submitting reservation, please wait...", "success");

            setTimeout(() => {
                formChanged = false;
                document.getElementById("reservationForm").submit();
            }, 3000);

            return;
        }

        // STEP CHANGE
        const nextStep = currentStep + 1;
        animatePaneChange(nextStep);
        currentStep = nextStep;
        maxStepReached = Math.max(maxStepReached, currentStep);
        updateStepper();

        window.scrollTo({ top: 0, behavior: "smooth" });

        // UNLOCK after 4 seconds (your requirement)
        setTimeout(() => {
            isStepLocked = false;
            nextBtns.forEach(b => b.disabled = false);
        }, 4000);
    });
});

    // =========================
    // BACK BUTTON
    // =========================
    backBtns.forEach(btn => {
        btn.addEventListener("click", () => {
            if (currentStep > 0) {
                const prevStep = currentStep - 1;
                animatePaneChange(prevStep);
                currentStep = prevStep;
                updateStepper();

                window.scrollTo({ top: 0, behavior: "smooth" });
            } else {
                window.history.back();
            }
        });
    });

    // =========================
    // CLICK STEP
    // =========================
steps.forEach(step => {
    step.addEventListener("click", () => {

        const stepIndex = parseInt(step.dataset.step);

        // Block only if user tries to skip an untouched step
        if (stepIndex > maxStepReached) {
            showToast("Please complete the current step first.");
            return;
        }

        animatePaneChange(stepIndex);
        currentStep = stepIndex;
        updateStepper();

        window.scrollTo({ top: 0, behavior: "smooth" });
    });
});


   maxStepReached = currentStep;
updateStepper();

let formChanged = false;

// Track if any input in the form changes
const reservationForm = document.getElementById("reservationForm");
if (reservationForm) {
    reservationForm.addEventListener("input", () => {
        formChanged = true;
    });
}

// Trigger warning only if form has unsaved changes
window.addEventListener("beforeunload", (e) => {
    if (!formChanged) return;

    const confirmationMessage = "You have unsaved changes. Refreshing or leaving the page will lose your data.";
    e.preventDefault(); // Some browsers require this
    e.returnValue = confirmationMessage; // Standard for most browsers
    return confirmationMessage; // For older browsers
}); 

// Optional: reset flag when form is submitted successfully
reservationForm.addEventListener("submit", () => {
    formChanged = false;
});


}); // end DOMContentLoaded


