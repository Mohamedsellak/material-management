@extends('layouts.main')

@section('title', 'Créer une Commande')

@section('content')
<!-- Professional background -->
<div class="min-h-screen bg-gray-50">
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Professional Breadcrumb -->
            <nav class="flex mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('commands.index') }}" class="inline-flex items-center text-sm font-medium text-slate-700 hover:text-blue-600">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
                            </svg>
                            Commandes
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="ml-1 text-sm font-medium text-slate-500 md:ml-2">Nouvelle commande</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Enhanced professional page header inspired by show page -->
            <div class="bg-gradient-to-r from-green-600 to-emerald-500 rounded-xl shadow-xl p-8 mb-8">
                <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center space-y-4 lg:space-y-0">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="h-16 w-16 bg-white rounded-xl flex items-center justify-center shadow-lg">
                                <svg class="h-8 w-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="ml-6">
                            <h1 class="text-3xl font-bold text-white">Créer une Nouvelle Commande</h1>
                            <p class="text-green-100 mt-2 text-lg">Initier une nouvelle commande de matériel pour un fonctionnaire</p>
                            <div class="flex items-center mt-3 text-green-200 text-sm">
                                <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Remplissez les informations de base, puis ajoutez les matériels nécessaires
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row space-y-3 sm:space-y-0 sm:space-x-4">
                        <a href="{{ route('commands.index') }}"
                           class="inline-flex items-center px-6 py-3 bg-white text-green-600 font-semibold rounded-lg shadow-lg hover:bg-gray-50 hover:scale-105 transform transition-all duration-200">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                            </svg>
                            Retour à la liste
                        </a>
                    </div>
                </div>
            </div>

            <!-- Help Alert -->
            <div class="mb-8 bg-blue-50 border-l-4 border-blue-500 p-6 rounded-r-lg">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-blue-800">
                            Information importante
                        </h3>
                        <div class="mt-2 text-sm text-blue-700">
                            <p>Commencez par créer une commande avec les informations de base. Vous pourrez ensuite ajouter des lignes de commande (matériels et quantités) après la création.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Form Card -->
            <div class="bg-white rounded-xl shadow-xl overflow-hidden">
                <div class="bg-slate-100 p-6 border-b border-slate-200">
                    <h3 class="text-xl font-bold text-slate-900 flex items-center">
                        <svg class="h-6 w-6 text-green-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        Informations de la Commande
                    </h3>
                </div>

                <form action="{{ route('commands.store') }}" method="POST" class="p-8">
                    @csrf

                    <div class="space-y-6">
                        <!-- Fonctionnaire -->
                        <div>
                            <label for="fonctionaire_search" class="block text-sm font-semibold text-slate-700 mb-2">
                                Fonctionnaire *
                            </label>
                            <div class="relative">
                                <input type="text"
                                       name="fonctionaire_search"
                                       id="fonctionaire_search"
                                       list="fonctionaire_list"
                                       placeholder="Rechercher un fonctionnaire (tapez le nom ou prénom)"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            </div>
                            <datalist id="fonctionaire_list">
                                @foreach($fonctionaires as $fonctionaire)
                                    <option value="{{ $fonctionaire->nom . ' ' . $fonctionaire->prenom . ' - ' . $fonctionaire->departement->name }}"
                                            data-id="{{ $fonctionaire->id }}">
                                @endforeach
                            </datalist>
                            <input type="hidden" name="fonctionaire_id" id="fonctionaire_id">
                            @error('fonctionaire_id')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            <p class="text-sm text-slate-500 mt-1">Tapez pour rechercher et sélectionner un fonctionnaire dans la liste</p>
                        </div>

                        <!-- Date -->
                        <div>
                            <label for="date_commande" class="block text-sm font-semibold text-slate-700 mb-2">
                                Date de commande *
                            </label>
                            <div class="relative">
                                <input type="date" name="date_commande" id="date_commande"
                                       value="{{ old('date_commande') }}"
                                       class="w-full px-4 py-3 border border-slate-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 transition-all duration-200">
                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                    <svg class="h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('date_commande')
                                <p class="mt-2 text-sm text-red-600 flex items-center">
                                    <svg class="h-4 w-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <!-- Professional Action Buttons -->
                    <div class="flex flex-col sm:flex-row justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-8 border-t border-slate-200 mt-8">
                        <a href="{{ route('commands.index') }}"
                           class="inline-flex items-center justify-center px-6 py-3 border border-slate-300 text-slate-700 bg-white rounded-lg hover:bg-slate-50 focus:ring-2 focus:ring-slate-500 focus:ring-offset-2 transition-all duration-200 font-medium">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition-all duration-200 font-medium shadow-lg">
                            <svg class="h-4 w-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Créer la commande
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('fonctionaire_search').addEventListener('input', function(e) {
        const datalist = document.getElementById('fonctionaire_list');
        const options = datalist.getElementsByTagName('option');

        for(let option of options) {
            if(option.value === this.value) {
                document.getElementById('fonctionaire_id').value = option.dataset.id;
                break;
            }
        }
    });
</script>
@endsection
