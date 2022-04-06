@extends('layouts.app')

@section('content')
    @livewire('certificate-edit', ['certificate' => $certificate])
@endsection
