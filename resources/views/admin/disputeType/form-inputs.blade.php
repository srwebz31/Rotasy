@php 
    $editing = isset($disputeType);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="name" :label="__('crud.admin.disputes.type.name')" value="{{ old('name', ($editing ? $disputeType->name : '')) }}"></x-inputs.text>

    <x-inputs.select :label="__('crud.admin.disputes.type.name').' '.__('crud.inputs.for')" name="for">
        <option {{ old('for', ($editing ? $disputeType->for : '')) == "user" ? "selected" : '' }} value="user">User</option>
        <option {{ old('for', ($editing ? $disputeType->for : '')) == "agent" ? "selected" : '' }} value="agent">Agent</option>
        <option {{ old('for', ($editing ? $disputeType->for : '')) == "provider" ? "selected" : '' }} value="provider">Provider</option>
    </x-inputs.select>

    <x-inputs.status status="{{ old('status', ($editing ? $disputeType->status : '')) }}"></x-inputs.status>
</div>