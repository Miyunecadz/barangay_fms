<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.6/sweetalert2.css" integrity="sha512-40/Lc5CTd+76RzYwpttkBAJU68jKKQy4mnPI52KKOHwRBsGcvQct9cIqpWT/XGLSsQFAcuty1fIuNgqRoZTiGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.6/sweetalert2.min.js" integrity="sha512-RKoE8TxkZwxHbUihermxoTbgCkvKqCVoK3ck6FgGA0uryOJO4JE8P4OOd2uYpCU9/BeRaGsZHVbeNyXbr3IdrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div>
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-5 my-4">
                    <h2 class="text-center">Update Information</h2>
                    <div>
                        <div class="form-group">
                            <label for="firstname">First Name</label>
                            <input type="text" name="firstname" id="firstname" class="form-control" placeholder="John" wire:model="firstname">
                            @error('firstname')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="middlename">Middle Name</label>
                            <input type="text" name="middlename" id="middlename" class="form-control" placeholder="xx" wire:model="middlename">
                        </div>

                        <div class="form-group">
                            <label for="lastname">Last Name</label>
                            <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Doe" wire:model="lastname">
                            @error('lastname')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="suffix">Suffx</label>
                            <input type="text" name="suffix" id="suffix" class="form-control" placeholder="Jr, Sr" wire:model="suffix">
                        </div>

                        <div class="form-group">
                            <label for="household_number">Household Number</label>
                            <input type="text" name="household_number" id="household_number" class="form-control" placeholder="xxxx" wire:model="household_number">
                            @error('household_number')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contact_number">Contact Number</label>
                            <input type="text" name="contact_number" id="contact_number" class="form-control" placeholder="xxxx" wire:model="contact_number">
                            @error('contact_number')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="birth_date">Birth Date</label>
                            <input type="date" name="birth_date" id="birthdate" wire:model="birth_date" class="form-control">
                            @error('birth_date')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select name="gender" wire:model.lazy="gender" id="gender" class="form-select">
                                <option value="">Select one</option>
                                @foreach ($genders as $genderKey => $genderValue)
                                    <option value="{{$genderKey}}">{{$genderValue}}</option>
                                @endforeach
                            </select>
                            @error('gender')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="purok">Purok</label>
                            <select name="purok" wire:model.lazy="purok" id="purok" class="form-select">
                                <option value="">Select one</option>
                                @foreach ($puroks as $purokKey => $purokValue)
                                    <option value="{{$purokValue}}">{{$purokValue}}</option>
                                @endforeach
                            </select>
                            @error('purok')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" wire:click.prevent="update()"
                            @if ($isUpdating)
                                disabled
                                >
                                    <div class="spinner-border" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                  </div>
                                  &nbsp;
                                  Updating
                            @else
                                >
                                Update
                            @endif
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .form-group{
            margin-top: 0.5rem
        }
    </style>

    <script>
        window.addEventListener('update', event => {
            const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
            })

            Toast.fire({
            icon: 'success',
            title: 'Successfully updated!'
            })
        })
    </script>
</div>
