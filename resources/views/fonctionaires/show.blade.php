@extends('layouts.main')

@section('title', 'Détails du Fonctionnaire')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Header with Back Button -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                            {{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}
                        </h2>
                        <p class="text-gray-500 dark:text-gray-400">
                            {{ $fonctionnaire->departement->name }}
                        </p>
                    </div>
                    <a href="{{ route('fonctionaires.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-200 text-sm font-medium rounded-md transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour
                    </a>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                    <div class="bg-blue-50 dark:bg-blue-900/50 p-6 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <div class="p-3 bg-blue-500 rounded-full">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-700 dark:text-gray-200">Commandes</h4>
                                <p class="text-2xl font-bold text-blue-600 dark:text-blue-400">
                                    {{ $fonctionnaire->commands->count() }}
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Add more statistics cards as needed -->
                </div>

                <!-- Information Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <!-- Personal Information Section -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Informations Personnelles
                        </h3>
                        
                        <div class="space-y-4">
                            <div class="flex border-b border-gray-200 dark:border-gray-600 pb-3">
                                <span class="text-gray-600 dark:text-gray-400 w-1/3">Nom Complet</span>
                                <span class="text-gray-900 dark:text-white font-medium">
                                    {{ $fonctionnaire->nom }} {{ $fonctionnaire->prenom }}
                                </span>
                            </div>
                            <div class="flex border-b border-gray-200 dark:border-gray-600 pb-3">
                                <span class="text-gray-600 dark:text-gray-400 w-1/3">Email</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ $fonctionnaire->email }}</span>
                            </div>
                            <div class="flex border-b border-gray-200 dark:border-gray-600 pb-3">
                                <span class="text-gray-600 dark:text-gray-400 w-1/3">Téléphone</span>
                                <span class="text-gray-900 dark:text-white font-medium">{{ $fonctionnaire->telephone }}</span>
                            </div>
                            <div class="flex">
                                <span class="text-gray-600 dark:text-gray-400 w-1/3">Département</span>
                                <span class="text-gray-900 dark:text-white font-medium">
                                    {{ $fonctionnaire->departement->name }}
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Recent Activities Section -->
                    <div class="bg-white dark:bg-gray-700 rounded-lg p-6 shadow-sm">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                            <svg class="w-5 h-5 inline-block mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Activités Récentes
                        </h3>
                        
                        <div class="space-y-4">
                            @forelse($fonctionnaire->commands()->latest()->take(5)->get() as $command)
                                <div class="flex items-center border-b border-gray-200 dark:border-gray-600 pb-3">
                                    <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                    <div class="flex-1">
                                        <p class="text-sm text-gray-600 dark:text-gray-400">
                                            Commande #{{ $command->id }}
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-500">
                                            {{ $command->created_at->diffForHumans() }}
                                        </p>
                                    </div>
                                </div>
                            @empty
                                <p class="text-gray-500 dark:text-gray-400 text-center py-4">
                                    Aucune activité récente
                                </p>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-end items-center space-x-3 mt-6">
                    <a href="{{ route('fonctionaires.edit', $fonctionnaire) }}"
                       class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                  d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Modifier
                    </a>

                    <form action="{{ route('fonctionaires.destroy', $fonctionnaire) }}" 
                          method="POST" 
                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce fonctionnaire ?');"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-md shadow-sm transition-colors duration-200">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                      d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
