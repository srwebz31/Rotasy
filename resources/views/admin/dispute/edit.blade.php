@extends('admin.layout.app')

@section('title')
    Admin - {{ __('crud.admin.disputes.type.update') }}
@endsection

@section('heading')
    {{ __('crud.admin.disputes.type.update') }}
@endsection

@section('content')
    <div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
        <div class="w-full px-5 py-5">
            <x-form action="{{ route('admin.dispute.update', $dispute) }}" method="put" has-file>
                @include('admin.dispute.form-inputs')

                <div class="flex justify-end">
                    <a href="{{ route('admin.request.detail', $dispute->request_id) }}" class="right-0 inline-block py-1 px-4 leading-loose bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">View Request</a>
                    
                    @if($dispute->status == 'open')
                    
                        <button type="submit" class="ml-3 right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm" type="submit">Submit</button>
                    @endif
                </div>
            </x-form>
        </div>
    </div>
@endsection