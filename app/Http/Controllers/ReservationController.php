<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;



class ReservationController extends Controller 
{
    // Show the reservation stepper page (all steps in one page)
    public function showViewPage()
    {
        $referenceNumber = now()->format('Ymd') . '-' . rand(1000, 9999);
        session(['reservation.referenceNumber' => $referenceNumber]);

        return view('viewpage', [
            'referenceNumber' => $referenceNumber
        ]);
    }

    public function submitReservation(Request $request)
{
    $validated = $request->validate([
        'startDate' => 'required|date|after_or_equal:today',
        'endDate'   => 'required|date|after_or_equal:startDate',
        'timeFrom'  => 'required',
        'timeTo'    => 'required',
        'facility'  => 'required|string',
        'purpose'   => 'required|string',
        'needEquipment' => 'required|string',
        'otherEquipment.*' => 'nullable|string',
        'numberUnits.*'    => 'nullable|integer|min:0',
        'otherDetails'     => 'nullable|string',
        'personalEquipment'=> 'required|string',
        'personalEquipmentDetails' => 'nullable|string',
        'lastName'      => 'required|string',
        'firstName'     => 'required|string',
        'middleName'    => 'nullable|string',
        'email'         => 'required|email',
        'organization'  => 'required|string',
        'contactNumber' => 'required|string',
        'certifyEmail'  => 'accepted',
        'certifyInfo'   => 'accepted',
        'consentData'   => 'accepted',
    ]);

    $validated['referenceNumber'] = session('reservation.referenceNumber');

     if ($request->has('transactionDate')) {
        $validated['transactionDate'] = $request->input('transactionDate');
    } else {
   
        $validated['transactionDate'] = now()->format('Y-m-d H:i:s');
    }

    session(['reservation.data' => $validated]);

    $path = storage_path('app/ReservationData.json');

    if (!File::exists($path)) {
        File::put($path, json_encode([]));
    }

    $existing = json_decode(File::get($path), true);
    if (!is_array($existing)) {
        $existing = [];
    }

    $existing[] = $validated;

File::put($path, json_encode($existing, JSON_PRETTY_PRINT));

return redirect()->route('confirmation')
    ->with('referenceNumber', $validated['referenceNumber']);
}
    
}
  
