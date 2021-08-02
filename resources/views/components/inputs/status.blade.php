@props([
'space' => null,
'status' => null,
'label' => null,
'name' => null,
])
<x-inputs.select :label="$label ?? __('crud.inputs.status')" name="{{ $name ?? 'status' }}" :space="$space" id="status">
    <option {{ $status == "1" ? "selected" : '' }} value="1">Enabled</option>
    <option {{ $status == "0" ? "selected" : '' }} value="0">Disabled</option>
</x-inputs.select>