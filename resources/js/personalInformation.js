import $ from "jquery";

const $form = $('form');

// PERSONAL
const $personalToggle = $('#personalToggle');
const $personalContent = $('#personalContent');
const $personalArrow = $('#personalArrow');

// CERTIFY
const $certifyToggle = $('#certifyToggle');
const $certifyContent = $('#certifyContent');
const $certifyArrow = $('#certifyArrow');

// =========================
// Toggle Section
// =========================
function toggleSection($content, $arrow) {
    $content.toggleClass('hidden');

    if ($content.hasClass('hidden')) {
        $arrow.text('v'); // collapsed
    } else {
        $arrow.text('>'); // expanded
    }
}

// Open Section (if hidden)
function openSection($content, $arrow) {
    if ($content.hasClass('hidden')) {
        $content.removeClass('hidden');
        $arrow.text('>'); // expanded
    }
}

// =========================
// Toggle click events
// =========================
$personalToggle.on('click', () => toggleSection($personalContent, $personalArrow));
$certifyToggle.on('click', () => toggleSection($certifyContent, $certifyArrow));

// =========================
// INVALID EVENT
// =========================
$form.find('[required]').each(function() {
    $(this).on('invalid', function() {
        if ($personalContent.has(this).length) openSection($personalContent, $personalArrow);
        if ($certifyContent.has(this).length) openSection($certifyContent, $certifyArrow);
    });
});
