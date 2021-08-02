@php 
    $editing = isset($permission);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="name" space="mb:w-full" :label="__('crud.inputs.name')" value="{{ old('name', ($editing ? $permission->name : '')) }}"></x-inputs.text>
</div>

<div class="w-full md:w-full px-4 mb-4 md:mb-0">
    <x-inputs.partials.label name="role" class="text-sm" :label="__('crud.inputs.role')"></x-inputs.partials.label>
    <div class="mb-6 grid lg:grid-cols-9 sm:grid-cols-6 grid-cols-3 gap-4">
        @foreach ($roles as $role)
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($role) ? $role->hasPermissionTo($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        @endforeach
    </div>
</div>