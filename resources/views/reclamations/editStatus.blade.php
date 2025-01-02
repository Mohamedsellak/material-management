@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-10">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl p-8 mb-8 border border-white/20">
            <div class="flex items-center gap-4">
                <a href="{{ route('reclamations.index') }}" 
                   class="text-gray-600 hover:text-blue-600 transition-colors duration-200">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                </a>
                <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                    Modifier le Statut
                </h1>
            </div>
        </div>

        <!-- Content Card -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl border border-white/20 overflow-hidden">
            <div class="p-8">
                <!-- Reclamation Details -->
                <div class="mb-8 bg-gray-50/50 rounded-2xl p-6 border border-gray-100">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ $reclamation->name }}</h2>
                    <p class="text-gray-600 text-lg">{{ $reclamation->description }}</p>
                    <div class="mt-4 flex items-center gap-3">
                        <span class="text-sm font-medium text-gray-500">Statut actuel:</span>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold
                            {{ $reclamation->status === 'en attente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                            {{ $reclamation->status === 'en cours' ? 'bg-blue-100 text-blue-800' : '' }}
                            {{ $reclamation->status === 'resolue' ? 'bg-green-100 text-green-800' : '' }}">
                            <span class="w-2 h-2 rounded-full mr-2
                                {{ $reclamation->status === 'en attente' ? 'bg-yellow-500' : '' }}
                                {{ $reclamation->status === 'en cours' ? 'bg-blue-500' : '' }}
                                {{ $reclamation->status === 'resolue' ? 'bg-green-500' : '' }}">
                            </span>
                            {{ ucfirst($reclamation->status) }}
                        </span>
                    </div>
                </div>

                <!-- Status Update Form -->
                <form action="{{ route('reclamations.updateStatus', $reclamation) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="group">
                        <label for="status" class="block text-sm font-semibold text-gray-700 mb-2">Nouveau Statut</label>
                        <div class="relative">
                            <select name="status" id="status" 
                                class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all duration-200 group-hover:border-blue-400">
                                <option value="en attente" {{ old('status', $reclamation->status) == 'en attente' ? 'selected' : '' }}>En attente</option>
                                <option value="en cours" {{ old('status', $reclamation->status) == 'en cours' ? 'selected' : '' }}>En cours</option>
                                <option value="resolue" {{ old('status', $reclamation->status) == 'resolue' ? 'selected' : '' }}>Résolue</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="group">
                        <label for="commentaire" class="block text-sm font-semibold text-gray-700 mb-2">Commentaire sur le changement</label>
                        <div class="relative">
                            <textarea name="commentaire" id="commentaire" rows="4" 
                                class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all duration-200 group-hover:border-blue-400"
                                placeholder="Ajoutez un commentaire expliquant le changement de statut...">{{ old('commentaire', $reclamation->commentaire) }}</textarea>
                            <div class="absolute top-0 right-0 mt-2 mr-2">
                                <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                            </div>
                        </div>
                        @error('commentaire')
                            <p class="mt-1 text-sm text-red-600 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Form Actions -->
                    <div class="flex justify-end space-x-4 pt-6 border-t border-gray-100">
                        <a href="{{ route('reclamations.index') }}" 
                            class="px-6 py-3 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 transition-all duration-200 flex items-center gap-2 font-medium group">
                            <svg class="w-5 h-5 group-hover:scale-110 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Annuler
                        </a>
                        <button type="submit" 
                            class="px-6 py-3 bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-200 flex items-center gap-2 font-medium shadow-lg hover:shadow-xl transform hover:scale-[1.02]">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            Mettre à jour le statut
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 