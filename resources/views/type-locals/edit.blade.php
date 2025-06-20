@extends('layouts.main')

@section('title', 'Modifier le Type de Local')

@section('content')
<div class="py-8">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <!-- Enhanced Header Section -->
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg p-6 mb-8 border border-green-100">
            <div class="flex items-center">
                <div class="h-12 w-12 bg-green-600 rounded-full flex items-center justify-center mr-4">
                    <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Modifier le Type de Local</h1>
                    <p class="text-gray-600 mt-1">Mettre à jour les informations du type "{{ $typeLocal->name }}"</p>
                </div>
            </div>
        </div>

        <!-- Enhanced Form Section -->
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <div class="bg-gradient-to-r from-green-50 to-emerald-50 p-6 border-b border-gray-100">
                <div class="flex items-center">
                    <svg class="h-6 w-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                    </svg>
                    <h3 class="text-xl font-semibold text-gray-900">Informations du Type</h3>
                    <span class="ml-auto bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm font-medium">
                        ID #{{ $typeLocal->id }}
                    </span>
                </div>
            </div>

            <form action="{{ route('type-locals.update', $typeLocal) }}" method="POST" class="p-8">
                @csrf
                @method('PUT')

                <div class="space-y-8">
                    <!-- Nom du Type -->
                    <div class="space-y-2">
                        <label for="nom" class="block text-sm font-semibold text-gray-700 flex items-center">
                            <svg class="h-4 w-4 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                            </svg>
                            Nom du type de local
                            <span class="text-red-500 ml-1">*</span>
                        </label>
                        <input type="text"
                               name="name"
                               id="nom"
                               class="w-full rounded-lg border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 transition-colors py-3 px-4 text-gray-900 placeholder-gray-500"
                               value="{{ old('name', $typeLocal->name) }}"
                               placeholder="Ex: Bureau, Salle de réunion, Entrepôt..."
                               required>
                        @error('name')
                            <div class="flex items-center mt-2 text-red-600">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span class="text-sm">{{ $message }}</span>
                            </div>
                        @enderror
                        <p class="text-sm text-gray-500 mt-1">Saisissez un nom descriptif pour ce type de local</p>
                    </div>

                    <!-- Information Card -->
                    <div class="bg-blue-50 rounded-lg p-6 border border-blue-200">
                        <h4 class="text-lg font-semibold text-blue-900 mb-4 flex items-center">
                            <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Informations du Type
                        </h4>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center p-3 bg-white rounded-lg border border-blue-200">
                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">ID du Type</div>
                                    <div class="text-sm text-gray-600">#{{ $typeLocal->id }}</div>
                                </div>
                            </div>
                            <div class="flex items-center p-3 bg-white rounded-lg border border-blue-200">
                                <div class="h-8 w-8 rounded-full bg-blue-100 flex items-center justify-center mr-3">
                                    <svg class="h-4 w-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-sm font-medium text-gray-900">Créé le</div>
                                    <div class="text-sm text-gray-600">{{ $typeLocal->created_at ? $typeLocal->created_at->format('d/m/Y à H:i') : 'Date inconnue' }}</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Preview Card -->
                    <div class="bg-gray-50 rounded-lg p-6 border border-gray-200">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="h-5 w-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                            </svg>
                            Aperçu des Modifications
                        </h4>
                        <div class="flex items-center p-4 bg-white rounded-lg border border-gray-200 shadow-sm">
                            <div class="h-10 w-10 rounded-lg bg-gradient-to-br from-orange-400 via-amber-500 to-yellow-600 flex items-center justify-center shadow-md ring-2 ring-amber-100">
                                <svg class="h-5 w-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-semibold text-gray-900" id="preview-name">{{ $typeLocal->name }}</div>
                                <div class="text-sm text-gray-500">Type de local</div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-200">
                        <a href="{{ route('type-locals.index') }}"
                           class="inline-flex items-center px-6 py-3 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:border-gray-400 transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-6 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-md hover:shadow-lg transform hover:scale-105">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Mettre à jour le Type
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.getElementById('nom').addEventListener('input', function(e) {
    const previewName = document.getElementById('preview-name');
    previewName.textContent = e.target.value || '{{ $typeLocal->name }}';
});
</script>
@endsection
