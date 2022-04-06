@extends('layouts.app')

@section('content')
<div class="mt-3">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-5 my-4">
                <h2 class="text-center">Update Cedula Information</h2>

                <form action="{{route('transaction.cedula-update', ['cedula'=> $cedula])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="community_tax_certificate">Community Tax Certificate</label>
                        <input type="text" name="community_tax_certificate" id="community_tax_certificate" class="form-control" value="{{old('community_ta ?? $cedulax_certificate') ?? $cedula->community_tax_certificate }}">
                        @error('community_tax_certificate')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="complete_name">Complete Name</label>
                        <input type="text" name="complete_name" id="complete_name" class="form-control" placeholder="John Doe" value="{{old('complete_nam')?? $cedula->complete_name}}" >
                        @error('complete_name')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_issue">Date Issue</label>
                        <input type="date" name="date_issue" id="date_issue" class="form-control" value="{{old('date_issue') ?? $cedula->date_issue}}">
                        @error('date_issue')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" id="address" class="form-control" value="{{old('address')  ?? $cedula->address}}">
                        @error('address')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sex">Sex</label>
                        <select name="sex" id="sex" class="form-select">
                            <option value="">Select one</option>
                            @foreach ($sex as $key => $gender)
                                @if (old('sex') ?? $cedula->sex == $gender )
                                    <option value="{{$gender}}" selected>{{$gender}}</option>
                                @else
                                    <option value="{{$gender}}">{{$gender}}</option>
                                @endif
                            @endforeach
                        </select>
                        @error('sex')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">Date of Birth</label>
                        <input type="date" name="date_of_birth" id="date_of_birth"  class="form-control" value="{{old('date_of_birt')?? $cedula->date_of_birth}}">
                        @error('date_of_birth')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="place_of_birth">Place of Birth</label>
                        <input type="text" name="place_of_birth" id="place_of_birth" class="form-control" value="{{old('place_of_bir') ?? $cedula->place_of_birth}}">
                        @error('place_of_birth')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="citizenship">Citizenship</label>
                        <input type="text" name="citizenship" id="citizenship" class="form-control" value="{{old('citizenship')  ?? $cedula->citizenship}}">
                        @error('citizenship')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="civil_status">Civil Status</label>
                        <select name="civil_status" id="civil_status" class="form-select">
                            <option value="">Select one</option>
                            @foreach ($statuses as $key => $status)
                            @if (old('civil_status') ?? $cedula->civil_status == $status)
                                <option value="{{$status}}" selected>{{$status}}</option>
                            @else
                                <option value="{{$status}}">{{$status}}</option>
                            @endif
                            @endforeach
                        </select>
                        @error('civil_status')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
