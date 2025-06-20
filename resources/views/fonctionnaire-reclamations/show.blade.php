@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-4xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <div class="flex items-center gap-3">
                <div class="bg-blue-100 p-2 rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-gray-800">Détails de la Réclamation</h1>
            </div>
            <div class="flex space-x-3">
                @if($reclamation->status === 'en attente')
                    <a href="{{ route('fonctionnaire-reclamations.edit', $reclamation) }}"
                       class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2 shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                        </svg>
                        Modifier
                    </a>
                @endif
                <a href="{{ route('fonctionnaire-reclamations.index') }}"
                   class="bg-gray-600 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center gap-2 shadow-md hover:shadow-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M9.707 16.707a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414l6-6a1 1 0 011.414 1.414L5.414 9H17a1 1 0 110 2H5.414l4.293 4.293a1 1 0 010 1.414z" clip-rule="evenodd" />
                    </svg>
                    Retour
                </a>
            </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-100">
            <div class="p-8">
                <div class="flex justify-between items-start mb-8">
                    <div class="space-y-4">
                        <h2 class="text-2xl font-bold text-gray-800">{{ $reclamation->name }}</h2>
                        <div class="flex items-center gap-3">
                            <span class="px-4 py-1.5 text-sm font-semibold rounded-full inline-flex items-center shadow-sm
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
                                @if($reclamation->status === 'en attente')
                                    En attente
                                @elseif($reclamation->status === 'en cours')
                                    En cours
                                @else
                                    Résolu
                                @endif
                            </span>
                            <span class="text-sm text-gray-500 flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                                </svg>
                                Créée le {{ $reclamation->created_at->format('d/m/Y à H:i') }}
                            </span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0h8v12H6V4z" clip-rule="evenodd" />
                            </svg>
                            Local
                        </h3>
                        <p class="text-gray-600 font-medium">{{ $reclamation->local->name ?? 'Local non défini' }}</p>
                    </div>
                </div>

                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 0h8v12H6V4z" clip-rule="evenodd" />
                        </svg>
                        Description
                    </h3>
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <p class="text-gray-600 whitespace-pre-wrap">{{ $reclamation->description }}</p>
                    </div>
                </div>

                @if($reclamation->commentaire)
                <div class="border-t pt-8">
                    <h3 class="text-lg font-semibold text-gray-700 mb-4 flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M18 13V5a2 2 0 00-2-2H4a2 2 0 00-2 2v8a2 2 0 002 2h3l3 3 3-3h3a2 2 0 002-2zM5 7a1 1 0 011-1h8a1 1 0 110 2H6a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H6z" clip-rule="evenodd" />
                        </svg>
                        Commentaire
                    </h3>
                    <div class="bg-blue-50 rounded-xl p-6 border border-blue-100">
                        <p class="text-gray-600 whitespace-pre-wrap">{{ $reclamation->commentaire }}</p>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
