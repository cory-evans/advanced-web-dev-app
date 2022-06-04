<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-2">
        <h1 class="mt-4 border-b border-black text-2xl">User Details</h1>
        <div class="grid grid-cols-2 max-w-md">
            <span>Name</span>
            <span>{{ $user->name }}</span>

            <span>Email</span>
            <span>{{ $user->email }}</span>

            <span>Is Admin</span>
            <span>{{ $user->isAdmin() ? 'Yes' : 'No' }}</span>
        </div>

        <h1 class="mt-4 border-b border-black text-2xl">Forum Posts</h1>
        <ul>
            @foreach ($user->forumPost as $post)
            <li>
                <a href="{{ route('forum.post.show', ['forumPost' => $post]) }}"
                    class="{{ $loop->even ? 'bg-gray-100' : '' }} hover:bg-blue-500 hover:text-white block w-full px-1"
                >
                    {{ $post->title }}
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</x-admin-layout>
