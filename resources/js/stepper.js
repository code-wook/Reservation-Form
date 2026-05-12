import $ from "jquery";
import { handleNextOrSubmit } from "./Validation";
const $backBtn = $('.btn-back');
const $nextBtn = $('.next-btn');

/* =====================================================
   STEP STATE
===================================================== */
let isSubmitting = false;
let currentStep = 0;
const totalSteps = 4;

/* =====================================================
   UPDATE UI
===================================================== */

/* =====================================================
   AGREEMENT LOGIC (STEP 3 ONLY)
===================================================== */
function updateAgreementState() {

    if (currentStep !== 3) return;

    const $btn = $('#nextBtn');

    const allChecked =
        $('input[name="certifyEmail"]').is(':checked') &&
        $('input[name="certifyInfo"]').is(':checked') &&
        $('input[name="consentData"]').is(':checked');

    $btn.prop('disabled', !allChecked);

    if (allChecked) {
        $btn.removeClass('bg-gray-400 cursor-not-allowed')
            .addClass('bg-red-800 cursor-pointer');
    } else {
        $btn.removeClass('bg-red-800 cursor-pointer')
            .addClass('bg-gray-400 cursor-not-allowed');
    }
}

function updateUI() {

    // Show active step pane
$('.stepper-pane').addClass('hidden');
$(`.stepper-pane[data-step="${currentStep}"]`).removeClass('hidden');


    // Update stepper buttons
  $('.stepper-step').each(function () {
    const step = parseInt($(this).data('step'));

    // reset all first (ensures clean state)
    $(this)
        .removeClass('bg-red-800 text-white')
        .addClass('bg-white text-red-800');



    // mark completed steps only
    if (step < currentStep) {
        $(this)
            .removeClass('bg-white text-red-800')
            .addClass('bg-red-800 text-white');
    }
});

    // Progress bar
// Progress bar (step-based)
const isMobile = window.innerWidth < 640;

const progressMap = isMobile
    ? [15, 42, 70, 85, 100]
    : [10, 40, 65, 95, 100];

let percent = progressMap[currentStep] ?? 0;

$('.stepper-line-progress').css({
    width: percent + '%',
    transition: 'width 0.3s ease'
});




    // Back button state control
if (currentStep === 0) {
    $backBtn
        .prop('disabled', true)
        .addClass('bg-gray-300 text-gray-500 border-gray-300 cursor-not-allowed')
        .removeClass('bg-white text-red-800 border-red-600');
} else {
    $backBtn
        .prop('disabled', false)
        .addClass('bg-white text-red-800 border-red-600')
        .removeClass('bg-gray-300 text-gray-500 border-gray-300 cursor-not-allowed');
}

const $nextBtn = $('#nextBtn');

if (currentStep === totalSteps - 1) {
    $nextBtn.text('Submit');

    // force agreement check when entering step 3
    updateAgreementState();

} else {
    $nextBtn.text('Next');

    // reset button state when leaving step 3
    $nextBtn.prop('disabled', false)
        .removeClass('bg-gray-400 cursor-not-allowed')
        .addClass('bg-red-800 cursor-pointer');
}

// notify agreement system when step changes
$(document).trigger('stepChanged', [currentStep]);
updateAgreementState();
}

$(document).ready(function () {
    updateUI();
});

$(window).on('resize', function () {
    updateUI();
});

/* =====================================================
   NEXT STEP
===================================================== */
function nextStep() {
    if (currentStep < totalSteps - 1) {
        currentStep++;
        updateUI();

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
}

/* =====================================================
   PREVIOUS STEP
===================================================== */
function prevStep() {
    if (currentStep > 0) {
        currentStep--;
        updateUI();

        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }
}

/* =====================================================
   DIRECT STEP CLICK (optional future use)
===================================================== */
function goToStep(step) {
    if (step >= 0 && step < totalSteps) {
        currentStep = step;
        updateUI();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
}

/* =====================================================
   EVENT BINDINGS
===================================================== */
$(document).on('click', '.next-btn', function (e) {

    e.preventDefault(); // IMPORTANT prevents refresh

    const success = handleNextOrSubmit(() => {

        if (currentStep === totalSteps - 1) {

    // PREVENT DOUBLE CLICK
    if (isSubmitting) return;
    isSubmitting = true;

    const $btn = $('#nextBtn');

    $btn.prop('disabled', true)
        .text('Submitting...')
        .addClass('bg-gray-400 cursor-not-allowed')
        .removeClass('bg-red-800 cursor-pointer');

    // FINAL SUBMIT
    formDirty = false;
window.removeEventListener('beforeunload', beforeUnloadHandler);

$('#reservationForm')[0].submit();
} else {
            nextStep();
        }

    });

});
$(document).on(
    'change',
    'input[name="certifyEmail"], input[name="certifyInfo"], input[name="consentData"]',
    function () {
        updateAgreementState();
    }
);


$(document).on('click', '.btn-back', function (e) {
    if ($(this).prop('disabled')) {
        e.preventDefault();
        return;
    }

    prevStep();
});


/* Stepper circle click (optional navigation)
$(document).on('click', '.stepper-step', function () {
    const step = parseInt($(this).data('step'));
    goToStep(step);
});
*/

/* =====================================================
   INIT
===================================================== */
$(document).ready(function () {
    updateUI();
});

/* =====================================================
   EXPORT (optional if needed elsewhere)
===================================================== */
export {
    nextStep,
    prevStep,
    goToStep
};

export function getCurrentStep() {
    return currentStep;
}

let formDirty = false;

function beforeUnloadHandler(e) {
    if (!formDirty) return;

    e.preventDefault();
    e.returnValue = '';
}

// track changes
$(document).on('input change', 'input, select, textarea', function () {
    formDirty = true;
});

// attach listener
window.addEventListener('beforeunload', beforeUnloadHandler);

