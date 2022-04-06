@extends('layouts.app')

@section('content')
    @livewire('resident-create', ['genders' => $genders, 'puroks' => $puroks])
@endsection
