@extends('layouts.app')

@section('content')
    @livewire('resident-update', ['resident' => $resident, 'genders' => $genders, 'puroks' => $puroks])
@endsection
