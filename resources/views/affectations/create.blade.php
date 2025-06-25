@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-7xl mx-auto">
        <!-- Enhanced Header -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Nouvelles Affectations</h1>
                <p class="text-gray-600 mt-2">Créer des affectations en masse pour le matériel commandé</p>
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
                    <h3 class="text-sm font-medium text-red-800">Plusieurs erreurs ont été détectées</h3>
                    <ul class="mt-2 list-disc list-inside text-sm text-red-700">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endif

        <!-- Enhanced Material Details Card -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                            <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-3">
                        <h2 class="text-xl font-semibold text-gray-800">Détails du Matériel</h2>
                        <p class="text-sm text-gray-600">Informations sur le matériel à affecter</p>
                    </div>
                </div>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-500">Matériel</p>
                        </div>
                        <p class="text-base font-semibold text-gray-900">{{ $commandLine->material->name }}</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-500">Marque</p>
                        </div>
                        <p class="text-base font-semibold text-gray-900">{{ $commandLine->material->typeMaterial->name }}</p>
                    </div>
                    <div class="space-y-2">
                        <div class="flex items-center space-x-2">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-500">Quantité à affecter</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                {{ $commandLine->quantity }} unités
                            </span>
                        </div>
                    </div>
                    @if($commandLine->material->description)
                    <div class="space-y-2 md:col-span-2 lg:col-span-3">
                        <div class="flex items-center space-x-2">
                            <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <p class="text-sm font-medium text-gray-500">Description</p>
                        </div>
                        <p class="text-sm text-gray-700 bg-gray-50 p-3 rounded-lg">{{ $commandLine->material->description }}</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <form action="{{ route('affectations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="command_line_id" value="{{ $commandLine->id }}">

            <!-- Enhanced Bulk Assignment Parameters -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-8">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-green-50 to-emerald-50">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-r from-green-500 to-emerald-600 flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <h2 class="text-xl font-semibold text-gray-800">Paramètres d'Affectation en Masse</h2>
                            <p class="text-sm text-gray-600">Configurez les paramètres à appliquer à tous les éléments</p>
                        </div>
                    </div>
                </div>
                <div class="p-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <span class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                    <span>Numéro d'inventaire de départ</span>
                                </span>
                            </label>
                            <input type="number"
                                   id="start_inventory_number"
                                   class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                   placeholder="Ex: 1001">
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <span class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                    </svg>
                                    <span>État</span>
                                </span>
                            </label>
                            <select id="bulk_etat"
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Sélectionnez un état</option>
                                @foreach($etats as $etat)
                                    <option value="{{ $etat->id }}">{{ $etat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <span class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                    <span>Département</span>
                                </span>
                            </label>
                            <select id="bulk_departement"
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                                    onchange="updateBulkLocals(this.value)">
                                <option value="">Sélectionnez un département</option>
                                @foreach($departements as $departement)
                                    <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-700">
                                <span class="flex items-center space-x-2">
                                    <svg class="h-4 w-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <span>Local</span>
                                </span>
                            </label>
                            <select id="bulk_local"
                                    class="mt-1 block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                                <option value="">Sélectionnez un local</option>
                            </select>
                        </div>
                    </div>
                    <div class="mt-6">
                        <button type="button"
                                onclick="applyBulkAssignment()"
                                class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-green-600 to-emerald-600 hover:from-green-700 hover:to-emerald-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                            Appliquer à tous les éléments
                        </button>
                    </div>
                </div>
            </div>
            <!-- Enhanced Affectations Table -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-500 to-indigo-600 flex items-center justify-center">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-3">
                            <h2 class="text-xl font-semibold text-gray-800">Liste des Affectations</h2>
                            <p class="text-sm text-gray-600">Configurer chaque affectation individuellement</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                        </svg>
                                        <span>#</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                        </svg>
                                        <span>Numéro d'inventaire</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        <span>État</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                        </svg>
                                        <span>Département</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <div class="flex items-center space-x-2">
                                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                        <span>Local</span>
                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @for($i = 0; $i < $commandLine->quantity; $i++)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-8 w-8">
                                            <div class="h-8 w-8 rounded-full bg-gradient-to-r from-indigo-500 to-purple-500 flex items-center justify-center">
                                                <span class="text-white font-bold text-xs">
                                                    {{ $i + 1 }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('numero_inventaire.'.$i) border-red-300 ring-red-500 @enderror"
                                           type="number"
                                           name="numero_inventaire[]"
                                           value="{{ old('numero_inventaire.'.$i) }}"
                                           placeholder="N° inventaire"
                                           required>
                                    @error('numero_inventaire.'.$i)
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('etat_id.'.$i) border-red-300 ring-red-500 @enderror"
                                            name="etat_id[]"
                                            required>
                                        <option value="">Sélectionnez un état</option>
                                        @foreach($etats as $etat)
                                            <option value="{{ $etat->id }}" {{ old('etat_id.'.$i) == $etat->id ? 'selected' : '' }}>
                                                {{ $etat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('etat_id.'.$i)
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('departement_id.'.$i) border-red-300 ring-red-500 @enderror"
                                            name="departement_id[]"
                                            data-row="{{ $i }}"
                                            required
                                            onchange="updateLocals(this, {{ $i }})">
                                        <option value="">Sélectionnez un département</option>
                                        @foreach($departements as $departement)
                                            <option value="{{ $departement->id }}" {{ old('departement_id.'.$i) == $departement->id ? 'selected' : '' }}>
                                                {{ $departement->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('departement_id.'.$i)
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="block w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('local_id.'.$i) border-red-300 ring-red-500 @enderror"
                                            name="local_id[]"
                                            data-row="{{ $i }}"
                                            data-old-value="{{ old('local_id.'.$i) }}"
                                            required>
                                        <option value="">Sélectionnez un local</option>
                                    </select>
                                    @error('local_id.'.$i)
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <!-- Enhanced Action Buttons -->
                <div class="px-6 py-4 bg-gray-50 flex flex-col sm:flex-row sm:justify-between sm:space-x-4 space-y-3 sm:space-y-0">
                    <a href="{{ route('command_lines.index') }}"
                       class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-200">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                        Annuler
                    </a>
                    <button type="submit"
                            class="w-full sm:w-auto inline-flex justify-center items-center px-6 py-3 border border-transparent text-base font-medium rounded-lg shadow-sm text-white bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Créer les affectations
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    function updateLocals(departmentSelect, rowIndex) {
        const departementId = departmentSelect.value;
        const localSelect = document.querySelector(`select[name="local_id[]"][data-row="${rowIndex}"]`);

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
                const oldLocalId = localSelect.getAttribute('data-old-value');
                if (oldLocalId) {
                    localSelect.value = oldLocalId;
                }
            })
            .catch(error => console.error('Error fetching locals:', error));
    }

    function updateBulkLocals(departementId) {
        const bulkLocalSelect = document.getElementById('bulk_local');

        // Clear current options
        bulkLocalSelect.innerHTML = '<option value="">Sélectionnez un local</option>';

        if (!departementId) return;

        // Fetch locals for selected department
        fetch(`/material_management/public/api/departments/${departementId}/locals`)
            .then(response => response.json())
            .then(locals => {
                locals.forEach(local => {
                    const option = new Option(local.name, local.id);
                    bulkLocalSelect.add(option);
                });
            })
            .catch(error => console.error('Error fetching locals:', error));
    }

    function applyBulkAssignment() {
        const startInventoryNumber = parseInt(document.getElementById('start_inventory_number').value) || 0;
        const bulkEtat = document.getElementById('bulk_etat').value;
        const bulkDepartement = document.getElementById('bulk_departement').value;
        const bulkLocal = document.getElementById('bulk_local').value;
        const bulkLocalSelect = document.getElementById('bulk_local');

        const rows = document.querySelectorAll('tbody tr');

        rows.forEach((row, index) => {
            if (startInventoryNumber) {
                const inventoryInput = row.querySelector('input[name="numero_inventaire[]"]');
                inventoryInput.value = startInventoryNumber + index;
            }

            if (bulkEtat) {
                const etatSelect = row.querySelector('select[name="etat_id[]"]');
                etatSelect.value = bulkEtat;
            }

            if (bulkDepartement) {
                const departementSelect = row.querySelector('select[name="departement_id[]"]');
                const localSelect = row.querySelector('select[name="local_id[]"]');

                departementSelect.value = bulkDepartement;

                // Copy options from bulk local select
                localSelect.innerHTML = bulkLocalSelect.innerHTML;

                // Set the selected local if provided
                if (bulkLocal) {
                    localSelect.value = bulkLocal;
                }
            }
        });
    }

    // Initialize all rows on page load
    document.addEventListener('DOMContentLoaded', function() {
        const departmentSelects = document.querySelectorAll('select[name="departement_id[]"]');
        departmentSelects.forEach(select => {
            if (select.value) {
                updateLocals(select, select.dataset.row);
            }
        });
    });
</script>
@endpush

@endsection
