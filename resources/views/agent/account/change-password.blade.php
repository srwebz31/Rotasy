@extends('agent.layout.app')

@section('title', 'Change Password ')

@section('headings', 'Change Password')

@section('content')
<div class="w-full rounded-lg shadow-xs bg-white dark:text-gray-400 dark:bg-gray-800 mb-5">
	<div class="w-full px-5 py-5">

		<form class="form-horizontal" action="{{route('agent.password.update')}}" method="POST" role="form">
			<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">

				<x-inputs.password name="old_password" :label="__('crud.inputs.old_password')" value=""></x-inputs.password>

				<x-inputs.password name="password" :label="__('crud.inputs.new_password')" value=""></x-inputs.password>
				
				<x-inputs.password name="password_confirmation" :label="__('crud.inputs.password_confirmation')" value=""></x-inputs.password>

				{{csrf_field()}}

				<div class="flex w-full justify-end px-4">
					<button type="submit" class="right-0 inline-block py-1 px-4 leading-loose bg-green-500 hover:bg-green-600 text-white font-semibold rounded-lg transition duration-200 text-sm">@lang('crud.general.change_password')</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection