@extends('layouts.main')

@section('title', 'Créer une Commande')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
                        Créer une nouvelle commande
                    </h2>
                </div>

                <form action="{{ route('commands.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="fonctionaire_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Fonctionnaire
                        </label>
                        <input type="text" 
                               name="fonctionaire_id" 
                               id="fonctionaire_search" 
                               list="fonctionaire_list"
                               placeholder="Rechercher un fonctionnaire"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        <datalist id="fonctionaire_list">
                            @foreach($fonctionaires as $fonctionaire)
                                <option value="{{ $fonctionaire->nom . ' ' . $fonctionaire->prenom . ' - ' . $fonctionaire->departement->name }}" 
                                        data-id="{{ $fonctionaire->id }}">
                            @endforeach
                        </datalist>
                        <input type="hidden" name="fonctionaire_id" id="fonctionaire_id">
                        @error('fonctionaire_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="date_commande" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Date de commande
                        </label>
                        <input type="date" name="date_commande" id="date_commande" 
                               value="{{ old('date_commande') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                        @error('date_commande')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('commands.index') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 text-sm font-medium rounded-md">
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-sm font-medium rounded-md">
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