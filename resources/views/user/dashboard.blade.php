@extends('frontend.layouts.master')

@section('content')
<link href="{{ asset('resources/frontend/css/user.css') }}" rel="stylesheet">

@php
    $documents = \App\Models\Document::where('status', 1)->get();
@endphp

@php
    $banner = \App\Models\Banner::where('page', 'User Dashboard')->first();
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp


<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
  <div class="container d-none">
    <h1 class="breadcrumb-title mb-3"></h1>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item"><a href="{{route('home')}}" class="text-white text-decoration-none"></a></li>
        <li class="breadcrumb-item active text-white" aria-current="page"></li>
      </ol>
    </nav>
  </div>
</section>



  <div class="container dash-shell">
    <div class="row g-4">
      <!-- Sidebar -->
      @include('user.inc.sidebar')


      <!-- Right content -->
      <main class="col-lg-9 col-12">
        <div class="dash-content">


          <!-- ===== Dashboard view (REPLACEMENT) ===== -->
          <section id="dashboard" class="content-pane">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h3 class="mb-0">Dashboard</h3>
              <small class="small-muted">Welcome back — here's what's happening</small>
            </div>



            <!-- SMART PROGRESS + PDF + CHECKS -->
            <div class="card mb-3">
              <div class="card-body">
                <div class="row gy-3">
                  <div class="col-12">
                    <h5 class="card-title mb-2">Onboarding progress</h5>
                    <p class="small-muted mb-3">Complete the items below to finish your onboarding. The progress bar updates automatically.</p>

                    <!-- Segmented progress bar container -->
                    <div class="mb-3">
                      <div class="seg-progress" aria-hidden="true">
                        <div class="seg-fill" id="segFill" style="width:0%"></div>
                        <div class="seg-overlay" id="segOverlay"></div>
                      </div>

                      <div class="d-flex justify-content-between align-items-center mt-2">
                        <div class="d-flex align-items-center gap-2">
                          <strong id="progressPercent">0%</strong>
                          <span class="small-muted" id="progressLabel">Not started</span>
                        </div>
                        <div>
                          <button class="btn btn-sm btn-outline-secondary" id="markAllBtn" type="button">Mark all</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Left: checkboxes; Right: pdf viewer (stack on mobile) -->
                  <div class="col-lg-5">
                    <div class="mb-2">
                      <h6 class="mb-2">Required steps</h6>

                      <form id="stepsForm" class="needs-validation" novalidate>
                        <div class="list-group">

                          @foreach ($documents as $document)
                            @php
                              $userDoc = \App\Models\UserDocumentCompletion::where('user_id', Auth::id())->where('document_id', $document->id)->first();
                              $docPath = $document->document; 
                              $docUrl = $docPath ? (Storage::exists($docPath) ? Storage::url($docPath) : asset('images/documents/' . $docPath)) : null;
                            @endphp

                            <label class="list-group-item list-group-item-action d-flex align-items-start gap-3 doc-item" data-url="{{ $docUrl }}" data-file="{{ $docPath }}">
                              <input class="form-check-input mt-1 me-2 doc-checkbox" type="checkbox" value="{{ $document->id }}" data-weight="1" @checked($userDoc) />
                              <div>
                                <div class="fw-bold">{{ $document->title }}</div>
                                <div class="small-muted">{{ $document->description }}</div>
                              </div>
                            </label>
                          @endforeach


                        </div>
                      </form>
                    </div>

                    <div class="mt-3 d-flex flex-wrap gap-2">
                      {{-- <button class="btn btn-primary btn-sm" id="showRequiredPdf" type="button">Open selected PDF</button> --}}
                      <button class="btn btn-primary btn-sm ms-auto" id="submitDocs" type="button">Submit completed</button>
                      {{-- <a href="#" id="downloadPdf" class="btn btn-outline-secondary btn-sm" download target="_blank">Download PDF</a> --}}

                      <!-- Submit selected checkboxes to server -->
                    </div>

                  </div>

                  <div class="col-lg-7">
                    <div>
                      <h6 class="mb-2">PDF Preview</h6>
                      <!-- Responsive PDF viewer; replace src with your PDF path -->
                      <div class="ratio ratio-4x3 border rounded" style="min-height:220px; overflow:hidden;">
                        <iframe id="pdfViewer" src="" title="PDF preview" style="border:0"></iframe>
                      </div>

                      <div class="d-flex justify-content-between align-items-center mt-2">
                        <div id="completedBadge" class="badge bg-success align-self-end d-none">All steps complete ✓</div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>



          </section>


          <!-- Notice view -->
          <section id="notice" class="content-pane d-none">
              @include('user.inc.notice')
          </section>

                    <!-- Notice view -->
          <section id="commencement" class="content-pane d-none">
              @include('user.inc.commencement')
          </section>

          <!-- Profile view -->
          <section id="profile" class="content-pane d-none">
              @include('user.inc.profile')
          </section>

          <!-- Change password -->
          <section id="password" class="content-pane d-none">
              @include('user.inc.password')
          </section>

        </div>
      </main>
    </div>
  </div>

@endsection

@section('script')


<script src="{{ asset('resources/admin/js/jquery.min.js')}}"></script>

<script>
  // Simple client-side navigation between panes
  (function(){
    const sideLinks = document.querySelectorAll('[data-target]');
    const panes = document.querySelectorAll('.content-pane');

    function showPane(name){
      panes.forEach(p => {
        if (p.id === name) p.classList.remove('d-none');
        else p.classList.add('d-none');
      });

      // active class for side navs (desktop and offcanvas)
      document.querySelectorAll('.nav-vertical .nav-link').forEach(a => {
        a.classList.toggle('active', a.getAttribute('data-target') === name);
      });
    }

    sideLinks.forEach(a => {
      a.addEventListener('click', function(e){
        e.preventDefault();
        const target = this.dataset.target;
        if (target) showPane(target);

        // if offcanvas is open, close it (mobile)
        const off = document.querySelector('.offcanvas.show');
        if (off) {
          bootstrap.Offcanvas.getInstance(off).hide();
        }
      });
    });

    // initial show
    showPane('dashboard');


    // Profile avatar preview
    const avatarInput = document.getElementById('avatarInput');
    const avatarImg = document.getElementById('avatarImg');
    avatarInput.addEventListener('change', function(){
      const file = this.files[0];
      if (!file) return;
      if (!file.type.startsWith('image/')) { alert('Please select an image.'); return; }
      if (file.size > 2 * 1024 * 1024) { alert('Image too large. Max 2MB.'); return; }
      const reader = new FileReader();
      reader.onload = e => avatarImg.src = e.target.result;
      reader.readAsDataURL(file);
    });

    



  })();
</script>


<script>
  $(document).ready(function() {
    
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // Form validation and submission
    $('#profileForm').on('submit', function(e) {
        e.preventDefault();

        // Get form and clear previous validation states
        const form = $(this);
        form[0].checkValidity();
        form.addClass('was-validated');

        // Validate file size (max 2MB)
        const avatarInput = $('#avatarInput')[0];
        if (avatarInput.files.length > 0) {
            const fileSize = avatarInput.files[0].size / 1024 / 1024; // Convert to MB
            if (fileSize > 2) {
                showMessage('error', 'Profile photo must be less than 2MB');
                return;
            }
        }


        // Create FormData object for file upload
        const formData = new FormData();
        formData.append('image', avatarInput.files[0] || null);
        formData.append('name', $('#userName').val());
        formData.append('email', $('#userEmail').val());
        formData.append('phone', $('#userPhone').val());
        formData.append('about', $('#about').val());

        // AJAX request
        $.ajax({
            url: '{{ route("user.updateProfile") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                showMessage('success', 'Profile updated successfully!');
                
                // Update avatar preview if new image was uploaded
                if (response.avatarUrl) {
                    $('#avatarImg').attr('src', response.avatarUrl);
                }
            },
            error: function(xhr) {
                let errorMessage = 'Failed to update profile';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showMessage('error', errorMessage);
            }
        });
    });


        // Form validation and submission
    $('#passwordForm').on('submit', function(e) {
        e.preventDefault();
        
        // Get form and clear previous validation states
        const form = $(this);
        form[0].checkValidity();
        form.addClass('was-validated');

        const np = document.getElementById('newPassword');
        const cp = document.getElementById('confirmPassword');
        if (np.value !== cp.value) {
          cp.setCustomValidity('Passwords do not match');
        } else {
          cp.setCustomValidity('');
        }
        if (!passwordForm.checkValidity()) {
          passwordForm.classList.add('was-validated');
          return;
        }

        // Create FormData object for file upload
        const formData = new FormData();
        formData.append('currentPassword', $('#currentPassword').val());
        formData.append('newPassword', $('#newPassword').val());
        formData.append('confirmPassword', $('#confirmPassword').val());

        // AJAX request
        $.ajax({
            url: '{{ route("user.updatePassword") }}',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
              console.log(response);
                showMessage('success', 'Password updated successfully!');

            },
            error: function(xhr) {
                console.log(xhr.responseJSON.message);
                let errorMessage = 'Failed to update Password';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                showMessage('error', errorMessage);
            }
        });
    });



    // Reset form
    $('#profileForm').on('reset', function() {
        const form = $(this);
        form.removeClass('was-validated');
        $('#avatarInput').val('');
        $('#avatarImg').attr('src', 'https://via.placeholder.com/150');
        clearMessages();
    });

    // Preview avatar image
    $('#avatarInput').on('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#avatarImg').attr('src', e.target.result);
            };
            reader.readAsDataURL(file);
        }
    });

    // Function to show messages
    function showMessage(type, message) {
        clearMessages();
        const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
        const alert = $(
            `<div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`
        );
        $('#profileForm, #passwordForm').prepend(alert);
        setTimeout(() => alert.alert('close'), 5000);
    }

    // Function to clear messages
    function clearMessages() {
        $('.alert').alert('close');
    }
});
</script>

<!-- ===== Script for progress behavior ===== -->
<script>
(function(){
  // Elements (guard nulls for optional elements)
  const form = document.getElementById('stepsForm');
  const checkboxes = form ? Array.from(form.querySelectorAll('input[type="checkbox"].doc-checkbox')) : [];
  const fill = document.getElementById('segFill');
  const overlay = document.getElementById('segOverlay');
  const percentLabel = document.getElementById('progressPercent');
  const progressText = document.getElementById('progressLabel');
  const markAllBtn = document.getElementById('markAllBtn');
  const completedBadge = document.getElementById('completedBadge');
  const showPdfBtn = document.getElementById('showRequiredPdf');
  const pdfViewer = document.getElementById('pdfViewer');
  const downloadPdf = document.getElementById('downloadPdf');
  const submitDocsBtn = document.getElementById('submitDocs');

  // Helper: get selected doc url (first selected checkbox with data-url)
  function getSelectedDocUrl() {
    if (!form) return null;
    // find first checked .doc-checkbox -> find parent .doc-item
    const checked = form.querySelector('input[type="checkbox"].doc-checkbox:checked');
    if (checked) {
      const parent = checked.closest('.doc-item');
      if (parent) return parent.dataset.url || null;
    }
    return null;
  }

  // Build segments overlay
  function buildSegments() {
    const count = checkboxes.length;
    if (!overlay) return;
    if (count <= 1) {
      overlay.style.backgroundImage = 'none';
      return;
    }
    const sep = 100 / count;
    const stops = [];
    for (let i = 1; i < count; i++) {
      const pos = (sep * i);
      stops.push(`transparent ${pos - 0.4}%`);
      stops.push(`rgba(255,255,255,0.35) ${pos}%`);
      stops.push(`transparent ${pos + 0.4}%`);
    }
    overlay.style.backgroundImage = 'linear-gradient(90deg, ' + stops.join(',') + ')';
  }

  // Progress calculation
  function updateProgress() {
    const total = checkboxes.length;
    const checked = checkboxes.filter(c => c.checked).length;
    const pct = total === 0 ? 0 : Math.round((checked / total) * 100);
    if (fill) fill.style.width = pct + '%';
    if (percentLabel) percentLabel.textContent = pct + '%';

    if (progressText) {
      if (pct === 0) progressText.textContent = 'Not started';
      else if (pct > 0 && pct < 30) progressText.textContent = 'Getting started';
      else if (pct >= 30 && pct < 70) progressText.textContent = 'Making progress';
      else if (pct >= 70 && pct < 100) progressText.textContent = 'Almost done';
      else progressText.textContent = 'Completed';
    }

    if (fill) fill.setAttribute('aria-valuenow', pct);
    if (completedBadge) {
      if (pct === 100) completedBadge.classList.remove('d-none');
      else completedBadge.classList.add('d-none');
    }
  }

  // Toggle checkbox when clicking list-group item for better UX
  document.querySelectorAll('.list-group-item.doc-item').forEach(li => {
    li.addEventListener('click', function(e){
      const target = e.target;
      // If user clicked a link or button inside item, ignore toggling
      if (target.tagName.toLowerCase() === 'a' || target.tagName.toLowerCase() === 'button') return;
      const cb = this.querySelector('input[type="checkbox"].doc-checkbox');
      if (cb) {
        cb.checked = !cb.checked;
        cb.dispatchEvent(new Event('change', { bubbles: true }));
      }
    });
  });

  // When a doc item is clicked we also update the PDF viewer for preview (immediate visual feedback)
  document.querySelectorAll('.list-group-item.doc-item').forEach(item => {
    item.addEventListener('click', function(e){
      // if click was on input, still let change handler handle, and then preview
      setTimeout(() => {
        const url = this.dataset.url;
        if (url) {
          // Set iframe src for preview, and download href (guard nulls)
          if (pdfViewer) pdfViewer.src = url;
          if (downloadPdf) {
            downloadPdf.href = url;
            downloadPdf.setAttribute('download', '');
            downloadPdf.setAttribute('target', '_blank');
          }
        }
      }, 10);
    });
  });

  // Checkbox change handlers
  checkboxes.forEach(cb => cb.addEventListener('change', updateProgress));

  // Mark all helper
  if (markAllBtn) {
    markAllBtn.addEventListener('click', function(){
      const allChecked = checkboxes.every(c => c.checked);
      checkboxes.forEach(c => c.checked = !allChecked);
      updateProgress();
    });
  }

  // "Open selected PDF" button: open first selected doc or show a warning
  if (showPdfBtn) {
    showPdfBtn.addEventListener('click', function(e){
      e.preventDefault();
      const url = getSelectedDocUrl();
      if (!url) {
        // If nothing selected, if there's at least one doc, open the first doc's URL
        const firstItem = document.querySelector('.list-group-item.doc-item');
        const fallback = firstItem && firstItem.dataset.url ? firstItem.dataset.url : null;
        if (fallback) {
          if (pdfViewer) pdfViewer.src = fallback;
          if (downloadPdf) {
            downloadPdf.href = fallback;
            downloadPdf.setAttribute('download', '');
            downloadPdf.setAttribute('target', '_blank');
          }
        } else {
          alert('No PDF available to preview.');
        }
        // On small screen, scroll to viewer
        const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
        if (viewportWidth < 992 && pdfViewer) pdfViewer.scrollIntoView({behavior:'smooth', block:'center'});
        return;
      }
      if (pdfViewer) pdfViewer.src = url;
      if (downloadPdf) {
        downloadPdf.href = url;
        downloadPdf.setAttribute('download', '');
        downloadPdf.setAttribute('target', '_blank');
      }

      // Scroll into view on mobile
      const viewportWidth = Math.max(document.documentElement.clientWidth || 0, window.innerWidth || 0);
      if (viewportWidth < 992 && pdfViewer) pdfViewer.scrollIntoView({behavior:'smooth', block:'center'});
    });
  }

  // Submit completed documents via AJAX to server
  if (submitDocsBtn) {
    submitDocsBtn.addEventListener('click', function(e){
      // alert('btn'); // optional: remove noisy alerts
      e.preventDefault();
      const selectedIds = checkboxes.filter(c => c.checked).map(c => c.value);
      if (selectedIds.length === 0) {
        if (!confirm('No items selected. Do you want to submit zero items?')) return;
      }

      console.log(selectedIds);

      // AJAX POST to route 'user.submitDocuments' - ensure route exists in web.php
      $.ajax({
        url: '{{ route("user.submitDocuments") }}',
        type: 'POST',
        data: { document_ids: selectedIds },
        success: function(res) {
          // show success message (you already have showMessage method in other script)
          if (typeof showMessage === 'function') {
            showMessage('success', res.message || 'Submitted successfully');
          } else {
            alert(res.message || 'Submitted successfully');
          }
        },
        error: function(xhr) {
          let msg = 'Submission failed';
          if (xhr && xhr.responseJSON && xhr.responseJSON.message) msg = xhr.responseJSON.message;
          if (typeof showMessage === 'function') showMessage('error', msg);
          else alert(msg);
        }
      });
    });
  } else {
    // Helpful debug if button missing
    console.warn('submitDocs button not found (id="submitDocs")');
  }

  // initialise
  buildSegments();
  updateProgress();

  // Rebuild segments on resize (if number of items changes)
  window.addEventListener('resize', buildSegments);
})();
</script>


@endsection