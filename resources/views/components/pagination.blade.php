<nav class="flex items-center justify-between border-t border-gray-200 bg-white px-4 py-3 sm:px-6" aria-label="Pagination">
    <div class="hidden sm:block">
        <p class="text-sm text-gray-700">
            {{ __('pagination.showing', [
                'first' => $data->firstItem(),
                'last' => $data->lastItem(),
                'total' => $data->total(),
            ]) }}
        </p>
    </div>
    <div class="flex flex-1 justify-between sm:justify-end">
        @if (!$data->onFirstPage())
            <a href="{{ $data->previousPageUrl() }}" class="relative inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">
                {{ __('pagination.previous') }}
            </a>
        @endif
        @if ($data->hasMorePages())
            <a href="{{$data->nextPageUrl() }}" class="relative ml-3 inline-flex items-center rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus-visible:outline-offset-0">
                {{ __('pagination.next') }}
            </a>
        @endif
    </div>
</nav>
