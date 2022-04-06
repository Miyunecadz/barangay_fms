@extends('layouts.app')

@section('content')
<div class="mt-2">
    <div class=" mt-4 row justify-content-center">
        <div class="col-md-4 my-4">
            <h2 class="text-center">Master Key Setting</h2>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
            @endif
            <form action="{{route('setting.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="current_master_key">Current Master Key</label>
                    <input type="password" name="current_master_key" id="current_master_key" class="form-control">
                    @error('current_master_key')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="master_key">New Master Key</label>
                    <input type="password" name="master_key" id="master_key" class="form-control">
                    @error('master_key')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="master_key_confirmation">Confirm Master Key</label>
                    <input type="password" name="master_key_confirmation" id="master_key_confirmation" class="form-control">
                </div>



                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">
                        Change Password
                    </button>
                </div>
            </form>
        </div>

        {{-- <div class="form-group">
            <span>Full Name:</span>
            <h3>{{auth()->user()->name}}</h3>
        </div>

        <div class="form-group">
            <span>Username:</span>
            <h3>{{auth()->user()->username}}</h3>
        </div>

        <div class="form-group">
            <span>Role:</span>
            <h3>{{Str::upper(auth()->user()->role)}}</h3>
        </div> --}}
    </div>
</div>
@endsection
