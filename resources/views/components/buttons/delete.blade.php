@props(['link'])
<form action="{{ $link }}" method="POST"
    onsubmit="return confirm('{{ __('crud.general.confirm') }}')">
    @method('DELETE')
    @csrf
    <button type="submit" href="" class="bg-red-400 text-white rounded-full flex w-8 h-8 justify-center items-center hover:bg-red-500 mx-1">
        <i class="fa fa-trash"></i>
    </button>
</form>