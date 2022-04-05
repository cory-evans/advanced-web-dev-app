<div class="flex w-full items-center justify-between">
    @if ($page > 1)
    <a
        href="{{ route('forum', ['page' => $page-1]) }}"
        >
        Previous
    </a>
    @else
    <span class="text-transparent">Previous</span>
    @endif

    <span>
        {{ $page }}
    </span>

    <a
        href="{{ route('forum', ['page' => $page+1]) }}"
    >
        Next
    </a>
</div>
