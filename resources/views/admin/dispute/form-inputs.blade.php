@php 
    $editing = isset($dispute);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="" disabled :label="__('crud.admin.disputes.name').' '.__('crud.inputs.name')" value="{{ ($editing && $dispute->dispute_name ? $dispute->dispute_name : '-') }}"></x-inputs.text>

    <x-inputs.text name="" disabled :label="__('crud.admin.disputes.title')" value="{{ ($editing && $dispute->dispute_title ? $dispute->dispute_title : '-') }}"></x-inputs.text>

    <x-inputs.text name="" disabled :label="__('crud.inputs.from')" value="{{ ($editing ? $dispute->dispute_type: '') }}"></x-inputs.text>

    <x-inputs.text name="" disabled :label="__('crud.admin.users.name').' '.__('crud.inputs.name')" value="{{ ($editing ? $dispute->user->name : '') }}"></x-inputs.text>

    <x-inputs.select disabled :label="__('crud.inputs.status')" name="" id="status">
        <option {{ ($editing ? $dispute->status : '') == "open" ? "selected" : '' }} value="0">Active</option>
        <option {{ ($editing ? $dispute->status : '') == "closed" ? "selected" : '' }} value="1">Resolved</option>
    </x-inputs.select>
    
    <x-inputs.number name="" step=".01" :label="__('crud.inputs.refund_amount')" value="{{ $dispute->refund_amount ? $dispute->refund_amount : '0' }}"></x-inputs.number>

    {{-- <x-inputs.textarea space="w-full" :label="__('crud.inputs.message')" name="message" disabled>{{ ($editing && $dispute->comment ? $dispute->comment : '-') }}</x-inputs.textarea> --}}

    @if ($editing && $dispute->status == 'closed')
        <x-inputs.textarea space="w-full" :label="__('crud.admin.disputes.response')" name="response" disabled>
            {{ $dispute->comments }}
        </x-inputs.textarea>
    @elseif($editing && $dispute->status == 'open')
        <x-inputs.textarea space="w-full" :label="__('crud.admin.disputes.response')" name="response"></x-inputs.textarea>
    @endif
</div>