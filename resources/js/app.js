import './bootstrap';

import $ from 'jquery';
window.$ = window.jQuery = $; // make jQuery globally accessible

/* =========================
   CORE SYSTEM (Stepper + Validation)
========================= */
import './stepper';     // handles step navigation (next/back, UI updates)
import './Validation';  // all validation logic per step

/* =========================
   STEP-SPECIFIC LOGIC
========================= */
import './reservation';         // step 0 → date, time, toggles, accordions
import './details';             // step 1 → facility, equipment, dynamic fields
import './personalInformation'; // step 2 → user info + accordions


/* =========================
   UI / FEEDBACK
========================= */
import './toast';        // toast notifications (errors, alerts)
import './confirmation'; // success animation after submit

