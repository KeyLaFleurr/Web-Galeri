@section('content')

<x-app-layout>
    
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ 'Page' }}
            </h2>
            <div class="flex">
                <a href="{{ route('posts.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">ADD</a>
                <form method="post" action="{{ route('posts.deleteAll') }}" class="ml-1">
                    @csrf
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md">RESET</button>
                </form>
            </div>
        </div>
    </x-slot>
    
    

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('notif.success'))
            <div class="container mt-5">

                    <div id="successAlert" class="rounded-md bg-green-50 p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM4 10a6 6 0 1112 0 6 6 0 01-12 0zm5.293-1.707a1 1 0 10-1.414 1.414l3 3a1 1 0 001.414 0l7-7a1 1 0 10-1.414-1.414L12 10.586l-1.293-1.293z" clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-green-800">
                                    {{ session('notif.success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                @yield('content')
            </div>
            
            <div class="max-w-screen-xl mx-auto">
                
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

                            @foreach ($posts as $post)       
                                <tr>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $post->title }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $post->created_at }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">{{ $post->updated_at }}</td>
                                    <td class="border-b border-slate-100 p-4 pl-8 text-slate-500">
                                        <a href="{{ route('posts.show', $post->id) }}" class="border border-blue-500 hover:bg-blue-500 hover:text-white px-4 py-2 rounded-md">SHOW</a>
                                        <a href="{{ route('posts.edit', $post->id) }}" class="border border-yellow-500 hover:bg-yellow-500 hover:text-white px-4 py-2 rounded-md">EDIT</a>

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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#successAlert').fadeOut('slow');
            }, 2000);
        });
    </script>
</x-app-layout>
