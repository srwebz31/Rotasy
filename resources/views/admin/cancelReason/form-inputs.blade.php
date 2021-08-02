@php 
$editing = isset($cancelReason);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="reason" :label="__('crud.admin.cancelReasons.name')" value="{{ old('reason', ($editing ? $cancelReason->reason : '')) }}"></x-inputs.text>

    <x-inputs.select name="for" label="{{ __('crud.inputs.for') }}">
        <option {{ ($editing && $cancelReason->for == "user") ? 'selected' : '' }} value="user">User</option>
        <option {{ ($editing && $cancelReason->for == "provider") ? 'selected' : '' }} value="provider">Provider</option>
    </x-inputs.select>

    <x-inputs.status :status="$editing ? $cancelReason->status : ''"></x-inputs.status>
</div>