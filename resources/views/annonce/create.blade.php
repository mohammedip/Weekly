<x-app-layout>
        <div class="container mx-auto mt-10">
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

                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
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
                                    <input type="number" min="0" name="prix" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('prix') <span class="text-red-500">{{$message}}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="image">Image URL</label>
                                    <input type="url" name="image" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required>
                                    @error('image') <span class="text-red-500">{{$message}}</span> @enderror
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
                                    <button type="submit" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
