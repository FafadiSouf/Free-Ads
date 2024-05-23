<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-black">Création d'une nouvelle annonce</h1>
    </x-slot>

    <div class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 flex justify-center items-center h-screen">
        <div class="max-w-md w-full p-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
            <!-- Affichage du message de succès -->
            @if (session()->has('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('annonces.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <!-- LE TITRE -->
                <div class="mb-4">
                    <label for="titre" class="block text-white">Titre :</label>
                    <input type="text" name="titre" id="titre" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- LA DESCRIPTION -->
                <div class="mb-4">
                    <label for="description" class="block text-white">Description :</label>
                    <textarea name="description" id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"></textarea>
                </div>

                <!-- LA PHOTOGRAPHIE -->
                <div class="mb-4">
                    <label for="photographie" class="block text-white">Photographie :</label>
                    <input type="file" accept="image/png, image/jpeg" name="photographie" id="photographie" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- LE PRIX  -->
                <div class="mb-4">
                    <label for="prix" class="block text-white">Prix :</label>
                    <input type="text" name="prix" id="prix" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- BOUTON ENVOYER -->
                <button type="submit" class="w-full px-4 py-2 text-white bg-blue-400 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Créer l'annonce</button>
            </form>
        </div>
    </div>
</x-app-layout>
