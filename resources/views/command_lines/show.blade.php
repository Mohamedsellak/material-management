@extends('layouts.main')

@section('title', 'Détails de la Ligne de Commande')

@section('content')
<!-- Professional background -->
<div class="min-h-screen bg-gray-50">
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Enhanced Breadcrumb navigation -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('commands.index') }}" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            Commandes
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <a href="{{ route('commands.show', $commandLine->command_id) }}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2">Commande #{{ $commandLine->command_id }}</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <a href="{{ route('command_lines.index') }}" class="ml-1 text-sm font-medium text-slate-700 hover:text-blue-600 md:ml-2">Lignes de commande</a>
                        </div>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-slate-500 md:ml-2">Ligne #{{ $commandLine->id }}</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Enhanced colorful page header -->
            <div class="bg-gradient-to-r from-blue-600 via-indigo-600 to-cyan-600 rounded-xl shadow-xl p-8 mb-8">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-16 w-16 bg-white rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="h-8 w-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-6">
                            <h1 class="text-3xl font-bold text-white">Ligne de Commande #{{ $commandLine->id }}</h1>
                            <p class="text-blue-100 mt-2 text-lg">Créée le {{ $commandLine->created_at->format('d/m/Y à H:i') }}</p>
                            <div class="flex items-center mt-3 text-blue-200 text-sm">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                                Matériel: {{ $commandLine->material->name }} | Quantité: {{ $commandLine->quantity }}
                            </div>
                            <div class="flex items-center mt-1 text-blue-200 text-sm">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                                Commande #{{ $commandLine->command_id }}
                            </div>
                        </div>
                    </div>
                    <!-- Colorful Action Buttons -->
                    <div class="flex flex-wrap gap-3">
                        <!-- Primary Action: Affectation -->
                        @if($commandLine->affectations->count() > 0)
                            <a href="{{ route('affectations.create', ['commandLine' => $commandLine->id]) }}"
                               class="group relative inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-amber-500 to-orange-500 text-white text-sm font-semibold rounded-lg shadow-md hover:from-amber-600 hover:to-orange-600 hover:shadow-lg transform hover:scale-105 transition-all duration-200 border border-amber-400 hover:border-amber-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Réaffecter
                            </a>
                        @else
                            <a href="{{ route('affectations.create', ['commandLine' => $commandLine->id]) }}"
                               class="group relative inline-flex items-center px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-green-500 text-white text-sm font-semibold rounded-lg shadow-md hover:from-emerald-600 hover:to-green-600 hover:shadow-lg transform hover:scale-105 transition-all duration-200 border border-emerald-400 hover:border-emerald-500">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                </svg>
                                Affecter
                            </a>
                        @endif

                        <!-- Secondary Actions -->
                        <a href="{{ route('command_lines.edit', $commandLine) }}"
                           class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-sm font-medium rounded-lg shadow-md hover:from-blue-600 hover:to-indigo-600 hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Modifier
                        </a>

                        <!-- Navigation Actions -->
                        <div class="flex gap-2">
                            <a href="{{ route('commands.show', $commandLine->command_id) }}"
                               class="inline-flex items-center px-4 py-2.5 bg-gradient-to-r from-slate-600 to-slate-700 text-white text-sm font-medium rounded-lg shadow-md hover:from-slate-700 hover:to-slate-800 hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Commande
                            </a>

                            <a href="{{ route('command_lines.index') }}"
                               class="inline-flex items-center px-4 py-2.5 bg-white text-slate-700 text-sm font-medium rounded-lg shadow-md border border-slate-300 hover:bg-slate-50 hover:shadow-lg transform hover:scale-105 transition-all duration-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                Liste
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Details Card -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                        <div class="bg-gradient-to-r from-slate-50 to-blue-50 p-6 border-b border-slate-200">
                            <h3 class="text-xl font-bold text-slate-900 flex items-center">
                                <svg class="h-6 w-6 text-blue-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                </svg>
                                Détails de la Ligne de Commande
                            </h3>
                        </div>

                        <div class="p-8">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                                <!-- Material Info -->
                                <div>
                                    <h4 class="text-lg font-semibold text-slate-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                        Informations du Matériel
                                    </h4>
                                    <div class="space-y-4">
                                        <div>
                                            <dt class="text-sm font-medium text-slate-500">Nom du Matériel</dt>
                                            <dd class="mt-1 text-lg font-semibold text-slate-900">{{ $commandLine->material->name }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-slate-500">Type de Matériel</dt>
                                            <dd class="mt-1">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm bg-blue-100 text-blue-800">
                                                    {{ $commandLine->material->typeMaterial->name }}
                                                </span>
                                            </dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-slate-500">Description</dt>
                                            <dd class="mt-1 text-slate-900">{{ $commandLine->material->description ?: 'Aucune description' }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-slate-500">Quantité Commandée</dt>
                                            <dd class="mt-1">
                                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-green-100 text-green-800 font-semibold">
                                                    {{ $commandLine->quantity }} unité(s)
                                                </span>
                                            </dd>
                                        </div>
                                    </div>
                                </div>

                                <!-- Command Info -->
                                <div>
                                    <h4 class="text-lg font-semibold text-slate-900 mb-4 flex items-center">
                                        <svg class="w-5 h-5 text-indigo-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                        Informations de la Commande
                                    </h4>
                                    <div class="space-y-4">
                                        <div>
                                            <dt class="text-sm font-medium text-slate-500">Numéro de Commande</dt>
                                            <dd class="mt-1 text-lg font-semibold text-slate-900">#{{ $commandLine->command_id }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-slate-500">Date de Création</dt>
                                            <dd class="mt-1 text-slate-900">{{ $commandLine->created_at->format('d/m/Y à H:i') }}</dd>
                                        </div>
                                        <div>
                                            <dt class="text-sm font-medium text-slate-500">Dernière Modification</dt>
                                            <dd class="mt-1 text-slate-900">{{ $commandLine->updated_at->format('d/m/Y à H:i') }}</dd>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions Card -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                        <div class="bg-slate-100 p-6 border-b border-slate-200">
                            <h3 class="text-xl font-bold text-slate-900 flex items-center">
                                <svg class="h-6 w-6 text-violet-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 100 4m0-4v2m0-6V4"/>
                                </svg>
                                Actions
                            </h3>
                        </div>

                        <div class="p-6 space-y-6">
                            @if($commandLine->affectations->count() > 0)
                                <a href="{{ route('affectations.create', ['commandLine' => $commandLine->id]) }}"
                                   class="group relative w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-orange-500 to-orange-600 text-white font-bold rounded-2xl shadow-lg hover:from-orange-600 hover:to-orange-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-orange-300 focus:ring-opacity-50">
                                    <div class="absolute inset-0 bg-gradient-to-r from-orange-400 to-orange-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                    <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                    </svg>
                                    <span class="relative z-10">Réaffectation</span>
                                </a>
                            @else
                                <a href="{{ route('affectations.create', ['commandLine' => $commandLine->id]) }}"
                                   class="group relative w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-emerald-500 to-green-600 text-white font-bold rounded-2xl shadow-lg hover:from-emerald-600 hover:to-green-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-emerald-300 focus:ring-opacity-50">
                                    <div class="absolute inset-0 bg-gradient-to-r from-emerald-400 to-green-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                    <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    <span class="relative z-10">Nouvelle Affectation</span>
                                </a>
                            @endif

                            <a href="{{ route('command_lines.edit', $commandLine) }}"
                               class="group relative w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-violet-500 to-purple-600 text-white font-bold rounded-2xl shadow-lg hover:from-violet-600 hover:to-purple-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-violet-300 focus:ring-opacity-50">
                                <div class="absolute inset-0 bg-gradient-to-r from-violet-400 to-purple-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                <span class="relative z-10">Modifier</span>
                            </a>

                            <a href="{{ route('command_lines.pdf', $commandLine) }}"
                               class="group relative w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-bold rounded-2xl shadow-lg hover:from-blue-600 hover:to-indigo-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-blue-300 focus:ring-opacity-50">
                                <div class="absolute inset-0 bg-gradient-to-r from-blue-400 to-indigo-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="relative z-10">Télécharger PDF</span>
                            </a>

                            <a href="{{ route('command_lines.index') }}"
                               class="group relative w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-teal-500 to-cyan-600 text-white font-bold rounded-2xl shadow-lg hover:from-teal-600 hover:to-cyan-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-teal-300 focus:ring-opacity-50">
                                <div class="absolute inset-0 bg-gradient-to-r from-teal-400 to-cyan-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                                <span class="relative z-10">Toutes les lignes</span>
                            </a>

                            <div class="pt-6 border-t border-slate-200">
                                <form action="{{ route('command_lines.destroy', $commandLine) }}" method="POST" class="w-full">
                                    @csrf
                                    @method('DELETE')
                                    <input type="hidden" name="redirect_to" value="command">
                                    <input type="hidden" name="command_id" value="{{ $commandLine->command_id }}">
                                    <button type="submit"
                                            onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne de commande ?')"
                                            class="group relative w-full inline-flex items-center justify-center px-6 py-4 bg-gradient-to-r from-red-500 to-red-600 text-white font-bold rounded-2xl shadow-lg hover:from-red-600 hover:to-red-700 hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-300 ease-out focus:outline-none focus:ring-4 focus:ring-red-300 focus:ring-opacity-50">
                                        <div class="absolute inset-0 bg-gradient-to-r from-red-400 to-red-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                        <svg class="w-5 h-5 mr-3 relative z-10" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        <span class="relative z-10">Supprimer</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Affectations Section -->
            @if($commandLine->affectations->count() > 0)
            <div class="bg-white rounded-xl shadow-xl overflow-hidden mt-8">
                <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 border-b border-green-200">
                    <div class="flex items-center justify-between">
                        <h3 class="text-xl font-bold text-slate-900 flex items-center">
                            <svg class="h-6 w-6 text-emerald-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Affectations
                        </h3>
                        <span class="px-3 py-1 bg-emerald-100 text-emerald-800 text-sm font-medium rounded-full">
                            {{ $commandLine->affectations->count() }} affectation(s)
                        </span>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-gradient-to-r from-slate-100 to-blue-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">N° Inventaire</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Fonctionnaire</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">Local</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">État</th>
                                <th class="px-6 py-3 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-100">
                            @foreach($commandLine->affectations as $affectation)
                            <tr class="hover:bg-slate-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">
                                    {{ $affectation->created_at ? $affectation->created_at->format('d/m/Y') : 'Date non définie' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="px-2.5 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-800">
                                        {{ $affectation->numero_inventaire ?? 'N/A' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 bg-gradient-to-br from-blue-100 to-indigo-100 rounded-full flex items-center justify-center mr-3">
                                            <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-slate-900">
                                                {{ $affectation->commandLine && $affectation->commandLine->command && $affectation->commandLine->command->fonctionaire
                                                    ? ($affectation->commandLine->command->fonctionaire->nom . ' ' . $affectation->commandLine->command->fonctionaire->prenom)
                                                    : 'Fonctionnaire non défini' }}
                                            </div>
                                            <div class="text-sm text-slate-500">
                                                {{ $affectation->commandLine && $affectation->commandLine->command && $affectation->commandLine->command->fonctionaire && $affectation->commandLine->command->fonctionaire->departement
                                                    ? $affectation->commandLine->command->fonctionaire->departement->name
                                                    : 'Département non défini' }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="h-8 w-8 bg-gradient-to-br from-emerald-100 to-green-100 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="h-4 w-4 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <div class="text-sm font-medium text-slate-900">{{ $affectation->local->name ?? 'Local non défini' }}</div>
                                            <div class="text-sm text-slate-500">{{ $affectation->local ? ($affectation->local->typeLocal->name ?? 'Type non défini') : 'Type non défini' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if(($affectation->etat->name ?? '') == 'Bon') bg-green-100 text-green-800
                                        @elseif(($affectation->etat->name ?? '') == 'Moyen') bg-yellow-100 text-yellow-800
                                        @else bg-red-100 text-red-800
                                        @endif">
                                        {{ $affectation->etat->name ?? 'État non défini' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('affectations.show', $affectation) }}"
                                       class="p-2 text-blue-600 hover:text-blue-900 hover:bg-blue-50 rounded-lg transition-colors"
                                       title="Voir détails">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <div class="bg-white rounded-xl shadow-xl overflow-hidden mt-8">
                <div class="bg-slate-100 p-6 border-b border-slate-200">
                    <h3 class="text-xl font-bold text-slate-900 flex items-center">
                        <svg class="h-6 w-6 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                        </svg>
                        Affectations
                    </h3>
                </div>
                <div class="p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900">Aucune affectation</h3>
                    <p class="mt-1 text-sm text-gray-500">Cette ligne de commande n'a pas encore d'affectations.</p>
                    <div class="mt-6">
                        <a href="{{ route('affectations.create', ['commandLine' => $commandLine->id]) }}"
                           class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-emerald-500 to-green-500 text-white text-sm font-medium rounded-lg hover:from-emerald-600 hover:to-green-600 transition-colors shadow-md hover:shadow-lg transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Créer une affectation
                        </a>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
