@extends('frontend.layouts.master')

@section('content')

<style>
  .job-details {
      font-family: 'Poppins', sans-serif;
      color: #333;
  }

  .job-details .banner {
      width: 100%;
      height: 300px;
      background-size: cover;
      background-position: center;
      border-radius: 10px;
      margin-bottom: 40px;
  }

  .job-details .job-title h2 {
      font-size: 2rem;
      font-weight: 700;
      margin-bottom: 15px;
  }

  .job-details .job-info {
      font-size: 14px;
      color: #666;
      margin-bottom: 30px;
  }

  .job-details .job-info span {
      font-weight: 600;
      margin-right: 15px;
  }

  .job-details .apply-form .form-control {
      border-radius: 8px;
  }

  .job-details .apply-form button {
      margin-top: 10px;
  }
</style>

<div class="job-details container mb-5">
    <!-- Banner -->
    @php
        $bannerImage = $job->banner_image ?? asset('resources/frontend/images/page-banner2.jpg');
    @endphp
    <div class="banner" style="background-image: url('{{ $bannerImage }}');"></div>

    <div class="row">
        <div class="col-md-6">
            <div class="job-title">
                <h2>{{ $job->title }}</h2>
            </div>

            <div class="job-info">
                <span>Category: {{ $job->category }}</span>
                <span>Location: {{ $job->location }}</span>
            </div>

            <div class="job-description">
                {!! $job->description !!}
            </div>
        </div>

        <div class="col-md-6">
            <div class="apply-form p-4 border rounded shadow-sm">
              <div class="job-title">
                <h2 class="mb-3">Apply for this Position</h2>
              </div>
                <form id="jobApplyForm" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">

                    <div class="mb-3">
                        <label for="full_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="full_name" id="full_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="phone" id="phone" required>
                    </div>

                    <div class="mb-3">
                        <label for="cover_letter" class="form-label">Cover Letter <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="cover_letter" id="cover_letter" rows="4" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="resume" class="form-label">Upload CV/Resume <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" name="resume" id="resume" accept=".pdf,.doc,.docx" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Submit Application</button>
                </form>
                <div id="applyMessage" class="mt-2"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('jobApplyForm');
        const msg = document.getElementById('applyMessage');
        const submitBtn = form.querySelector('button[type="submit"]');

        form.addEventListener('submit', function(e){
            e.preventDefault();

            submitBtn.disabled = true;
            msg.innerHTML = 'Submitting...';

            let formData = new FormData(form);

            fetch('{{ route("job.apply") }}', {
                method: 'POST',
                headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                body: formData
            })
            .then(async res => {
                if(!res.ok) {
                    const text = await res.text();
                    console.error('Error Response:', text);
                    throw new Error('Server error');
                }
                return res.json();
            })
            .then(data => {
                if(data.status === 200){
                    alert(data.message);
                    form.reset();
                    msg.innerHTML = '';
                } else {
                    let errors = '';
                    for(let err in data.errors){
                        errors += data.errors[err] + '\n';
                    }
                    msg.innerHTML = '<span class="text-danger">'+errors+'</span>';
                }
            })
            .catch(err => {
                console.error(err);
                msg.innerHTML = '<span class="text-danger">Something went wrong! Check console.</span>';
            })
            .finally(() => {
                submitBtn.disabled = false;
            });
        });
    });
</script>
@endsection