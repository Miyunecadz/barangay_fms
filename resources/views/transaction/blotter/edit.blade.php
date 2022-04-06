@extends('layouts.app')

@section('content')
<div class="mt-3">
    <div class="container-xl">
        <div class="row justify-content-center">
            <div class="col-md-5 my-4">
                <h2 class="text-center">Update Blotter Entry</h2>
                <form action="{{route('transaction.blotter-update', ['blotter' => $blotter])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name_of_complainant">Name of Complainant</label>
                        <input type="text" name="name_of_complainant" id="name_of_complainant" class="form-control" value="{{old('name_of_complainant') ?? $blotter->name_of_complainant}}">
                        @error('name_of_complainant')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="name_of_defendant">Name of Defendant</label>
                        <input type="text" name="name_of_defendant" id="name_of_defendant" class="form-control" placeholder="John Doe" value="{{old('name_of_defendant') ?? $blotter->name_of_defendant}}" >
                        @error('name_of_defendant')
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="case">Case</label>
                        <input type="text" name="case" id="case" class="form-control" value="{{old('case') ?? $blotter->case}}">
                        @error('case')
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
