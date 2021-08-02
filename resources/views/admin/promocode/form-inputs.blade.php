@php 
    $editing = isset($promocode);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.text name="promo_code" space="mb:w-full" :label="__('crud.admin.promocodes.name')" value="{{ old('promo_code', ($editing ? $promocode->promo_code : '')) }}"></x-inputs.text>
    
    <x-inputs.number name="percentage" step=".01" :label="__('crud.inputs.percentage')" value="{{ old('percentage', ($editing ? $promocode->percentage : '')) }}"></x-inputs.number>
    
    <x-inputs.number name="max_amount" step=".01" :label="__('crud.inputs.max_amount')" value="{{ old('max_amount', ($editing ? $promocode->max_amount : '')) }}"></x-inputs.number>

    <x-inputs.textarea space="w-full" :label="__('crud.inputs.description')" name="promo_description" placeholder="Promocode Description (max 255 characters)">{{ old('promo_description', ($editing ? $promocode->promo_description : '')) }}</x-inputs.textarea>

    <x-inputs.datetime name="expiration" :label="__('crud.inputs.expiry_date')" value="{{ old('expiration', ($editing ? $promocode->expiration->format('Y-m-d\TH:i:s') : '')) }}"></x-inputs.datetime>
    
    <x-inputs.status status="{{ old('status', ($editing ? $promocode->status : '')) }}"></x-inputs.status>
</div>