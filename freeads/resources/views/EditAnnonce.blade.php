<x-app-layout>
    <x-slot name="header">
        <h1 class="text-center text-white">Modifier une annonce</h1>
    </x-slot>

    <div class="container mx-auto">
        <form action="{{ route('annonces.update', $annonce->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Le titre -->
            <div class="mb-4">
                <label for="titre" class="text-white">Titre :</label>
                <input type="text" name="titre" id="titre" value="{{ $annonce->titre }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- La description -->
            <div class="mb-4">
                <label for="description" class="text-white">Description :</label>
                <textarea name="description" id="description" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">{{ $annonce->description }}</textarea>
            </div>

            <!-- La photographie -->
            <div class="mb-4">
                <label for="photographie" class="text-white">Photographie :</label>
                <input type="file" accept="image/png, image/jpeg" name="photographie" id="photographie" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Le prix -->
            <div class="mb-4">
                <label for="prix" class="text-white">Prix :</label>
                <input type="text" name="prix" id="prix" value="{{ $annonce->prix }}" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            </div>

            <!-- Bouton de soumission -->
            <button type="submit" class="w-full px-4 py-2 text-white bg-blue-400 rounded-md hover:bg-blue-500 focus:outline-none focus:bg-blue-500">Modifier l'annonce</button>
        </form>
    </div>
</x-app-layout>
