@extends('admin.master')

@section('content')
<section class="content">
  <div class="container-fluid">

    {{-- Page Header --}}
    <div class="d-flex align-items-center justify-content-between mb-4">
      <div>
        <h4 class="mb-0 font-weight-bold">
          <i class="fas fa-folder-open text-warning mr-2"></i>Employee Documents
        </h4>
        <small class="text-muted">{{ $employee->name }} &mdash; {{ $employee->email }}</small>
      </div>
      <div>
        <button class="btn btn-warning" data-toggle="modal" data-target="#uploadModal">
          <i class="fas fa-upload mr-1"></i> Upload Document
        </button>
        <a href="{{ route('user.index') }}" class="btn btn-secondary ml-2">
          <i class="fas fa-arrow-left mr-1"></i> Back
        </a>
      </div>
    </div>

    {{-- Alerts --}}
    @if(session('success'))
      <div class="alert alert-success alert-dismissible fade show">
        <i class="fas fa-check-circle mr-2"></i>{{ session('success') }}
        <button type="button" class="close" data-dismiss="alert">&times;</button>
      </div>
    @endif

    {{-- Documents grouped by type --}}
    @php
      $typeIcons = [
        'bank_statement'      => ['icon' => 'fas fa-university',      'color' => 'primary'],
        'passport'            => ['icon' => 'fas fa-passport',         'color' => 'info'],
        'share_code'          => ['icon' => 'fas fa-share-alt',        'color' => 'success'],
        'dbs_acknowledgement' => ['icon' => 'fas fa-clipboard-check',  'color' => 'warning'],
        'dbs_certificate'     => ['icon' => 'fas fa-certificate',      'color' => 'danger'],
        'right_to_work'       => ['icon' => 'fas fa-briefcase',        'color' => 'secondary'],
        'other'               => ['icon' => 'fas fa-file-alt',         'color' => 'dark'],
      ];

      $grouped = $documents->groupBy('document_type');
    @endphp

    @if($documents->isEmpty())
      <div class="card shadow-sm">
        <div class="card-body text-center py-5 text-muted">
          <i class="fas fa-folder-open fa-4x mb-3 d-block text-warning opacity-50"></i>
          <h5>No documents uploaded yet</h5>
          <p class="mb-0">Click <strong>Upload Document</strong> to get started.</p>
        </div>
      </div>

    @else
      @foreach($types as $typeKey => $typeLabel)
        @if($grouped->has($typeKey))
          @php
            $meta  = $typeIcons[$typeKey] ?? ['icon' => 'fas fa-file', 'color' => 'secondary'];
            $items = $grouped[$typeKey];
          @endphp

          <div class="card shadow-sm mb-3">
            <div class="card-header bg-white border-left border-{{ $meta['color'] }}" style="border-left-width:4px!important">
              <h6 class="mb-0 font-weight-bold">
                <i class="{{ $meta['icon'] }} text-{{ $meta['color'] }} mr-2"></i>
                {{ $typeLabel }}
                <span class="badge badge-{{ $meta['color'] }} ml-1">{{ $items->count() }}</span>
              </h6>
            </div>
            <div class="card-body p-0">
              <table class="table table-hover mb-0">
                <thead class="thead-light">
                  <tr>
                    <th style="width:40px">#</th>
                    <th>File Name</th>
                    <th>Notes</th>
                    <th>Uploaded</th>
                    <th class="text-center" style="width:120px">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($items as $i => $doc)
                    <tr>
                      <td class="text-muted">{{ $i + 1 }}</td>
                      <td>
                        <i class="fas fa-paperclip text-muted mr-1"></i>
                        {{ $doc->original_name }}
                      </td>
                      <td class="text-muted small">{{ $doc->notes ?? '—' }}</td>
                      <td class="text-muted small">{{ $doc->created_at->format('d M Y') }}</td>
                      <td class="text-center">
                        <a href="{{ route('user.document.download', $doc->id) }}"
                           class="btn btn-sm btn-outline-secondary" title="Download">
                          <i class="fas fa-download"></i>
                        </a>
                        <form action="{{ route('user.document.destroy', $doc->id) }}"
                              method="POST" class="d-inline delete-form">
                          @csrf @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        @endif
      @endforeach
    @endif

  </div>
</section>

{{-- Upload Modal --}}
<div class="modal fade" id="uploadModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header bg-warning">
        <h5 class="modal-title font-weight-bold">
          <i class="fas fa-upload mr-2"></i>Upload Document
        </h5>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <form action="{{ route('user.document.store', $employee->id) }}"
            method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">

          <div class="form-group">
            <label class="font-weight-bold">Document Type <span class="text-danger">*</span></label>
            <select class="form-control" name="document_type" required>
              <option value="">— Select type —</option>
              @foreach($types as $key => $label)
                <option value="{{ $key }}">{{ $label }}</option>
              @endforeach
            </select>
          </div>

          <div class="form-group">
            <label class="font-weight-bold">File <span class="text-danger">*</span></label>
            <div class="custom-file">
              <input type="file" class="custom-file-input" name="file"
                     id="fileInput" accept=".pdf,.jpg,.jpeg,.png,.doc,.docx" required>
              <label class="custom-file-label" for="fileInput">Choose file…</label>
            </div>
            <small class="text-muted">PDF, JPG, PNG, DOC, DOCX — max 10 MB</small>
          </div>

          <div class="form-group">
            <label class="font-weight-bold">Notes <span class="text-muted font-weight-normal">(optional)</span></label>
            <textarea class="form-control" name="notes" rows="2"
                      placeholder="Any additional notes…"></textarea>
          </div>

        </div>

        <div class="modal-footer bg-light">
          <button type="button" class="btn btn-link text-muted" data-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-warning px-4">
            <i class="fas fa-upload mr-1"></i> Upload
          </button>
        </div>
      </form>

    </div>
  </div>
</div>
@endsection

@section('script')
<script>
  // Show file name in custom file input label
  $('#fileInput').on('change', function () {
    var name = this.files[0] ? this.files[0].name : 'Choose file…';
    $(this).next('.custom-file-label').text(name);
  });

  // Confirm before delete
  $(document).on('submit', '.delete-form', function (e) {
    if (!confirm('Delete this document? This cannot be undone.')) {
      e.preventDefault();
    }
  });
</script>
@endsection