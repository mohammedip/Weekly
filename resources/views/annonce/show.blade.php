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
                            <h4 class="text-xl font-semibold">Annonce Details</h4>
                            <a href="{{ url('annonce') }}" class="bg-blue-500 text-white font-medium py-2 px-4 rounded hover:bg-blue-600 transition">
                                Back home
                            </a>
                        </div>
                        <div class="p-4">
                           
                                <div class="mb-3">
                                    <p>
                                    Titre : {{$annonces->titre}}
                                    </p>
                               </div>
                                <div class="mb-3">
                                    <p>
                                    Description : {{$annonces->description}}
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <p>
                                    Prix : {{$annonces->prix}}
                                    </p>
                               </div>
                                <div class="mb-3">
                                    <img src="{{ $annonces->image }}" alt="Annonce Image" class="w-full h-48 object-cover">
                                </div>
                                <div class="mb-3">
                                    <p>
                                    User : {{$annonces->user_id}}
                                    </p>
                               </div>
                                <div class="mb-3">
                                    <p>
                                    Categorie : {{$annonces->categorie_id}}
                                    </p>
                                </div>
                                <div class="mb-3">
                                    <p>
                                    Status : {{$annonces->status}}
                                    </p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
