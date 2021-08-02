@props([
    'name',
    'label',
    'value' => null,
    'space' => NULL,
])

{{-- <div class="w-full px-4 mb-4 md:mb-0">
    <div class="mb-6">
        <x-inputs.basic type="password" :name="$name" label="{{ $label ?? ''}}" value="{{$value}}" :attributes="$attributes"></x-inputs.basic>
    </div>
</div> --}}
<div class="w-full px-4 mb-4 md:mb-0 {{ $space ? $space : "md:w-1/2" }}" x-data="{ show: true }">
    <div class="mb-6 realtive">
        <div class="pb-2">
            @if($label ?? null)
                @include('components.inputs.partials.label')
            @endif
            <div class="relative">
                <input :type="show ? 'password' : 'text'" class="dark:bg-gray-700 dark:text-gray-300 text-md block rounded w-full appearance-none p-4 text-xs font-semibold leading-none bg-gray-50 outline-none" name="{{$name}}" value="{{ $value }}" placeholder="{{$label}}">
                <div class="absolute inset-y-0 right-0 px-3 flex items-center text-sm leading-5 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">
                    <span :class="{'hidden': !show, 'block':show }" class="cursor-pointer" @click="show = !show">
                        <i class="fa fa-eye-slash"></i>
                    </span>
                    <span :class="{'block': !show, 'hidden':show }" class="cursor-pointer" @click="show = !show">
                        <i class="fa fa-eye"></i>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>