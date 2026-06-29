<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Role Management
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">

                    {{-- Flash Messages --}}
                    @if(session('success'))
                        <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                            {{ session('error') }}
                        </div>
                    @endif

                    {{-- Tombol Tambah Role --}}
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold">Daftar Role</h3>
                        <a href="{{ route('admin.roles.create') }}"
                           class="bg-blue-600 text-black px-4 py-2 border border-black rounded hover:bg-blue-700">
                            + Add Role
                        </a>
                    </div>

                    <table class="w-full text-sm text-left">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="p-3">No</th>
                                <th class="p-3">Role Name</th>
                                <th class="p-3">Permissions</th>
                                <th class="p-3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $index => $role)
                            <tr class="border-b">
                                <td class="p-3">{{ $index + 1 }}</td>
                                <td class="p-3 font-medium">{{ $role->name }}</td>
                                <td class="p-3">
                                    <span class="px-2 py-1 bg-purple-100 text-purple-800 rounded text-xs">
                                        {{ $role->permissions_count }} permission
                                    </span>
                                </td>
                                <td class="p-3 flex gap-2">
                                    <a href="{{ route('admin.roles.edit', $role) }}"
                                       class="text-blue-600 hover:underline">Edit</a>

                                    @if($role->name !== 'admin')
                                    <form action="{{ route('admin.roles.destroy', $role) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus role {{ $role->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">
                                            Hapus
                                        </button>
                                    </form>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
