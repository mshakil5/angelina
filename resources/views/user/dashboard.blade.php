@extends('frontend.layouts.master')

@section('content')
<link href="{{ asset('resources/frontend/css/user.css') }}" rel="stylesheet">

@php
    $documents = \App\Models\Document::where('status', 1)->orderBy('sl', 'asc')->get();
    $banner = \App\Models\Banner::where('page', 'User Dashboard')->first();
    $bgImage = $banner && $banner->feature_image
        ? asset('images/banner/' . $banner->feature_image)
        : asset('resources/frontend/images/page-banner2.jpg');
@endphp

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

                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row gy-3">
                                <div class="col-12">
                                    <h5 class="card-title mb-2">Onboarding progress</h5>
                                    <p class="small-muted mb-3">Complete the items below to finish your onboarding. The progress bar updates automatically.</p>

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

                                <div class="col-lg-5">
                                    <div class="mb-2">
                                        <h6 class="mb-2">Required steps</h6>
                                        <form id="stepsForm" class="needs-validation" novalidate>
                                            <div class="list-group">
                                                @foreach ($documents as $document)
                                                    @php
                                                        $userDoc = \App\Models\UserDocumentCompletion::where('user_id', Auth::id())
                                                                    ->where('document_id', $document->id)
                                                                    ->first();
                                                        
                                                        // Determine if we show PDF or Video
                                                        $mediaUrl = $document->link ?? ($document->document ? asset('images/documents/' . $document->document) : null);
                                                        $isVideo = !empty($document->link);
                                                    @endphp

                                                    <label class="list-group-item list-group-item-action d-flex align-items-start gap-3 doc-item" 
                                                           data-url="{{ $mediaUrl }}" 
                                                           data-type="{{ $isVideo ? 'video' : 'pdf' }}">
                                                        <input class="form-check-input mt-1 me-2 doc-checkbox" type="checkbox" 
                                                               value="{{ $document->id }}" @checked($userDoc) data-prevalue="{{ $userDoc }}"
                                                               onclick="event.stopPropagation();" />
                                                        <div>
                                                            <div class="fw-bold text-truncate" style="max-width: 250px;">
                                                                @if($isVideo) <i class="fab fa-youtube text-danger mr-1"></i> @else <i class="fas fa-file-pdf text-info mr-1"></i> @endif
                                                                {{ $document->title }}
                                                            </div>
                                                            <div class="small-muted text-truncate" style="max-width: 250px;">{{ $document->description }}</div>
                                                        </div>
                                                    </label>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mt-3">
                                        <p class="small-muted mb-3">Confirm that you have reviewed all marked documents.</p>
                                        <button class="btn btn-primary btn-sm w-100" id="submitDocs" type="button">Submit completed</button>
                                    </div>
                                </div>

                                {{-- <div class="col-lg-7">
                                    <h6 class="mb-2" id="previewTitle">Preview</h6>
                                    <div class="ratio ratio-4x3 border rounded bg-dark" style="min-height:300px; overflow:hidden;">
                                        <iframe id="pdfViewer" src="" title="Media preview" allowfullscreen style="border:0"></iframe>
                                    </div>
                                    <div id="completedBadge" class="badge bg-success mt-2 d-none w-100 py-2">All onboarding steps complete ✓</div>
                                </div> --}}
                                <div class="col-lg-7">
                                    <div class="d-flex justify-content-between align-items-center mb-2">
                                        <h6 class="mb-0" id="previewTitle">Preview</h6>
                                        <a href="#" id="downloadPdfBtn" class="btn btn-xs btn-outline-primary d-none" download target="_blank">
                                            <i class="fas fa-download mr-1"></i> Download PDF
                                        </a>
                                    </div>
                                    
                                    <div class="ratio ratio-4x3 border rounded bg-dark" style="min-height:300px; overflow:hidden;">
                                        <iframe id="pdfViewer" src="" title="Media preview" allowfullscreen style="border:0"></iframe>
                                    </div>
                                    <div id="completedBadge" class="badge bg-success mt-2 d-none w-100 py-2">All onboarding steps complete ✓</div>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>

                <section id="notice" class="content-pane d-none">@include('user.inc.notice')</section>
                <section id="commencement" class="content-pane d-none">@include('user.inc.commencement')</section>
                <section id="profile" class="content-pane d-none">@include('user.inc.profile')</section>
                <section id="password" class="content-pane d-none">@include('user.inc.password')</section>

            </div>
        </main>
    </div>
</div>
@endsection

@section('script')
<script src="{{ asset('resources/admin/js/jquery.min.js')}}"></script>

<script>
$(document).ready(function() {
    $.ajaxSetup({ headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') } });

    // --- Navigation Logic ---
    const sideLinks = $('[data-target]');
    const panes = $('.content-pane');

    function showPane(name){
        panes.addClass('d-none');
        $(`#${name}`).removeClass('d-none');
        $('.nav-vertical .nav-link').each(function() {
            $(this).toggleClass('active', $(this).data('target') === name);
        });
    }

    sideLinks.on('click', function(e){
        e.preventDefault();
        showPane($(this).data('target'));
    });

    // --- Onboarding Logic ---
    const checkboxes = $('.doc-checkbox');
    const fill = $('#segFill');
    const overlay = $('#segOverlay');

    function updateProgress() {
        const total = checkboxes.length;
        const checked = checkboxes.filter(':checked').length;
        const pct = total === 0 ? 0 : Math.round((checked / total) * 100);
        
        fill.css('width', pct + '%');
        $('#progressPercent').text(pct + '%');

        const labels = { 0: 'Not started', 1: 'Getting started', 30: 'Making progress', 70: 'Almost done', 100: 'Completed' };
        let text = labels[0];
        if(pct > 0) text = labels[1];
        if(pct >= 30) text = labels[30];
        if(pct >= 70) text = labels[70];
        if(pct === 100) text = labels[100];
        
        $('#progressLabel').text(text);
        $('#completedBadge').toggleClass('d-none', pct < 100);
    }

    // --- Media Preview Handler (PDF vs YouTube) ---
    $('.doc-item').on('click', function(e) {
        if ($(e.target).is('input')) return;

        const url = $(this).data('url');
        const type = $(this).data('type');
        const $viewer = $('#pdfViewer');
        
        $('.doc-item').removeClass('bg-light border-primary');
        $(this).addClass('bg-light border-primary');

        if (!url) return;

        if (type === 'video') {
            // Convert standard YouTube link to Embed link
            let videoId = '';
            if (url.includes('v=')) {
                videoId = url.split('v=')[1].split('&')[0];
            } else if (url.includes('youtu.be/')) {
                videoId = url.split('youtu.be/')[1];
            }
            $viewer.attr('src', `https://www.youtube.com/embed/${videoId}?rel=0&autoplay=1`);
            $('#previewTitle').html('<i class="fab fa-youtube text-danger"></i> Video Preview');
        } else {
            // Load PDF
            $viewer.attr('src', url + '#toolbar=0');
            $('#previewTitle').html('<i class="fas fa-file-pdf text-info"></i> Document Preview');
        }
        
        // Mobile scroll
        if ($(window).width() < 992) {
            $viewer[0].scrollIntoView({behavior:'smooth', block:'center'});
        }
    });

    checkboxes.on('change', updateProgress);
    
    $('#markAllBtn').on('click', function(){
        const allChecked = checkboxes.filter(':not(:checked)').length === 0;
        checkboxes.prop('checked', !allChecked);
        updateProgress();
    });

    $('#submitDocs').on('click', function(e){
        e.preventDefault();
        const selectedIds = checkboxes.filter(':checked').map(function(){ return $(this).val(); }).get();
        
        $.ajax({
            url: '{{ route("user.submitDocuments") }}',
            type: 'POST',
            data: { document_ids: selectedIds },
            success: function(res) {
                alert(res.message || 'Submission successful');
            },
            error: function(xhr) {
                alert(xhr.responseJSON?.message || 'Error submitting documents');
            }
        });
    });

    // Initial load
    updateProgress();
    // Load first item into preview if exists
    $('.doc-item').first().trigger('click');
});
</script>
@endsection