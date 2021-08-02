@extends('admin.layout.app')

@section('content')
    <!-- Page Heading -->
    {{-- <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Translations</h1>
    </div> --}}

    <!-- Content Row -->
    <div class="row shadow">
        <iframe id="scaled-frame" src="{{url('telescope/requests')}}" allowfullscreen style="width: 100%; height: 500px; border:none; border-radius: 10px;" class="embed-responsive-item smallScroll"></iframe>
    </div>
@endsection