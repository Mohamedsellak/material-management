@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-10">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl p-8 mb-8 border border-white/20">
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-6">
                <div class="flex items-center gap-4">
                    <a href="{{ route('reclamations.index') }}" 
                       class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </a>
                    <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                        Détails de la Réclamation
                    </h1>
                </div>
                <div class="flex flex-wrap gap-3">
                    <a href="{{ route('reclamations.edit', $reclamation) }}" 
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Modifier
                    </a>
                    <a href="{{ route('reclamations.editStatus', $reclamation) }}" 
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gradient-to-r from-purple-600 to-pink-600 text-white rounded-xl hover:from-purple-700 hover:to-pink-700 transition-all duration-200 shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        Changer le Statut
                    </a>
                </div>
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white/20 overflow-hidden">
            <div class="p-8">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left Column -->
                    <div class="space-y-8">
                        <!-- Name Section -->
                        <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Nom de la réclamation</h3>
                            <p class="text-xl font-semibold text-gray-900">{{ $reclamation->name }}</p>
                        </div>

                        <!-- Local Section -->
                        <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Local</h3>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                </svg>
                                <p class="text-xl font-semibold text-gray-900">{{ $reclamation->local->name }}</p>
                            </div>
                        </div>

                        <!-- Status Section -->
                        <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Statut</h3>
                            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-semibold
                                {{ $reclamation->status === 'en attente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $reclamation->status === 'en cours' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $reclamation->status === 'resolue' ? 'bg-green-100 text-green-800' : '' }}">
                                <span class="w-2.5 h-2.5 rounded-full mr-2
                                    {{ $reclamation->status === 'en attente' ? 'bg-yellow-500 animate-pulse' : '' }}
                                    {{ $reclamation->status === 'en cours' ? 'bg-blue-500 animate-pulse' : '' }}
                                    {{ $reclamation->status === 'resolue' ? 'bg-green-500' : '' }}">
                                </span>
                                {{ ucfirst($reclamation->status) }}
                            </span>
                        </div>
                    </div>

                    <!-- Right Column -->
                    <div class="space-y-8">
                        <!-- Date Section -->
                        <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Date de création</h3>
                            <div class="flex items-center gap-3">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <p class="text-xl font-semibold text-gray-900">{{ $reclamation->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <!-- Description Section -->
                        <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Description</h3>
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $reclamation->description }}</p>
                        </div>

                        <!-- Commentaire Section -->
                        <div class="bg-gray-50/50 rounded-2xl p-6 border border-gray-100">
                            <h3 class="text-sm font-medium text-gray-500 mb-2">Commentaire</h3>
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $reclamation->commentaire ?: 'Aucun commentaire' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-8 flex justify-end">
                    <a href="{{ route('reclamations.index') }}" 
                        class="inline-flex items-center gap-2 px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 font-medium group">
                        <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour à la liste
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 