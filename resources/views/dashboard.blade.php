<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('show_notification'))
            <div id="notification" class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
            @endif
        </div>
    </div>

    <script>
        // Hapus status notifikasi dari sesi setelah 1 detik
        setTimeout(function() {
            document.getElementById('notification').style.display = 'none';
            // Menghapus status notifikasi dari sesi
            fetch('/clear-notification');
        }, 1000); // 1000 milliseconds = 1 detik
    </script>
</x-app-layout>
