@extends('layouts.main')

@section('title', 'Gestion des États')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-indigo-50 via-white to-purple-50 py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Stats Overview -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 shadow-lg border border-white/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total États</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $etats->total() }}</p>
                    </div>
                    <div class="p-3 bg-indigo-100 rounded-xl">
                        <svg class="h-6 w-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 shadow-lg border border-white/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">États Actifs</p>
                        <p class="text-2xl font-bold text-gray-900">{{ $etats->count() }}</p>
                    </div>
                    <div class="p-3 bg-emerald-100 rounded-xl">
                        <svg class="h-6 w-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-xl rounded-2xl p-6 shadow-lg border border-white/20">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Dernière mise à jour</p>
                        <p class="text-2xl font-bold text-gray-900">{{ now()->format('d M') }}</p>
                    </div>
                    <div class="p-3 bg-purple-100 rounded-xl">
                        <svg class="h-6 w-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Card -->
        <div class="bg-white/80 backdrop-blur-xl rounded-2xl shadow-xl border border-white/20">
            <!-- Header Section -->
            <div class="bg-gradient-to-r from-indigo-500 via-purple-500 to-pink-500 rounded-t-2xl p-6">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-white/20 backdrop-blur-xl rounded-xl shadow-lg">
                            <svg class="h-8 w-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-white">
                                Liste des États
                            </h2>
                            <p class="mt-1 text-indigo-100">
                                Gérez et supervisez tous les états des matériels
                            </p>
                        </div>
                    </div>
                    <a href="{{ route('etats.create') }}"
                       class="group relative inline-flex items-center px-6 py-3 bg-white/10 text-white text-sm font-semibold backdrop-blur-xl rounded-xl transition-all duration-200 hover:bg-white/20 border border-white/20 hover:border-white/40 shadow-lg hover:shadow-xl">
                        <span class="bg-white/20 rounded-lg p-1.5 mr-3 group-hover:bg-white/30 transition-colors duration-200">
                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                        </span>
                        Ajouter un État
                        <div class="absolute inset-0 rounded-xl transition-all duration-300 group-hover:ring-4 ring-white/30"></div>
                    </a>
                </div>
            </div>

            <div class="p-6">
                @if (session('success'))
                    <div class="mb-6 rounded-xl bg-emerald-50/50 backdrop-blur-xl p-4 border-l-4 border-emerald-500">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <div class="bg-emerald-100 rounded-lg p-2">
                                    <svg class="h-6 w-6 text-emerald-500" viewBox="0 0 24 24" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-emerald-800">
                                    {{ session('success') }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Modern Table -->
                <div class="overflow-hidden bg-white/50 backdrop-blur-xl border border-gray-200/50 sm:rounded-xl shadow-lg">
                    <table class="min-w-full divide-y divide-gray-200/50">
                        <thead>
                            <tr class="bg-gray-50/50 backdrop-blur-xl">
                                <th scope="col" class="px-6 py-4 text-left">
                                    <div class="flex items-center space-x-2">
                                        <span class="bg-indigo-100/50 backdrop-blur-xl rounded-lg p-2">
                                            <svg class="h-4 w-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">ID</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left">
                                    <div class="flex items-center space-x-2">
                                        <span class="bg-indigo-100/50 backdrop-blur-xl rounded-lg p-2">
                                            <svg class="h-4 w-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2h-6l-2-2H5a2 2 0 00-2 2z"/>
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-right">
                                    <div class="flex items-center justify-end space-x-2">
                                        <span class="bg-indigo-100/50 backdrop-blur-xl rounded-lg p-2">
                                            <svg class="h-4 w-4 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                            </svg>
                                        </span>
                                        <span class="text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200/50 backdrop-blur-xl">
                            @forelse($etats as $etat)
                                <tr class="group hover:bg-indigo-50/50 transition-all duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1.5 rounded-full text-xs font-medium bg-indigo-100/50 text-indigo-800 backdrop-blur-xl border border-indigo-200/50">
                                            #{{ $etat->id }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0 mr-4">
                                                <div class="h-full w-full rounded-xl bg-gradient-to-br from-indigo-100 to-purple-100 p-2 group-hover:scale-110 transition-transform duration-200">
                                                    <svg class="h-full w-full text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-sm font-semibold text-gray-900">
                                                    {{ $etat->name }}
                                                </div>
                                                <div class="text-sm text-gray-500">
                                                    ID: {{ $etat->id }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <div class="flex items-center justify-end space-x-3">
                                            <a href="{{ route('etats.show', $etat) }}"
                                               class="relative p-2 text-blue-600 hover:text-blue-900 hover:bg-blue-50/50 rounded-xl transition-all duration-200 hover:scale-110 group">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                </svg>
                                                <span class="sr-only">Voir</span>
                                                <div class="absolute inset-0 rounded-xl transition-all duration-300 group-hover:ring-4 ring-blue-500/20"></div>
                                            </a>
                                            <a href="{{ route('etats.edit', $etat) }}"
                                               class="relative p-2 text-amber-600 hover:text-amber-900 hover:bg-amber-50/50 rounded-xl transition-all duration-200 hover:scale-110 group">
                                                <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                </svg>
                                                <span class="sr-only">Modifier</span>
                                                <div class="absolute inset-0 rounded-xl transition-all duration-300 group-hover:ring-4 ring-amber-500/20"></div>
                                            </a>
                                            <form action="{{ route('etats.destroy', $etat) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="relative p-2 text-rose-600 hover:text-rose-900 hover:bg-rose-50/50 rounded-xl transition-all duration-200 hover:scale-110 group"
                                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet état ?')">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                    </svg>
                                                    <span class="sr-only">Supprimer</span>
                                                    <div class="absolute inset-0 rounded-xl transition-all duration-300 group-hover:ring-4 ring-rose-500/20"></div>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <div class="rounded-full bg-gradient-to-br from-indigo-100 to-purple-100 p-4 mb-4">
                                                <svg class="h-12 w-12 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"/>
                                                </svg>
                                            </div>
                                            <h3 class="text-xl font-semibold text-gray-900 mb-2">Aucun état disponible</h3>
                                            <p class="text-sm text-gray-500 mb-6">Commencez par ajouter un nouvel état</p>
                                            <a href="{{ route('etats.create') }}"
                                               class="inline-flex items-center px-6 py-3 bg-gradient-to-r from-indigo-500 to-purple-500 text-white text-sm font-medium rounded-xl transition-all duration-200 transform hover:scale-105 hover:shadow-lg">
                                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                                                </svg>
                                                Créer un état
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Enhanced Pagination -->
                <div class="mt-6">
                    {{ $etats->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
