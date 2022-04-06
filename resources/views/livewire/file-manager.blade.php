<div>
    <div class="container-xl">
        <!-- Page title -->
        <div class="page-header d-print-none">
        <div class="row align-items-center">
            <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
                Current Directory
            </div>
            <h2 class="page-title">
                {{$current_directory == 'public' ? 'Root Folder' : basename($current_directory) ." Folder"}}
            </h2>
            </div>
            <!-- Page title actions -->
            <div class="col-auto ms-auto d-print-none">
            <div class="btn-list">
                <a href="#" class="btn btn-white"  data-bs-toggle="modal" data-bs-target="#modal-upload-file" data-backdrop="static" data-keyboard="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cloud-upload" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.406 1.342A5.53 5.53 0 0 1 8 0c2.69 0 4.923 2 5.166 4.579C14.758 4.804 16 6.137 16 7.773 16 9.569 14.502 11 12.687 11H10a.5.5 0 0 1 0-1h2.688C13.979 10 15 8.988 15 7.773c0-1.216-1.02-2.228-2.313-2.228h-.5v-.5C12.188 2.825 10.328 1 8 1a4.53 4.53 0 0 0-2.941 1.1c-.757.652-1.153 1.438-1.153 2.055v.448l-.445.049C2.064 4.805 1 5.952 1 7.318 1 8.785 2.23 10 3.781 10H6a.5.5 0 0 1 0 1H3.781C1.708 11 0 9.366 0 7.318c0-1.763 1.266-3.223 2.942-3.593.143-.863.698-1.723 1.464-2.383z"/>
                        <path fill-rule="evenodd" d="M7.646 4.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V14.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3z"/>
                    </svg>
                    <span class="d-none d-sm-inline">
                        &nbsp;
                        Upload File
                    </span>
                </a>
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-new-directory" data-backdrop="static" data-keyboard="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
                        <path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672z"/>
                        <path d="M13.5 10a.5.5 0 0 1 .5.5V12h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V13h-1.5a.5.5 0 0 1 0-1H13v-1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    <span class="d-none d-sm-inline">
                        &nbsp;
                        New Directory
                    </span>
                </a>
            </div>
            </div>
        </div>
        </div>
    </div>
    <div class="page-body">
        <div class="container-xl">
            <div class="row row-deck row-cards">


                    <div class="col-sm-6 col-lg-3" style="cursor: pointer" wire:click.prevent="goBack()">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="subheader">Back</div>
                                </div>
                                <div class="h1 mb-3">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-90deg-up" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.854 1.146a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L4 2.707V12.5A2.5 2.5 0 0 0 6.5 15h8a.5.5 0 0 0 0-1h-8A1.5 1.5 0 0 1 5 12.5V2.707l3.146 3.147a.5.5 0 1 0 .708-.708l-4-4z"/>
                                      </svg>
                                </div>
                            </div>
                        </div>
                    </div>


            @foreach ($directories as $directory)
                <div class="col-sm-6 col-lg-3">
                    <div class="card">
                        <div class="card-body" >
                            <div class="d-flex align-items-center">
                                <div class="subheader">Directory</div>
                                <div class="ms-auto lh-1">
                                <div class="dropdown">
                                    <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete" data-backdrop="static" data-keyboard="false" wire:click="onDeleteState('{{$directory}}', 'directory')">Delete</a>

                                        {{-- <a class="dropdown-item" href="#" wire:click="delete('{{$directory}}', 'directory')">Delete</a> --}}
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div style="cursor: pointer" wire:click.prevent="setDirectory('{{$directory}}')" class="h1 mb-3">{{basename($directory)}}</div>
                        </div>
                    </div>
                </div>
            @endforeach

            @foreach ($files as $file)
            <div class="col-sm-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="subheader">File</div>
                            <div class="ms-auto lh-1">
                            <div class="dropdown">
                                <a class="dropdown-toggle text-muted" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <form action="{{route('file.open')}}" method="post">
                                        @csrf
                                        <input type="hidden" name="file" id="file" value="{{$file}}">
                                        <button type="submit" class="dropdown-item">Preview</button>
                                    </form>

                                    <a class="dropdown-item" href="#" wire:click.prevent="download('{{$file}}')">Download</a>
                                    <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#modal-delete" data-backdrop="static" data-keyboard="false" wire:click="onDeleteState('{{$file}}', 'file')">Delete</a>
                                    {{-- <a class="dropdown-item" href="#" wire:click="delete('{{$file}}', 'file')">Delete</a> --}}
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="h1 mb-3">{{basename($file)}}</div>
                        <div class="d-flex">
                            <div>File size</div>
                            <div class="ms-auto">
                            <span class="text-green d-inline-flex align-items-center lh-1">
                                {{\Storage::size($file)}}
                                <i>&nbsp;bytes</i>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </div>
        </div>
    </div>

    {{-- New Directory --}}
    <div class="modal modal-blur fade" id="modal-new-directory" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">New Directory</h5>
              <button type="button" class="btn-close" wire:click.prevent="close('modal-new-directory')" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
              <label for="directory">Directory name</label>
              <input type="text" name="directory" id="directory" wire:model.debounce.500ms="directory_name" class="form-control">
              @error('directory_name')
                  <small class="text-danger">{{$message}}</small>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" wire:click.prevent="close('modal-new-directory')" >Close</button>
              <button type="button" class="btn btn-primary" wire:click.prevent="createDirectory()")>Create</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Upload File --}}
    <div class="modal modal-blur fade" id="modal-upload-file" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self >
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">File Upload</h5>
              <button type="button" class="btn-close" wire:click.prevent="close('modal-upload-file')" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                <div class="file-upload">
                    <input type="file" wire:loading.remove name="directory" id="directory" wire:model="file" class="form-control">
                    <div class="file-upload-loading-state" wire:loading wire:target="file">
                        <p>Uploading...</p>
                    </div>
                    @error('file')
                        @if ($message == 'validation.max.file')
                            <small class="text-danger">File max upload is 15MB</small>
                        @else
                            <small class="text-danger">{{$message}}</small>
                        @endif
                    @enderror
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn me-auto" wire:click.prevent="close('modal-upload-file')" >Close</button>

              <button type="button" class="btn btn-primary" wire:loading wire:target="file" disabled>Create</button>

              <button type="button" class="btn btn-primary" wire:click.prevent="saveFile()" wire:loading.remove wire:target="file">Create</button>
            </div>
          </div>
        </div>
    </div>

    {{-- Delete File --}}
    <div class="modal modal-blur fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true" wire:ignore.self >
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          <div class="modal-status bg-danger"></div>
          <div class="modal-body text-center py-4">
            <!-- Download SVG icon from http://tabler-icons.io/i/alert-triangle -->
            <!-- SVG icon code with class="mb-2 text-danger icon-lg" -->
            <h3>Are you sure?</h3>
            <div class="text-muted">Do you really want to remove this {{$delete_type}}? What you've done cannot be undone.</div>
            <div class="form-group mt-2">
                <input type="password" name="master_key" id="master_key" placeholder="Enter master key" class="form-control" wire:model.lazy="master_key">
                @error('master_key')
                    <small class="text-danger">{{$message}}</small>
                @enderror
            </div>
          </div>
          <div class="modal-footer">
            <div class="w-100">
              <div class="row">
                <div class="col">
                    <a href="#" class="btn w-100" data-bs-dismiss="modal">
                    Cancel
                    </a>
                </div>
                <div class="col" wire:loading.remove wire:target="delete()">
                    <a href="#"  class="btn btn-danger w-100"  wire:click.prevent="delete()">
                    Delete
                    </a>
                </div>
                <div class="col" wire:loading wire:target="delete()">
                    <a href="#"  class="btn btn-danger w-100"  wire:click.prevent="delete()">
                    Delete
                    </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    {{-- <div class="modal modal-blur fade" id="modal-new-directory" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">New report</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-lg-4">
                      <div class="mb-3">
                        <label class="form-label">Last name</label>
                        <input type="text" class="form-control" placeholder="Doe">
                      </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="mb-3">
                          <label class="form-label">First name</label>
                          <input type="text" class="form-control" placeholder="John">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                          <label class="form-label">Middle Initial</label>
                          <input type="text" class="form-control" placeholder="I">
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <div class="mb-3">
                          <label class="form-label">Suffix</label>
                          <select name="suffix" class="form-select" id="suffix">
                              <option value="">None</option>
                              <option value="jr">Jr.</option>
                              <option value="sr">Sr.</option>
                          </select>
                        </div>
                    </div>
                  </div>
                <label class="form-label">Report type</label>
                <div class="form-selectgroup-boxes row mb-3">
                  <div class="col-lg-6">
                    <label class="form-selectgroup-item">
                      <input type="radio" name="report-type" value="1" class="form-selectgroup-input" checked>
                      <span class="form-selectgroup-label d-flex align-items-center p-3">
                        <span class="me-3">
                          <span class="form-selectgroup-check"></span>
                        </span>
                        <span class="form-selectgroup-label-content">
                          <span class="form-selectgroup-title strong mb-1">Simple</span>
                          <span class="d-block text-muted">Provide only basic data needed for the report</span>
                        </span>
                      </span>
                    </label>
                  </div>
                  <div class="col-lg-6">
                    <label class="form-selectgroup-item">
                      <input type="radio" name="report-type" value="1" class="form-selectgroup-input">
                      <span class="form-selectgroup-label d-flex align-items-center p-3">
                        <span class="me-3">
                          <span class="form-selectgroup-check"></span>
                        </span>
                        <span class="form-selectgroup-label-content">
                          <span class="form-selectgroup-title strong mb-1">Advanced</span>
                          <span class="d-block text-muted">Insert charts and additional advanced analyses to be inserted in the report</span>
                        </span>
                      </span>
                    </label>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8">
                    <div class="mb-3">
                      <label class="form-label">Report url</label>
                      <div class="input-group input-group-flat">
                        <span class="input-group-text">
                          https://tabler.io/reports/
                        </span>
                        <input type="text" class="form-control ps-0"  value="report-01" autocomplete="off">
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="mb-3">
                      <label class="form-label">Visibility</label>
                      <select class="form-select">
                        <option value="1" selected>Private</option>
                        <option value="2">Public</option>
                        <option value="3">Hidden</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-body">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Client name</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="mb-3">
                      <label class="form-label">Reporting period</label>
                      <input type="date" class="form-control">
                    </div>
                  </div>
                  <div class="col-lg-12">
                    <div>
                      <label class="form-label">Additional information</label>
                      <textarea class="form-control" rows="3"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">
                  Cancel
                </a>
                <a href="#" class="btn btn-primary ms-auto" data-bs-dismiss="modal">
                  <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                  <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><line x1="12" y1="5" x2="12" y2="19" /><line x1="5" y1="12" x2="19" y2="12" /></svg>
                  Create new report
                </a>
              </div>
            </div>
          </div>
    </div> --}}
    <script>
        window.addEventListener('modalDismiss', event => {
            $(`#${event.detail.modalName}`).modal('hide')
        })
    </script>
</div>
