@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-indigo-50">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-7xl mx-auto">
            <!-- Success Message -->
            @if(session('success'))
            <div class="mb-6 bg-gradient-to-r from-green-50 to-emerald-50 border-l-4 border-green-400 p-4 rounded-lg shadow-sm" role="alert">
                <div class="flex items-center">
                    <svg class="h-5 w-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <span class="text-green-700 font-medium">{{ session('success') }}</span>
                </div>
            </div>
            @endif

            <!-- Main Content Card -->
            <div class="bg-white shadow-2xl rounded-2xl overflow-hidden border border-gray-100">
                <!-- Enhanced Header Section -->
                <div class="bg-gradient-to-r from-blue-600 to-indigo-700 px-8 py-6 text-white">
                    <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-6">
                        <div class="flex-1">
                            <div class="flex items-center mb-3">
                                <div class="p-3 bg-white/20 rounded-lg mr-4">
                                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </div>
                                <div>
                                    <h1 class="text-3xl font-bold">Détails de l'Affectation</h1>
                                    <p class="text-blue-100 mt-1">Informations complètes sur l'affectation du matériel</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <div class="bg-white/20 px-4 py-2 rounded-lg">
                                    <span class="text-sm font-medium text-blue-100">N° Inventaire</span>
                                    <p class="text-xl font-bold">#{{ $affectation->numero_inventaire }}</p>
                                </div>
                                <div class="bg-white/20 px-4 py-2 rounded-lg">
                                    <span class="text-sm font-medium text-blue-100">Status</span>
                                    <div class="flex items-center mt-1">
                                        @php
                                            $etatColors = [
                                                'neuf' => 'bg-green-400',
                                                'bon' => 'bg-blue-400',
                                                'moyen' => 'bg-yellow-400',
                                                'mauvais' => 'bg-red-400',
                                                'casse' => 'bg-gray-400'
                                            ];
                                            $etatName = strtolower($affectation->etat->name ?? 'unknown');
                                            $colorClass = $etatColors[$etatName] ?? 'bg-gray-400';
                                        @endphp
                                        <div class="w-3 h-3 {{ $colorClass }} rounded-full mr-2"></div>
                                        <span class="font-semibold">{{ $affectation->etat->name ?? 'État non défini' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-wrap gap-3.5">
                            <a href="{{ route('affectations.pdf', $affectation) }}"
                               class="inline-flex items-center px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Exporter PDF
                            </a>
                            <a href="{{ route('affectations.edit', $affectation) }}"
                               class="inline-flex items-center px-5 py-2.5 bg-amber-500 hover:bg-amber-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-amber-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Modifier
                            </a>
                            <a href="{{ route('affectations.reaffecter', $affectation) }}"
                               class="inline-flex items-center px-5 py-2.5 bg-purple-500 hover:bg-purple-600 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-purple-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                Réaffecter
                            </a>
                            <a href="{{ route('affectations.index') }}"
                               class="inline-flex items-center px-5 py-2.5 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2">
                                <svg class="w-5 h-5 mr-2.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                Retour
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Enhanced Content Section -->
                <div class="p-6 lg:p-8">
                    <!-- Summary Cards Row -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                        <!-- Inventory Card -->
                        <div class="group bg-gradient-to-br from-blue-50 via-blue-100 to-blue-200 p-6 rounded-2xl border border-blue-200/60 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center mb-3">
                                        <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                        <p class="text-blue-700 text-sm font-bold uppercase tracking-wider">N° Inventaire</p>
                                    </div>
                                    <p class="text-2xl font-black text-blue-900 tracking-tight">#{{ $affectation->numero_inventaire }}</p>
                                    <p class="text-xs text-blue-600 mt-2 font-medium">Identifiant unique</p>
                                </div>
                                <div class="flex-shrink-0 p-4 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl shadow-xl group-hover:from-blue-600 group-hover:to-blue-700 transition-all duration-300">
                                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Material Card -->
                        <div class="group bg-gradient-to-br from-emerald-50 via-green-100 to-emerald-200 p-6 rounded-2xl border border-emerald-200/60 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center mb-3">
                                        <div class="w-2 h-2 bg-emerald-500 rounded-full mr-2"></div>
                                        <p class="text-emerald-700 text-sm font-bold uppercase tracking-wider">Matériel</p>
                                    </div>
                                    <p class="text-lg font-black text-emerald-900 mb-1 leading-tight truncate">{{ $affectation->commandLine->material->name ?? 'N/A' }}</p>
                                    <p class="text-sm text-emerald-600 font-semibold">{{ $affectation->commandLine->material->typeMaterial->name ?? 'Type N/A' }}</p>
                                </div>
                                <div class="flex-shrink-0 p-4 bg-gradient-to-br from-emerald-500 to-green-600 rounded-2xl shadow-xl group-hover:from-emerald-600 group-hover:to-green-700 transition-all duration-300">
                                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Status Card -->
                        <div class="group bg-gradient-to-br from-violet-50 via-purple-100 to-indigo-200 p-6 rounded-2xl border border-violet-200/60 hover:shadow-2xl hover:scale-[1.02] transition-all duration-300 cursor-pointer">
                            <div class="flex items-center justify-between">
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-center mb-3">
                                        <div class="w-2 h-2 bg-violet-500 rounded-full mr-2"></div>
                                        <p class="text-violet-700 text-sm font-bold uppercase tracking-wider">État</p>
                                    </div>
                                    <p class="text-lg font-black text-violet-900 mb-2">{{ $affectation->etat->name ?? 'N/A' }}</p>
                                    @php
                                        $etatColors = [
                                            'Nouveau' => 'text-emerald-600 bg-emerald-100',
                                            'Ancien' => 'text-amber-600 bg-amber-100',
                                            'Casse' => 'text-gray-600 bg-gray-100'
                                        ];
                                        $etatName = strtolower($affectation->etat->name ?? 'unknown');
                                        $statusClass = $etatColors[$etatName] ?? 'text-gray-600 bg-gray-100';
                                    @endphp
                                    <div class="flex items-center">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold {{ $statusClass }}">
                                            <div class="w-1.5 h-1.5 rounded-full bg-current mr-1.5"></div>
                                            En service
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 p-4 bg-gradient-to-br from-violet-500 to-purple-600 rounded-2xl shadow-xl group-hover:from-violet-600 group-hover:to-purple-700 transition-all duration-300">
                                    <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <!-- Location Card -->
                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-5 rounded-xl border border-orange-200 hover:shadow-lg transition-shadow duration-200">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-orange-600 text-sm font-medium mb-1">Localisation</p>
                                    <p class="text-lg font-bold text-orange-900 truncate">{{ $affectation->local->name ?? 'N/A' }}</p>
                                    <p class="text-sm text-orange-700 mt-1">{{ $affectation->local->departement->name ?? $affectation->commandLine->command->fonctionaire->departement->name ?? 'Département N/A' }}</p>
                                </div>
                                <div class="p-3.5 bg-orange-500 rounded-lg">
                                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Content Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                        <!-- Left Column - Material & Command Details -->
                        <div class="lg:col-span-2 space-y-8">
                            <!-- Material Information Card -->
                            <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 px-6 py-4">
                                    <h3 class="text-xl font-bold text-white flex items-center">
                                        <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                        </svg>
                                        Informations du Matériel
                                    </h3>
                                </div>
                                <div class="p-6 space-y-5">
                                    @if($affectation->commandLine && $affectation->commandLine->material)
                                    <!-- Material Name & Type -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Nom du Matériel</label>
                                            <div class="mt-2 flex items-center">
                                                <a href="{{ route('materials.show', $affectation->commandLine->material) }}"
                                                   class="text-lg font-bold text-green-600 hover:text-green-800 transition-colors duration-200 flex items-center">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                    </svg>
                                                    {{ $affectation->commandLine->material->name }}
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Type de Matériel</label>
                                            <p class="mt-2 text-lg font-medium text-gray-900">{{ $affectation->commandLine->material->typeMaterial->name ?? 'Type non défini' }}</p>
                                        </div>
                                    </div>

                                    <!-- Material Details -->
                                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Marque</label>
                                            <p class="mt-2 text-base font-medium text-gray-900">{{ $affectation->commandLine->material->marque ?? 'Non spécifiée' }}</p>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Modèle</label>
                                            <p class="mt-2 text-base font-medium text-gray-900">{{ $affectation->commandLine->material->modele ?? 'Non spécifié' }}</p>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Prix Unitaire</label>
                                            <p class="mt-2 text-base font-bold text-green-600">
                                                {{ number_format($affectation->commandLine->material->prix_unitaire ?? 0, 2) }} DH
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Material Description -->
                                    @if($affectation->commandLine->material->description)
                                    <div>
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Description</label>
                                        <div class="mt-2 p-4 bg-gray-50 rounded-lg">
                                            <p class="text-gray-800">{{ $affectation->commandLine->material->description }}</p>
                                        </div>
                                    </div>
                                    @endif

                                    <!-- Fournisseur Information -->
                                    @if($affectation->commandLine->material->fournisseur)
                                    <div class="border-t pt-6">
                                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                            <svg class="h-5 w-5 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            Informations Fournisseur
                                        </h4>
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                            <div>
                                                <label class="text-sm font-medium text-gray-600">Nom</label>
                                                <p class="text-base font-semibold text-gray-900">{{ $affectation->commandLine->material->fournisseur->name ?? 'N/A' }}</p>
                                            </div>
                                            <div>
                                                <label class="text-sm font-medium text-gray-600">Contact</label>
                                                <p class="text-base text-gray-900">{{ $affectation->commandLine->material->fournisseur->contact ?? 'Non spécifié' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @else
                                    <div class="text-center py-8">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                        </svg>
                                        <p class="mt-2 text-gray-500">Aucune information matériel disponible</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Command Information Card -->
                            <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
                                <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-4">
                                    <h3 class="text-xl font-bold text-white flex items-center">
                                        <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                        </svg>
                                        Informations de Commande
                                    </h3>
                                </div>
                                <div class="p-6 space-y-6">
                                    @if($affectation->commandLine && $affectation->commandLine->command)
                                    <!-- Command Details -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Numéro de Commande</label>
                                            <div class="mt-2">
                                                <a href="{{ route('commands.show', $affectation->commandLine->command) }}"
                                                   class="text-lg font-bold text-blue-600 hover:text-blue-800 transition-colors duration-200 flex items-center">
                                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                    </svg>
                                                    #{{ $affectation->commandLine->command->id }}
                                                </a>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Ligne de Commande</label>
                                            <p class="mt-2 text-lg font-bold text-gray-900">#{{ $affectation->commandLine->id ?? 'N/A' }}</p>
                                        </div>
                                    </div>

                                    <!-- Date Information -->
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Date de Commande</label>
                                            <div class="mt-2">
                                                <p class="text-lg font-semibold text-gray-900">
                                                    {{ $affectation->commandLine->command->date_commande ? \Carbon\Carbon::parse($affectation->commandLine->command->date_commande)->format('d/m/Y à H:i') : 'N/A' }}
                                                </p>
                                                @if($affectation->commandLine->command->date_commande)
                                                <p class="text-sm text-gray-500 mt-1">
                                                    {{ \Carbon\Carbon::parse($affectation->commandLine->command->date_commande)->diffForHumans() }}
                                                </p>
                                                @endif
                                            </div>
                                        </div>
                                        <div>
                                            <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Quantité Commandée</label>
                                            <p class="mt-2 text-lg font-bold text-indigo-600">{{ $affectation->commandLine->quantity ?? 'N/A' }} unité(s)</p>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center py-8">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                        <p class="mt-2 text-gray-500">Aucune information de commande disponible</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Right Column - Personnel & Location Details -->
                        <div class="space-y-8">
                            <!-- Personnel Information Card -->
                            <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
                                <div class="bg-gradient-to-r from-indigo-500 to-purple-600 px-6 py-4">
                                    <h3 class="text-xl font-bold text-white flex items-center">
                                        <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        Informations Personnel
                                    </h3>
                                </div>
                                <div class="p-6">
                                    @if($affectation->commandLine && $affectation->commandLine->command && $affectation->commandLine->command->fonctionaire)
                                    <!-- Profile Section -->
                                    <div class="flex items-center mb-6">
                                        <div class="flex-shrink-0 h-16 w-16">
                                            <div class="h-16 w-16 rounded-full bg-gradient-to-r from-indigo-400 to-purple-500 flex items-center justify-center shadow-lg">
                                                <span class="text-white font-bold text-xl">
                                                    {{ substr($affectation->commandLine->command->fonctionaire->prenom ?? 'U', 0, 1) }}{{ substr($affectation->commandLine->command->fonctionaire->nom ?? 'N', 0, 1) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <h4 class="text-xl font-bold text-gray-900">
                                                {{ $affectation->commandLine->command->fonctionaire->prenom ?? 'N/A' }}
                                                {{ $affectation->commandLine->command->fonctionaire->nom ?? '' }}
                                            </h4>
                                            <p class="text-gray-600">{{ $affectation->commandLine->command->fonctionaire->poste ?? 'Poste non défini' }}</p>
                                        </div>
                                    </div>

                                    <!-- Contact Information -->
                                    <div class="space-y-4">
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-gray-900 font-medium">{{ $affectation->commandLine->command->fonctionaire->email ?? 'Email non défini' }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                            </svg>
                                            <span class="text-gray-900 font-medium">{{ $affectation->commandLine->command->fonctionaire->telephone ?? 'Téléphone non défini' }}</span>
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="h-5 w-5 text-gray-400 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            <span class="text-gray-900 font-medium">{{ $affectation->commandLine->command->fonctionaire->departement->name ?? 'Département non défini' }}</span>
                                        </div>
                                    </div>
                                    @else
                                    <div class="text-center py-8">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                        </svg>
                                        <p class="mt-2 text-gray-500">Aucune information personnel disponible</p>
                                    </div>
                                    @endif
                                </div>
                            </div>

                            <!-- Location Information Card -->
                            <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
                                <div class="bg-gradient-to-r from-orange-500 to-red-600 px-6 py-4">
                                    <h3 class="text-xl font-bold text-white flex items-center">
                                        <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        Informations de Localisation
                                    </h3>
                                </div>
                                <div class="p-6 space-y-6">
                                    <!-- Current Location -->
                                    <div>
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Local Actuel</label>
                                        <div class="mt-3 p-4 bg-orange-50 rounded-lg border border-orange-200">
                                            @if($affectation->local)
                                            <div class="flex items-center justify-between">
                                                <div>
                                                    <a href="{{ route('locals.show', $affectation->local) }}"
                                                       class="text-lg font-bold text-orange-600 hover:text-orange-800 transition-colors duration-200 flex items-center">
                                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                        </svg>
                                                        {{ $affectation->local->name }}
                                                    </a>
                                                    <p class="text-sm text-gray-600 mt-1">{{ $affectation->local->description ?? 'Description non disponible' }}</p>
                                                </div>
                                                <div class="text-right">
                                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                                        </svg>
                                                        Assigné
                                                    </span>
                                                </div>
                                            </div>
                                            @else
                                            <div class="text-center">
                                                <p class="text-gray-500">Aucun local spécifique assigné</p>
                                                <p class="text-sm text-gray-400 mt-1">Matériel assigné au département par défaut</p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Department Information -->
                                    <div>
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Département</label>
                                        <div class="mt-3 p-4 bg-blue-50 rounded-lg border border-blue-200">
                                            @php
                                                $departement = $affectation->local->departement ?? $affectation->commandLine->command->fonctionaire->departement ?? null;
                                            @endphp
                                            @if($departement)
                                            <div class="flex items-center">
                                                <div class="p-2 bg-blue-500 rounded-lg mr-3">
                                                    <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                                    </svg>
                                                </div>
                                                <div>
                                                    <a href="{{ route('departements.show', $departement) }}"
                                                       class="text-lg font-bold text-blue-600 hover:text-blue-800 transition-colors duration-200">
                                                        {{ $departement->name }}
                                                    </a>
                                                    <p class="text-sm text-gray-600">{{ $departement->description ?? 'Description non disponible' }}</p>
                                                </div>
                                            </div>
                                            @else
                                            <p class="text-gray-500">Département non défini</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Location Type -->
                                    @if($affectation->local && $affectation->local->typeLocal)
                                    <div>
                                        <label class="text-sm font-semibold text-gray-600 uppercase tracking-wide">Type de Local</label>
                                        <div class="mt-3 flex items-center">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                                                {{ $affectation->local->typeLocal->name }}
                                            </span>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>                </div>

                <!-- Enhanced Timeline Section -->
                <div class="mt-6">
                        <div class="bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
                            <div class="bg-gradient-to-r from-gray-600 to-gray-700 px-6 py-4">
                                <h3 class="text-xl font-bold text-white flex items-center">
                                    <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    Historique et Chronologie
                                </h3>
                            </div>
                            <div class="p-6">
                                <div class="flow-root">
                                    <ul role="list" class="-mb-8">
                                        <!-- Creation Event -->
                                        <li>
                                            <div class="relative pb-6">
                                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span class="h-8 w-8 rounded-full bg-green-500 flex items-center justify-center ring-8 ring-white shadow-lg">
                                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="min-w-0 flex-1 pt-1.5">
                                                        <div class="flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-lg font-semibold text-gray-900">Création de l'affectation</p>
                                                                <p class="text-sm text-gray-500">L'affectation a été créée dans le système</p>
                                                                <div class="mt-2 flex items-center space-x-4">
                                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                                        Créé
                                                                    </span>
                                                                    <span class="text-xs text-gray-400">ID: {{ $affectation->id }}</span>
                                                                </div>
                                                            </div>
                                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                <time datetime="{{ $affectation->created_at->format('Y-m-d H:i') }}" class="font-medium text-gray-900">
                                                                    {{ $affectation->created_at->format('d/m/Y à H:i') }}
                                                                </time>
                                                                <p class="text-xs">{{ $affectation->created_at->diffForHumans() }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>

                                        <!-- Command Date Event -->
                                        @if($affectation->commandLine && $affectation->commandLine->command && $affectation->commandLine->command->date_commande)
                                        <li>
                                            <div class="relative pb-6">
                                                <span class="absolute top-4 left-4 -ml-px h-full w-0.5 bg-gray-200" aria-hidden="true"></span>
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span class="h-8 w-8 rounded-full bg-blue-500 flex items-center justify-center ring-8 ring-white shadow-lg">
                                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="min-w-0 flex-1 pt-1.5">
                                                        <div class="flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-lg font-semibold text-gray-900">Commande passée</p>
                                                                <p class="text-sm text-gray-500">Commande #{{ $affectation->commandLine->command->id }} effectuée</p>
                                                                <div class="mt-2">
                                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                                        Commandé
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                <time datetime="{{ \Carbon\Carbon::parse($affectation->commandLine->command->date_commande)->format('Y-m-d H:i') }}" class="font-medium text-gray-900">
                                                                    {{ \Carbon\Carbon::parse($affectation->commandLine->command->date_commande)->format('d/m/Y à H:i') }}
                                                                </time>
                                                                <p class="text-xs">{{ \Carbon\Carbon::parse($affectation->commandLine->command->date_commande)->diffForHumans() }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                        @endif

                                        <!-- Last Update Event -->
                                        <li>
                                            <div class="relative">
                                                <div class="relative flex space-x-3">
                                                    <div>
                                                        <span class="h-8 w-8 rounded-full bg-indigo-500 flex items-center justify-center ring-8 ring-white shadow-lg">
                                                            <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                            </svg>
                                                        </span>
                                                    </div>
                                                    <div class="min-w-0 flex-1 pt-1.5">
                                                        <div class="flex justify-between space-x-4">
                                                            <div>
                                                                <p class="text-lg font-semibold text-gray-900">Dernière modification</p>
                                                                <p class="text-sm text-gray-500">Information mise à jour récemment</p>
                                                                <div class="mt-2">
                                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                                                        Modifié
                                                                    </span>
                                                                </div>
                                                            </div>
                                                            <div class="text-right text-sm whitespace-nowrap text-gray-500">
                                                                <time datetime="{{ $affectation->updated_at ? $affectation->updated_at->format('Y-m-d H:i') : '' }}" class="font-medium text-gray-900">
                                                                    {{ $affectation->updated_at ? $affectation->updated_at->format('d/m/Y à H:i') : 'N/A' }}
                                                                </time>
                                                                @if($affectation->updated_at)
                                                                <p class="text-xs">{{ $affectation->updated_at->diffForHumans() }}</p>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Enhanced Actions Section -->
                    <div class="mt-6 bg-white border border-gray-200 rounded-2xl shadow-lg overflow-hidden">
                        <div class="bg-gradient-to-r from-red-500 to-pink-600 px-6 py-4">
                            <h3 class="text-xl font-bold text-white flex items-center">
                                <svg class="h-6 w-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 5v.01M12 12v.01M12 19v.01M12 6a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2zm0 7a1 1 0 110-2 1 1 0 010 2z"/>
                                </svg>
                                Actions Avancées
                            </h3>
                        </div>
                        <div class="p-5">
                            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
                                <div class="text-gray-600">
                                    <p class="font-medium">Actions destructrices</p>
                                    <p class="text-sm">Ces actions sont irréversibles. Procédez avec prudence.</p>
                                </div>
                                <form action="{{ route('affectations.destroy', $affectation) }}"
                                      method="POST"
                                      onsubmit="return confirm('⚠️ ATTENTION ⚠️\n\nÊtes-vous absolument sûr de vouloir supprimer cette affectation ?\n\nCette action est IRRÉVERSIBLE et supprimera définitivement :\n• L\'affectation du matériel\n• L\'historique associé\n• Les liens avec les commandes\n\nTapez \"SUPPRIMER\" pour confirmer.');"
                                      class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-red-600 to-red-700 hover:from-red-700 hover:to-red-800 text-white font-bold rounded-lg shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Supprimer l'affectation
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
