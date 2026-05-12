@extends('layouts.form')

@section('title', 'Facilities and Equipment')

@section('content')


<x-stepper id="reservationStepper" />

<form id="reservationForm" action="{{ route('viewpage.store') }}" method="POST" class="mt-6 space-y-6" novalidate>
    @csrf

    <!-- Wrap all steps in the same layout -->
    <div class="space-y-6">


        <div class="stepper-pane" data-step="0">
    @include('partials.reservation', ['referenceNumber' => $referenceNumber])
</div>

<div class="stepper-pane hidden" data-step="1">

    @include('partials.details')
</div>

<div class="stepper-pane hidden" data-step="2">

    @include('partials.personalInformation')
</div>

<div class="stepper-pane hidden" data-step="3">

    @include('partials.Agreement')
</div>

         <!-- Navigation buttons fixed for all steps -->
    <x-form-navigation 
        :backUrl="url('/')"
        backText="Back"
        nextText="Next"
    />

    </div>

   
</form>


@endsection