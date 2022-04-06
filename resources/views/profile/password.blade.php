@extends('layouts.profile')

@section('content')
<div class="mt-2">
    <div class=" mt-4 row justify-content-center">
        <div class="col-md-4 my-4">
            <h2 class="text-center">Account Change Password</h2>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
            @endif
            <form action="{{route('password.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" id="current_password" class="form-control">
                    @error('current_password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @error('password')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group mt-2">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
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
