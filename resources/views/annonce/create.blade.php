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
                <div class="w-full md:w-3/4 lg:w-1/2">
                    <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                        <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                            <h4 class="text-xl font-semibold">Add Annonce</h4>
                            <a href="{{ url('annonce') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                                Back home
                            </a>
                        </div>
                        <div class="p-4">
                        <form action="{{ route('annonce.store') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="titre">Titre</label>
                                    <input type="text" name="titre" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('titre') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <textarea name="description" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                                    @error('description') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="prix">Prix</label>
                                    <input type="text" name="prix" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('prix') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image">Image URL</label>
                                    <input type="text" name="image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('image') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="user_id">User</label>
                                    <select name="user_id" 
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="" disabled selected>Select a User</option>
                                        @foreach($users as $user)
                                            <option value="{{ $user->id }}">
                                                {{ $user->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('user_id') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="categorie_id">Catégorie</label>
                                    <select name="categorie_id" 
                                        class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                        <option value="" disabled selected>Select a Category</option>
                                        @foreach($categories as $categorie)
                                            <option value="{{ $categorie->id }}">
                                                {{ $categorie->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categorie_id') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <select name="status" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                        <option value="" disabled selected>Select a Status</option>
                                        <option value="actif">Actif</option>
                                        <option value="archive">Archivé</option>
                                    </select>
                                    @error('status') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
