<article class="card form-card">
                  <div class="form-header d-flex align-items-center justify-content-between p-4">
                    <div>
                      <h1 class="form-title">Angelina's Day Care — Employee Commencement Details</h1>
                      <p class="mb-0 lead-muted">Please complete the details below. Fields marked with <span class="text-danger">*</span> are required.</p>
                    </div>
                    <div class="text-end d-none d-md-block">
                      <small class="text-muted">Secure &amp; Confidential</small>
                    </div>
                  </div>

                  <div class="card-body p-4">
                    <form id="commencementForm" class="row g-3" novalidate>

                      <!-- Personal Information -->
                      <div class="col-12">
                        <h5 class="mb-2">Personal Information</h5>
                      </div>

                      <div class="col-md-6">
                        <label for="fullName" class="form-label required">Full Name</label>
                        <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Full Name" required>
                        <div class="invalid-feedback">Please enter your full name.</div>
                      </div>

                      <div class="col-md-6">
                        <label for="position" class="form-label required">Position</label>
                        <input type="text" class="form-control" id="position" name="position" placeholder="e.g. Nursery Assistant" required>
                        <div class="invalid-feedback">Please enter your position.</div>
                      </div>

                      <div class="col-md-6">
                        <label for="phone" class="form-label required">Phone Number</label>
                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="+44 7123 456789" pattern="[0-9+()\-\s]{6,}" required>
                        <div class="form-text">Include country code if outside UK.</div>
                        <div class="invalid-feedback">Please enter a valid phone number.</div>
                      </div>

                      <div class="col-md-6">
                        <label for="email" class="form-label required">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                        <div class="invalid-feedback">Please enter a valid email address.</div>
                      </div>

                      <div class="col-md-6">
                        <label for="dob" class="form-label required">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dob" required>
                        <div class="invalid-feedback">Please provide your date of birth.</div>
                      </div>

                      <!-- Acknowledgement -->
                      <div class="col-12 mt-3">
                        <h5 class="mb-2">Acknowledgement of Receipt</h5>
                        <p class="mb-2 lead-muted">Please confirm you have received and reviewed the following documents:</p>

                        <div class="policy-list">
                          <label><strong>1.</strong> Employee Handbook</label>
                          <label><strong>2.</strong> Health and Safety Policies</label>
                          <label><strong>3.</strong> Code of Conduct</label>
                          <label><strong>4.</strong> Confidentiality Agreement</label>
                          <label><strong>5.</strong> Job Description</label>
                        </div>

                        <div class="mt-2 col-md-6 p-0">
                          <label for="acknowledge" class="form-label required">I acknowledge that I have received and reviewed the above policy</label>
                          <select id="acknowledge" name="acknowledge" class="form-select" required>
                            <option value="">-- Select --</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                          </select>
                          <div class="invalid-feedback">Please select Yes or No.</div>
                        </div>

                      </div>

                      <!-- Signature and Date -->
                      <div class="col-12 mt-3">
                        <div class="row g-3 align-items-center">
                          <div class="col-md-6">
                            <label for="signature" class="form-label required">Signature (image)</label>
                            <input type="file" class="form-control" id="signature" name="signature" accept="image/png, image/jpeg" required>
                            <div class="form-text">Accepted formats: JPG, PNG. Max 2MB.</div>
                            <div class="invalid-feedback">Please upload your signature image.</div>
                          </div>

                          <div class="col-md-6 text-center text-md-start">
                            <label class="form-label">Preview</label>
                            <div>
                              <img id="sigPreview" class="signature-preview" alt="Signature preview" src="" style="display:none">
                            </div>
                          </div>

                          <div class="col-md-6">
                            <label for="signedDate" class="form-label required">Date</label>
                            <input type="date" class="form-control" id="signedDate" name="signedDate" required>
                            <div class="invalid-feedback">Please pick the signature date.</div>
                          </div>
                        </div>
                      </div>

                      <!-- Submit -->
                      <div class="col-12 mt-3">
                        <div class="d-grid d-sm-flex justify-content-sm-between align-items-center">
                          <div class="small text-muted">By submitting this form you confirm the information is true and correct to the best of your knowledge.</div>
                          <div>
                            <button type="reset" class="btn btn-outline-secondary me-2">Reset</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </div>

                    </form>
                  </div>
                </article>