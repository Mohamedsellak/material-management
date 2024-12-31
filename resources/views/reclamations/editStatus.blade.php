@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="mb-6">
        <h1 class="text-3xl font-bold">Modifier le Statut de la Réclamation</h1>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="mb-6">
            <h2 class="text-xl font-semibold text-gray-800">{{ $reclamation->name }}</h2>
            <p class="mt-2 text-gray-600">{{ $reclamation->description }}</p>
        </div>

        <form action="{{ route('reclamations.updateStatus', $reclamation) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700">Nouveau Statut</label>
                <select name="status" id="status" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                    <option value="en attente" {{ old('status', $reclamation->status) == 'en attente' ? 'selected' : '' }}>En attente</option>
                    <option value="en cours" {{ old('status', $reclamation->status) == 'en cours' ? 'selected' : '' }}>En cours</option>
                    <option value="resolue" {{ old('status', $reclamation->status) == 'resolue' ? 'selected' : '' }}>Résolue</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="commentaire" class="block text-sm font-medium text-gray-700">Commentaire sur le changement de statut</label>
                <textarea name="commentaire" id="commentaire" rows="3" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('commentaire', $reclamation->commentaire) }}</textarea>
                @error('commentaire')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end space-x-3">
                <a href="{{ route('reclamations.show', $reclamation) }}" 
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                    Annuler
                </a>
                <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    Mettre à jour le statut
                </button>
            </div>
        </form>
    </div>
</div>
@endsection 