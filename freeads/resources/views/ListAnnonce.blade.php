<x-app-layout>
    <x-slot name="header">
        <h1 class="text-3xl font-bold tracking-tight text-white text-center mx-auto sm:text-4xl">Liste des annonces</h1>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        @if ($annonces->count() > 0)
        <ul>
            @foreach ($annonces as $annonce)
            <li class="mb-4">
                <h2 class="text-xl font-semibold text-blue-500">{{ $annonce->titre }}</h2>
                <p class="text-gray-400">{{ $annonce->description }}</p>
                <p class="text-gray-400">Prix : {{ $annonce->prix }}</p>
            </li>
            @endforeach
        </ul>
        @else
        <p class="text-center text-gray-400">Aucune annonce disponible pour le moment.</p>
        @endif
    </div>
</x-app-layout>