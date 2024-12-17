@extends('layouts.main')

@section('title', 'Détails du Matériel')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Status Bar -->
                <div class="mb-6 {{ $material->quantity > 0 ? 'bg-green-50 dark:bg-green-900/50 border-green-500' : 'bg-red-50 dark:bg-red-900/50 border-red-500' }} border-l-4 p-4 rounded">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 {{ $material->quantity > 0 ? 'text-green-500' : 'text-red-500' }}" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium {{ $material->quantity > 0 ? 'text-green-800 dark:text-green-200' : 'text-red-800 dark:text-red-200' }}">
                                Statut: {{ $material->quantity > 0 ? 'En Stock' : 'Rupture de Stock' }}
                            </h3>
                            <div class="mt-2 text-sm {{ $material->quantity > 0 ? 'text-green-700 dark:text-green-300' : 'text-red-700 dark:text-red-300' }}">
                                <p>Quantité disponible: {{ $material->quantity }} unité(s)</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions -->
                <div class="mb-6 flex flex-wrap gap-4">
                    <a href="{{ route('entrees.create', ['material_id' => $material->id]) }}"
                       class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                        </svg>
                        Nouvelle Entrée
                    </a>
                    
                    <a href="{{ route('materials.edit', $material) }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Modifier
                    </a>

                    <a href="{{ route('materials.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 text-sm font-medium rounded-md transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour
                    </a>
                </div>

                <!-- Material Summary Card -->
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $material->name }}
                        </h2>
                        <span class="px-3 py-1 text-sm font-medium rounded-full {{ $material->quantity > 0 ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200' : 'bg-red-100 text-red-800 dark:bg-red-900 dark:text-red-200' }}">
                            {{ $material->quantity }} en stock
                        </span>
                    </div>
                    
                    <!-- Statistics Summary -->
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Total des Entrées</div>
                            <div class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ $material->entrees->sum('quantity') }}
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Valeur Totale</div>
                            <div class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ number_format($material->entrees->sum(function($entree) {
                                    return $entree->quantity * $entree->unit_price;
                                }), 2, ',', ' ') }} DH
                            </div>
                        </div>
                        
                        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 shadow-sm">
                            <div class="text-sm font-medium text-gray-500 dark:text-gray-400">Dernière Entrée</div>
                            <div class="mt-1 text-2xl font-semibold text-gray-900 dark:text-gray-100">
                                {{ $material->entrees->first() ? $material->entrees->first()->created_at->format('d/m/Y') : 'N/A' }}
                            </div>
                        </div>
                    </div>

                    <!-- Rest of your existing information cards -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Basic Information Card -->
                        <div class="bg-white dark:bg-gray-700 rounded-lg p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Informations de Base
                                </span>
                            </h3>
                            
                            <div class="space-y-4">
                                <div class="border-b dark:border-gray-600 pb-3">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Nom du Matériel
                                    </label>
                                    <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ $material->name }}
                                    </p>
                                </div>

                                <div class="border-b dark:border-gray-600 pb-3">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Description
                                    </label>
                                    <p class="mt-1 text-gray-900 dark:text-gray-100">
                                        {{ $material->description }}
                                    </p>
                                </div>

                                <div class="pb-3">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Type de Matériel
                                    </label>
                                    <p class="mt-1 text-lg font-medium text-gray-900 dark:text-gray-100">
                                        {{ $material->typeMaterial->name }}
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Details Card -->
                        <div class="bg-white dark:bg-gray-700 rounded-lg p-6 shadow-sm">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Détails Supplémentaires
                                </span>
                            </h3>

                            <div class="space-y-4">
                                <div class="border-b dark:border-gray-600 pb-3">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Date d'Ajout
                                    </label>
                                    <p class="mt-1 text-gray-900 dark:text-gray-100">
                                        {{ $material->created_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>

                                <div class="border-b dark:border-gray-600 pb-3">
                                    <label class="block text-sm font-medium text-gray-500 dark:text-gray-400">
                                        Dernière Modification
                                    </label>
                                    <p class="mt-1 text-gray-900 dark:text-gray-100">
                                        {{ $material->updated_at->format('d/m/Y H:i') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Entries History -->
                <div class="mt-8">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            <span class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Historique des Entrées
                            </span>
                        </h3>
                        <a href="{{ route('entrees.create', ['material_id' => $material->id]) }}"
                           class="inline-flex items-center px-3 py-1.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Ajouter
                        </a>
                    </div>

                    @if($material->entrees->count() > 0)
                        <div class="bg-white dark:bg-gray-700 rounded-lg shadow-sm overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-600">
                                <thead class="bg-gray-50 dark:bg-gray-800">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            Date
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            Quantité
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            Fournisseur
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                            Prix Unitaire
                                        </th>
                                        <th scope="col" class="relative px-6 py-3">
                                            <span class="sr-only">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white dark:bg-gray-700 divide-y divide-gray-200 dark:divide-gray-600">
                                    @foreach($material->entrees as $entree)
                                        <tr>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $entree->created_at->format('d/m/Y H:i') }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $entree->quantity }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ $entree->fournisseur->name }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-100">
                                                {{ number_format($entree->unit_price, 2, ',', ' ') }} DH
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <a href="{{ route('entrees.show', $entree) }}" 
                                                   class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                    Voir détails
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-gray-100">Aucune entrée</h3>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                                Il n'y a pas encore d'entrées enregistrées pour ce matériel.
                            </p>
                        </div>
                    @endif
                </div>

                <!-- Danger Zone -->
                <div class="mt-8 border-t border-gray-200 dark:border-gray-600 pt-6">
                    <h3 class="text-lg font-medium text-red-600 dark:text-red-400 mb-4">Zone de Danger</h3>
                    <div class="bg-red-50 dark:bg-red-900/50 rounded-lg p-4">
                        <form action="{{ route('materials.destroy', $material) }}" 
                              method="POST" 
                              onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce matériel ? Cette action est irréversible.');"
                              class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Supprimer ce Matériel
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
