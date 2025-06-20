@extends('layouts.main')

@section('content')

@if ($reclamation->status !== 'en attente')
    <script>
        window.location.href = "{{ route('fonctionnaire-reclamations.index') }}";
    </script>
@endif

<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">Modifier la Réclamation</h1>
            <a href="{{ route('fonctionnaire-reclamations.index') }}"
               class="bg-gray-500 hover:bg-gray-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                </svg>
                Retour
            </a>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden">
            <div class="p-8">
                <form action="{{ route('fonctionnaire-reclamations.update', $reclamation) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="group">
                            <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">Nom de la réclamation</label>
                            <div class="relative">
                                <input type="text" name="name" id="name" value="{{ old('name', $reclamation->name) }}"
                                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all duration-200 group-hover:border-blue-400"
                                    placeholder="Entrez le nom de la réclamation">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('name')
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="group">
                            <label for="departement_id" class="block text-sm font-semibold text-gray-700 mb-2">Département</label>
                            <div class="relative">
                                <select id="departement_id"
                                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all duration-200 group-hover:border-blue-400"
                                    onchange="updateLocals()">
                                    <option value="">Sélectionnez un département</option>
                                    @foreach($departements as $departement)
                                        <option value="{{ $departement->id }}" {{ old('departement_id', $reclamation->local ? $reclamation->local->departement_id : null) == $departement->id ? 'selected' : '' }}>
                                            {{ $departement->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                    </svg>
                                </div>
                            </div>
                        </div>

                        <div class="group">
                            <label for="local_id" class="block text-sm font-semibold text-gray-700 mb-2">Local</label>
                            <div class="relative">
                                <select name="local_id" id="local_id"
                                    class="mt-1 block w-full rounded-xl border-gray-200 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-all duration-200 group-hover:border-blue-400">
                                    <option value="">Sélectionnez un local</option>
                                </select>
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('local_id')
                                <p class="mt-1 text-sm text-red-600 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea name="description" id="description" rows="6"
                                  class="w-full rounded-lg border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                                  required>{{ old('description', $reclamation->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="submit"
                                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2.5 px-6 rounded-lg transition duration-200 flex items-center gap-2">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                            </svg>
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
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
                const oldLocalId = "{{ old('local_id', $reclamation->local_id) }}";
                if (oldLocalId) {
                    localSelect.value = oldLocalId;
                }
            })
            .catch(error => console.error('Error fetching locals:', error));
    }

    // Run on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateLocals();
    });
</script>
@endpush

@endsection
