@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier l'Affectation</h1>

        <form action="{{ route('affectations.update', $affectation) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="numero_inventaire">
                    Numéro d'inventaire
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('numero_inventaire') border-red-500 @enderror"
                       id="numero_inventaire"
                       type="number"
                       name="numero_inventaire"
                       value="{{ old('numero_inventaire', $affectation->numero_inventaire ?? null) }}"
                       required>
                @error('numero_inventaire')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="etat_id">
                    État
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('etat_id') border-red-500 @enderror"
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
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="departement_id">
                    Département
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('departement_id') border-red-500 @enderror"
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
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="local_id">
                    Local
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('local_id') border-red-500 @enderror"
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
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                    Mettre à jour
                </button>
                <a href="{{ route('affectations.index') }}"
                   class="text-gray-600 hover:text-gray-800">
                    Annuler
                </a>
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
