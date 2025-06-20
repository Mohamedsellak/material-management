@extends('layouts.main')

@section('title', 'Gestion des Locaux')

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
                            <h1 class="text-3xl font-bold text-gray-900">Gestion des Locaux</h1>
                            <p class="text-gray-600 mt-1">Administration des espaces et locaux</p>
                        </div>
                    </div>
                    <span class="ml-4 px-4 py-2 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                        Gestion
                    </span>
                </div>
                <a href="{{ route('locals.create') }}"
                   class="inline-flex items-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                    <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Ajouter un Local
                </a>
            </div>
        </div>

        @if (session('success'))
            <div class="bg-green-50 border border-green-200 text-green-800 px-6 py-4 rounded-lg relative mb-6 shadow-sm" role="alert">
                <div class="flex items-center">
                    <svg class="h-5 w-5 mr-3 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div>
                        <strong class="font-semibold">Succès!</strong>
                        <span class="block sm:inline ml-1">{{ session('success') }}</span>
                    </div>
                </div>
            </div>
        @endif

        <!-- Enhanced Search Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-gray-100">
            <div class="flex items-center mb-4">
                <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900">Recherche et Filtres</h3>
            </div>
            <form action="{{ route('locals.index') }}" method="GET" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <!-- Search Bar -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Recherche par nom</label>
                        <input type="text"
                               name="search"
                               value="{{ request('search') }}"
                               placeholder="Saisissez le nom du local..."
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                    </div>

                    <!-- Type Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Type de Local</label>
                        <select name="type" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                            <option value="">Tous les types</option>
                            @foreach($typeLocals as $type)
                                <option value="{{ $type->id }}" {{ request('type') == $type->id ? 'selected' : '' }}>
                                    {{ $type->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Department Filter -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Département</label>
                        <select name="department" class="w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors">
                            <option value="">Tous les départements</option>
                            @foreach($departements as $departement)
                                <option value="{{ $departement->id }}" {{ request('department') == $departement->id ? 'selected' : '' }}>
                                    {{ $departement->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="flex justify-end gap-3">
                    <button type="submit"
                            class="inline-flex items-center px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors shadow-md hover:shadow-lg">
                        <svg class="h-4 w-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        Rechercher
                    </button>
                    @if(request()->anyFilled(['search', 'type', 'department']))
                        <a href="{{ route('locals.index') }}"
                           class="inline-flex items-center px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors shadow-md hover:shadow-lg">
                            <svg class="h-4 w-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Réinitialiser
                        </a>
                    @endif
                </div>
            </form>
        </div>        <!-- Enhanced Table Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-6 border-b border-gray-100">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900">
                        Liste des Locaux
                    </h3>
                    <span class="ml-auto bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $locals->total() ?? count($locals) }} local(aux)
                    </span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-blue-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                    <span>ID</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <span>Nom du Local</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span>Type</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <span>Département</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider">
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
                        @forelse($locals as $local)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-400 via-indigo-500 to-purple-600 flex items-center justify-center shadow-md ring-2 ring-blue-100">
                                                <svg class="h-5 w-5" viewBox="0 0 24 24">
                                                    <!-- Enhanced Colorful ID Badge -->
                                                    <defs>
                                                        <linearGradient id="localBadgeGradient{{ $local->id }}" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#FFFFFF;stop-opacity:1" />
                                                            <stop offset="50%" style="stop-color:#EBF4FF;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#DBEAFE;stop-opacity:1" />
                                                        </linearGradient>
                                                        <radialGradient id="localNumberGradient{{ $local->id }}" cx="50%" cy="50%" r="50%">
                                                            <stop offset="0%" style="stop-color:#3B82F6;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#1D4ED8;stop-opacity:1" />
                                                        </radialGradient>
                                                    </defs>

                                                    <!-- Badge shape -->
                                                    <rect x="6" y="8" width="12" height="8" fill="url(#localBadgeGradient{{ $local->id }})" rx="2" stroke="#3B82F6" stroke-width="0.5"/>

                                                    <!-- ID number with gradient -->
                                                    <text x="12" y="13.5" text-anchor="middle" font-family="Arial, sans-serif" font-size="4" font-weight="bold" fill="url(#localNumberGradient{{ $local->id }})">#{{ $local->id }}</text>

                                                    <!-- Decorative corner elements -->
                                                    <circle cx="7.5" cy="9.5" r="0.8" fill="#60A5FA" opacity="0.7"/>
                                                    <circle cx="16.5" cy="9.5" r="0.8" fill="#93C5FD" opacity="0.7"/>
                                                    <circle cx="7.5" cy="14.5" r="0.8" fill="#BFDBFE" opacity="0.7"/>
                                                    <circle cx="16.5" cy="14.5" r="0.8" fill="#60A5FA" opacity="0.7"/>

                                                    <!-- Small highlight dots -->
                                                    <circle cx="8" cy="10" r="0.3" fill="#FFFFFF" opacity="0.9"/>
                                                    <circle cx="16" cy="10" r="0.3" fill="#FFFFFF" opacity="0.9"/>
                                                    <circle cx="8" cy="14" r="0.3" fill="#FFFFFF" opacity="0.9"/>
                                                    <circle cx="16" cy="14" r="0.3" fill="#FFFFFF" opacity="0.9"/>

                                                    <!-- Sparkle effects -->
                                                    <polygon points="9.5,6.5 9.7,7 10.2,6.8 9.7,7.3 9.5,7.8 9.3,7.3 8.8,6.8 9.3,7" fill="#FFD700" opacity="0.8"/>
                                                    <polygon points="14.5,16.2 14.7,16.7 15.2,16.5 14.7,17 14.5,17.5 14.3,17 13.8,16.5 14.3,16.7" fill="#FFD700" opacity="0.8"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">ID {{ $local->id }}</div>
                                            <div class="text-sm text-gray-500">Identifiant</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-orange-400 via-amber-500 to-yellow-600 flex items-center justify-center shadow-md ring-2 ring-amber-100">
                                                <svg class="h-5 w-5" viewBox="0 0 24 24">
                                                    <!-- Professional Office Building with bright colors -->
                                                    <rect x="6" y="4" width="12" height="16" fill="#FFFFFF" rx="1" stroke="#1F2937" stroke-width="0.5"/>
                                                    <!-- Colorful Windows Grid -->
                                                    <rect x="8" y="6" width="1.5" height="1.5" fill="#3B82F6"/>
                                                    <rect x="10.5" y="6" width="1.5" height="1.5" fill="#EF4444"/>
                                                    <rect x="13" y="6" width="1.5" height="1.5" fill="#10B981"/>
                                                    <rect x="15.5" y="6" width="1.5" height="1.5" fill="#F59E0B"/>

                                                    <rect x="8" y="9" width="1.5" height="1.5" fill="#8B5CF6"/>
                                                    <rect x="10.5" y="9" width="1.5" height="1.5" fill="#06B6D4"/>
                                                    <rect x="13" y="9" width="1.5" height="1.5" fill="#F97316"/>
                                                    <rect x="15.5" y="9" width="1.5" height="1.5" fill="#84CC16"/>

                                                    <rect x="8" y="12" width="1.5" height="1.5" fill="#EC4899"/>
                                                    <rect x="10.5" y="12" width="1.5" height="1.5" fill="#6366F1"/>
                                                    <rect x="13" y="12" width="1.5" height="1.5" fill="#14B8A6"/>
                                                    <rect x="15.5" y="12" width="1.5" height="1.5" fill="#DC2626"/>

                                                    <!-- Golden entrance -->
                                                    <rect x="10.5" y="16" width="3" height="4" fill="#F59E0B"/>
                                                    <!-- Door handle -->
                                                    <circle cx="13" cy="18" r="0.3" fill="#1F2937"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $local->name ?? 'N/A' }}</div>
                                            <div class="text-sm text-gray-500">Local</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 mr-3">
                                            <div class="h-8 w-8 bg-green-100 rounded-full flex items-center justify-center">
                                                <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full border border-green-200">
                                            {{ $local->typeLocal->name ?? 'Type non défini' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 mr-3">
                                            <div class="h-8 w-8 bg-purple-100 rounded-full flex items-center justify-center">
                                                <svg class="h-4 w-4 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <span class="px-3 py-1 text-sm font-medium bg-purple-100 text-purple-800 rounded-full border border-purple-200">
                                            {{ $local->departement->name ?? 'Département non défini' }}
                                        </span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('locals.show', $local) }}"
                                           class="inline-flex items-center px-3 py-2 bg-blue-50 text-blue-700 hover:bg-blue-100 hover:text-blue-800 rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group">
                                            <svg class="h-4 w-4 mr-1 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Voir
                                        </a>
                                        <a href="{{ route('locals.edit', $local) }}"
                                           class="inline-flex items-center px-3 py-2 bg-gradient-to-r from-emerald-500 to-emerald-600 hover:from-emerald-600 hover:to-emerald-700 text-white rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group transform hover:scale-105">
                                            <svg class="h-4 w-4 mr-1 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Modifier
                                        </a>
                                        <form action="{{ route('locals.destroy', $local) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-red-50 text-red-700 hover:bg-red-100 hover:text-red-800 rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce local ?')">
                                                <svg class="h-4 w-4 mr-1 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                </svg>
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-16 w-16 rounded-full bg-gradient-to-br from-blue-400 via-indigo-500 to-purple-600 flex items-center justify-center shadow-lg ring-4 ring-blue-100 mb-4">
                                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun local trouvé</h3>
                                        <p class="text-gray-500 mb-4">Commencez par créer votre premier local.</p>
                                        <a href="{{ route('locals.create') }}"
                                           class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors">
                                            <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Ajouter un Local
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Enhanced Pagination -->
            @if($locals->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        Affichage de {{ $locals->firstItem() }} à {{ $locals->lastItem() }} sur {{ $locals->total() }} résultats
                    </div>
                    <div>
                        {{ $locals->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
