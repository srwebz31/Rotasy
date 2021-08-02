@extends('admin.layout.app')

@push('startScripts')
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
@endpush

@section('title')
Admin - {{ __('crud.navlinks.setting') }}
@endsection

@section('heading')
{{ __('crud.navlinks.setting') }}
@endsection

@section('content')
{{-- Tabs Starting --}}
@livewire('admin.setting')
{{-- Tabs Ending --}}
@endsection