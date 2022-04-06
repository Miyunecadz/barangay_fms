<div>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.6/sweetalert2.css" integrity="sha512-40/Lc5CTd+76RzYwpttkBAJU68jKKQy4mnPI52KKOHwRBsGcvQct9cIqpWT/XGLSsQFAcuty1fIuNgqRoZTiGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.4.6/sweetalert2.min.js" integrity="sha512-RKoE8TxkZwxHbUihermxoTbgCkvKqCVoK3ck6FgGA0uryOJO4JE8P4OOd2uYpCU9/BeRaGsZHVbeNyXbr3IdrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <div>
        <div class="container-xl">
            <div class="row justify-content-center">
                <div class="col-md-5 mt-4">
                    <h2 class="text-center">Update Certificate Information</h2>
                    <div>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="John" wire:model="name">
                            @error('name')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="orNumber">OR Number</label>
                            <input type="text" name="orNumber" id="orNumber" class="form-control" placeholder="John" wire:model="orNumber">
                            @error('orNumber')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="issued_date">Issued Date</label>
                            <input type="date" name="issued_date" id="issued_date" class="form-control" placeholder="xx" wire:model="issued_date">
                            @error('issued_date')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="issued_time">Issued Time</label>
                            <input type="time" name="issued_time" id="issued_time" class="form-control" placeholder="xx" wire:model="issued_time">
                            @error('issued_time')
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" disabled wire:loading wire:target="store">Saving...</button>
                            <button type="submit" class="btn btn-primary" wire:loading.remove wire:click.prevent="store">Update</button>
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
