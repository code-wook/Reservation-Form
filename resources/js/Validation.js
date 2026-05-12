import $ from "jquery";
import { getCurrentStep } from "./stepper";
/* =========================
   GLOBAL VALIDATION FLAG
========================= */
let globalValidationBlocked = false;

/* =========================
   TOGGLE BLOCK MODE
========================= */
function blockFieldToasts() {
    globalValidationBlocked = true;

    // auto unblock after short delay (prevents stuck state)
    setTimeout(() => {
        globalValidationBlocked = false;
    }, 1000);
}

function focusField(selector) {
    const $el = $(selector);

    if (!$el.length) return;

    setTimeout(() => {
        $el.focus();

        $('html, body').animate({
            scrollTop: $el.offset().top - 100
        }, 300);
    }, 50);
}

/* =========================
   FIELD HIGHLIGHTING
========================= */
function clearHighlights() {
    $('input, select, textarea')
        .removeClass('border-red-800 ring-2 ring-red-800');

    $('.equipment-row')
        .removeClass('ring-2 ring-red-800 rounded');
}

function highlightField(selector) {
    const $el = $(selector).first();

    if (!$el.length) return;

    clearHighlights();

    // EQUIPMENT ROW (special case)
    if (selector === '.equipment-row') {
        $('.equipment-row').addClass('ring-2 ring-red-800 rounded');

        $('.equipment-row input, .equipment-row select').on('input change', function () {
            $('.equipment-row').removeClass('ring-2 ring-red-800 rounded');
        });

        return;
    }

    // RADIO / CHECKBOX GROUP
    if ($el.attr('type') === 'radio' || $el.attr('type') === 'checkbox') {
        const name = $el.attr('name');

        $(`input[name="${name}"]`).closest('div')
            .addClass('ring-2 ring-red-800 rounded');

        $(`input[name="${name}"]`).on('change', function () {
            $(`input[name="${name}"]`).closest('div')
                .removeClass('ring-2 ring-red-800 rounded');
        });

        return;
    }

    // NORMAL INPUT
    $el.addClass('border-red-800 ring-2 ring-red-800');

    $el.on('input change', function () {
        $(this).removeClass('border-red-800 ring-2 ring-red-800');
    });
}

/* =========================
   MAIN VALIDATION FUNCTION
========================= */
function validateRequiredFields(formSelector = '#reservationForm') {

    const $form = $(formSelector);

    let isValid = true;

    // check all required inputs (visible only)
    $form.find(':input[required]').each(function () {

        const $input = $(this);

        if ($input.is(':hidden')) return;

        if (!$input.val() || $input.val().trim() === '') {
            isValid = false;
            return false; // break loop
        }
    });

    return isValid;
}

/* =========================
   GLOBAL SUBMIT CONTROL
========================= */

function hasAnyInput() {
    return $('input, select, textarea').filter(function () {
        return $(this).val() && $(this).val().trim() !== '';
    }).length > 0;
}

function handleValidationResult(result) {

    if (!result || result.valid) return false;

    showToast(result.message);

    if (result.field) {

    
        highlightField(result.field);

        const $el = $(result.field).first();

        setTimeout(() => {
            $('html, body').animate({
                scrollTop: $el.offset().top - 150
            }, 300);
        }, 50);
    }

    return true;
}

function handleNextOrSubmit(callback) {

    const step = getCurrentStep();
    let result = { valid: true };

    if (step === 0) {

        result = validateReservationDates();
        if (!result.valid) return handleValidationResult(result);

        result = validateTimeFields();
    }

    else if (step === 1) {
        result = validateDetailsFields();
    }

    else if (step === 2) {
        result = validatePersonalInformation();
    }

    else if (step === 3) {
        result = validateAgreement();
    }

    if (handleValidationResult(result)) {
        return false;
    }

    if (callback) callback();
    return true;
}
/* =========================
   EXPORTS
========================= */
export {
    validateRequiredFields,
    handleNextOrSubmit,
    validateReservationDates,
    validateTimeFields,
    validateDetailsFields, 
    validatePersonalInformation,
    validateAgreement
};
/* =========================
   RESERVATION DATE VALIDATION
========================= */

function validateReservationDates() {

    const startVal = $('#startDate').val();
    const endVal = $('#endDate').val();

    if (!startVal) {
        return {
            valid: false,
            field: '#startDate',
            message: "Start date is required"
        };
    }

    if (!endVal) {
        return {
            valid: false,
            field: '#endDate',
            message: "End date is required"
        };
    }

    const start = new Date(startVal);
    const end = new Date(endVal);

    if (end < start) {
        return {
            valid: false,
            field: '#endDate',
            message: "End date must not be earlier than start date"
        };
    }

    return { valid: true };
}

function validateTimeFields() {

    const $timeSection = $('#timeSection');

    const timeVisible = $('#timeSection').hasClass('max-h-[500px]');

    if (!timeVisible) return { valid: true };

    const fromVal = $('#timeFrom').val();
    const toVal = $('#timeTo').val();

    if (!fromVal) {
        return {
            valid: false,
            field: '#timeFrom',
            message: "Start Time is required"
        };
    }

    if (!toVal) {
        return {
            valid: false,
            field: '#timeTo',
            message: "End Time is required"
        };
    }

    return { valid: true };
}

function validateDetailsFields() {

    // Facility
    const facility = $('select[name="facility"]').val();
    if (!facility) {
        return {
            valid: false,
            field: 'select[name="facility"]',
            message: "Please select a facility"
        };
    }

    // Purpose
    const purpose = $('textarea[name="purpose"]').val();
    if (!purpose || purpose.trim() === '') {
        return {
            valid: false,
            field: 'textarea[name="purpose"]',
            message: "Reservation purpose required"
        };
    }

    // Equipment validation (only if YES)
    const needEquip = $('input[name="needEquipment"]:checked').val();
    if (!needEquip) {
    return {
        valid: false,
        field: 'input[name="needEquipment"]:first',
        message: "Select equipment option"
    };
}

    if (needEquip === "yes") {

let hasRow = false;

$('.equipment-row').each(function () {

    const equip = $(this).find('select').val();
    const qty = $(this).find('input[type="number"]').val();

    if (!equip || !qty) {
        hasRow = true;

        return {
            valid: false,
            field: this,
            message: "Complete equipment selection"
        };
    }
});

if (hasRow) {
    return {
        valid: false,
        field: '.equipment-row',
        message: "Fill all equipment fields"
    };
}
    }

    // Other details
    const otherDetails = $('textarea[name="otherDetails"]').val();
    if (!otherDetails || otherDetails.trim() === '') {
        return {
            valid: false,
            field: 'textarea[name="otherDetails"]',
            message: "Other details required"
        };
    }

    // Personal equipment radio
// Personal equipment radio
const personalEquip = $('input[name="personalEquipment"]:checked').val();
if (!personalEquip) {
    return {
        valid: false,
        field: 'input[name="personalEquipment"]:first',
        message: "Select personal equipment option"
    };
}

    // If YES → require details
    if (personalEquip === "yes") {
        const personalDetails = $('input[name="personalEquipmentDetails"]').val();

        if (!personalDetails || personalDetails.trim() === '') {
            return {
                valid: false,
                field: 'input[name="personalEquipmentDetails"]',
                message: "Enter personal equipment details"
            };
        }
    }


    return { valid: true };
}

function validatePersonalInformation() {

    // LAST NAME
    const lastName = $('input[name="lastName"]').val();
    if (!lastName || lastName.trim() === '') {
        return {
            valid: false,
            field: 'input[name="lastName"]',
            message: "Last name is required"
        };
    }

    // FIRST NAME
    const firstName = $('input[name="firstName"]').val();
    if (!firstName || firstName.trim() === '') {
        return {
            valid: false,
            field: 'input[name="firstName"]',
            message: "First name is required"
        };
    }

   // ================= CONTACT VALIDATION =================
const mobile = ($('input[name="mobileNumber"]').val() || '').trim();
const landline = ($('input[name="landlineNumber"]').val() || '').trim();

const mobileRegex = /^09\d{9}$/;
const landlineRegex = /^(0[2-8]\d{7,9})$/;

const maxDigits = 11;
const landlineMax = 11;

// BOTH EMPTY → single toast
if (!mobile && !landline) {
    return {
        valid: false,
        field: 'input[name="mobileNumber"]',
        message: "Enter mobile or landline number"
    };
}

// MOBILE
if (mobile) {

    if (mobile.length !== maxDigits) {
        return {
            valid: false,
            field: 'input[name="mobileNumber"]',
            message: "Mobile must be 11 digits"
        };
    }

    if (!mobileRegex.test(mobile)) {
        return {
            valid: false,
            field: 'input[name="mobileNumber"]',
            message: "Invalid mobile number"
        };
    }
}

// LANDLINE
if (landline) {

    if (landline.length > maxDigits) {
        return {
            valid: false,
            field: 'input[name="landlineNumber"]',
            message: "Landline must be max 11 digits"
        };
    }

    if (!landlineRegex.test(landline)) {
        return {
            valid: false,
            field: 'input[name="landlineNumber"]',
            message: "Invalid landline format"
        };
    }
}

    // EMAIL (STRICT VALIDATION)
const email = ($('input[name="email"]').val() || '').trim();

// strict RFC-like simplified pattern
const emailRegex =
/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

if (!email) {
    return {
        valid: false,
        field: 'input[name="email"]',
        message: "Email is required"
    };
}

// no spaces allowed anywhere
if (/\s/.test(email)) {
    return {
        valid: false,
        field: 'input[name="email"]',
        message: "Email contains spaces"
    };
}

if (!emailRegex.test(email)) {
    return {
        valid: false,
        field: 'input[name="email"]',
        message: "Enter valid email"
    };
}

  
// ================= ORGANIZATION =================
const org = $('select[name="organization"]').val();

if (!org) {
    return {
        valid: false,
        field: '#organizationSelect',
        message: "Select organization"
    };
}

// IF OTHERS → REQUIRE INPUT
if (org === "others") {

    const otherOrg = ($('input[name="otherOrganization"]').val() || '').trim();

    if (!otherOrg) {
        return {
            valid: false,
            field: '#otherOrganizationInput',
            message: "Enter organization name"
        };
    }
}

    return { valid: true };
}

function validateAgreement() {

    if (!$('input[name="certifyEmail"]').is(':checked')) {
        return {
            valid: false,
            field: 'input[name="certifyEmail"]',
            message: "You must agree to email certification"
        };
    }

    if (!$('input[name="certifyInfo"]').is(':checked')) {
        return {
            valid: false,
            field: 'input[name="certifyInfo"]',
            message: "You must confirm that information is correct"
        };
    }

    if (!$('input[name="consentData"]').is(':checked')) {
        return {
            valid: false,
            field: 'input[name="consentData"]',
            message: "You must agree to data consent"
        };
    }

    return { valid: true };
}