@php 
    $editing = isset($role);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="name" space="mb:w-full" :label="__('crud.inputs.name')" value="{{ old('name', ($editing ? $role->name : '')) }}"></x-inputs.text>
</div>

<div class="w-full md:w-full px-4 mb-4 md:mb-0">
    <x-inputs.partials.label name="role" class="text-sm" :label="__('crud.inputs.permission')"></x-inputs.partials.label>
    <div class="mb-6 grid lg:grid-cols-9 sm:grid-cols-6 grid-cols-3 gap-4">
        @foreach ($permissions as $permission)
            <x-inputs.checkbox
                id="permission{{ $permission->id }}"
                name="permissions[]"
                label="{{ ucfirst($permission->name) }}"
                value="{{ $permission->id }}"
                :checked="isset($role) ? $role->hasPermissionTo($permission) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        @endforeach
    </div>
</div>