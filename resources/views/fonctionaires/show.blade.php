@extends('layouts.main')

@section('title', 'Détails du Fonctionnaire')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Header -->
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Détails du Fonctionnaire
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Nom -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Nom
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $fonctionnaire->nom }}</p>
                    </div>

                    <!-- Prénom -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Prénom
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $fonctionnaire->prenom }}</p>
                    </div>

                    <!-- Téléphone -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Téléphone
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $fonctionnaire->telephone }}</p>
                    </div>

                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Email
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $fonctionnaire->email }}</p>
                    </div>

                    <!-- Département -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Département
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $fonctionnaire->departement->name }}</p>
                    </div>

                    <!-- Date de création -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Date de création
                        </label>
                        <p class="mt-1 text-gray-900 dark:text-gray-100">{{ $fonctionnaire->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end space-x-3 mt-6">
                    <a href="{{ route('fonctionaires.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md shadow-sm transition-colors">
                        Retour
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
