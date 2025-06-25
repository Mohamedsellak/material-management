@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        <!-- Enhanced Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Modifier l'Affectation</h1>
                <p class="text-gray-600 mt-2">Modifier les détails de l'affectation #{{ $affectation->numero_inventaire }}</p>
            </div>
            <a href="{{ route('affectations.index') }}"
               class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-sm border-gray-300 transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Retour à la liste
            </a>
        </div>

        <!-- Enhanced Error Display -->
        @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800">Veuillez corriger les erreurs suivantes</h3>
                    <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Enhanced Form Card -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <h2 class="text-xl font-semibold text-gray-800">Formulaire de Modification</h2>
                        <p class="text-sm text-gray-600">Modifiez les informations de l'affectation</p>
                    </div>
                </div>
            </div>

            <form action="{{ route('affectations.update', $affectation) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Inventory Number Field -->
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="numero_inventaire">
                            <span class="flex items-center space-x-2">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                <span>Numéro d'inventaire</span>
                            </span>
                        </label>
                        <input class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('numero_inventaire') border-red-300 ring-red-500 @enderror"
                               id="numero_inventaire"
                               type="number"
                               name="numero_inventaire"
                               value="{{ old('numero_inventaire', $affectation->numero_inventaire ?? null) }}"
                               required>
                        @error('numero_inventaire')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- State Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="etat_id">
                            <span class="flex items-center space-x-2">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>État</span>
                            </span>
                        </label>
                        <select class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('etat_id') border-red-300 ring-red-500 @enderror"
                                id="etat_id"
                                name="etat_id"
                                required>
                            <option value="">Sélectionnez un état</option>
                            @foreach($etats as $etat)
                                <option value="{{ $etat->id }}" {{ (old('etat_id', $affectation->etat_id) == $etat->id) ? 'selected' : '' }}>
                                    {{ $etat->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('etat_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Department Field -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="departement_id">
                            <span class="flex items-center space-x-2">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <span>Département</span>
                            </span>
                        </label>
                        <select class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('departement_id') border-red-300 ring-red-500 @enderror"
                                id="departement_id"
                                name="departement_id"
                                required
                                onchange="updateLocals()">
                            <option value="">Sélectionnez un département</option>
                            @foreach($departements as $departement)
                                <option value="{{ $departement->id }}" {{ ($affectation->local && $affectation->local->departement_id == $departement->id) ? 'selected' : '' }}>
                                    {{ $departement->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('departement_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Location Field -->
                    <div class="sm:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2" for="local_id">
                            <span class="flex items-center space-x-2">
                                <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span>Local</span>
                            </span>
                        </label>
                        <select class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('local_id') border-red-300 ring-red-500 @enderror"
                                id="local_id"
                                name="local_id"
                                required>
                            <option value="">Sélectionnez un local</option>
                            @foreach($locals as $local)
                                <option value="{{ $local->id }}" {{ (old('local_id', $affectation->local_id) == $local->id) ? 'selected' : '' }}>
                                    {{ $local->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('local_id')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Enhanced Action Buttons -->
                <div class="mt-8 flex flex-col sm:flex-row sm:justify-between sm:space-x-4 space-y-3 sm:space-y-0">
                    <button class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200"
                            type="submit">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Mettre à jour l'affectation
                    </button>
                    <a href="{{ route('affectations.index') }}"
                       class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Annuler
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateLocals() {
        const departementId = document.getElementById('departement_id').value;
        const localSelect = document.getElementById('local_id');

        // Clear current options
        localSelect.innerHTML = '<option value="">Sélectionnez un local</option>';

        if (!departementId) return;

        // Fetch locals for selected department
        fetch(`/material_management/public/api/departments/${departementId}/locals`)
            .then(response => response.json())
            .then(locals => {
                locals.forEach(local => {
                    const option = new Option(local.name, local.id);
                    localSelect.add(option);
                });

                // If there's a previously selected local, try to reselect it
                const oldLocalId = "{{ old('local_id', $affectation->local_id) }}";
                if (oldLocalId) {
                    localSelect.value = oldLocalId;
                }
            })
            .catch(error => console.error('Error fetching locals:', error));
    }

    // Run on page load since department should be pre-selected
    document.addEventListener('DOMContentLoaded', function() {
        updateLocals();
    });
</script>
@endpush

@endsection
