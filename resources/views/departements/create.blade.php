@extends('layouts.main')

@section('title', 'Ajouter un Département')

@section('content')
<div class="py-8">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <!-- Enhanced Header -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-6 mb-8 border border-blue-100">
            <div class="flex items-center">
                <div class="h-12 w-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Ajouter un Département</h1>
                    <p class="text-gray-600 mt-1">Créez un nouveau département pour votre organisation</p>
                </div>
            </div>
        </div>

        <!-- Enhanced Form Card -->
        <div class="bg-white overflow-hidden shadow-lg rounded-lg border border-gray-200">
            <div class="p-8">
                <form action="{{ route('departements.store') }}" method="POST" class="space-y-8">
                    @csrf

                    <!-- Enhanced Form Fields -->
                    <div class="space-y-6">
                        <!-- Nom du département -->
                        <div>
                            <label for="nom" class="block text-sm font-semibold text-gray-900 mb-2">
                                <span class="flex items-center">
                                    <svg class="h-4 w-4 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    Nom du département
                                </span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       name="name"
                                       id="nom"
                                       class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors text-gray-900 placeholder-gray-500"
                                       value="{{ old('name') }}"
                                       placeholder="Ex: Ressources Humaines, Informatique, Comptabilité..."
                                       required>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('name')
                                <div class="mt-2 flex items-center text-red-600">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span class="text-sm">{{ $message }}</span>
                                </div>
                            @enderror
                            <p class="mt-2 text-sm text-gray-500">
                                Donnez un nom clair et descriptif à votre département
                            </p>
                        </div>

                        <!-- Information Section -->
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="h-5 w-5 text-blue-600 mt-0.5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div>
                                    <h4 class="text-sm font-medium text-blue-900">À propos des départements</h4>
                                    <p class="mt-1 text-sm text-blue-700">
                                        Les départements permettent d'organiser vos fonctionnaires et locaux de manière logique.
                                        Vous pourrez ensuite assigner des fonctionnaires et gérer les locaux de chaque département.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Action Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('departements.index') }}"
                           class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-200 shadow-md hover:shadow-lg">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg shadow-md text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Créer le département
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
