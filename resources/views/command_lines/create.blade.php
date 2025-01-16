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

                @if (session('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <strong class="font-bold">Succès!</strong>
                        <span class="block sm:inline">{{ session('success') }}</span>
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

                <!-- Command Lines Table Section -->
                <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">
                        Lignes de commande existantes
                    </h3>
                    
                    @if ($commandLines->isEmpty())
                        <p class="text-gray-500 dark:text-gray-400">Aucune ligne de commande pour cette commande.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-700">
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">ID</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Matériel</th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Quantité</th>
                                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200 dark:bg-gray-800 dark:divide-gray-700">
                                    @foreach ($commandLines as $line)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $line->id }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $line->material->name }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $line->quantity }}</td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium space-x-2">
                                                <div class="flex justify-end space-x-2">
                                                    <a href="{{ route('affectations.create', ['commandLine' => $line->id]) }}"
                                                       class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300"
                                                       title="Affecter">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                                        </svg>
                                                    </a>
                                                    <a href="{{ route('command_lines.show', $line) }}"
                                                       class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                                        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                        </svg>
                                                    </a>
                                                    <form action="{{ route('command_lines.destroy', $line) }}" method="POST" class="inline-block" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne de commande ?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="hidden" name="redirect_to" value="create">
                                                        <input type="hidden" name="command_id" value="{{ $command->id }}">
                                                        <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300">
                                                            <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                            </svg>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
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