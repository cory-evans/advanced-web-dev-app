<x-admin-layout>
    <div class="bg-white overflow-hidden shadow-sm rounded sm:rounded-lg p-2">

        {{ $users->links() }}

        <table class="w-full">
            <thead>
                <th class="text-right">ID</th>
                <th class="text-left">NAME</th>
                <th class="text-left">EMAIL</th>
                <th>Email Verified</th>
            </thead>

            <tbody>
            @foreach ($users->items() as $user)
            <tr class="{{ $loop->even ? 'bg-gray-100' : '' }} cursor-pointer hover:bg-blue-500 hover:text-white py-1"
                role="link"
                data-href="{{ route('admin.users.show', ['user' => $user]) }}"
                onclick="window.open(`{{ route('admin.users.show', ['user' => $user]) }}`, '_self')"
            >
                <td class="text-right px-1">{{ $user->id }}</td>
                <td class="px-1">{{ $user->name }}</td>
                <td class="px-1">{{ $user->email }}</td>
                <td class="text-center">
                    @if ($user->email_verified_at)
                    YES
                    @else
                    No
                    @endif
                </td>
                <td class="mr-0 ml-auto">
                    <x-icons.chevron-right class="h-[1em]"/>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $users->links() }}
    </div>
</x-admin-layout>
