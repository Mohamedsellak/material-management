@extends('layouts.main')

@section('title', 'Gestion des Entrées')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Header -->
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Modifier l'Entrée
                    </h2>
                </div>

                <!-- Form -->
                <form action="{{ route('entrees.update', $entree) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-1 gap-6 mt-4">
                        <!-- Date -->
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Date d'entrée
                            </label>
                            <input type="date" name="date" id="date" value="{{ old('date', $entree->date) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                            @error('date')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Material -->
                        <div>
                            <label for="material_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Matériel
                            </label>
                            <select name="material_id" id="material_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                                <option value="">Sélectionner un matériel</option>
                                @foreach($materials as $material)
                                    <option value="{{ $material->id }}" {{ old('material_id', $entree->material_id) == $material->id ? 'selected' : '' }}>
                                        {{ $material->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('material_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Quantity -->
                        <div>
                            <label for="quantity" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Quantité
                            </label>
                            <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $entree->quantity) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                            @error('quantity')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Unit Price -->
                        <div>
                            <label for="unit_price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Prix Unitaire (DH)
                            </label>
                            <input type="number" step="0.01" name="unit_price" id="unit_price" value="{{ old('unit_price', $entree->unit_price) }}"
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                            @error('unit_price')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Supplier -->
                        <div>
                            <label for="fournisseur_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Fournisseur
                            </label>
                            <select name="fournisseur_id" id="fournisseur_id"
                                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white sm:text-sm">
                                <option value="">Sélectionner un fournisseur</option>
                                @foreach($fournisseurs as $fournisseur)
                                    <option value="{{ $fournisseur->id }}" {{ old('fournisseur_id', $entree->fournisseur_id) == $fournisseur->id ? 'selected' : '' }}>
                                        {{ $fournisseur->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('fournisseur_id')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex items-center justify-end mt-6 gap-x-6">
                        <a href="{{ route('entrees.index') }}"
                           class="text-sm font-semibold leading-6 text-gray-900 dark:text-gray-300">
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-md shadow-sm transition-colors">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
