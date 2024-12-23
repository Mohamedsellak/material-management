@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-2xl mx-auto">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Modifier l'Affectation</h1>

        <form action="{{ route('affectations.update', $affectation) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">
                    Numéro d'inventaire ?
                </label>
                <div class="flex items-center">
                    <label for="is_numero_inventaire_yes" class="mr-2">Oui</label>
                    <input type="radio" name="is_numero_inventaire" id="is_numero_inventaire_yes" value="1" {{ $affectation->numero_inventaire ? 'checked' : '' }}>
                    <label for="is_numero_inventaire_no" class="ml-4 mr-2">Non</label>
                    <input type="radio" name="is_numero_inventaire" id="is_numero_inventaire_no" value="0" {{ !$affectation->numero_inventaire ? 'checked' : '' }}>
                </div>
            </div>

            <div class="mb-4" id="numero_inventaire_container" {{ !$affectation->numero_inventaire ? 'class=hidden' : '' }}>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="numero_inventaire">
                    Numéro d'inventaire
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('numero_inventaire') border-red-500 @enderror"
                       id="numero_inventaire"
                       type="number"
                       name="numero_inventaire"
                       value="{{ old('numero_inventaire', $affectation->numero_inventaire) }}">
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

            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="command_line_id">
                    Ligne de Commande
                </label>
                <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('command_line_id') border-red-500 @enderror"
                        id="command_line_id"
                        name="command_line_id"
                        required>
                    <option value="">Sélectionnez une ligne de commande</option>
                    @foreach($commandLines as $commandLine)
                        <option value="{{ $commandLine->id }}" {{ (old('command_line_id', $affectation->command_line_id) == $commandLine->id) ? 'selected' : '' }}>
                            {{ $commandLine->id }}
                        </option>
                    @endforeach
                </select>
                @error('command_line_id')
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
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const radioButtons = document.querySelectorAll('input[name="is_numero_inventaire"]');
        const numeroInventaireContainer = document.getElementById('numero_inventaire_container');
        const numeroInventaireInput = document.getElementById('numero_inventaire');

        radioButtons.forEach(radio => {
            radio.addEventListener('change', function() {
                if (this.value === '1') {
                    numeroInventaireContainer.classList.remove('hidden');
                    numeroInventaireInput.required = true;
                } else {
                    numeroInventaireContainer.classList.add('hidden');
                    numeroInventaireInput.required = false;
                    numeroInventaireInput.value = '';
                }
            });
        });
    });
</script>
@endpush 