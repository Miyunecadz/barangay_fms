@extends('layouts.profile')

@section('content')
<div class="mt-2">
    <div class=" mt-4 row justify-content-center">
        <div class="col-md-4 my-4">
            <h2 class="text-center">Profile Information</h2>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{Session::get('success')}}
                    {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
            @endif
            <form action="{{route('profile.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group mb-3">
                    <label for="name">Full Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{old('name') ?? auth()->user()->name}}">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>

                <div class="form-group">
                    <small class="text-info"><strong>Note:</strong> Username and role are fixed</small>
                </div>

                <div class="form-group mt-2">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" class="form-control" value="{{auth()->user()->username}}" disabled>
                </div>

                <div class="form-group mt-2">
                    <label for="role">Role</label>
                    <input type="text" name="role" id="role" class="form-control" value="{{auth()->user()->role}}" disabled>
                </div>



                <div class="form-group mt-2">
                    <button type="submit" class="btn btn-primary">
                        Update
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
