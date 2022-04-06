<div>
    <div class="modal modal-blur fade" id="modal-new-record" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Record</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Issued To</label>
                    <input type="text" name="name" id="name" wire:model.debounce.500ms="name" placeholder="John Doe" class="form-control">
                    @error('name')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="orNumber">Or Number</label>
                    <input type="text" name="orNumber" id="orNumber" wire:model.debounce.500ms="orNumber" placeholder="xxx-xxx" class="form-control">
                    @error('orNumber')
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" wire:click.prevent="createNewRecord()")>Create</button>
            </div>
          </div>
        </div>
    </div>
    <style>
        .form-group{
            margin-top: 0.5rem
        }
    </style>
</div>
