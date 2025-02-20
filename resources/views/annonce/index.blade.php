<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    </head>
    <body class="bg-gray-100 p-6">
        <div class="container mx-auto">
            <div class="flex justify-center">
                <div class="w-full md:w-3/4 lg:w-3/4 xl:w-4/5">
                    @if(session('status'))
                    <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded">
                        {{ session('status') }}
                    </div>
                    @endif

                    <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                            <h4 class="text-xl font-semibold">Annonce List</h4>
                            <a href="{{ url('annonce/create') }}" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">
                                Add Annonce
                            </a>
                        </div>
                        <div class="mt-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach ($annonces as $annonce)
                            <div class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
                                <img src="{{ $annonce->image }}" alt="Annonce Image" class="w-full h-48 object-cover">
                                <div class="p-4">
                                    <h5 class="text-lg font-bold text-gray-900">{{ $annonce->titre }}</h5>
                                    <p class="text-gray-700 mt-2">{{ $annonce->description }}</p>
                                    <p class="text-gray-900 font-semibold mt-2">Prix: {{ $annonce->prix }}€</p>
                                    <div class="mt-4 flex justify-between">
                                        <a href="{{ route('annonce.show', $annonce->id) }}" class="px-3 py-1 bg-green-500 text-white text-xs rounded hover:bg-green-700">Show</a>
                                        <a href="{{ route('annonce.edit', $annonce->id) }}" class="px-3 py-1 bg-blue-500 text-white text-xs rounded hover:bg-blue-700">Edit</a>
                                        <form action="{{ route('annonce.destroy', $annonce->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white text-xs rounded hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            {{ $annonces->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
