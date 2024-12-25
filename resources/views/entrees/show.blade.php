@extends('layouts.main')

@section('title', 'Détails de l\'Entrée')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Header with Status Badge -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                            Détails de l'Entrée #{{ $entree->id }}
                        </h2>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                            Créé le {{ \Carbon\Carbon::parse($entree->created_at)->format('d/m/Y à H:i') }}
                        </p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('entrees.edit', $entree) }}" 
                           class="inline-flex items-center px-4 py-2 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-medium rounded-md shadow-sm transition-colors">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Modifier
                        </a>
                        <form action="{{ route('entrees.destroy', $entree) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entrée ?')"
                                    class="inline-flex items-center px-4 py-2 bg-red-500 hover:bg-red-600 text-white text-sm font-medium rounded-md shadow-sm transition-colors">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Details Cards Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Material Info Card -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                            Information du Matériel
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Matériel:</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ $entree->material->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Type:</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ $entree->material->typeMaterial->name ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Supplier Info Card -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                            Information du Fournisseur
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Nom:</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ $entree->fournisseur->name }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Contact:</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ $entree->fournisseur->telephone ?? 'N/A' }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Transaction Details Card -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                            Détails de la Transaction
                        </h3>
                        <div class="space-y-4">
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Date d'entrée:</span>
                                <span class="text-gray-900 dark:text-white font-medium">
                                    {{ \Carbon\Carbon::parse($entree->date)->format('d/m/Y') }}
                                </span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Quantité:</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ number_format($entree->quantity, 0) }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-500 dark:text-gray-400">Prix Unitaire:</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ number_format($entree->unit_price, 2) }} DH</span>
                            </div>
                        </div>
                    </div>

                    <!-- Total Amount Card -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm p-6">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">
                            Montant Total
                        </h3>
                        <div class="text-center">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">
                                {{ number_format($entree->quantity * $entree->unit_price, 2) }} DH
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-6">
                    <a href="{{ route('entrees.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200 rounded-md hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .card {
        box-shadow: 0 0 15px rgba(0,0,0,0.1);
    }
</style>
@endpush
