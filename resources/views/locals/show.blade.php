@extends('layouts.main')

@section('title', 'Détails du Local')

@section('content')
<div class="py-12 bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-4 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-blue-600">
                        <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        Accueil
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <a href="{{ route('locals.index') }}" class="ml-1 text-gray-700 hover:text-blue-600">Locaux</a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-1 text-gray-500">{{ $local->name ?? 'N/A' }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Header Section with Enhanced Styling -->
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg mb-6 transform transition-all duration-300 hover:shadow-2xl border border-gray-200">
            <div class="p-6 border-b border-gray-200 bg-gradient-to-r from-slate-50 via-white to-slate-50">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gradient-to-br from-blue-50 to-indigo-100 rounded-xl shadow-lg border border-blue-100">
                            <!-- Colorful Office Building SVG -->
                            <svg class="h-12 w-12 transform transition-transform duration-300 hover:rotate-12" viewBox="0 0 24 24" fill="none">
                                <defs>
                                    <linearGradient id="buildingGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                        <stop offset="50%" style="stop-color:#1d4ed8;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#1e40af;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="windowGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#f59e0b;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#f97316;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <rect x="4" y="3" width="16" height="18" rx="1" fill="url(#buildingGrad)"/>
                                <rect x="6" y="6" width="2" height="2" rx="0.3" fill="url(#windowGrad)"/>
                                <rect x="10" y="6" width="2" height="2" rx="0.3" fill="#06d6a0"/>
                                <rect x="14" y="6" width="2" height="2" rx="0.3" fill="#f72585"/>
                                <rect x="6" y="10" width="2" height="2" rx="0.3" fill="#118ab2"/>
                                <rect x="10" y="10" width="2" height="2" rx="0.3" fill="url(#windowGrad)"/>
                                <rect x="14" y="10" width="2" height="2" rx="0.3" fill="#06d6a0"/>
                                <rect x="6" y="14" width="2" height="2" rx="0.3" fill="#f72585"/>
                                <rect x="10" y="14" width="2" height="2" rx="0.3" fill="#118ab2"/>
                                <rect x="14" y="14" width="2" height="2" rx="0.3" fill="url(#windowGrad)"/>
                                <rect x="9" y="17" width="6" height="4" fill="#e11d48"/>
                                <circle cx="12" cy="19" r="0.5" fill="#fde047"/>
                            </svg>
                        </div>
                        <div>
                            <div class="flex items-center space-x-2">
                                <h2 class="text-3xl font-bold text-gray-900">
                                    {{ $local->name ?? 'N/A' }}
                                </h2>
                                <span class="px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full">
                                    {{ $local->typeLocal->name ?? 'Type non défini' }}
                                </span>
                            </div>
                            <div class="mt-2 flex items-center space-x-4">
                                <p class="text-sm text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Créé le {{ $local->created_at ? $local->created_at->format('d/m/Y') : 'N/A' }}
                                </p>
                                <p class="text-sm text-gray-500 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    {{ $local->departement->name ?? 'Département non défini' }}
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('locals.edit', $local) }}"
                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 hover:shadow-lg border border-amber-600">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Modifier
                        </a>
                        <a href="{{ route('locals.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-slate-600 to-slate-700 hover:from-slate-700 hover:to-slate-800 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 hover:shadow-lg border border-slate-700">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Info Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
            <!-- General Information Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:scale-[1.02] border border-gray-200">
                <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-slate-50 via-slate-100 to-slate-50">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                        <svg class="h-6 w-6 mr-2 text-slate-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                        Informations Générales
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <dl class="grid grid-cols-1 gap-6">
                        <div class="flex flex-col p-4 bg-slate-50 rounded-lg transition-all duration-300 hover:shadow-md border border-slate-200">
                            <dt class="text-sm font-medium text-gray-500 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Nom du Local
                            </dt>
                            <dd class="mt-2 text-lg text-gray-900 font-semibold">{{ $local->name ?? 'N/A' }}</dd>
                        </div>
                        <div class="flex flex-col p-4 bg-slate-50 rounded-lg transition-all duration-300 hover:shadow-md border border-slate-200">
                            <dt class="text-sm font-medium text-gray-500 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                Type de Local
                            </dt>
                            <dd class="mt-2 text-lg text-gray-900 font-semibold">{{ $local->typeLocal->name ?? 'Type non défini' }}</dd>
                        </div>
                        <div class="flex flex-col p-4 bg-slate-50 rounded-lg transition-all duration-300 hover:shadow-md border border-slate-200">
                            <dt class="text-sm font-medium text-gray-500 flex items-center">
                                <svg class="h-5 w-5 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                Département
                            </dt>
                            <dd class="mt-2 text-lg text-gray-900 font-semibold">{{ $local->departement->name ?? 'Département non défini' }}</dd>
                        </div>
                    </dl>
                </div>
            </div>

            <!-- Statistics Card -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl hover:scale-[1.02] border border-gray-200">
                <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-indigo-50 via-indigo-100 to-indigo-50">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                        <svg class="h-6 w-6 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        Statistiques et Activités
                    </h3>
                </div>
                <div class="p-6 space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Affectations Counter -->
                        <div class="p-4 bg-indigo-50 rounded-lg text-center transform transition-all duration-300 hover:shadow-lg border border-indigo-100">
                            <dt class="text-sm font-medium text-indigo-600">Affectations Totales</dt>
                            <dd class="mt-2 text-4xl font-extrabold text-indigo-700">
                                {{ $local->affectations ? $local->affectations->count() : 0 }}
                            </dd>
                            <dd class="mt-1 text-sm text-indigo-500">
                                depuis la création
                            </dd>
                        </div>

                        <!-- Last Update -->
                        <div class="p-4 bg-indigo-50 rounded-lg text-center transform transition-all duration-300 hover:shadow-lg border border-indigo-100">
                            <dt class="text-sm font-medium text-indigo-600">Dernière Mise à Jour</dt>
                            <dd class="mt-2 text-lg font-bold text-indigo-700">
                                {{ $local->updated_at ? $local->updated_at->format('d/m/Y') : "N/A" }}
                            </dd>
                            <dd class="mt-1 text-sm text-indigo-500">
                                {{ $local->updated_at ? $local->updated_at->format('H:i') : "" }}
                            </dd>
                        </div>
                    </div>

                    <!-- Additional Stats -->
                    <div class="mt-6 p-4 bg-gradient-to-br from-indigo-50 to-indigo-100 rounded-lg border border-indigo-100">
                        <h4 class="text-sm font-semibold text-indigo-700 mb-3">Activité Récente</h4>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-indigo-600">Dernière Affectation</span>
                                <span class="text-sm font-medium text-indigo-700">
                                    {{ $local->affectations && $local->affectations->sortByDesc('created_at')->first() ? $local->affectations->sortByDesc('created_at')->first()->created_at->format('d/m/Y') : 'Aucune' }}
                                </span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-sm text-indigo-600">État du Local</span>
                                <span class="px-3 py-1 text-sm font-medium bg-emerald-100 text-emerald-800 rounded-full border border-emerald-200">
                                    Actif
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Affectations Table Section -->
        @if($local->affectations && $local->affectations->count() > 0)
        <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition-all duration-300 hover:shadow-2xl border border-gray-200">
            <div class="p-5 border-b border-gray-200 bg-gradient-to-r from-emerald-50 via-emerald-100 to-emerald-50">
                <div class="flex items-center justify-between">
                    <h3 class="text-xl font-semibold text-gray-900 flex items-center">
                        <svg class="h-6 w-6 mr-2 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Affectations Récentes
                        <span class="ml-2 px-3 py-1 text-sm bg-emerald-100 text-emerald-800 rounded-full border border-emerald-200">
                            {{ $local->affectations ? $local->affectations->count() : 0 }} total
                        </span>
                    </h3>
                    @if($local->affectations && $local->affectations->count() > 3)
                    <a href="{{ route('affectations.index', ['local' => $local->id]) }}"
                       class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-600 to-emerald-700 hover:from-emerald-700 hover:to-emerald-800 text-white text-sm font-medium rounded-lg shadow-sm transition-all duration-200 transform hover:scale-105 hover:shadow-lg border border-emerald-700">
                        <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                        Voir toutes les affectations
                    </a>
                    @endif
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date d'Affectation</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Numéro d'Inventaire</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">État</th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Commande Line ID</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($local->affectations->sortByDesc('created_at')->take(3) as $affectation)
                        <tr class="hover:bg-gray-50 transition-colors duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-8 w-8 flex items-center justify-center rounded-full bg-blue-100 border border-blue-200">
                                        <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $affectation->created_at->format('d/m/Y') }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $affectation->created_at->format('H:i') }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $affectation->numero_inventaire }}</div>
                                <div class="text-sm text-gray-500">Inventaire</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="px-3 py-1 rounded-full text-sm font-medium border
                                    {{ $affectation->etat ? 'bg-emerald-100 text-emerald-800 border-emerald-200' : 'bg-gray-100 text-gray-800 border-gray-200' }}">
                                    {{ $affectation->etat->name ?? 'N/A' }}
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-900">{{ $affectation->commandLine->command_id ?? 'N/A' }}</div>
                                <div class="text-sm text-gray-500">ID Commande</div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($local->affectations->count() > 3)
            <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                <div class="flex items-center justify-between">
                    <p class="text-sm text-gray-600">
                        Affichage de 3 sur {{ $local->affectations->count() }} affectations
                    </p>
                    <a href="{{ route('affectations.index', ['local' => $local->id]) }}"
                       class="inline-flex items-center text-sm font-medium text-emerald-600 hover:text-emerald-800 transition-colors duration-200">
                        Voir {{ $local->affectations->count() - 3 }} affectations supplémentaires
                        <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </a>
                </div>
            </div>
            @endif
        </div>
        @else
        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
            <div class="p-8 text-center">
                <div class="flex flex-col items-center">
                    <div class="p-4 bg-gray-100 rounded-full mb-4">
                        <svg class="h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                    <h3 class="text-lg font-medium text-gray-900 mb-2">Aucune affectation</h3>
                    <p class="text-gray-500">Ce local n'a encore aucune affectation de matériel.</p>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
