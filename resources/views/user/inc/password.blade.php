

<div class="d-flex justify-content-between align-items-center mb-3">
    <h3 class="mb-0">Change Password</h3>
    <small class="small-muted">Create a strong password</small>
</div>

<div class="card">
    <div class="card-body">
    <form id="passwordForm" class="row g-3 needs-validation" novalidate>
        <div class="col-12">
        <label class="form-label">Current password</label>
        <input type="password" class="form-control" id="currentPassword" required>
        <div class="invalid-feedback">Current password is required.</div>
        </div>

        <div class="col-md-6">
        <label class="form-label">New password</label>
        <input type="password" class="form-control" id="newPassword" minlength="6" required>
        <div class="invalid-feedback">Password must be at least 6 characters.</div>
        </div>

        <div class="col-md-6">
        <label class="form-label">Confirm password</label>
        <input type="password" class="form-control" id="confirmPassword" minlength="6" required>
        <div class="invalid-feedback">Passwords must match.</div>
        </div>

        <div class="col-12 d-flex justify-content-end gap-2">
        <button type="reset" class="btn btn-outline-secondary">Reset</button>
        <button type="submit" class="btn btn-primary">Change password</button>
        </div>
    </form>
    </div>
</div>