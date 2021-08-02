@extends('layout.app')

@section('title')
{{ __('crud.general.privacy_policy') }}
@endsection

@section('content')
<section class="relative bg-indigo-700 overflow-hidden">
    <div class="container px-4 mx-auto">
        <div class="mx-auto mt-10 lg:mb-16 max-w-md pb-10">
            <div class="max-w-2xl lg:max-w-md mb-6 text-white text-4xl">
                <h2 class="text-4xl lg:text-5xl font-bold font-heading">{{ __('crud.general.privacy_policy') }}</h2>
            </div>
        </div>
    </div>
</section>
<section class="py-20">
    <div class="container px-4 mx-auto">
        <div class="max-w-2xl mx-auto">
            {!! getPrivacy() !!}
        </div>
    </div>
</section>
@endsection