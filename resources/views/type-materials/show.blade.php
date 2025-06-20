@extends('layouts.main')

@section('title', 'Détails du Type de Matériel - ' . $typeMaterial->name)

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('type-materials.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Types de Matériel
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-gray-500">{{ $typeMaterial->name }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">{{ $typeMaterial->name }}</h1>
                    <p class="mt-2 text-sm text-gray-600">Détails complets du type de matériel et matériaux associés</p>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('type-materials.edit', $typeMaterial) }}"
                       class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Modifier
                    </a>
                    <a href="{{ route('type-materials.index') }}"
                       class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Matériaux Totaux</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $typeMaterial->materials->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-green-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">En Stock</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $typeMaterial->materials->where('quantity', '>', 0)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-red-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Stock Épuisé</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $typeMaterial->materials->where('quantity', '<=', 0)->count() }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                            <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-600">Quantité Totale</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $typeMaterial->materials->sum('quantity') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Layout -->
        <div class="space-y-8">
            <!-- Basic Information -->
            <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-900 flex items-center">
                        <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        Informations de Base
                    </h3>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Nom du Type</label>
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full mr-3"></div>
                                <p class="text-lg font-semibold text-gray-900">{{ $typeMaterial->name }}</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Date de Création</label>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-green-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-700">{{ $typeMaterial->created_at->format('d/m/Y à H:i') }}</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Dernière Modification</label>
                            <div class="flex items-center">
                                <div class="w-6 h-6 bg-orange-100 rounded-lg flex items-center justify-center mr-3">
                                    <svg class="w-4 h-4 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                </div>
                                <p class="text-sm font-medium text-gray-700">{{ $typeMaterial->updated_at->format('d/m/Y à H:i') }}</p>
                            </div>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-medium text-gray-500 uppercase tracking-wide">Statut</label>
                            <div>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                    Actif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Materials Preview - Full Width -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-5 border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-xl font-bold text-gray-900 flex items-center">
                        <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center mr-3">
                            <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                        Aperçu des Matériaux
                        <span class="ml-3 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                            {{ $typeMaterial->materials->count() > 3 ? '3 sur ' . $typeMaterial->materials->count() : $typeMaterial->materials->count() }}
                        </span>
                    </h3>
                    <div class="flex items-center space-x-3">
                        @if($typeMaterial->materials->count() > 3)
                        <a href="{{ route('materials.index', ['type_material_id' => $typeMaterial->id]) }}" class="inline-flex items-center px-6 py-3 border border-gray-300 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                            </svg>
                            Voir tous ({{ $typeMaterial->materials->count() }})
                        </a>
                        @endif
                        <a href="{{ route('materials.create', ['type_material_id' => $typeMaterial->id]) }}"
                           class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4"/>
                            </svg>
                            Ajouter Matériau
                        </a>
                    </div>
                </div>

                <div class="p-0">
                    @if($typeMaterial->materials->count() > 0)
                        <!-- Materials Table -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50 border-b-2 border-gray-200">
                                    <tr>
                                        <th scope="col" class="px-6 py-5 text-left text-xs font-bold text-gray-800 uppercase tracking-wider">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-6 h-6 bg-blue-100 rounded-lg flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                    </svg>
                                                </div>
                                                <span class="text-blue-700 font-bold">Matériau</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-5 text-left text-xs font-black text-gray-800 uppercase tracking-wider">
                                            <div class="flex items-center space-x-3">
                                                <div class="w-6 h-6 bg-green-100 rounded-lg flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-green-700 font-bold">Description</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-5 text-center text-xs font-black text-gray-800 uppercase tracking-wider">
                                            <div class="flex items-center justify-center space-x-3">
                                                <div class="w-6 h-6 bg-purple-100 rounded-lg flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-purple-700 font-bold">Quantité</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-5 text-center text-xs font-black text-gray-800 uppercase tracking-wider">
                                            <div class="flex items-center justify-center space-x-3">
                                                <div class="w-6 h-6 bg-red-100 rounded-lg flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-red-700 font-bold">Statut</span>
                                            </div>
                                        </th>
                                        <th scope="col" class="px-6 py-5 text-center text-xs font-black text-gray-800 uppercase tracking-wider">
                                            <div class="flex items-center justify-center space-x-3">
                                                <div class="w-6 h-6 bg-gray-100 rounded-lg flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </div>
                                                <span class="text-gray-700 font-bold">Actions</span>
                                            </div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    @foreach($typeMaterial->materials->take(3) as $material)
                                        <tr class="hover:bg-gray-50 transition-all duration-200 group">
                                            <!-- Material Name -->
                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="w-12 h-12 bg-indigo-100 group-hover:bg-indigo-200 rounded-lg flex items-center justify-center shadow-sm transition-all duration-200 mr-4">
                                                        <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                                        </svg>
                                                    </div>
                                                    <div class="min-w-0 flex-1">
                                                        <h4 class="text-lg font-bold text-gray-900 truncate group-hover:text-indigo-700 transition-colors duration-300">
                                                            {{ $material->name }}
                                                        </h4>
                                                        <div class="flex items-center mt-1">
                                                            <div class="w-2 h-2 {{ $material->quantity > 0 ? 'bg-emerald-400' : 'bg-red-400' }} rounded-full mr-2"></div>
                                                            <span class="text-xs text-gray-600 font-semibold uppercase tracking-wide">
                                                                {{ $material->quantity > 0 ? 'En stock' : 'Épuisé' }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- Description -->
                                            <td class="px-6 py-4">
                                                <p class="text-sm text-gray-600 leading-relaxed max-w-xs">
                                                    {{ Str::limit($material->description, 80) ?: 'Aucune description disponible' }}
                                                </p>
                                            </td>

                                            <!-- Quantity -->
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span class="inline-flex items-center px-3 py-2 rounded-lg text-sm font-bold {{ $material->quantity > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }} shadow-sm">
                                                    {{ $material->quantity }}
                                                </span>
                                            </td>

                                            <!-- Status -->
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold {{ $material->quantity > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                    <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                        @if($material->quantity > 0)
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                                        @else
                                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                                        @endif
                                                    </svg>
                                                    {{ $material->quantity > 0 ? 'Disponible' : 'Indisponible' }}
                                                </span>
                                            </td>

                                            <!-- Actions -->
                                            <td class="px-6 py-4 whitespace-nowrap text-center">
                                                <a href="{{ route('materials.show', $material) }}"
                                                   class="inline-flex items-center justify-center px-5 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2"
                                                   title="Voir les détails du matériau">
                                                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    <span>Détails</span>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                            @if($typeMaterial->materials->count() > 3)
                            <div class="bg-gray-50 px-6 py-6 border-t border-gray-200">
                                <div class="flex items-center justify-center">
                                    <a href="{{ route('materials.index', ['type_material_id' => $typeMaterial->id]) }}"
                                       class="inline-flex items-center px-8 py-4 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                                        </svg>
                                        <span>Voir tous les {{ $typeMaterial->materials->count() }} matériaux</span>
                                        <svg class="w-4 h-4 ml-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            @endif
                        @else
                            <div class="text-center py-20 px-8">
                                <div class="w-20 h-20 bg-gray-100 rounded-lg flex items-center justify-center mx-auto mb-6">
                                    <svg class="w-10 h-10 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 mb-3">Aucun matériau trouvé</h3>
                                <p class="text-gray-500 mb-8 max-w-md mx-auto leading-relaxed">Ce type de matériel n'a encore aucun matériau associé. Commencez par ajouter le premier matériau pour bien démarrer.</p>
                                <a href="{{ route('materials.create', ['type_material_id' => $typeMaterial->id]) }}"
                                   class="inline-flex items-center px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-semibold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                    </svg>
                                    Ajouter le premier matériau
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
