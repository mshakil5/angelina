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
            <h3 class="card-title">About Us</h3>
          </div>

          <form action="{{ route('admin.aboutUs') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>About Us <span class="text-danger">*</span></label>
                <textarea name="about_us" class="form-control summernote @error('about_us') is-invalid @enderror" rows="4">{!! $data->long_description !!}</textarea>
              </div>

              <div class="row">
                  <div class="col-md-12">
                      <div class="form-group">
                          <label for="image">Image (800x600)</label>
                          <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                          <img id="preview-image" src="{{asset('images/about/'. $data->image)}}" alt="" style="max-width: 300px; width: 100%; height: auto; margin-top: 20px;">
                      </div>
                  </div>
              </div>
            </div>

            
          <!-- Meta Fields Section -->
          <div class="card-body">
            <div class="row mt-4">
              <div class="col-12">
                  <h4>SEO Meta Fields</h4>
                  <hr>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Meta Title</label>
                      <input type="text" class="form-control" id="meta_title" name="meta_title" value="{{$data->meta_title}}" placeholder="Enter meta title">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Meta Description</label>
                      <textarea class="form-control" id="meta_description" name="meta_description" rows="3" placeholder="Enter meta description">{{$data->meta_description}}</textarea>
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Meta Keywords (comma separated)</label>
                      <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="{{$data->meta_keywords}}" placeholder="e.g. service, business, company">
                  </div>
              </div>
              <div class="col-sm-12">
                  <div class="form-group">
                      <label>Meta Image (1200x630 recommended)</label>
                      <input type="file" class="form-control-file" id="meta_image" name="meta_image" accept="image/*">
                      <img id="preview-meta-image" src="{{asset('images/meta_image/'. $data->meta_image)}}" alt="" style="max-width: 300px; width: 100%; height: auto; margin-top: 20px;">
                  </div>
              </div>
          </div>
          </div>
          <!-- End Meta Fields Section -->

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