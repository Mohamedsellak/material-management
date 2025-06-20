@extends('layouts.main')

@section('title', 'Détails du Département')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Enhanced Header Section -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg p-6 mb-8 border border-blue-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="flex items-center">
                        <div class="h-12 w-12 bg-blue-600 rounded-full flex items-center justify-center mr-4">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">{{ $departement->name }}</h1>
                            <p class="text-gray-600 mt-1">Département organisationnel</p>
                        </div>
                    </div>
                    <span class="ml-4 px-4 py-2 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                        Département
                    </span>
                </div>
                <div class="flex space-x-3">
                    <a href="{{ route('departements.edit', $departement) }}"
                       class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Modifier
                    </a>
                    <form action="{{ route('departements.destroy', $departement) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce département ?')"
                                class="inline-flex items-center px-6 py-3 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Enhanced Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-600">Fonctionnaires</h4>
                        <p class="mt-1 text-3xl font-bold text-gray-900">{{ $departement->fonctionaires()->count() }}</p>
                        <p class="text-sm text-gray-500">Personnes assignées</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-green-100">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-600">Locaux</h4>
                        <p class="mt-1 text-3xl font-bold text-gray-900">{{ $departement->locals()->count() }}</p>
                        <p class="text-sm text-gray-500">Espaces gérés</p>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold text-gray-600">Créé le</h4>
                        <p class="mt-1 text-xl font-bold text-gray-900">{{ $departement->created_at ? $departement->created_at->format('d/m/Y') : 'Date inconnue' }}</p>
                        <p class="text-sm text-gray-500">Date de création</p>
                    </div>
                </div>
            </div>
        </div>

        @if($departement->fonctionaires()->count() > 0)
        <!-- Enhanced Fonctionaires Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-8 border border-gray-100">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 border-b border-gray-100">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900">
                        Fonctionnaires du département
                    </h3>
                    <span class="ml-auto bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $departement->fonctionaires()->count() }} total
                    </span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    <span>Fonctionnaire</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Email</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    <span>Téléphone</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Date d'ajout</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center justify-end space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                    </svg>
                                    <span>Actions</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($departement->fonctionaires->take(5) as $fonctionaire)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div class="h-12 w-12 rounded-full bg-gradient-to-br from-blue-400 via-blue-500 to-indigo-600 flex items-center justify-center shadow-lg ring-2 ring-blue-100">
                                            <svg class="h-7 w-7" viewBox="0 0 24 24">
                                                <!-- Head -->
                                                <circle cx="12" cy="8" r="3" fill="#FDBCB4"/>
                                                <!-- Hair -->
                                                <path d="M9 6.5C9 4.5 10.5 3 12 3s3 1.5 3 3.5c0 1-0.5 1.8-1.2 2.3C13.2 8.3 12.6 8 12 8s-1.2 0.3-1.8 0.8C9.5 8.3 9 7.5 9 6.5z" fill="#8B4513"/>
                                                <!-- Eyes -->
                                                <circle cx="10.5" cy="7.5" r="0.4" fill="#2D3748"/>
                                                <circle cx="13.5" cy="7.5" r="0.4" fill="#2D3748"/>
                                                <!-- Smile -->
                                                <path d="M10.5 9c0.5 0.5 1 0.5 1.5 0.5s1-0 1.5-0.5" stroke="#2D3748" stroke-width="0.3" fill="none"/>
                                                <!-- Body/Shirt -->
                                                <path d="M8 14c0-1.5 1.8-2 4-2s4 0.5 4 2v6H8v-6z" fill="#4299E1"/>
                                                <!-- Tie -->
                                                <path d="M11.5 12h1l-0.2 4h-0.6l-0.2-4z" fill="#E53E3E"/>
                                                <!-- Collar -->
                                                <path d="M10 13l2-1 2 1v1l-2-0.5L10 14v-1z" fill="#FFFFFF"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">
                                            {{ $fonctionaire->nom . ' ' . $fonctionaire->prenom }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            Fonctionnaire
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 bg-blue-100 rounded-full flex items-center justify-center">
                                            <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $fonctionaire->email }}</div>
                                        <div class="text-xs text-gray-500">Email professionnel</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 bg-green-100 rounded-full flex items-center justify-center">
                                            <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $fonctionaire->telephone ?? 'Non renseigné' }}</div>
                                        <div class="text-xs text-gray-500">Numéro de contact</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 bg-purple-100 rounded-full flex items-center justify-center">
                                            <svg class="h-4 w-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $fonctionaire->created_at ? $fonctionaire->created_at->format('d/m/Y') : "N/A" }}</div>
                                        <div class="text-xs text-gray-500">Date d'intégration</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('fonctionaires.show', $fonctionaire) }}"
                                       class="inline-flex items-center px-4 py-2 bg-blue-50 text-blue-700 hover:bg-blue-100 hover:text-blue-800 rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group">
                                        <svg class="h-4 w-4 mr-2 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Voir détails
                                        <svg class="ml-1 h-4 w-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($departement->fonctionaires()->count() > 5)
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <a href="{{ route('fonctionaires.index', ['department' => $departement->id]) }}"
                       class="text-blue-600 hover:text-blue-800 font-medium flex items-center justify-center">
                        Voir tous les fonctionnaires
                        <span class="ml-2 text-sm bg-blue-100 text-blue-800 px-3 py-1 rounded-full font-semibold">
                            +{{ $departement->fonctionaires()->count() - 5 }} autres
                        </span>
                    </a>
                </div>
                @endif
            </div>
        </div>
        @endif

        @if($departement->locals()->count() > 0)
        <!-- Enhanced Locaux Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-8 border border-gray-100">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 border-b border-gray-100">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900">
                        Locaux du département
                    </h3>
                    <span class="ml-auto bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $departement->locals()->count() }} total
                    </span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-green-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <span>Local</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span>Type</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    <span>Date d'ajout</span>
                                </div>
                            </th>
                            <th class="px-6 py-4 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center justify-end space-x-2">
                                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                    </svg>
                                    <span>Actions</span>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($departement->locals->take(5) as $local)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div class="h-12 w-12 rounded-xl bg-gradient-to-br from-emerald-400 via-green-500 to-teal-600 flex items-center justify-center shadow-lg ring-2 ring-green-100">
                                            <svg class="h-7 w-7" viewBox="0 0 24 24">
                                                <!-- Roof -->
                                                <path fill="#FF6B6B" d="M12 2L2 12h2v8h16v-8h2L12 2z"/>
                                                <!-- Main House -->
                                                <path fill="#4ECDC4" d="M4 12v8h5v-6h6v6h5v-8H4z"/>
                                                <!-- Door -->
                                                <rect x="10" y="15" width="4" height="5" fill="#8B4513"/>
                                                <!-- Door Handle -->
                                                <circle cx="12.5" cy="17.5" r="0.3" fill="#FFD700"/>
                                                <!-- Windows -->
                                                <rect x="6" y="14" width="2" height="2" fill="#FFD700"/>
                                                <rect x="16" y="14" width="2" height="2" fill="#FFD700"/>
                                                <!-- Window frames -->
                                                <rect x="6.2" y="14.2" width="1.6" height="1.6" fill="#87CEEB" stroke="#FFD700" stroke-width="0.2"/>
                                                <rect x="16.2" y="14.2" width="1.6" height="1.6" fill="#87CEEB" stroke="#FFD700" stroke-width="0.2"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-semibold text-gray-900">{{ $local->name ?? 'N/A' }}</div>
                                        <div class="text-sm text-gray-500">
                                            Espace de travail
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <span class="px-3 py-1 text-sm font-medium bg-emerald-100 text-emerald-800 rounded-full border border-emerald-200">
                                        {{ $local->typeLocal->name ?? 'Type non défini' }}
                                    </span>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 mr-3">
                                        <div class="h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                            <svg class="h-4 w-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="text-sm font-medium text-gray-900">{{ $local->created_at ? $local->created_at->format('d/m/Y') : 'Date inconnue' }}</div>
                                        <div class="text-xs text-gray-500">Date d'ajout</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">
                                    <a href="{{ route('locals.show', $local) }}"
                                       class="inline-flex items-center px-4 py-2 bg-green-50 text-green-700 hover:bg-green-100 hover:text-green-800 rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group">
                                        <svg class="h-4 w-4 mr-2 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                        Voir détails
                                        <svg class="ml-1 h-4 w-4 group-hover:translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if($departement->locals()->count() > 5)
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <a href="{{ route('locals.index', ['department' => $departement->id]) }}"
                       class="text-green-600 hover:text-green-800 font-medium flex items-center justify-center">
                        Voir tous les locaux
                        <span class="ml-2 text-sm bg-green-100 text-green-800 px-3 py-1 rounded-full font-semibold">
                            +{{ $departement->locals()->count() - 5 }} autres
                        </span>
                    </a>
                </div>
                @endif
            </div>
        </div>
        @endif

        <!-- Enhanced Back Button -->
        <div class="flex justify-between items-center">
            <a href="{{ route('departements.index') }}"
               class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 shadow-md hover:shadow-lg">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Retour à la liste
            </a>

            <div class="text-sm text-gray-500">
                Dernière modification: {{ $departement->updated_at ? $departement->updated_at->format('d/m/Y à H:i') : ($departement->created_at ? $departement->created_at->format('d/m/Y à H:i') : 'Date inconnue') }}
            </div>
        </div>
    </div>
</div>
@endsection
