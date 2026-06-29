<x-app-layout>
    <div class="min-h-screen flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl font-bold text-red-500">403</h1>
            <p class="text-xl text-gray-600 mt-4">Akses Ditolak</p>
            <p class="text-gray-500 mt-2">Anda tidak memiliki izin untuk mengakses halaman ini.</p>
            <a href="{{ route('dashboard') }}"
               class="mt-6 inline-block bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                Kembali ke Dashboard
            </a>
        </div>
    </div>
</x-app-layout>
