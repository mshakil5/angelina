@extends('admin.master')

@section('content')
<section class="content pt-3">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-12">

        @if(session('success'))
          <div class="alert alert-success pt-3 mb-3">{{ session('success') }}</div>
        @endif

        @if($errors->any())
          <div class="alert alert-danger mb-3">
            <ul class="mb-0">
              @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
        @endif

        <div class="card card-secondary">
          <div class="card-header">
            <h3 class="card-title">job Info</h3>
          </div>

          <form action="{{ route('admin.jobInfo') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              

              <div class="col-md-12">
                <div class="form-group">
                  <label>Left Text <span class="text-danger">*</span></label>
                  <textarea name="long_description" class="form-control summernote @error('long_description') is-invalid @enderror" rows="4">{!! $data->long_description !!}</textarea>
                </div>
              </div>


              <div class="col-md-12">
                <div class="form-group">
                  <label>Feature Image (1000x700)</label> <br>
                  <input type="file" class="filepond" id="feature_image" name="feature_image">
                </div>
              </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label>Status <span class="text-danger">*</span></label>
                  <select name="short_title" class="form-control @error('short_title') is-invalid @enderror">
                    <option value="Active" {{ $data->short_title == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $data->short_title == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
                </div>
              </div>


            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-secondary">Update</button>
            </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection