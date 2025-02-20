<x-app-layout>
    <div class="container mx-auto mt-10 ">
        <div class="flex justify-center">
            <div class="w-full lg:w-3/4">
                @if(session('status'))
                <div class="bg-green-100 text-green-800 border border-green-300 p-4 rounded">
                    {{ session('status') }}
                </div>
                @endif

                <div class="bg-white border border-gray-300 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-300 pb-3">
                        <h4 class="text-xl font-semibold">Liste des Annonces</h4>
                        <div class="space-x-3">
                        
                            <a href="{{ url('annonce/create') }}" class="bg-green-500 text-white font-medium py-2 px-4 rounded hover:bg-green-600 transition">
                                Ajouter une Annonce
                            </a>
                        </div>
                    </div>

                    <div class="mt-4 space-y-6">
                        @foreach ($annonces as $annonce)
                        <div class="bg-white border border-gray-300 rounded-lg shadow-md overflow-hidden">
                            <div class="flex flex-col md:flex-row">
                                <!-- Image -->
                                <div class="md:w-1/3">
                                    <img src="{{ $annonce->image }}" alt="Annonce Image" class="w-full h-60 object-cover">
                                </div>

                                <!-- Infos Annonce -->
                                <div class="md:w-2/3 p-6">
                                    <h5 class="text-2xl font-bold text-gray-900">{{ $annonce->titre }}</h5>
                                    <p class="text-gray-700 mt-2">{{ $annonce->description }}</p>
                                    <p class="text-gray-900 font-semibold mt-2">Prix: {{ $annonce->prix }}€</p>
                                    <p class="text-gray-600 text-sm mt-2">Posté par <strong>{{ $annonce->user->name }}</strong></p>
                                    <p class="text-gray-600 text-sm mt-2">Category <strong>{{ $annonce->categorie->nom }}</strong></p>
                                    <div class="mt-4 flex space-x-3">
                                        <a href="{{ route('annonce.show', $annonce->id) }}" class="px-4 py-2 bg-green-500 text-white text-sm rounded hover:bg-green-700">Voir</a>
                                        @if(auth()->id() == $annonce->user->id )
                                        <a href="{{ route('annonce.edit', $annonce->id) }}" class="px-4 py-2 bg-blue-500 text-white text-sm rounded hover:bg-blue-700">Modifier</a>
                                        <form action="{{ route('annonce.destroy', $annonce->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-4 py-2 bg-red-500 text-white text-sm rounded hover:bg-red-700">Supprimer</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>

                           
                        </div>
                        @endforeach
                    </div>

                    <div class="mt-4">
                    {{$annonces->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
