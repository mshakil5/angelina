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
            <h3 class="card-title">Food Choice</h3>
          </div>

          <form action="{{ route('admin.foodChoice') }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-group">
                <label>Food Choice <span class="text-danger">*</span></label>
                <textarea name="foodChoice" class="form-control summernote @error('foodChoice') is-invalid @enderror" rows="4">{!! $foodChoice->long_description !!}</textarea>
              </div>
            </div>

            
            <div class="card-body">
              <div class="form-group">
                <label>Food Table <span class="text-danger">*</span></label>
                <textarea name="foodtable" class="form-control summernote @error('foodtable') is-invalid @enderror" rows="4">{!! $foodChoice->short_description !!}</textarea>
              </div>
            </div>

            
              <div class="col-md-12">
                <div class="form-group">
                  <label>Status <span class="text-danger">*</span></label>
                  <select name="short_title" class="form-control @error('short_title') is-invalid @enderror">
                    <option value="Active" {{ $foodChoice->short_title == 'Active' ? 'selected' : '' }}>Active</option>
                    <option value="Inactive" {{ $foodChoice->short_title == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                  </select>
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