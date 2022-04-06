@extends('layouts.app')

@section('content')
<div class="mt-2 mx-5">
    <iframe src="{{$file}}" frameborder="0" style="height: 80vh; width:100%"></iframe>
</div>
@endsection
