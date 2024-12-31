@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold">Liste des Réclamations</h1>
        <a href="{{ route('reclamations.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Nouvelle Réclamation
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Local</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Statut</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($reclamations as $reclamation)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reclamation->name }}</td>
                        <td class="px-6 py-4">{{ Str::limit($reclamation->description, 50) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $reclamation->local->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                {{ $reclamation->status === 'en attente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $reclamation->status === 'en cours' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $reclamation->status === 'resolue' ? 'bg-green-100 text-green-800' : '' }}">
                                {{ $reclamation->status }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <a href="{{ route('reclamations.show', $reclamation) }}" class="text-blue-600 hover:text-blue-900 mr-3">Voir</a>
                            <a href="{{ route('reclamations.edit', $reclamation) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Modifier</a>
                            <a href="{{ route('reclamations.editStatus', $reclamation) }}" class="text-purple-600 hover:text-purple-900 mr-3">Statut</a>
                            <form action="{{ route('reclamations.destroy', $reclamation) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation?')">
                                    Supprimer
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection 