@props([
    'addBtnRoute' => '#',
    'addBtnText',
    'showCreate' => true,
    'showSearch' => true,
])
<div class="grid grid-cols-3 gap-4 justify-between">
    @if($showSearch)
        <div class="col-span-2">
            <form>
                <div class="relative text-gray-500 mb-5">
                    <input class="block rounded-l border border-gray-200 w-full pr-20 mt-1 text-sm text-black dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:outline-none dark:focus:shadow-outline-gray" placeholder="Enter Search Value" style="padding: 8px;" name="search" value="{{ request()->has('search') ? request()->get('search') : '' }}">
                    <button class="absolute inset-y-0 right-0 px-4 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-r-md active:bg-purple-600 hover:bg-purple-700 focus:outline-none">
                        {{ __('crud.general.search') }}
                    </button>
                </div>
            </form>
        </div>
    @endif
    <div class="col-span-1 mb-5"style="display: flex; align-items: flex-end; justify-content: flex-end;">
        @if($showCreate)
            <a href="{{ $addBtnRoute }}" class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                <i class="fa fa-plus"></i> {{ $addBtnText }}
            </a>
        @endif
    </div>
</div>