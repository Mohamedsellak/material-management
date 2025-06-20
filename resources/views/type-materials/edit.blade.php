@extends('layouts.main')

@section('title', 'Modifier le Ty        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-8 shadow-sm">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center shadow-sm">e Matériel - ' . $typeMaterial->name)

@section('content')
<div class="min-h-screen bg-gray-50 py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="flex mb-8" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('type-materials.index') }}" class="group inline-flex items-center text-sm font-medium text-gray-700 hover:text-emerald-600 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2 transition-transform group-hover:scale-110" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                        </svg>
                        <span class="group-hover:underline group-hover:decoration-emerald-500">Types de Matériel</span>
                    </a>
                </li>
                <li>
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <a href="{{ route('type-materials.show', $typeMaterial) }}" class="group ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 transition-all duration-200">
                            <span class="group-hover:underline group-hover:decoration-blue-500">{{ $typeMaterial->name }}</span>
                        </a>
                    </div>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-1 text-sm font-medium text-green-600">Modifier</span>
                    </div>
                </li>
            </ol>
        </nav>

        <!-- Page Header -->
        <div class="mb-8">
            <div class="flex items-center">
                <div class="w-14 h-14 bg-green-600 rounded-lg flex items-center justify-center shadow-sm transition-all duration-200">
                    <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div class="ml-6">
                    <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                        <span class="text-green-700 font-bold">
                            Modifier le Type de Matériel
                        </span>
                    </h1>
                    <p class="mt-2 text-lg text-gray-600">Modifiez les informations pour <strong class="text-emerald-600">{{ $typeMaterial->name }}</strong></p>
                </div>
            </div>
        </div>

        <!-- Current Info Card -->
        <div class="bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 border border-blue-200 rounded-2xl p-6 mb-8 shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-0.5">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-xl flex items-center justify-center shadow-md">
                        <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                </div>
                <div class="ml-4 flex-1">
                    <h3 class="text-xl font-bold text-blue-900 mb-3">Informations Actuelles</h3>
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div class="bg-white bg-opacity-70 rounded-xl p-3 shadow-sm">
                            <span class="block text-sm font-medium text-blue-800 mb-1">Nom actuel</span>
                            <span class="text-lg font-semibold text-blue-900">{{ $typeMaterial->name }}</span>
                        </div>
                        <div class="bg-white bg-opacity-70 rounded-xl p-3 shadow-sm">
                            <span class="block text-sm font-medium text-blue-800 mb-1">Matériaux associés</span>
                            <span class="text-lg font-semibold text-blue-900">{{ $typeMaterial->materials->count() }}</span>
                        </div>
                        <div class="bg-white bg-opacity-70 rounded-xl p-3 shadow-sm">
                            <span class="block text-sm font-medium text-blue-800 mb-1">Dernière modification</span>
                            <span class="text-lg font-semibold text-blue-900">{{ $typeMaterial->updated_at->format('d/m/Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- Form Header -->
            <div class="bg-green-50 px-6 py-6 border-b border-gray-200">
                <h3 class="text-xl font-bold text-gray-900 flex items-center">
                    <div class="w-8 h-8 bg-green-600 rounded-lg flex items-center justify-center mr-3 shadow-sm">
                        <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                    </div>
                    <span class="text-green-700 font-bold">Modifier les Informations</span>
                </h3>
                <p class="mt-2 text-gray-600">Mettez à jour les détails du type de matériel avec précision</p>
            </div>

            <!-- Form Content -->
            <div class="p-6">
                <form action="{{ route('type-materials.update', $typeMaterial) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Nom du Type -->
                        <div class="space-y-2">
                            <label for="nom" class="block text-sm font-semibold text-gray-700 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                                Nom du Type <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <input type="text"
                                       name="name"
                                       id="nom"
                                       class="block w-full px-4 py-3 text-gray-900 bg-white border border-gray-300 rounded-xl shadow-sm placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all duration-200 @error('name') border-red-300 focus:ring-red-500 focus:border-red-500 @enderror"
                                       placeholder="Ex: Ordinateur, Mobilier, Équipement électronique..."
                                       value="{{ old('name', $typeMaterial->name) }}"
                                       required
                                       autocomplete="off">
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('name')
                                <div class="flex items-center mt-2 text-sm text-red-600">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </div>
                            @enderror
                            <p class="text-xs text-gray-500 mt-1">Modifiez le nom pour mieux décrire ce type de matériel</p>
                        </div>

                        <!-- Warning Card -->
                        @if($typeMaterial->materials->count() > 0)
                        <div class="bg-amber-50 border border-amber-300 rounded-lg p-5 shadow-sm">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-amber-500 rounded-lg flex items-center justify-center shadow-sm">
                                        <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-amber-900 mb-2">⚠️ Attention - Modification avec Impact</h4>
                                    <div class="text-amber-800">
                                        <p class="mb-2">Ce type de matériel est actuellement associé à <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-semibold bg-amber-500 text-white shadow-sm">{{ $typeMaterial->materials->count() }} matériau(x)</span></p>
                                        <p class="text-sm">La modification du nom affectera tous les matériaux associés dans le système.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="bg-green-50 border border-green-300 rounded-lg p-5 shadow-sm">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center shadow-sm">
                                        <svg class="h-4 w-4 text-white" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg font-bold text-green-900 mb-2">✅ Modification Sûre</h4>
                                    <div class="text-green-800">
                                        <p class="mb-2">Aucun matériau n'est actuellement associé à ce type.</p>
                                        <p class="text-sm">Vous pouvez modifier le nom en toute sécurité sans impact sur d'autres données.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-between pt-8 border-t border-gray-200">
                        <div class="flex space-x-4">
                            <a href="{{ route('type-materials.show', $typeMaterial) }}"
                               class="group inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span class="group-hover:underline group-hover:decoration-blue-500">Voir détails</span>
                            </a>

                            <a href="{{ route('type-materials.index') }}"
                               class="group inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                                </svg>
                                <span class="group-hover:underline group-hover:decoration-gray-500">Retour à la liste</span>
                            </a>
                        </div>

                        <div class="flex space-x-4">
                            <button type="reset"
                                    class="group inline-flex items-center px-6 py-3 border border-gray-300 rounded-xl text-sm font-semibold text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-all duration-300 shadow-sm hover:shadow-md transform hover:-translate-y-0.5">
                                <svg class="w-4 h-4 mr-2 transition-transform group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                </svg>
                                <span class="group-hover:underline group-hover:decoration-gray-500">Réinitialiser</span>
                            </button>

                            <button type="submit"
                                    class="group inline-flex items-center px-8 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-bold rounded-lg shadow-sm hover:shadow-md transition-all duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">
                                <svg class="w-5 h-5 mr-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                </svg>
                                <span class="group-hover:underline">Mettre à jour</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-focus on the name input
    document.getElementById('nom').focus();

    // Store original value for comparison
    const originalValue = document.getElementById('nom').value;
    const nameInput = document.getElementById('nom');
    const submitButton = document.querySelector('button[type="submit"]');

    // Add real-time validation and change detection
    nameInput.addEventListener('input', function() {
        const value = this.value.trim();
        const parent = this.closest('.space-y-2');
        const existingFeedback = parent.querySelector('.validation-feedback');

        if (existingFeedback) {
            existingFeedback.remove();
        }

        // Check if value has changed
        const hasChanged = value !== originalValue;
        if (hasChanged) {
            submitButton.classList.remove('opacity-50', 'cursor-not-allowed');
            submitButton.disabled = false;
        } else {
            submitButton.classList.add('opacity-50', 'cursor-not-allowed');
            submitButton.disabled = true;
        }

        // Validation feedback
        if (value.length > 0 && value.length < 3) {
            const feedback = document.createElement('div');
            feedback.className = 'validation-feedback flex items-center mt-1 text-sm text-orange-600';
            feedback.innerHTML = `
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                </svg>
                Le nom doit contenir au moins 3 caractères
            `;
            parent.appendChild(feedback);
        } else if (value.length >= 3 && hasChanged) {
            const feedback = document.createElement('div');
            feedback.className = 'validation-feedback flex items-center mt-1 text-sm text-green-600';
            feedback.innerHTML = `
                <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                </svg>
                Nom valide - Changements détectés
            `;
            parent.appendChild(feedback);
        }
    });

    // Initial state check
    submitButton.classList.add('opacity-50', 'cursor-not-allowed');
    submitButton.disabled = true;
});
</script>
@endsection
