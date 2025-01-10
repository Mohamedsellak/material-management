@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Nouvelles Réaffectations</h1>
            <a href="{{ route('affectations.index') }}" 
               class="flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Retour à la liste
            </a>
        </div>

        @if($errors->any())
        <div class="bg-red-50 border-l-4 border-red-400 p-4 mb-6" role="alert">
            <div class="flex">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                              d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
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

        <div class="bg-white shadow-lg rounded-xl overflow-hidden mb-8">
            <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                <h2 class="text-xl font-semibold text-gray-800">Détails du Matériel</h2>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div class="space-y-2">
                    <p class="text-sm font-medium text-gray-500">Matériel</p>
                    <p class="text-base text-gray-900">{{$affectation->commandLine->material->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Marque</p>
                    <p class="mt-1 text-sm text-gray-900">{{$affectation->commandLine->material->marque }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Description</p>
                    <p class="mt-1 text-sm text-gray-900">{{$affectation->commandLine->material->description }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Catégorie</p>
                    <p class="mt-1 text-sm text-gray-900">{{$affectation->commandLine->material->name }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('affectations.reaffecterStore') }}" method="POST">
            @csrf
            <input type="hidden" name="command_line_id" value="{{$affectation->commandLine->id }}">

            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200 bg-gray-50">
                    <h2 class="text-xl font-semibold text-gray-800">Liste des Affectations</h2>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Numéro d'inventaire
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    État
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Local
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-sm "
                                           type="hidden"
                                           name="numero_inventaire"
                                           value="{{ $affectation->numero_inventaire }}"
                                           placeholder="Numéro d'inventaire"
                        
                                           required>{{ $affectation->numero_inventaire }}
                                    @error('numero_inventaire')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select 
                                        class="form-select w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                            name="etat_id"
                                            required>
                                        <option value="">Sélectionnez un état</option>
                                        @foreach($etats as $etat)
                                            <option value="{{ $etat->id }}" {{ old('etat_id') == $etat->id ? 'selected' : '' }}>
                                                {{ $etat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('etat_id')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                        <select 
                                            class="form-select w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                                name="departement_id"
                                                id="departement_id"
                                                required
                                                onchange="updateLocals()">
                                            <option value="">Sélectionnez un département</option>
                                            @foreach($departements as $departement)
                                                <option value="{{ $departement->id }}" {{ old('departement_id') == $departement->id ? 'selected' : '' }}>
                                                    {{ $departement->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('departement_id')
                                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
                                </td>

                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-sm @error('local_id') border-red-500 @enderror"
                                            name="local_id"
                                            id="local_id"
                                            required>
                                        <option value="">Sélectionnez un local</option>
                                        @foreach($locals as $local)
                                            <option value="{{ $local->id }}" {{ old('local_id') == $local->id ? 'selected' : '' }}>
                                                {{ $local->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('local_id')
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex justify-end space-x-4">
                        <a href="{{ route('affectations.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors">
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-6 py-2 border border-transparent rounded-lg shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Créer l'affectation
                        </button>
                    </div>
                </div>
            </div>
        </form>
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
        fetch(`/api/departments/${departementId}/locals`)
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