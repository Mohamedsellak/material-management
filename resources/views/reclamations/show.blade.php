@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Détails de la Réclamation</h1>
        <div class="space-x-2">
            <a href="{{ route('reclamations.edit', $reclamation) }}" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Modifier
            </a>
            <a href="{{ route('reclamations.editStatus', $reclamation) }}" 
                class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                Changer le Statut
            </a>
        </div>
    </div>

    <div class="bg-white shadow-md rounded-lg p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <h3 class="text-lg font-medium text-gray-900">Nom</h3>
                <p class="mt-1 text-gray-600">{{ $reclamation->name }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-900">Local</h3>
                <p class="mt-1 text-gray-600">{{ $reclamation->local->name }}</p>
            </div>

            <div class="md:col-span-2">
                <h3 class="text-lg font-medium text-gray-900">Description</h3>
                <p class="mt-1 text-gray-600">{{ $reclamation->description }}</p>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-900">Statut</h3>
                <span class="mt-1 inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                    {{ $reclamation->status === 'en attente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $reclamation->status === 'en cours' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $reclamation->status === 'resolue' ? 'bg-green-100 text-green-800' : '' }}">
                    {{ $reclamation->status }}
                </span>
            </div>

            <div>
                <h3 class="text-lg font-medium text-gray-900">Date de création</h3>
                <p class="mt-1 text-gray-600">{{ $reclamation->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <div class="md:col-span-2">
                <h3 class="text-lg font-medium text-gray-900">Commentaire</h3>
                <p class="mt-1 text-gray-600">{{ $reclamation->commentaire ?: 'Aucun commentaire' }}</p>
            </div>
        </div>

        <div class="mt-8 flex justify-end">
            <a href="{{ route('reclamations.index') }}" 
                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Retour à la liste
            </a>
        </div>
    </div>
</div>
@endsection 