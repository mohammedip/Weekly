<x-app-layout>
    <div class="container mx-auto mt-10">
        <div class="flex justify-center">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <div class="bg-white border border-gray-900 shadow-lg rounded-lg p-6">
                    <div class="flex justify-between items-center border-b border-gray-800 pb-3">
                        <h4 class="text-xl font-semibold">Annonce Details</h4>
                        <a href="{{ url('annonce') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                            Back home
                        </a>
                    </div>

                    <div class="p-4">
                        <div class="mb-3">
                            <p><strong>Titre :</strong> {{ $annonce->titre }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Description :</strong> {{ $annonce->description }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Prix :</strong> {{ $annonce->prix }}€</p>
                        </div>
                        <div class="mb-3">
                            <img src="{{ $annonce->image }}" alt="Annonce Image" class="w-full h-48 object-cover">
                        </div>
                        <div class="mb-3">
                            <p><strong>Posté par :</strong> {{ $annonce->user->name }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Categorie :</strong> {{ $annonce->categorie->nom }}</p>
                        </div>
                        <div class="mb-3">
                            <p><strong>Status :</strong> {{ $annonce->status }}</p>
                        </div>
                    </div>

                    <!-- Section Commentaires -->
                    <div class="p-6 border-t border-gray-300 mt-4">
                        <h4 class="text-lg font-semibold mb-3">Commentaires</h4>

                        <!-- Formulaire pour ajouter un commentaire -->
                        <form action="{{ route('comment.store') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="annonce_id" value="{{ $annonce->id }}">
                            <input type="hidden" name="user_id" value="{{ $annonce->user->id }}">
                            <textarea name="contenu" rows="2" class="w-full p-2 border border-gray-300 rounded" placeholder="Ajouter un commentaire..." required></textarea>
                            @error('contenu') <span class="text-red-500">{{$message}}</span> @enderror
                            <button type="submit" class="mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Commenter</button>
                        </form>

                          <!-- Affichage des commentaires -->
                            @foreach($annonce->commentaires as $commentaire)
                                <div class="mb-3 mt-3 p-3 border border-gray-300 rounded bg-gray-100 flex justify-between items-start">
                                    <div>
                                        <p class="text-gray-800"><strong>{{ $commentaire->user->name }} :</strong> {{ $commentaire->contenu }}</p>
                                        <p class="text-gray-500 text-sm">{{ $commentaire->created_at->format('d/m/Y H:i') }}</p>
                                    </div>

                                    @if(auth()->id() == $commentaire->user_id )
                                        <!-- Formulaire de suppression -->
                                        <form action="{{ route('comment.destroy', $commentaire->id) }}" method="POST" class="ml-3">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 bg-red-500 text-white text-sm rounded hover:bg-red-700">
                                                Supprimer
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @endforeach

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
