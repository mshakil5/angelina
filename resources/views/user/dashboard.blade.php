@extends('frontend.layouts.master')

@section('content')
<link href="{{ asset('resources/frontend/css/user.css') }}" rel="stylesheet">

@php
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');

    $catIcons = [
        'Employee Dashboard' => 'fa-tachometer-alt',
        'Policy Manuals'     => 'fa-book-open',
        'Training Material'  => 'fa-graduation-cap',
        'Staff'              => 'fa-users',
        'Child'              => 'fa-child',
    ];
@endphp

<style>
    :root {
        --theme-color: #FF7C8E;
        --theme-dark: #f55f73;
        --theme-light: #fff0f3;
    }

    .dash-shell { padding-top: 1.5rem; padding-bottom: 2rem; }

    /* Progress Bar */
    .seg-progress {
        height: 12px;
        background: #e3e6f0;
        border-radius: 1rem;
        overflow: hidden;
    }
    .seg-fill {
        height: 100%;
        background: linear-gradient(90deg, var(--theme-dark), var(--theme-color));
        border-radius: 1rem;
        transition: width 0.5s ease;
    }
    .small-muted { color: #858796; font-size: 0.85rem; }

    /* Category Accordion */
    .category-block { 
        margin-bottom: 1.5rem; 
        border: 1px solid #f0f0f0;
        border-radius: 0.75rem;
        overflow: hidden;
    }
    .cat-title-wrapper {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        padding: 1rem 1.25rem;
        background: #fff;
        cursor: pointer;
        user-select: none;
        transition: background 0.2s;
    }
    .cat-title-wrapper:hover { background: #fafafa; }
    .cat-icon-circle {
        width: 40px; height: 40px;
        background: var(--theme-light);
        color: var(--theme-dark);
        border-radius: 50%;
        display: flex; align-items: center; justify-content: center;
        font-size: 1.1rem; flex-shrink: 0;
    }
    .cat-name { font-size: 1.1rem; font-weight: 700; color: #333; margin: 0; }
    .cat-badge {
        background: var(--theme-color); color: #fff;
        border-radius: 1rem; padding: 0.2rem 0.75rem;
        font-size: 0.75rem; font-weight: 600;
    }
    .cat-badge.all-done { background: #1cc88a; }
    .btn-toggle-accordion {
        background: transparent; border: none; color: #858796;
        font-size: 1rem; cursor: pointer; padding: 0.5rem;
        transition: transform 0.3s ease;
    }
    .category-block.collapsed .btn-toggle-accordion {
        transform: rotate(-90deg);
    }
    .cat-body {
        padding: 1.25rem;
        background: #fdfdfd;
        border-top: 1px solid #f0f0f0;
        display: block;
    }
    .category-block.collapsed .cat-body { display: none; }

    /* Document Cards */
    .doc-card {
        border: 1px solid #f0f0f0;
        border-radius: 0.75rem;
        height: 100%;
        transition: all 0.3s ease;
        background: #fff;
        position: relative;
        overflow: hidden;
        border-left: 4px solid transparent;
    }
    .doc-card:hover {
        box-shadow: 0 0.5rem 1.5rem rgba(255, 124, 142, 0.15);
        transform: translateY(-4px);
        border-left-color: var(--theme-color);
    }
    .doc-card.is-completed {
        border-left-color: #1cc88a;
        background-color: #f8fffc;
    }
    .doc-card-body { padding: 1.25rem; }
    .doc-card-header {
        display: flex; justify-content: space-between;
        align-items: flex-start; margin-bottom: 0.75rem;
    }
    .doc-icon { font-size: 1.5rem; }
    .doc-checkbox {
        width: 22px; height: 22px; cursor: pointer;
        accent-color: var(--theme-color);
    }
    .doc-title {
        font-size: 0.95rem; font-weight: 700; color: #2c3e50;
        line-height: 1.4; margin-bottom: 0.5rem; word-wrap: break-word;
    }
    .doc-desc {
        font-size: 0.8rem; color: #6c757d; margin-bottom: 1.25rem;
        display: -webkit-box; -webkit-line-clamp: 2;
        -webkit-box-orient: vertical; overflow: hidden; min-height: 42px;
    }
    .doc-actions { display: flex; flex-wrap: wrap; gap: 0.5rem; }
    .btn-view-doc, .btn-video-doc {
        flex: 1; font-weight: 600; padding: 0.5rem;
        border-radius: 0.5rem; transition: all 0.2s; text-align: center;
        border: 1px solid; min-width: 100px;
    }
    .btn-view-doc {
        background: var(--theme-light); color: var(--theme-dark);
        border-color: #ffe0e6;
    }
    .btn-view-doc:hover {
        background: var(--theme-color); color: #fff; border-color: var(--theme-color);
    }
    .btn-video-doc {
        background: #fff0f0; color: #dc3545;
        border-color: #ffcccc;
    }
    .btn-video-doc:hover {
        background: #dc3545; color: #fff; border-color: #dc3545;
    }
    .btn-download-doc {
        background: #f8f9fc; color: #858796;
        border: 1px solid #e3e6f0; padding: 0.5rem 0.75rem;
        border-radius: 0.5rem; transition: all 0.2s; text-decoration: none;
    }
    .btn-download-doc:hover {
        background: #eaecf4; color: var(--theme-dark);
    }

    /* Modal Viewer */
    .doc-modal .modal-dialog { max-width: 90vw; }
    .doc-modal .modal-body { padding: 0; background: #333; height: 85vh; position: relative; }
    .doc-modal iframe, .doc-modal img {
        width: 100%; height: 100%; border: 0; object-fit: contain;
    }

    .text-theme { color: var(--theme-color) !important; }
    .btn-theme { background-color: var(--theme-color); border-color: var(--theme-color); color: #fff; }
    .btn-theme:hover { background-color: var(--theme-dark); border-color: var(--theme-dark); color: #fff; }
    .btn-outline-theme { border-color: var(--theme-color); color: var(--theme-color); }
    .btn-outline-theme:hover { background-color: var(--theme-color); color: #fff; }
</style>

<section class="breadcrumb-section text-center text-white d-flex align-items-center justify-content-center"
    style="background-image: url('{{ $bgImage }}');">
    <div class="container d-none">
        <h1 class="breadcrumb-title mb-3"></h1>
    </div>
</section>

<div class="container dash-shell">
    <div class="row g-4">
        @include('user.inc.sidebar')

        <main class="col-lg-9 col-12">
            <div class="dash-content">

                <section id="dashboard" class="content-pane">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3 class="mb-0">Dashboard</h3>
                        <small class="small-muted">Welcome back — here's what's happening</small>
                    </div>
                    <div id="ajaxMessage" class="alert d-none mb-3" role="alert"></div>

                    {{-- Top Progress Bar --}}
                    <div class="card mb-4 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <h5 class="card-title mb-1">Onboarding Progress</h5>
                                    <p class="small-muted mb-0">Complete the items below to finish your onboarding.</p>
                                </div>
                                <button class="btn btn-sm btn-outline-theme" id="markAllBtn" type="button">
                                    <i class="fas fa-check-double"></i> Mark all
                                </button>
                            </div>

                            <div class="seg-progress mb-2" aria-hidden="true">
                                <div class="seg-fill" id="segFill" style="width:0%"></div>
                            </div>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center gap-2">
                                    <strong id="progressPercent" class="text-theme" style="font-size:1.1rem;">0%</strong>
                                    <span class="small-muted" id="progressLabel">Not started</span>
                                </div>
                                <span class="badge bg-light text-muted" id="totalCounter">0 / 0</span>
                            </div>
                            <div id="completedBadge" class="alert alert-success mt-3 mb-0 py-2 text-center d-none">
                                <i class="fas fa-check-circle"></i> All onboarding steps complete!
                            </div>
                        </div>
                    </div>

                    {{-- Documents Grid --}}
                    <form id="stepsForm" novalidate>
                        @foreach ($groupedDocuments as $category => $docs)
                            @php
                                $catSlug = preg_replace('/[^a-z0-9]+/', '-', strtolower($category));
                                $catTotal = $docs->count();
                                $catCompleted = 0;
                                foreach ($docs as $d) {
                                    if (in_array($d->id, $userDocIds)) $catCompleted++;
                                }
                                $catIcon = $catIcons[$category] ?? 'fa-folder';
                            @endphp

                            <div class="category-block" data-cat="{{ $catSlug }}">
                                <div class="cat-title-wrapper" id="header-{{ $catSlug }}">
                                    <div class="cat-icon-circle">
                                        <i class="fas {{ $catIcon }}"></i>
                                    </div>
                                    <div>
                                        <h4 class="cat-name">{{ $category }}</h4>
                                        <small class="text-muted">{{ $catTotal }} Documents</small>
                                    </div>
                                    <div class="ms-auto d-flex align-items-center gap-2">
                                        <span class="cat-badge {{ $catCompleted === $catTotal ? 'all-done' : '' }}" id="badge-{{ $catSlug }}">
                                            {{ $catCompleted }}/{{ $catTotal }} Completed
                                        </span>
                                        <button type="button" class="btn-toggle-accordion">
                                            <i class="fas fa-chevron-down"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="cat-body" id="cat-{{ $catSlug }}">
                                    <div class="row g-4">
                                        @foreach ($docs as $document)
                                            @php
                                                $isDone  = in_array($document->id, $userDocIds);
                                                
                                                // Separate File and Video logic
                                                $fileUrl = null;
                                                $isImage = false;
                                                $downloadUrl = null;
                                                
                                                if ($document->document) {
                                                    $fileUrl = asset('images/documents/' . $document->document);
                                                    $downloadUrl = $fileUrl;
                                                    $fileExt = strtolower(pathinfo($document->document, PATHINFO_EXTENSION));
                                                    if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                                                        $isImage = true;
                                                    }
                                                }

                                                $videoUrl = !empty($document->link) ? $document->link : null;
                                                
                                                // Icon priority: Video > Image > PDF
                                                $fileIcon = $videoUrl ? 'fa-play-circle text-danger' : ($isImage ? 'fa-file-image text-primary' : 'fa-file-pdf text-info');
                                            @endphp

                                            <div class="col-md-6 col-xl-4">
                                                <div class="doc-card {{ $isDone ? 'is-completed' : '' }}" data-cat="{{ $catSlug }}">
                                                    <div class="doc-card-body">
                                                        <div class="doc-card-header">
                                                            <i class="fas {{ $fileIcon }} doc-icon"></i>
                                                            <input type="checkbox" class="form-check-input doc-checkbox" value="{{ $document->id }}" @checked($isDone) />
                                                        </div>
                                                        <h6 class="doc-title">{{ $document->title }}</h6>
                                                        
                                                        <div class="doc-actions">
                                                            @if($fileUrl)
                                                            <button type="button" class="btn btn-view-doc open-doc-modal" 
                                                                data-url="{{ $fileUrl }}" 
                                                                data-type="{{ $isImage ? 'image' : 'pdf' }}"
                                                                data-title="{{ $document->title }}">
                                                                <i class="fas fa-eye"></i> View Doc
                                                            </button>
                                                            @endif
                                                            
                                                            @if($videoUrl)
                                                            <button type="button" class="btn btn-video-doc open-video-modal" 
                                                                data-url="{{ $videoUrl }}" 
                                                                data-title="{{ $document->title }}">
                                                                <i class="fab fa-youtube"></i> Watch Video
                                                            </button>
                                                            @endif

                                                            @if($downloadUrl)
                                                            <a href="{{ $downloadUrl }}" download class="btn btn-download-doc" title="Download">
                                                                <i class="fas fa-download"></i>
                                                            </a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </form>

                    {{-- Submit Button --}}
                    <div class="text-end mt-4 mb-5">
                        <button class="btn btn-theme btn-lg px-5" id="submitDocs" type="button">
                            <i class="fas fa-paper-plane"></i> Submit Completed
                        </button>
                    </div>

                </section>

                <section id="notice"        class="content-pane d-none">@include('user.inc.notice')</section>
                <section id="commencement"  class="content-pane d-none">@include('user.inc.commencement')</section>
                <section id="profile"       class="content-pane d-none">@include('user.inc.profile')</section>
                <section id="password"      class="content-pane d-none">@include('user.inc.password')</section>

            </div>
        </main>
    </div>
</div>

{{-- PDF / Image Modal --}}
<div class="modal fade doc-modal" id="docViewerModal" tabindex="-1" aria-labelledby="docViewerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="docViewerModalLabel">Document Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="modalIframe" src="" allowfullscreen style="display:none;"></iframe>
                <img id="modalImage" src="" alt="Document Image" style="display:none;" />
            </div>
        </div>
    </div>
</div>

{{-- YouTube Video Modal --}}
<div class="modal fade doc-modal" id="videoViewerModal" tabindex="-1" aria-labelledby="videoViewerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="videoViewerModalLabel">Video Preview</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <iframe id="videoIframe" src="" allowfullscreen style="width:100%; height:100%; border:0;"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('resources/admin/js/jquery.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
 $(document).ready(function() {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // Sidebar Navigation
    var panes = $('.content-pane');
    $('[data-target]').on('click', function(e) {
        e.preventDefault();
        var name = $(this).data('target');
        panes.addClass('d-none');
        $('#' + name).removeClass('d-none');
        $('.nav-vertical .nav-link').removeClass('active');
        $('.nav-vertical .nav-link[data-target="' + name + '"]').addClass('active');
    });

    // Accordion Toggle
    $('.cat-title-wrapper').on('click', function() {
        $(this).closest('.category-block').toggleClass('collapsed');
    });

    // Onboarding Progress
    var checkboxes = $('.doc-checkbox');
    var fill = $('#segFill');

    function updateProgress() {
        var total = checkboxes.length;
        var checked = checkboxes.filter(':checked').length;
        var pct = total === 0 ? 0 : Math.round((checked / total) * 100);

        fill.css('width', pct + '%');
        $('#progressPercent').text(pct + '%');
        $('#totalCounter').text(checked + ' / ' + total);

        var labels = [[0, 'Not started'], [1, 'Getting started'], [30, 'Making progress'], [70, 'Almost done'], [100, 'Completed']];
        var text = labels[0][1];
        for (var i = labels.length - 1; i >= 0; i--) {
            if (pct >= labels[i][0]) { text = labels[i][1]; break; }
        }
        $('#progressLabel').text(text);
        $('#completedBadge').toggleClass('d-none', pct < 100);

        // Update Card UI
        checkboxes.each(function() {
            var $card = $(this).closest('.doc-card');
            $card.toggleClass('is-completed', $(this).is(':checked'));
        });

        // Per-category badges
        $('.category-block').each(function() {
            var catCheckboxes = $(this).find('.doc-checkbox');
            var catChecked = catCheckboxes.filter(':checked').length;
            var catTotal = catCheckboxes.length;
            var slug = $(this).data('cat');
            var $badge = $('#badge-' + slug);
            $badge.text(catChecked + '/' + catTotal + ' Completed');
            $badge.toggleClass('all-done', catChecked === catTotal && catTotal > 0);
        });
    }

    checkboxes.on('change', updateProgress);

    $('#markAllBtn').on('click', function() {
        var allChecked = checkboxes.filter(':not(:checked)').length === 0;
        checkboxes.prop('checked', !allChecked);
        updateProgress();
    });

    $('#submitDocs').on('click', function(e) {
        e.preventDefault();
        var selectedIds = checkboxes.filter(':checked').map(function() { return $(this).val(); }).get();

        if (selectedIds.length === 0) {
            showMessage('Please select at least one document before submitting.', 'error');
            return;
        }

         $.ajax({
            url: '{{ route("user.submitDocuments") }}',
            type: 'POST',
            data: { document_ids: selectedIds },
            success: function(res) { 
                showMessage(res.message || 'Submission successful!', 'success');
            },
            error: function(xhr) { 
                showMessage(xhr.responseJSON?.message || 'Error submitting documents', 'error');
            }
        });
    });

    // Helper function to display the message
    function showMessage(message, type) {
        var $alertDiv = $('#ajaxMessage');
        $alertDiv.removeClass('d-none alert-success alert-danger')
                .addClass(type === 'success' ? 'alert-success' : 'alert-danger')
                .html(message);
                
        // Scroll to the message so the user sees it
        $('html, body').animate({ scrollTop: $alertDiv.offset().top - 100 }, 500);
        
        // Hide the message after 5 seconds
        setTimeout(function() {
            $alertDiv.addClass('d-none');
        }, 5000);
    }

    // ====== Document Modal Logic (PDF/Image) ======
    var docModal = new bootstrap.Modal(document.getElementById('docViewerModal'));
    
    $('.open-doc-modal').on('click', function() {
        var url = $(this).data('url');
        var type = $(this).data('type');
        var title = $(this).data('title');
        
        var $iframe = $('#modalIframe');
        var $img = $('#modalImage');

        $('#docViewerModalLabel').text(title);
        $iframe.hide().attr('src', '');
        $img.hide().attr('src', '');

        if (!url) {
            showMessage('No document file available.', 'error');
            return;
        }

        if (type === 'image') {
            $img.attr('src', url).show();
        } else { // PDF
            $iframe.attr('src', url + '#toolbar=0').show();
        }
        
        docModal.show();
    });

    document.getElementById('docViewerModal').addEventListener('hidden.bs.modal', function () {
        $('#modalIframe').attr('src', '').hide();
        $('#modalImage').attr('src', '').hide();
    });

    // ====== Video Modal Logic (YouTube) ======
    var videoModal = new bootstrap.Modal(document.getElementById('videoViewerModal'));
    
    $('.open-video-modal').on('click', function() {
        var url = $(this).data('url');
        var title = $(this).data('title');
        
        var $iframe = $('#videoIframe');

        $('#videoViewerModalLabel').text(title);
        $iframe.attr('src', ''); // Clear previous

        if (!url) {
            showMessage('No video link available.', 'error');
            return;
        }

        // Parse YouTube URL
        var videoId = '';
        if (url.indexOf('v=') !== -1) {
            videoId = url.split('v=')[1].split('&')[0];
        } else if (url.indexOf('youtu.be/') !== -1) {
            videoId = url.split('youtu.be/')[1];
        } else {
            videoId = url; // Fallback if it's already an ID or embed link
        }
        
        $iframe.attr('src', 'https://www.youtube.com/embed/' + videoId + '?rel=0&autoplay=1');
        videoModal.show();
    });

    // Stop video playback when modal is closed
    document.getElementById('videoViewerModal').addEventListener('hidden.bs.modal', function () {
        $('#videoIframe').attr('src', '');
    });

    updateProgress();
});
</script>
@endsection