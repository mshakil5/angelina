


          <div class="d-flex justify-content-between align-items-center mb-3">
            <h3 class="mb-0">Profile</h3>
            <small class="small-muted">Update your personal details</small>
          </div>

          <div class="card mb-3">
            <div class="card-body">
              <form id="profileForm" class="row g-3 needs-validation" >
                @csrf
                <div class="col-12 d-flex align-items-center gap-3">
                  <div class="avatar-preview" id="avatarPreview">
                    @if (Auth::user()->feature_image)
                    <img src="{{asset('images/profile/'.Auth::user()->feature_image)}}" alt="avatar" id="avatarImg">
                    @else
                    <img src="{{asset('resources/frontend/images/logo.png')}}" alt="avatar" id="avatarImg">
                        
                    @endif
                  </div>
                  <div>
                    <label class="form-label mb-1">Profile photo</label><br>
                    <input class="form-control form-control-sm" type="file" id="avatarInput" accept="image/*">
                    <div class="small-muted mt-1">PNG or JPG — max 2MB</div>
                  </div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Full name</label>
                  <input type="text" class="form-control" id="userName" name="userName" required value="{{Auth::user()->name}}">
                  <div class="invalid-feedback">Please enter your name.</div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Email</label>
                  <input type="email" class="form-control" id="userEmail" name="userEmail" required value="{{Auth::user()->email}}">
                  <div class="invalid-feedback">Enter a valid email.</div>
                </div>

                <div class="col-md-6">
                  <label class="form-label">Phone</label>
                  <input type="tel" class="form-control" id="userPhone" pattern="^\+?[0-9\s\-]{7,20}$" value="{{Auth::user()->phone}}">
                  <div class="invalid-feedback">Enter a valid phone number.</div>
                </div>

                <div class="col-12 d-none">
                  <label class="form-label">About</label>
                  <textarea class="form-control" id="about" rows="3"></textarea>
                </div>

                <div class="col-12 d-flex gap-2 justify-content-end">
                  <button type="reset" class="btn btn-outline-secondary">Reset</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>