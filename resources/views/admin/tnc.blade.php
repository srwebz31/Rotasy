@extends('admin.layout.app')

@section('title')
    @if($page == 'tnc')
        {{ __('crud.general.tnc') }}
    @else
        {{ __('crud.general.privacy_policy') }}
    @endif
@endsection

@section('content')
    <div class="row">
        <style>
            .tox-statusbar__branding, .tox-statusbar__path {
                display: none !important;
            }
        </style>
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow h-100 dark:bg-gray-700 dark:text-gray-300">
                <form action="{{ $page == 'tnc' ? route('admin.settings.saveTnc') : route('admin.settings.savePrivacy') }}" method="post">
                    <div class="dark:bg-gray-700 dark:text-gray-300 px-4 py-2" style="border-bottom: 1px solid rgba(0, 0, 0, 0.125);">
                        <h6 class="mb-0 dark:bg-gray-700 dark:text-gray-300">
                            @if($page == 'tnc')
                                {{ __('crud.general.tnc') }}
                            @else
                                {{ __('crud.general.privacy_policy') }}
                            @endif
                        </h6>
                    </div>
                    <div class="card-body p-0">
                        <textarea id="ckeditor" class="dark:bg-gray-700 dark:text-gray-300" placeholder="Enter terms And Conditions Here." style="height: 50vh; width: 100%; border: 0px; outline: 0px; padding: 10px 17px;" name="tnc">{{  $page == 'tnc' ? getTNC() ?? '' : getPrivacy() ?? '' }}</textarea>
                        @csrf
                    </div>
                    <div class="flex justify-end" style="padding: 0.75rem 1.25rem; border-top: 1px solid rgba(0, 0, 0, 0.125);">
                        <button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">{{ __('crud.general.update') }} {{ $page == 'tnc' ? __('crud.general.tnc') : __('crud.general.privacy_policy') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .cke_chrome {
            border: 0px !important;
        }
    </style>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'tnc' );
    </script>
@endsection