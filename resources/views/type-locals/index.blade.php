@extends('layouts.main')

@section('title', 'Gestion des Types de Local')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Enhanced Header Section -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-6 mb-8 border border-green-100">
            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                <div class="flex items-center mb-4 md:mb-0">
                    <div class="flex items-center">
                        <div class="h-12 w-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Types de Local</h1>
                            <p class="text-gray-600 mt-1">Gestion des catégories d'espaces</p>
                        </div>
                    </div>
                    <span class="ml-4 px-4 py-2 text-sm font-medium bg-green-100 text-green-800 rounded-full">
                        Gestion
                    </span>
                </div>
                <a href="{{ route('type-locals.create') }}"
                   class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Ajouter un Type
                </a>
            </div>
        </div>

        <!-- Enhanced Search Section -->
        <div class="bg-white rounded-xl shadow-lg p-6 mb-8 border border-gray-100">
            <div class="flex items-center mb-4">
                <svg class="h-5 w-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                </svg>
                <h3 class="text-lg font-semibold text-gray-900">Recherche et Filtres</h3>
            </div>
            <form action="{{ route('type-locals.index') }}" method="GET" class="flex gap-4">
                <div class="flex-1">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Rechercher par nom du type..."
                           class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 transition-colors">
                </div>
                <button type="submit"
                        class="inline-flex items-center px-6 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors shadow-md hover:shadow-lg">
                    <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Rechercher
                </button>
                @if(request()->filled('search'))
                    <a href="{{ route('type-locals.index') }}"
                       class="inline-flex items-center px-6 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors shadow-md hover:shadow-lg">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Réinitialiser
                    </a>
                @endif
            </form>
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

        <!-- Enhanced Table Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 border-b border-gray-100">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900">
                        Liste des Types de Local
                    </h3>
                    <span class="ml-auto bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        {{ $typeLocals->total() ?? count($typeLocals) }} type(s)
                    </span>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gradient-to-r from-gray-50 to-green-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                    <span>ID</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-semibold text-gray-900 uppercase tracking-wider">
                                <div class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    <span>Nom du Type</span>
                                </div>
                            </th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-semibold text-gray-900 uppercase tracking-wider">
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
                        @forelse($typeLocals as $typeLocal)
                            <tr class="hover:bg-gray-50 transition-colors duration-200">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 flex items-center justify-center shadow-md ring-2 ring-green-100">
                                                <svg class="h-5 w-5" viewBox="0 0 24 24">
                                                    <!-- Enhanced Colorful ID Badge -->
                                                    <!-- Badge background with gradient -->
                                                    <defs>
                                                        <linearGradient id="badgeGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#FFFFFF;stop-opacity:1" />
                                                            <stop offset="50%" style="stop-color:#F0FDF4;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#DCFCE7;stop-opacity:1" />
                                                        </linearGradient>
                                                        <radialGradient id="numberGradient" cx="50%" cy="50%" r="50%">
                                                            <stop offset="0%" style="stop-color:#10B981;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                                        </radialGradient>
                                                    </defs>

                                                    <!-- Badge shape -->
                                                    <rect x="6" y="8" width="12" height="8" fill="url(#badgeGradient)" rx="2" stroke="#10B981" stroke-width="0.5"/>

                                                    <!-- ID number with gradient -->
                                                    <text x="12" y="13.5" text-anchor="middle" font-family="Arial, sans-serif" font-size="4" font-weight="bold" fill="url(#numberGradient)">#{{ $typeLocal->id }}</text>

                                                    <!-- Decorative corner elements -->
                                                    <circle cx="7.5" cy="9.5" r="0.8" fill="#34D399" opacity="0.7"/>
                                                    <circle cx="16.5" cy="9.5" r="0.8" fill="#6EE7B7" opacity="0.7"/>
                                                    <circle cx="7.5" cy="14.5" r="0.8" fill="#A7F3D0" opacity="0.7"/>
                                                    <circle cx="16.5" cy="14.5" r="0.8" fill="#34D399" opacity="0.7"/>

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
                                            <div class="text-sm font-medium text-gray-900">ID {{ $typeLocal->id }}</div>
                                            <div class="text-sm text-gray-500">Identifiant</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-orange-400 via-amber-500 to-yellow-600 flex items-center justify-center shadow-md ring-2 ring-amber-100">
                                                <svg class="h-5 w-5" viewBox="0 0 24 24">
                                                    <!-- Enhanced Colorful Type Tag Icon -->
                                                    <!-- Main tag background with gradient effect -->
                                                    <defs>
                                                        <linearGradient id="tagGradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                                            <stop offset="0%" style="stop-color:#FFFFFF;stop-opacity:1" />
                                                            <stop offset="100%" style="stop-color:#F3F4F6;stop-opacity:1" />
                                                        </linearGradient>
                                                    </defs>
                                                    <rect x="5" y="7" width="14" height="10" fill="url(#tagGradient)" rx="2" stroke="#1F2937" stroke-width="0.4"/>

                                                    <!-- Colorful pattern grid with enhanced colors -->
                                                    <circle cx="7" cy="9" r="0.9" fill="#3B82F6" opacity="0.9"/>
                                                    <circle cx="9.5" cy="9" r="0.9" fill="#EF4444" opacity="0.9"/>
                                                    <circle cx="12" cy="9" r="0.9" fill="#10B981" opacity="0.9"/>
                                                    <circle cx="14.5" cy="9" r="0.9" fill="#F59E0B" opacity="0.9"/>
                                                    <circle cx="17" cy="9" r="0.9" fill="#8B5CF6" opacity="0.9"/>

                                                    <circle cx="7" cy="11.5" r="0.9" fill="#06B6D4" opacity="0.9"/>
                                                    <circle cx="9.5" cy="11.5" r="0.9" fill="#F97316" opacity="0.9"/>
                                                    <circle cx="12" cy="11.5" r="0.9" fill="#84CC16" opacity="0.9"/>
                                                    <circle cx="14.5" cy="11.5" r="0.9" fill="#EC4899" opacity="0.9"/>
                                                    <circle cx="17" cy="11.5" r="0.9" fill="#6366F1" opacity="0.9"/>

                                                    <circle cx="7" cy="14" r="0.9" fill="#14B8A6" opacity="0.9"/>
                                                    <circle cx="9.5" cy="14" r="0.9" fill="#DC2626" opacity="0.9"/>
                                                    <circle cx="12" cy="14" r="0.9" fill="#7C3AED" opacity="0.9"/>
                                                    <circle cx="14.5" cy="14" r="0.9" fill="#059669" opacity="0.9"/>
                                                    <circle cx="17" cy="14" r="0.9" fill="#DB2777" opacity="0.9"/>

                                                    <!-- Enhanced tag hole with rim -->
                                                    <circle cx="19.5" cy="10" r="1.2" fill="#F59E0B"/>
                                                    <circle cx="19.5" cy="10" r="0.7" fill="#FFFFFF"/>
                                                    <circle cx="19.5" cy="10" r="0.4" fill="#F59E0B"/>

                                                    <!-- Decorative sparkle effects -->
                                                    <polygon points="8,6.5 8.3,7.2 9,7 8.3,7.8 8,8.5 7.7,7.8 7,7 7.7,7.2" fill="#FFD700" opacity="0.8"/>
                                                    <polygon points="15,5.8 15.2,6.3 15.7,6.1 15.2,6.6 15,7.1 14.8,6.6 14.3,6.1 14.8,6.3" fill="#FFD700" opacity="0.8"/>
                                                    <polygon points="11,16.2 11.2,16.7 11.7,16.5 11.2,17 11,17.5 10.8,17 10.3,16.5 10.8,16.7" fill="#FFD700" opacity="0.8"/>

                                                    <!-- Small highlight dots -->
                                                    <circle cx="6.5" cy="8.5" r="0.3" fill="#FFFFFF" opacity="0.7"/>
                                                    <circle cx="18.2" cy="8.2" r="0.3" fill="#FFFFFF" opacity="0.7"/>
                                                    <circle cx="6.8" cy="15.5" r="0.3" fill="#FFFFFF" opacity="0.7"/>
                                                </svg>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-semibold text-gray-900">{{ $typeLocal->name }}</div>
                                            <div class="text-sm text-gray-500">Type de local</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end space-x-2">
                                        <a href="{{ route('type-locals.show', $typeLocal) }}"
                                           class="inline-flex items-center px-3 py-2 bg-blue-50 text-blue-700 hover:bg-blue-100 hover:text-blue-800 rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group">
                                            <svg class="h-4 w-4 mr-1 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                            Voir
                                        </a>
                                        <a href="{{ route('type-locals.edit', $typeLocal) }}"
                                           class="inline-flex items-center px-3 py-2 bg-green-50 text-green-700 hover:bg-green-100 hover:text-green-800 rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group">
                                            <svg class="h-4 w-4 mr-1 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                            Modifier
                                        </a>
                                        <form action="{{ route('type-locals.destroy', $typeLocal) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="inline-flex items-center px-3 py-2 bg-red-50 text-red-700 hover:bg-red-100 hover:text-red-800 rounded-lg transition-all duration-200 font-medium shadow-sm hover:shadow-md group"
                                                    onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce type de local ?')">
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
                                <td colspan="3" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="h-16 w-16 rounded-full bg-gradient-to-br from-green-400 via-emerald-500 to-teal-600 flex items-center justify-center shadow-lg ring-4 ring-green-100 mb-4">
                                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 mb-2">Aucun type de local trouvé</h3>
                                        <p class="text-gray-500 mb-4">Commencez par créer votre premier type de local.</p>
                                        <a href="{{ route('type-locals.create') }}"
                                           class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors">
                                            <svg class="w-4 h-4 mr-2 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                            </svg>
                                            Ajouter un Type
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Enhanced Pagination -->
            @if($typeLocals->hasPages())
            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <div class="text-sm text-gray-600">
                        Affichage de {{ $typeLocals->firstItem() }} à {{ $typeLocals->lastItem() }} sur {{ $typeLocals->total() }} résultats
                    </div>
                    <div>
                        {{ $typeLocals->links() }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
