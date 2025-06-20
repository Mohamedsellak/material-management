@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="flex justify-between items-center mb-8">
        <div class="flex items-center gap-3">
            <div class="bg-blue-100 p-2 rounded-lg">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            <div>
                <h1 class="text-3xl font-bold text-gray-800">Mes Réclamations</h1>
                <p class="text-gray-600 mt-1">Gérez vos réclamations et suivez leur état</p>
            </div>
        </div>
        <a href="{{ route('fonctionnaire-reclamations.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-xl transition duration-200 ease-in-out transform hover:scale-105 flex items-center gap-2 shadow-lg hover:shadow-xl">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
            </svg>
            Nouvelle Réclamation
        </a>
    </div>


    @if(session('success'))
        <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-4 flex items-center shadow-sm">
            <div class="flex-shrink-0">
                <svg class="h-5 w-5 text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800">
                    {{ session('success') }}
                </p>
            </div>
            <div class="ml-auto pl-3">
                <div class="-mx-1.5 -my-1.5">
                    <button type="button" class="inline-flex rounded-md p-1.5 text-green-500 hover:bg-green-100 focus:outline-none" onclick="this.parentElement.parentElement.parentElement.remove()">
                        <span class="sr-only">Dismiss</span>
                        <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endif


    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($reclamations as $reclamation)
            <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition duration-300 ease-in-out overflow-hidden border border-gray-100">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-xl font-semibold text-gray-800 truncate flex-1 mr-4">{{ $reclamation->name }}</h2>
                        <span class="px-4 py-1.5 rounded-full inline-flex items-center shadow-sm
                            @if($reclamation->status === 'en attente') bg-amber-100 text-amber-800 border border-amber-200
                            @elseif($reclamation->status === 'en cours') bg-blue-100 text-blue-800 border border-blue-200
                            @else bg-green-100 text-green-800 border border-green-200
                            @endif">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5" viewBox="0 0 20 20" fill="currentColor">
                                @if($reclamation->status === 'en attente')
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd" />
                                @elseif($reclamation->status === 'en cours')
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3-8a1 1 0 01-2 0V7a1 1 0 112 0v3z" clip-rule="evenodd" />
                                @else
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                @endif
                            </svg>
                            <span class="text-sm font-semibold">
                                @if($reclamation->status === 'en attente')
                                    En attente
                                @elseif($reclamation->status === 'en cours')
                                    En cours
                                @else
                                    Résolu
                                @endif
                            </span>
                        </span>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center text-gray-600 bg-gray-50 rounded-lg p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0h8v12H6V4z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium">{{ $reclamation->local->name ?? 'Local non défini' }}</span>
                        </div>

                        <div class="flex items-center text-gray-600 bg-gray-50 rounded-lg p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-500" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                            </svg>
                            <span class="text-sm font-medium">{{ $reclamation->created_at->format('d/m/Y') }}</span>
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-end space-x-3 border-t pt-4">
                        <a href="{{ route('fonctionnaire-reclamations.show', $reclamation) }}"
                           class="inline-flex items-center gap-1 text-blue-600 hover:text-blue-800 font-medium text-sm transition duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                            </svg>
                            Détails
                        </a>
                        @if($reclamation->status === 'en attente')
                            <a href="{{ route('fonctionnaire-reclamations.edit', $reclamation) }}"
                               class="inline-flex items-center gap-1 text-indigo-600 hover:text-indigo-800 font-medium text-sm transition duration-200">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                </svg>
                                Modifier
                            </a>
                            <form action="{{ route('fonctionnaire-reclamations.destroy', $reclamation) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="inline-flex items-center gap-1 text-rose-600 hover:text-rose-800 font-medium text-sm transition duration-200"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation?')">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                    </svg>
                                    Supprimer
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full">
                <div class="bg-white rounded-xl shadow-md p-8 text-center border border-gray-100">
                    <div class="bg-gray-50 rounded-full w-20 h-20 flex items-center justify-center mx-auto mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                        </svg>
                    </div>
                    <h3 class="text-gray-800 font-semibold text-xl mb-2">Aucune réclamation</h3>
                    <p class="text-gray-500">Vous n'avez pas encore créé de réclamation</p>
                    <a href="{{ route('fonctionnaire-reclamations.create') }}"
                       class="inline-flex items-center gap-2 bg-blue-600 text-white px-4 py-2 rounded-lg mt-4 hover:bg-blue-700 transition duration-200">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                        </svg>
                        Créer votre première réclamation
                    </a>
                </div>
            </div>
        @endforelse
    </div>
</div>
@endsection
