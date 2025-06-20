@extends('layouts.main')

@section('title', 'Détails du Matériel')

@section('content')
<!-- Modern gradient background -->
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-purple-50">
    <div class="py-8 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <!-- Modern Breadcrumb -->
            <nav class="flex mb-8 bg-white/80 backdrop-blur-sm rounded-lg px-4 py-3 shadow-sm border border-gray-100" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('materials.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2.5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            Matériels
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 text-gray-400 mx-1" fill="none" viewBox="0 0 6 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-gray-600 md:ml-2">{{ Str::limit($material->name, 30) }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Enhanced Header with gradient background -->
            <div class="mb-8 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl p-6 text-white shadow-lg">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold mb-2">{{ $material->name }}</h1>
                        <p class="text-blue-100 text-lg">
                            <svg class="w-5 h-5 inline mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2H4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1z" clip-rule="evenodd"/>
                            </svg>
                            Type: {{ $material->typeMaterial->name }} •
                            Ajouté le {{ $material->created_at->format('d/m/Y') }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-3">
                        <span class="px-6 py-3 text-lg font-semibold rounded-full {{ $material->quantity > 0 ? 'bg-green-500 text-white' : 'bg-red-500 text-white' }} shadow-lg">
                            {{ $material->quantity > 0 ? 'En Stock' : 'Rupture de Stock' }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Main content with enhanced styling -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-100">
                <div class="p-8">
                    <!-- Enhanced Status Alert -->
                    <div class="mb-8 {{ $material->quantity > 0 ? 'bg-gradient-to-r from-green-50 to-emerald-50 border-green-200' : 'bg-gradient-to-r from-red-50 to-rose-50 border-red-200' }} border-l-4 {{ $material->quantity > 0 ? 'border-l-green-500' : 'border-l-red-500' }} p-6 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 {{ $material->quantity > 0 ? 'bg-green-100' : 'bg-red-100' }} rounded-full flex items-center justify-center">
                                    <svg class="h-6 w-6 {{ $material->quantity > 0 ? 'text-green-600' : 'text-red-600' }}" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <h3 class="text-lg font-semibold {{ $material->quantity > 0 ? 'text-green-800' : 'text-red-800' }}">
                                    Statut: {{ $material->quantity > 0 ? 'En Stock' : 'Rupture de Stock' }}
                                </h3>
                                <div class="mt-2 text-sm {{ $material->quantity > 0 ? 'text-green-700' : 'text-red-700' }}">
                                    <p class="text-base font-medium">Quantité disponible: {{ $material->quantity }} unité(s)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Quick Actions -->
                    <div class="mb-8 flex flex-wrap gap-4">
                        <a href="{{ route('entrees.create', ['material_id' => $material->id]) }}"
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Nouvelle Entrée
                        </a>

                        <a href="{{ route('materials.edit', $material) }}"
                           class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Modifier
                        </a>

                        <a href="{{ route('materials.index') }}"
                           class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-50 text-gray-700 text-sm font-semibold rounded-lg shadow-lg border border-gray-200 transition-all duration-200 hover:shadow-xl transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour à la Liste
                        </a>
                    </div>

                    <!-- Enhanced Material Summary Card -->
                    <div class="bg-gradient-to-br from-slate-50 to-blue-50 rounded-xl p-8 mb-8 border border-gray-200 shadow-sm">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="text-3xl font-bold text-gray-800">
                                {{ $material->name }}
                            </h2>
                            <span class="px-4 py-2 text-lg font-semibold rounded-full {{ $material->quantity > 0 ? 'bg-green-100 text-green-800 border border-green-200' : 'bg-red-100 text-red-800 border border-red-200' }} shadow-sm">
                                {{ $material->quantity }} en stock
                            </span>
                        </div>

                        <!-- Enhanced Statistics Summary -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <div class="bg-white rounded-xl p-6 shadow-lg border border-blue-100 hover:shadow-xl transition-shadow duration-200">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M9 19l3 3m0 0l3-3m-3 3V10"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-600">Total des Entrées</div>
                                        <div class="mt-1 text-2xl font-bold text-gray-900">
                                            {{ $material->entrees->sum('quantity') }}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl p-6 shadow-lg border border-green-100 hover:shadow-xl transition-shadow duration-200">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-600">Valeur Totale</div>
                                        <div class="mt-1 text-2xl font-bold text-gray-900">
                                            {{ number_format($material->entrees->sum(function($entree) {
                                                return $entree->quantity * $entree->unit_price;
                                            }), 2, ',', ' ') }} DH
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="bg-white rounded-xl p-6 shadow-lg border border-purple-100 hover:shadow-xl transition-shadow duration-200">
                                <div class="flex items-center">
                                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-4">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-600">Dernière Entrée</div>
                                        <div class="mt-1 text-2xl font-bold text-gray-900">
                                            {{ $material->entrees->first() ? $material->entrees->first()->created_at->format('d/m/Y') : 'N/A' }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enhanced Information Cards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <!-- Basic Information Card -->
                            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-200">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    Informations de Base
                                </h3>

                                <div class="space-y-6">
                                    <div class="border-b border-gray-100 pb-4">
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                                            Nom du Matériel
                                        </label>
                                        <p class="text-lg font-medium text-gray-900">
                                            {{ $material->name }}
                                        </p>
                                    </div>

                                    <div class="border-b border-gray-100 pb-4">
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                                            Description
                                        </label>
                                        <p class="text-gray-900 leading-relaxed">
                                            {{ $material->description }}
                                        </p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                                            Type de Matériel
                                        </label>
                                        <p class="text-lg font-medium text-gray-900">
                                            {{ $material->typeMaterial->name }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Additional Details Card -->
                            <div class="bg-white rounded-xl p-6 shadow-lg border border-gray-200 hover:shadow-xl transition-shadow duration-200">
                                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                                    <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                                        <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    Détails Supplémentaires
                                </h3>

                                <div class="space-y-6">
                                    <div class="border-b border-gray-100 pb-4">
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                                            Date d'Ajout
                                        </label>
                                        <p class="text-gray-900">
                                            {{ $material->created_at->format('d/m/Y H:i') }}
                                        </p>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-semibold text-gray-600 mb-2">
                                            Dernière Modification
                                        </label>
                                        <p class="text-gray-900">
                                            {{ $material->updated_at ? $material->updated_at->format('d/m/Y H:i') :  "N/A" }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Entries History -->
                    <div class="mt-12">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-green-500 to-emerald-500 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                Historique des Entrées
                            </h3>
                            <a href="{{ route('entrees.create', ['material_id' => $material->id]) }}"
                               class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Ajouter
                            </a>
                        </div>

                        @if($material->entrees->count() > 0)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                                <div class="bg-gradient-to-r from-gray-50 to-blue-50 px-6 py-4 border-b border-gray-200">
                                    <div class="grid grid-cols-12 gap-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                        <div class="col-span-3">Date</div>
                                        <div class="col-span-2">Quantité</div>
                                        <div class="col-span-3">Fournisseur</div>
                                        <div class="col-span-2">Prix Unitaire</div>
                                        <div class="col-span-2 text-right">Actions</div>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-100">
                                    @foreach($material->entrees as $entree)
                                        <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                                            <div class="col-span-3 text-sm text-gray-900 font-medium">
                                                {{ $entree->created_at->format('d/m/Y H:i') }}
                                            </div>
                                            <div class="col-span-2 text-sm text-gray-900">
                                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full font-medium">
                                                    {{ $entree->quantity }}
                                                </span>
                                            </div>
                                            <div class="col-span-3 text-sm text-gray-900">
                                                {{ $entree->fournisseur->name }}
                                            </div>
                                            <div class="col-span-2 text-sm text-gray-900 font-medium">
                                                {{ number_format($entree->unit_price, 2, ',', ' ') }} DH
                                            </div>
                                            <div class="col-span-2 text-right">
                                                <a href="{{ route('entrees.show', $entree) }}"
                                                   class="inline-flex items-center px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white text-xs font-medium rounded-lg transition-colors duration-200">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                    Voir
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="bg-gradient-to-br from-gray-50 to-blue-50 rounded-xl p-8 text-center border border-gray-200">
                                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune entrée</h3>
                                <p class="text-gray-600">
                                    Il n'y a pas encore d'entrées enregistrées pour ce matériel.
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Enhanced Sorties History -->
                    <div class="mt-12">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-2xl font-bold text-gray-900 flex items-center">
                                <div class="w-10 h-10 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                Historique des Sorties
                            </h3>
                            <a href="{{ route('command_lines.create') }}"
                               class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-orange-600 to-red-600 hover:from-orange-700 hover:to-red-700 text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Ajouter
                            </a>
                        </div>

                        @if($material->command_lines->count() > 0)
                            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                                <div class="bg-gradient-to-r from-gray-50 to-orange-50 px-6 py-4 border-b border-gray-200">
                                    <div class="grid grid-cols-12 gap-4 text-sm font-semibold text-gray-700 uppercase tracking-wider">
                                        <div class="col-span-2">Date</div>
                                        <div class="col-span-2">Quantité</div>
                                        <div class="col-span-3">Fonctionnaire</div>
                                        <div class="col-span-3">Departement</div>
                                        <div class="col-span-2 text-right">Actions</div>
                                    </div>
                                </div>
                                <div class="divide-y divide-gray-100">
                                    @foreach($material->command_lines as $command_line)
                                        <div class="grid grid-cols-12 gap-4 px-6 py-4 hover:bg-gray-50 transition-colors duration-150">
                                            <div class="col-span-2 text-sm text-gray-900 font-medium">
                                                {{ $command_line->created_at->format('d/m/Y H:i') }}
                                            </div>
                                            <div class="col-span-2 text-sm text-gray-900">
                                                <span class="px-3 py-1 bg-orange-100 text-orange-800 rounded-full font-medium">
                                                    {{ $command_line->quantity }}
                                                </span>
                                            </div>
                                            <div class="col-span-3 text-sm text-gray-900">
                                                {{ $command_line->command->fonctionaire->nom . ' ' . $command_line->command->fonctionaire->prenom }}
                                            </div>
                                            <div class="col-span-3 text-sm text-gray-900">
                                                {{ $command_line->command->fonctionaire->departement->name }}
                                            </div>
                                            <div class="col-span-2 text-right">
                                                <a href="{{ route('command_lines.show', $command_line) }}"
                                                   class="inline-flex items-center px-3 py-1.5 bg-orange-600 hover:bg-orange-700 text-white text-xs font-medium rounded-lg transition-colors duration-200">
                                                    <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                    Voir
                                                </a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            <div class="bg-gradient-to-br from-gray-50 to-orange-50 rounded-xl p-8 text-center border border-gray-200">
                                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune sortie</h3>
                                <p class="text-gray-600">
                                    Il n'y a pas encore de sorties enregistrées pour ce matériel.
                                </p>
                            </div>
                        @endif
                    </div>

                    <!-- Enhanced Danger Zone -->
                    <div class="mt-12 border-t border-gray-200 pt-8">
                        <h3 class="text-xl font-bold text-red-600 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-r from-red-500 to-pink-500 rounded-lg flex items-center justify-center mr-3">
                                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.084 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                            </div>
                            Zone de Danger
                        </h3>
                        <div class="bg-gradient-to-r from-red-50 to-pink-50 rounded-xl p-8 border border-red-200 shadow-sm">
                            <div class="mb-6">
                                <h4 class="text-lg font-bold text-red-800 mb-2">Supprimer ce matériel</h4>
                                <p class="text-red-700">
                                    Cette action est irréversible. Toutes les données associées à ce matériel seront définitivement supprimées.
                                </p>
                            </div>
                            <form action="{{ route('materials.destroy', $material) }}"
                                  method="POST"
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce matériel ? Cette action est irréversible.');"
                                  class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-pink-600 hover:from-red-700 hover:to-pink-700 text-white text-sm font-semibold rounded-lg shadow-lg transition-all duration-200 hover:shadow-xl transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
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
</div>
@endsection
