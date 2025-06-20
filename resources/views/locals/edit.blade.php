@extends('layouts.main')

@section('title', 'Modifier un Local')

@section('content')
<div class="py-12 bg-gradient-to-br from-slate-50 via-gray-50 to-slate-100 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="mb-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
                <div class="p-6 bg-gradient-to-r from-amber-50 via-amber-100 to-amber-50">
                    <div class="flex items-center space-x-4">
                        <div class="p-3 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl shadow-lg">
                            <!-- Colorful Edit Local SVG -->
                            <svg class="h-12 w-12" viewBox="0 0 24 24" fill="none">
                                <defs>
                                    <linearGradient id="editGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#ffffff;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#fef3c7;stop-opacity:1" />
                                    </linearGradient>
                                    <linearGradient id="buildingEdit" x1="0%" y1="0%" x2="100%" y2="100%">
                                        <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                        <stop offset="100%" style="stop-color:#1d4ed8;stop-opacity:1" />
                                    </linearGradient>
                                </defs>
                                <rect x="2" y="4" width="12" height="16" rx="1" fill="url(#buildingEdit)"/>
                                <rect x="4" y="7" width="2" height="2" rx="0.3" fill="#ffd60a"/>
                                <rect x="8" y="7" width="2" height="2" rx="0.3" fill="#f72585"/>
                                <rect x="4" y="11" width="2" height="2" rx="0.3" fill="#06d6a0"/>
                                <rect x="8" y="11" width="2" height="2" rx="0.3" fill="#ffd60a"/>
                                <rect x="6" y="16" width="4" height="4" fill="#e11d48"/>
                                <path d="M15.5 5l3 3-8 8H8v-2.5l8-8.5z" fill="url(#editGrad)" stroke="#f59e0b" stroke-width="1"/>
                                <circle cx="18.5" cy="5.5" r="1.5" fill="#22c55e"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-3xl font-bold text-gray-900">
                                Modifier le Local
                            </h2>
                            <p class="text-gray-600 mt-1">Modifier les informations du local "{{ $local->name }}"</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg border border-gray-200">
            <div class="p-8">
                <form action="{{ route('locals.update', $local->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="space-y-6">
                            <div>
                                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2 flex items-center">
                                    <!-- Colorful Name Icon -->
                                    <svg class="w-5 h-5 mr-2" viewBox="0 0 24 24" fill="none">
                                        <defs>
                                            <linearGradient id="nameEditGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#3b82f6;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#1d4ed8;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M4 7h16M4 12h16M4 17h10" stroke="url(#nameEditGrad)" stroke-width="2" stroke-linecap="round"/>
                                        <circle cx="19" cy="17" r="2" fill="#f59e0b"/>
                                        <path d="M15 3l3 3-8 8H8v-2l8-9z" fill="none" stroke="#22c55e" stroke-width="1"/>
                                    </svg>
                                    Nom du Local
                                </label>
                                <input type="text" name="name" id="name" value="{{ old('name', $local->name) }}"
                                       class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 text-gray-900 bg-gray-50 border-2 transition-all duration-200 hover:bg-white focus:bg-white"
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
                                            <linearGradient id="typeEditGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#10b981;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#059669;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z" stroke="url(#typeEditGrad)" stroke-width="2" fill="none"/>
                                        <circle cx="7" cy="7" r="1" fill="#f59e0b"/>
                                        <circle cx="18" cy="12" r="2" fill="#ef4444"/>
                                        <path d="M15 9l3 3-2 2-3-3 2-2z" fill="#8b5cf6" stroke="#7c3aed" stroke-width="0.5"/>
                                    </svg>
                                    Type de Local
                                </label>
                                <select name="type_local_id" id="type_local_id"
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 text-gray-900 bg-gray-50 border-2 transition-all duration-200 hover:bg-white focus:bg-white"
                                        required>
                                    <option value="">Sélectionner un type</option>
                                    @foreach($typeLocals as $type)
                                        <option value="{{ $type->id }}" {{ old('type_local_id', $local->type_local_id) == $type->id ? 'selected' : '' }}>
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
                                            <linearGradient id="deptEditGrad" x1="0%" y1="0%" x2="100%" y2="100%">
                                                <stop offset="0%" style="stop-color:#8b5cf6;stop-opacity:1" />
                                                <stop offset="100%" style="stop-color:#7c3aed;stop-opacity:1" />
                                            </linearGradient>
                                        </defs>
                                        <path d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" stroke="url(#deptEditGrad)" stroke-width="2" fill="none"/>
                                        <circle cx="9.5" cy="7.5" r="0.5" fill="#f59e0b"/>
                                        <circle cx="9.5" cy="11.5" r="0.5" fill="#22c55e"/>
                                        <circle cx="13.5" cy="7.5" r="0.5" fill="#ef4444"/>
                                        <circle cx="13.5" cy="11.5" r="0.5" fill="#06b6d4"/>
                                        <path d="M17 4l2 2-1 1-2-2 1-1z" fill="#f59e0b" stroke="#f97316" stroke-width="0.5"/>
                                    </svg>
                                    Département
                                </label>
                                <select name="departement_id" id="departement_id"
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-amber-500 focus:ring-amber-500 text-gray-900 bg-gray-50 border-2 transition-all duration-200 hover:bg-white focus:bg-white"
                                        required>
                                    <option value="">Sélectionner un département</option>
                                    @foreach($departements as $departement)
                                        <option value="{{ $departement->id }}" {{ old('departement_id', $local->departement_id) == $departement->id ? 'selected' : '' }}>
                                            {{ $departement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('departement_id')
                                    <p class="mt-2 text-sm text-red-600 bg-red-50 p-2 rounded-md border border-red-200">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Current Values Info Card -->
                            <div class="bg-gradient-to-br from-amber-50 to-orange-100 p-6 rounded-lg border border-amber-200">
                                <div class="flex items-start space-x-3">
                                    <svg class="w-6 h-6 text-amber-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <div>
                                        <h4 class="text-sm font-semibold text-amber-900">Valeurs Actuelles</h4>
                                        <div class="text-sm text-amber-700 mt-2 space-y-1">
                                            <p><span class="font-medium">Type:</span> {{ $local->typeLocal->name }}</p>
                                            <p><span class="font-medium">Département:</span> {{ $local->departement->name }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="mt-8 flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('locals.index') }}"
                           class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-slate-600 to-slate-700 hover:from-slate-700 hover:to-slate-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 transition-all duration-200 transform hover:scale-105 hover:shadow-lg">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
