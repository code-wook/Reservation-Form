<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;



class ReservationController extends Controller 
{
    // Show the reservation stepper page (all steps in one page)
    public function showViewPage()
    {
    //  CLEAR old session (prevents back/refresh issues)
    session()->forget('reservation');

    $referenceNumber = now()->format('Ymd') . '-' . rand(1000, 9999);
        session(['reservation.referenceNumber' => $referenceNumber]);

        return view('viewpage', [
            'referenceNumber' => $referenceNumber
        ]);
    }

public function submitReservation(Request $request)
{
    $validated = $request->validate([

        /* =========================
           1. RESERVATION DATE & TIME
        ========================= */
        'startDate' => 'required|date|after_or_equal:today',
        'endDate'   => 'required|date|after_or_equal:startDate',
        'timeFrom'  => 'required',
        'timeTo'    => 'required',

        /* =========================
           2. DETAILS & EQUIPMENT
        ========================= */
        'facility'  => 'required|string',
        'purpose'   => 'required|string',
        'needEquipment' => 'required|string',
        'otherEquipment.*' => 'nullable|string',
        'numberUnits.*'    => 'nullable|integer|min:0',
        'otherDetails'     => 'nullable|string',
        'personalEquipment'=> 'required|string',
        'personalEquipmentDetails' => 'nullable|string',

        /* =========================
           3. PERSONAL INFORMATION
        ========================= */
        'lastName'      => 'required|string',
        'firstName'     => 'required|string',
        'middleName'    => 'nullable|string',
        'email'         => 'required|email',
        'mobileNumber'  => 'nullable|string',
        'landlineNumber'=> 'nullable|string',

        'organization'       => 'required|string',
        'otherOrganization'   => 'nullable|string',

        /* =========================
           4. AGREEMENT
        ========================= */
        'certifyEmail'  => 'accepted',
        'certifyInfo'   => 'accepted',
        'consentData'   => 'accepted',
    ]);

    /* =========================
       SYSTEM-GENERATED DATA
    ========================= */
    $validated['referenceNumber'] = session('reservation.referenceNumber');

    $validated['transactionDate'] = $request->has('transactionDate')
        ? $request->input('transactionDate')
        : now()->format('Y-m-d H:i:s');

    /* =========================
       SESSION STORAGE
    ========================= */
    session(['reservation.data' => $validated]);

    /* =========================
       FILE STORAGE (JSON)
    ========================= */
    $path = storage_path('app/ReservationData.json');

    if (!File::exists($path)) {
        File::put($path, json_encode([]));
    }

    $existing = json_decode(File::get($path), true);

    if (!is_array($existing)) {
        $existing = [];
    }

    /* =========================
   PREVENT DUPLICATE SUBMISSION
   (based on reference number)
========================= */
$referenceNumber = session('reservation.referenceNumber');

foreach ($existing as $entry) {
    if (isset($entry['referenceNumber']) &&
        $entry['referenceNumber'] === $referenceNumber) {

        return redirect()->route('confirmation')
            ->with('referenceNumber', $referenceNumber);
    }
}

    $existing[] = $validated;

    File::put($path, json_encode($existing, JSON_PRETTY_PRINT));

    /* =========================
       REDIRECT CONFIRMATION
    ========================= */
    return redirect()
    ->route('confirmation')
    ->with('referenceNumber', $validated['referenceNumber'])
    ->with('success', true); //  important flag
}
}
  