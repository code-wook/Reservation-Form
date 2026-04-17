import $ from "jquery";

import flatpickr from "flatpickr";
import "flatpickr/dist/flatpickr.min.css";

/* =====================================================
   INITIAL SETUP
===================================================== */
const $reservationForm = $('#reservationForm');
const $transactionDateInput = $('#transactionDate');
const $timeSection = $('#timeSection');

const $timeFromInput = $('#timeFrom');
const $timeToInput = $('#timeTo');

const $referenceInput = $('#referenceNumber');

const $startDateInput = $('#startDate');
const $endDateInput = $('#endDate');

/* =====================================================
   SET TRANSACTION DATE
===================================================== */
if ($transactionDateInput.length) {
    const now = new Date();
    const formattedDateTime = now.toLocaleString('en-GB', {
        year: 'numeric',
        month: '2-digit',
        day: '2-digit',
        hour: '2-digit',
        minute: '2-digit',
        second: '2-digit',
        hour12: false
    });
    $transactionDateInput.val(formattedDateTime);
}

/* =====================================================
   ACCORDION TOGGLES
===================================================== */
function toggleReservation() {
    const $content = $('#reservationContent');
    const $arrow = $('#arrowReservation');
    $content.toggleClass('hidden');
    $arrow.text($content.hasClass('hidden') ? '>' : 'v');
}

function toggleTime() {
    const $content = $('#timeContent');
    const $arrow = $('#arrowTime');
    $content.toggleClass('hidden');
    $arrow.text($content.hasClass('hidden') ? '>' : 'v');
}

function toggleRecurring() {
    const $content = $('#recurringContent');
    const $arrow = $('#arrowRecurring');
    $content.toggleClass('hidden');
    $arrow.text($content.hasClass('hidden') ? '>' : 'v');
}

window.toggleReservation = toggleReservation;
window.toggleTime = toggleTime;
window.toggleRecurring = toggleRecurring;

/* =====================================================
   ADVANCE WARNING LOGIC
===================================================== */
if ($startDateInput.length && $endDateInput.length) {
    const today = new Date();
    today.setHours(0,0,0,0);

    // Minimum reservation date = 4 days from today
    const minReservationDate = new Date(today);
    minReservationDate.setDate(minReservationDate.getDate() + 4);
    const minISO = minReservationDate.toISOString().split('T')[0];

    $startDateInput.attr('min', minISO);
    $endDateInput.attr('min', minISO);

    function addDays(dateString, days) {
        const d = new Date(dateString);
        d.setDate(d.getDate() + days);
        return d.toISOString().split('T')[0];
    }

    function subtractDays(dateString, days) {
        const d = new Date(dateString);
        d.setDate(d.getDate() - days);
        return d.toISOString().split('T')[0];
    }

    function resetRestrictions() {
        $startDateInput.attr('min', minISO).removeAttr('max');
        $endDateInput.attr('min', minISO).removeAttr('max');
    }

    function showTimeSection() {
    $timeSection.removeClass('max-h-0 opacity-0');
    $timeSection.addClass('max-h-[500px] opacity-100');
}

function hideTimeSection() {
    $timeSection.removeClass('max-h-[500px] opacity-100');
    $timeSection.addClass('max-h-0 opacity-0');
}


    function checkTimeSection() {
        const startVal = $startDateInput.val();
        const endVal = $endDateInput.val();

        if (!startVal || !endVal) {
           hideTimeSection();
            return;
        }

        const start = new Date(startVal);
        const end = new Date(endVal);
        const diffStart = (start - today) / (1000*60*60*24);
        const diffEnd = (end - today) / (1000*60*60*24);

        if (diffStart > 3 && diffEnd > 3) {
         showTimeSection();
        } else {
          hideTimeSection();
        }
    }

    /* =========================
       START DATE CHANGED
    ========================= */
    $startDateInput.on('change', function() {
        const startVal = $(this).val();
        if (!startVal) { resetRestrictions(); return; }

        const start = new Date(startVal);
        const maxEnd = new Date(start);
        maxEnd.setDate(maxEnd.getDate() + 2);
        const maxEndISO = maxEnd.toISOString().split('T')[0];

        $endDateInput.attr('min', startVal);
        $endDateInput.attr('max', maxEndISO);

        if ($endDateInput.val() && 
            ($endDateInput.val() < $endDateInput.attr('min') ||
             $endDateInput.val() > $endDateInput.attr('max'))) {
            $endDateInput.val('');
        }

        checkTimeSection();
    });

    /* =========================
       END DATE CHANGED
    ========================= */
    $endDateInput.on('change', function() {
        const endVal = $(this).val();
        if (!endVal) { resetRestrictions(); return; }

        const end = new Date(endVal);
        const minStart = new Date(end);
        minStart.setDate(minStart.getDate() - 2);
        const minStartISO = minStart.toISOString().split('T')[0];

        $startDateInput.attr('min', (minStartISO < minISO ? minISO : minStartISO));
        $startDateInput.attr('max', endVal);

        if ($startDateInput.val() && 
            ($startDateInput.val() < $startDateInput.attr('min') ||
             $startDateInput.val() > $startDateInput.attr('max'))) {
            $startDateInput.val('');
        }

        checkTimeSection();
    });
}

/* =====================================================
   FORM VALIDATION
===================================================== */
/* =========================
   INTERCEPT FORM SUBMIT FOR TOAST WARNINGS
========================= */


/* =====================================================
   GLOBAL INVALID HANDLER
===================================================== */
$(document).on('invalid', ':input', function(e) {
    const $input = $(this);
    const $accordionContent = $input.closest('.accordion-content, #reservationContent, #timeContent, #recurringContent');
    if ($accordionContent.hasClass('hidden')) {
        $accordionContent.removeClass('hidden');
        const $arrow = $accordionContent.closest('.accordion, div[id$="Section"]').find('.arrow, span[id^="arrow"]').first();
        if ($arrow.length) $arrow.text('v');
    }
    this.scrollIntoView({behavior:'smooth', block:'center'});
});

/* =====================================================
   INITIALIZE FLATPICKR
===================================================== */

let timeFromPicker = null;
let timeToPicker = null;

function addScrollListener(input, max, step = 1) {
    input.addEventListener("wheel", (e) => {
        e.preventDefault();
        let val = parseInt(input.value);
        if (isNaN(val)) val = 0;

        if (e.deltaY < 0) { // scroll up
            val += step;
            if (val > max) val = 0;
        } else { // scroll down
            val -= step;
            if (val < 0) val = max;
        }

        input.value = val.toString().padStart(2, "0");
        input.dispatchEvent(new Event("input")); // trigger flatpickr update
    });
}

if ($timeFromInput.length) {
    timeFromPicker = flatpickr("#timeFrom", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        onReady: function(selectedDates, dateStr, instance) {
            addScrollListener(instance.hourElement, 23); // hours 0–23
            addScrollListener(instance.minuteElement, 59); // minutes 0–59
        }
    });
}

if ($timeToInput.length) {
    timeToPicker = flatpickr("#timeTo", {
        enableTime: true,
        noCalendar: true,
        dateFormat: "H:i",
        time_24hr: true,
        onReady: function(selectedDates, dateStr, instance) {
            addScrollListener(instance.hourElement, 23); // hours 0–23
            addScrollListener(instance.minuteElement, 59); // minutes 0–59
        }
    });
}

/* =====================================================
   TIME VALIDATION WITH TOAST
===================================================== */

function validateTimeRange() {

    const fromVal = $timeFromInput.val();
    const toVal = $timeToInput.val();

    if (!fromVal || !toVal) return;

    const from = new Date(`1970-01-01T${fromVal}:00`);
    const to = new Date(`1970-01-01T${toVal}:00`);

    /* =========================
       SAME TIME
    ========================= */
    if (from.getTime() === to.getTime()) {
        showToast("Time From and Time To cannot be the same.");
        $timeToInput.val('');
        return;
    }

    /* =========================
       FROM LATER THAN TO
    ========================= */
    if (from > to) {
        showToast("Time From must be earlier than Time To.");
        $timeFromInput.val('');
        return;
    }

    /* =========================
       TO EARLIER THAN FROM
    ========================= */
    if (to < from) {
        showToast("Time To must be later than Time From.");
        $timeToInput.val('');
        return;
    }
}

/* =====================================================
   RESTORE FORM STATE WHEN RETURNING (BACK BUTTON)
===================================================== */
window.addEventListener("pageshow", function () {

    if (!$startDateInput.length || !$endDateInput.length) return;

    const startVal = $startDateInput.val();
    const endVal = $endDateInput.val();

    if (!startVal || !endVal) return;

    const today = new Date();
    today.setHours(0,0,0,0);

    const start = new Date(startVal);
    const end = new Date(endVal);

    const diffStart = (start - today) / (1000*60*60*24);
    const diffEnd = (end - today) / (1000*60*60*24);

    /* =========================
       RESTORE TIME SECTION
    ========================= */
    if (diffStart > 3 && diffEnd > 3) {
        $timeSection.removeClass('hidden');

        // Open accordion if time already selected
        if ($timeFromInput.val() || $timeToInput.val()) {
            $('#timeContent').removeClass('hidden');
            $('#arrowTime').text('v');
        }

    } else {
        $timeSection.addClass('hidden');
    }

    /* =========================
       RESTORE RESERVATION ACCORDION
    ========================= */
    if (startVal || endVal) {
        $('#reservationContent').removeClass('hidden');
        $('#arrowReservation').text('v');
    }

});

if ($timeFromInput.val() && $timeToInput.val()) {
    $('#timeContent').removeClass('hidden');
    $('#arrowTime').text('v');
}
/* =========================
   RESTORE FLATPICKR VALUES
========================= */

if (timeFromPicker && $timeFromInput.val()) {
    timeFromPicker.setDate($timeFromInput.val(), false);
}

if (timeToPicker && $timeToInput.val()) {
    timeToPicker.setDate($timeToInput.val(), false);
}




