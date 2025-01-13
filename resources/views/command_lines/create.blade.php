@extends('layouts.main')

@section('title', 'Créer une Ligne de Commande')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Créer une Ligne de Commande
                    </h2>
                    <a href="{{ route('command_lines.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md shadow-sm transition-colors">
                        <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour à la liste
                    </a>
                </div>

                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Erreurs!</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Erreurs!</strong>
                        <ul>
                            <li>{{ session('error') }}</li>
                        </ul>
                    </div>
                @endif

                <form action="{{ route('command_lines.store') }}" method="POST" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="command_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Commande N° {{ $command->id }}
                        </label>
                        <input type="hidden" name="command_id" id="command_id" value="{{ $command->id }}" required>
                    </div>

                    <div>
                        <label for="type_material_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Type de matériel
                        </label>
                        <select id="type_material_id" name="type_material_id" required
                                onchange="updateMaterials()"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="">Sélectionnez un type de matériel</option>
                            @foreach($typeMaterials as $typeMaterial)
                                <option value="{{ $typeMaterial->id }}" {{ old('type_material_id') == $typeMaterial->id ? 'selected' : '' }}>
                                    {{ $typeMaterial->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="material_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Matériel
                        </label>
                        <select id="material_id" name="material_id" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                            <option value="">Sélectionnez d'abord un type de matériel</option>
                        </select>
                    </div>

                    <div>
                        <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Quantité
                        </label>
                        <input type="number" name="quantity" id="quantity" min="1"
                               value="{{ old('quantity') }}" required
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                    </div>

                    <div class="flex justify-end">
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm transition-colors">
                            <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Créer la Ligne de Commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateMaterials() {
        const typeMaterialId = document.getElementById('type_material_id').value;
        const materialSelect = document.getElementById('material_id');
        
        // Clear current options
        materialSelect.innerHTML = '<option value="">Sélectionnez un matériel</option>';
        
        if (!typeMaterialId) return;

        // Fetch locals for selected department
        console.log(typeMaterialId);
        fetch(`/api/type-materials/${typeMaterialId}/materials`)
            .then(response => response.json())
            .then(materials => {
                materials.forEach(material => {
                    const option = new Option(material.name, material.id);
                    materialSelect.add(option);
                });
                
                // If there's a previously selected local, try to reselect it
                const oldMaterialId = "{{ old('material_id') }}";
                if (oldMaterialId) {
                    materialSelect.value = oldMaterialId;
                }
            })
            .catch(error => console.error('Error fetching materials:', error));
    }

    // Run on page load since department should be pre-selected
    document.addEventListener('DOMContentLoaded', function() {
        updateMaterials();
    });
</script>
@endpush

@endsection 