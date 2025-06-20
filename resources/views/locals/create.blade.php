@extends('layouts.main')

@section('title', 'Ajouter un Local')

@section('content')
<div class="py-12 bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                <div class="p-6 bg-gradient-to-r from-blue-50 via-blue-100 to-blue-50">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg">
                            <!-- Colorful Add Local SVG -->
                            <svg class="h-12 w-12" viewBox="0 0 24 24" fill="none">
                                <defs>
                                    <linearGradient id="addGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#ffffff;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#f1f5f9;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="buildingBright" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#06d6a0;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#118ab2;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <rect x="3" y="4" width="14" height="16" rx="1" fill="url(#buildingBright)"/>
                                <rect x="5" y="7" width="2" height="2" rx="0.3" fill="#ffd60a"/>
                                <rect x="9" y="7" width="2" height="2" rx="0.3" fill="#f72585"/>
                                <rect x="13" y="7" width="2" height="2" rx="0.3" fill="#06d6a0"/>
                                <rect x="5" y="11" width="2" height="2" rx="0.3" fill="#ff006e"/>
                                <rect x="9" y="11" width="2" height="2" rx="0.3" fill="#ffd60a"/>
                                <rect x="13" y="11" width="2" height="2" rx="0.3" fill="#f72585"/>
                                <rect x="8" y="16" width="4" height="4" fill="#e11d48"/>
                                <circle cx="19" cy="5" r="4" fill="#22c55e"/>
                                <path d="M17 5h4M19 3v4" stroke="url(#addGrad)" stroke-width="2" stroke-linecap="round"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">
                                Ajouter un Nouveau Local
                            </h2>
                            <p class="text-gray-600 mt-1">Créez un nouveau local dans le système</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
            <div class="p-8">
                <form action="{{ route('locals.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <!-- Colorful Name Icon -->
                                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none">
                                        <defs>
                                            <linearGradient id="nameGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#1d4ed8;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M4 7h16M4 12h16M4 17h10" stroke="url(#nameGrad)" stroke-width="2" stroke-linecap="round"/>
                                        <circle cx="19" cy="17" r="2" fill="#f59e0b"/>
                                    </svg>
                                    Nom du Local
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-900 bg-gray-50 border-2 transition-all duration-200 hover:bg-white focus:bg-white"
                                       placeholder="Entrez le nom du local"
                                       required>
                                @error('name')
                                    <p class="mt-2 text-sm text-red-600 bg-red-50 p-2 rounded-md border border-red-200">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="type_local_id" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <!-- Colorful Type Icon -->
                                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none">
                                        <defs>
                                            <linearGradient id="typeGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#10b981;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" stroke="url(#typeGrad)" stroke-width="2" fill="none"/>
                                        <circle cx="7" cy="7" r="1" fill="#f59e0b"/>
                                        <circle cx="18" cy="12" r="2" fill="#ef4444"/>
                                    </svg>
                                    Type de Local
                                </label>
                                <select name="type_local_id" id="type_local_id"
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-900 bg-gray-50 border-2 transition-all duration-200 hover:bg-white focus:bg-white"
                                        required>
                                    <option value="">Sélectionner un type</option>
                                    @foreach($typeLocals as $type)
                                        <option value="{{ $type->id }}" {{ old('type_local_id') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('type_local_id')
                                    <p class="mt-2 text-sm text-red-600 bg-red-50 p-2 rounded-md border border-red-200">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div>
                                <label for="departement_id" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <!-- Colorful Department Icon -->
                                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none">
                                        <defs>
                                            <linearGradient id="deptGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#8b5cf6;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#7c3aed;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke="url(#deptGrad)" stroke-width="2" fill="none"/>
                                        <circle cx="9.5" cy="7.5" r="0.5" fill="#f59e0b"/>
                                        <circle cx="9.5" cy="11.5" r="0.5" fill="#22c55e"/>
                                        <circle cx="13.5" cy="7.5" r="0.5" fill="#ef4444"/>
                                        <circle cx="13.5" cy="11.5" r="0.5" fill="#06b6d4"/>
                                    </svg>
                                    Département
                                </label>
                                <select name="departement_id" id="departement_id"
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 text-gray-900 bg-gray-50 border-2 transition-all duration-200 hover:bg-white focus:bg-white"
                                        required>
                                    <option value="">Sélectionner un département</option>
                                    @foreach($departements as $departement)
                                        <option value="{{ $departement->id }}" {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                                            {{ $departement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <p class="mt-2 text-sm text-red-600 bg-red-50 p-2 rounded-md border border-red-200">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Info Card -->
                            <div class="bg-gradient-to-br from-blue-50 to-indigo-100 p-6 rounded-lg border border-blue-200">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <h4 class="text-sm font-semibold text-blue-900">Information</h4>
                                        <p class="text-sm text-blue-700 mt-1">Assurez-vous que toutes les informations sont correctes avant de créer le local.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('locals.index') }}"
                           class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                            </svg>
                            Enregistrer
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
