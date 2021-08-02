<footer class="py-4 bg-white mt-auto shadow-xs dark:bg-gray-800">
    <div>
        <div class="text-gray-500 text-sm text-center dark:text-gray-100">
            {{ getFooter() ? getFooter() : asset('storage/'.config('constants.site_icon')) }}
        </div>
    </div>
</footer>