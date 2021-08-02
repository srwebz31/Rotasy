@extends('admin.layout.app')

@section('title')
{{ __('crud.general.translation') }}
@endsection

@section('content')
<div class="row">
    <style>
        .tox-statusbar__branding,
        .tox-statusbar__path {
            display: none !important;
        }
    </style>
    <div class="col-xl-12 col-md-12 mb-4">
        <div class="card shadow h-100 dark:bg-gray-700 dark:text-gray-300">

            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Translations</h1>
                {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
            </div>

            <!-- Content Row -->
            <div class="row">
                <iframe src="{{url('admin/translations')}}" allowfullscreen
                    style="width: 100%;height: 800px;border:none;" class="embed-responsive-item"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection