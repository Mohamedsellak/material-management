@extends('layouts.main')

@section('title', 'Détails de l\'Entrée')

@section('content')
<!-- Modern gradient background -->
<div class="min-h-screen bg-gradient-to-br from-green-50 via-white to-blue-50">
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-6xl mx-auto">
            <!-- Modern Breadcrumb -->
            <nav class="flex mb-8 bg-white/80 backdrop-blur-sm rounded-lg px-4 py-3 shadow-sm border border-gray-100" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('entrees.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-green-600 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            Entrées
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600 md:ml-2">Entrée #{{ $entree->id }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Enhanced Header with gradient background -->
            <div class="mb-8 bg-gradient-to-r from-indigo-600 to-purple-600 rounded-xl p-6 text-white shadow-lg">
                <div class="flex justify-between items-center">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">Détails de l'Entrée #{{ $entree->id }}</h1>
                        <p class="text-indigo-100 text-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            Créé le {{ \Carbon\Carbon::parse($entree->created_at)->format('d/m/Y à H:i') }}
                        </p>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('entrees.edit', $entree) }}"
                           class="inline-flex items-center px-6 py-3 bg-yellow-500 hover:bg-yellow-600 text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-yellow-400">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Modifier
                        </a>
                        <form action="{{ route('entrees.destroy', $entree) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette entrée ?')"
                                    class="inline-flex items-center px-6 py-3 bg-red-500 hover:bg-red-600 text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-400">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Enhanced Details Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Material Info Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Matériel</h3>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm text-gray-600 block">Nom du matériel:</span>
                            <span class="text-gray-900 font-semibold">{{ $entree->material->name }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-600 block">Type:</span>
                            <span class="text-gray-900 font-semibold">{{ $entree->material->typeMaterial->name ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Supplier Info Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Fournisseur</h3>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm text-gray-600 block">Nom:</span>
                            <span class="text-gray-900 font-semibold">{{ $entree->fournisseur->name }}</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-600 block">Contact:</span>
                            <span class="text-gray-900 font-semibold">{{ $entree->fournisseur->telephone ?? 'N/A' }}</span>
                        </div>
                    </div>
                </div>

                <!-- Transaction Details Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Détails</h3>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm text-gray-600 block">Date d'entrée:</span>
                            <span class="text-gray-900 font-semibold">
                                {{ \Carbon\Carbon::parse($entree->date)->format('d/m/Y') }}
                            </span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-600 block">Quantité:</span>
                            <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold">
                                {{ number_format($entree->quantity, 0) }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Total Amount Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-200 hover:shadow-xl transition-shadow duration-200">
                    <div class="flex items-center mb-4">
                        <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-orange-500 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                            </svg>
                        </div>
                        <h3 class="text-lg font-bold text-gray-800">Montant</h3>
                    </div>
                    <div class="space-y-3">
                        <div>
                            <span class="text-sm text-gray-600 block">Prix Unitaire:</span>
                            <span class="text-gray-900 font-semibold">{{ number_format($entree->unit_price, 2) }} DH</span>
                        </div>
                        <div>
                            <span class="text-sm text-gray-600 block">Total:</span>
                            <span class="text-2xl font-bold text-gray-900">
                                {{ number_format($entree->quantity * $entree->unit_price, 2) }} DH
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Additional Information -->
            <div class="bg-white rounded-xl shadow-lg border border-gray-200 overflow-hidden mb-8">
                <div class="bg-gradient-to-r from-gray-50 to-indigo-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="w-8 h-8 bg-indigo-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        Informations Supplémentaires
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Impact sur le Stock</h4>
                            <p class="text-gray-600 text-sm">Cette entrée a ajouté <strong>{{ number_format($entree->quantity, 0) }} unités</strong> au stock du matériel "{{ $entree->material->name }}".</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Valeur de l'Entrée</h4>
                            <p class="text-gray-600 text-sm">Cette entrée représente une valeur totale de <strong>{{ number_format($entree->quantity * $entree->unit_price, 2) }} DH</strong> ajoutée à l'inventaire.</p>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <h4 class="font-semibold text-gray-800 mb-2">Dernière Modification</h4>
                            <p class="text-gray-600 text-sm">
                                @if($entree->updated_at && $entree->updated_at != $entree->created_at)
                                    Modifiée le {{ $entree->updated_at->format('d/m/Y à H:i') }}
                                @else
                                    Aucune modification depuis la création
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Enhanced Back Button -->
            <div class="flex items-center justify-between">
                <a href="{{ route('entrees.index') }}"
                   class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-gray-100 to-gray-200 hover:from-gray-200 hover:to-gray-300 text-gray-700 rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Retour à la liste
                </a>

                <div class="text-sm text-gray-500">
                    Entrée ID: #{{ $entree->id }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
