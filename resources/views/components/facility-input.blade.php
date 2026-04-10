@php
$facilities = [
    'arts-and-science-hall' => 'Arts and Science Hall(A.S)',
    'arts-and-science-up-south-road-properties-campus-parking-area' => 'Arts and Science UP South Road Properties Campus Parking Area(AS/SRP)',
    'audio-visual-arts' => 'Audio Visual Arts 1(AVR 1, Besides PAH)',
    'basketball-court' => 'Basketball Court',
    'community-center' => 'Community Center(Gymnasium)',
    'cottages' => 'Cottages',
    'guesthouse-lobby' => 'Guesthouse Lobby with ACs',
    'interactive-learning-center' => 'Interactive Learning Center(ILC)',
    'large-rooms-with-air-conditioner' => 'Large Rooms with Airconditions(ACs)',
    'lights-for-the-courts' => 'Lights for the courts',
    'new-science-building-lobby' => 'New Science Building Lobby',
    'open-field-admin-building' => 'Open Field(Near Admin Bldg)',
    'performing-arts-hall' => 'Performing Arts Hall(PAH only)',
    'performing-arts-hall-lobby' => 'Performing Arts Hall Lobby(PAH Lobby Only)',
    'performing-arts-hall-holding-room' => 'Performing Arts Hall Holding Room(Beside the Technical Room)',
    'regular-rooms-with-acs' => 'Regular Rooms with ACs',
    'regular-rooms-without-acs' => 'Regular Rooms without ACs',
    'small-room-without-acs' => 'Small Room without ACs',
    'srp-auditorium' => 'SRP-Auditorium',
    'undergraduate-lobby' => 'Underground Lobby',
    'volleyball-tennis-court' => 'Volleyball/Tennis Court(Open)',
    'union-hall' => 'Union Hall',
];
@endphp

<div class="accordion-content px-8 pb-8 ">
    <select name="facility" class="w-full md:w-1/2 lg:w-1/3 border rounded-md px-3 py-2 text-sm bg-white focus:outline-none focus:ring-2 focus:ring-red-800 focus:border-red-800" required>
        <option value="">Select a facility</option>
        @foreach ($facilities as $value => $label)
            <option value="{{ $value }}">{{ $label }}</option>
        @endforeach
    </select>
</div>