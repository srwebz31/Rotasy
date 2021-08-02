@php 
    $editing = isset($faq);
@endphp

<div class="flex flex-wrap -mx-4 -mb-4 md:mb-0">
    <x-inputs.textarea space="w-full" :label="__('crud.inputs.question')" name="question" placeholder="Question">{{ old('question', ($editing ? $faq->question : '')) }}</x-inputs.textarea>
    <x-inputs.textarea space="w-full" :label="__('crud.inputs.answer')" name="answer" placeholder="answer">{{ old('answer', ($editing ? $faq->answer : '')) }}</x-inputs.textarea>
    <x-inputs.status status="{{ old('status', ($editing ? $faq->status : '')) }}"></x-inputs.status>
</div>