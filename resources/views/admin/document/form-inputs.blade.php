@php 
    $editing = isset($document);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="name" :label="__('crud.inputs.name')" value="{{ old('name', ($editing ? $document->name : '')) }}"></x-inputs.text>

    <x-inputs.select :label="__('crud.inputs.type')" name="type">
        <option {{ old('type', ($editing ? $document->type : '')) == "DRIVER" ? 'selected' : '' }} value="DRIVER">Driver</option>
        <option {{ old('type', ($editing ? $document->type : '')) == "VEHICLE" ? 'selected' : '' }} value="VEHICLE">Vehicle</option>
    </x-inputs.select>
    
    <x-inputs.status :label="__('crud.inputs.status')" name="status" status="{{ old('status', ($editing ? $document->status : '')) }}">
    </x-inputs.status>
</div>