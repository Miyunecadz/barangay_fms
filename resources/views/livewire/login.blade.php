<div>
    <div class="page page-center">
        <div class="container-tight py-4">
          <form class="card card-md" action=""  wire:submit.prevent="authenticateUser()" method="get" autocomplete="off">
            <div class="card-body">
              <h2 class="card-title text-center mb-4">Login to your account</h2>
              @if ($errorCredential)
                    <div class="alert alert-danger d-flex align-items-center alert-dismissible fade show mt-3" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995z"/>
                        </svg>
                        {{-- <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg> --}}
                        {{$errorCredential}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
              <div class="mb-3">
                <label class="form-label">Username</label>
                <input type="text" class="form-control" wire:model.lazy="username" placeholder="Enter username">
              </div>
              <div class="mb-2">
                <label class="form-label">
                  Password
                </label>
                <div class="input-group input-group-flat">
                  <input type="password" class="form-control" wire:model.lazy="password"  placeholder="Password"  autocomplete="off">
                </div>
              </div>
              <div class="form-footer">
                  <button type="submit" class="btn btn-primary w-100"  wire:loading.remove wire:target="authenticateUser">Sign in</button>

                  <button type="submit" class="btn btn-primary w-100" wire:loading wire:target="authenticateUser" disabled>
                      <div class="spinner-border" role="status">
                          <span class="visually-hidden">Loading...</span>
                      </div>
                      &nbsp;
                      Signing in
                  </button>
              </div>
            </div>
          </form>
          {{-- <div class="text-center text-muted mt-3">
            Don't have account yet? <a href="./sign-up.html" tabindex="-1">Sign up</a>
          </div> --}}
        </div>
    </div>
</div>
