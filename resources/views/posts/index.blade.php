{{-- use AppLayout Component located in app\View\Component\AppLayout.php wich use resources\views\layouts\app.blade.php view--}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Page' }}
                
            </h2>
            <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">ADD</a>
            
        </div>
    </x-slot>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Select the alert element
            let alert = document.querySelector('.alert');

            // Check if the alert exists and then set it to disappear after 5 seconds
            if (alert) {
                setTimeout(function() {
                    alert.style.display = 'none';
                }, 5000); // 5000 milliseconds = 5 seconds
            }
        });
    </script>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="border-collapse table-auto w-full text-sm">
                        <thead>
                            <tr>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Title</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Created At</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Updated At</th>
                                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-slate-400 text-left">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- populate our post data --}}
                            @foreach ($posts as $post)       
                                <tr>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $post->title }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $post->created_at }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $post->updated_at }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                        <a href="{{ route('posts.show', $post->id) }}" class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">SHOW</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>
                                        {{-- add delete button using form tag --}}
                                        <form method="post" action="{{ route('posts.destroy', $post->id) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="border border-red-500 hover:bg-red-500 hover:text-white px-4 py-2 rounded-md">DELETE</button>
                                        </form>
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