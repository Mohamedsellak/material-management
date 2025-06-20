@extends('layouts.main')

@section('title', 'Détails de la Ligne de Commande')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Breadcrumb -->
        <nav class="mb-8 text-sm" aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                <li class="inline-flex items-center">
                    <a href="{{ route('commands.show', $commandLine->command_id) }}" class="text-gray-500 hover:text-gray-700 dark:text-gray-300 dark:hover:text-white">
                        Commande #{{ $commandLine->command_id }}
                    </a>
                </li>
                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                        </svg>
                        <span class="ml-1 text-gray-500 dark:text-gray-300">Ligne #{{ $commandLine->id }}</span>
                    </div>
                </li>
            </ol>
        </nav>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                <!-- Main Information Section -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-md border border-gray-200 dark:border-gray-700 mb-8">
                    <div class="p-6">
                        <!-- Header with command line details and actions -->
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <h2 class="text-3xl font-bold text-gray-800 dark:text-white flex items-center gap-3">
                                    <span class="bg-blue-100 text-blue-800 text-2xl px-4 py-1 rounded-full dark:bg-blue-900 dark:text-blue-300">
                                        #{{ $commandLine->id }}
                                    </span>
                                    Ligne de Commande
                                </h2>
                                <div class="mt-3 flex items-center gap-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200">
                                        Commande #{{ $commandLine->command_id }}
                                    </span>
                                    <span class="text-gray-600 dark:text-gray-400">
                                        {{ $commandLine->created_at->format('d/m/Y à H:i') }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex gap-3">
                                <a href="{{ route('affectations.create', ['commandLine' => $commandLine->id]) }}"
                                   class="inline-flex items-center px-4 py-2 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out shadow-sm">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                                    </svg>
                                    Nouvelle Affectation
                                </a>
                                <a href="{{ route('command_lines.edit', $commandLine) }}"
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out shadow-sm">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Modifier
                                </a>
                                <form action="{{ route('command_lines.destroy', $commandLine) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette ligne de commande ?')"
                                            class="inline-flex items-center px-4 py-2 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out shadow-sm">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </div>

                        <!-- Combined Info Cards in one row -->
                        <div class="grid grid-cols-2 gap-6">
                            <!-- Material Info -->
                            <div class="flex flex-col h-full">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="p-2 bg-blue-100 rounded-lg dark:bg-blue-900">
                                        <svg class="w-5 h-5 text-blue-700 dark:text-blue-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Informations du Matériel</h3>
                                </div>
                                <div class="flex-1 bg-gray-50 dark:bg-gray-750 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                                    <dl class="grid gap-4">
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Nom du Matériel</dt>
                                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $commandLine->material->name }}</dd>
                                        </div>
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Type de Matériel</dt>
                                            <dd class="mt-1 text-md text-gray-900 dark:text-white">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                                    {{ $commandLine->material->typeMaterial->name }}
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Description</dt>
                                            <dd class="mt-1 text-md text-gray-900 dark:text-white">{{ $commandLine->material->description ?: 'Aucune description' }}</dd>
                                        </div>
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Quantité Commandée</dt>
                                            <dd class="mt-1 text-md text-gray-900 dark:text-white">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-300">
                                                    {{ $commandLine->quantity }} unité(s)
                                                </span>
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>

                            <!-- Command Info -->
                            <div class="flex flex-col h-full">
                                <div class="flex items-center gap-2 mb-4">
                                    <div class="p-2 bg-purple-100 rounded-lg dark:bg-purple-900">
                                        <svg class="w-5 h-5 text-purple-700 dark:text-purple-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Détails de la Commande</h3>
                                </div>
                                <div class="flex-1 bg-gray-50 dark:bg-gray-750 rounded-xl p-6 border border-gray-200 dark:border-gray-700">
                                    <dl class="grid gap-4">
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Commandé par</dt>
                                            <dd class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                                                {{ $commandLine->command->fonctionaire->nom }} {{ $commandLine->command->fonctionaire->prenom }}
                                            </dd>
                                        </div>
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Département</dt>
                                            <dd class="mt-1 text-md text-gray-900 dark:text-white">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-sm bg-gray-100 text-gray-800 dark:bg-gray-700 dark:text-gray-300">
                                                    {{ $commandLine->command->fonctionaire->departement->name }}
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Contact</dt>
                                            <dd class="mt-1 grid gap-1">
                                                <span class="text-md text-gray-900 dark:text-white flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                                    </svg>
                                                    {{ $commandLine->command->fonctionaire->email }}
                                                </span>
                                                <span class="text-md text-gray-900 dark:text-white flex items-center gap-2">
                                                    <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                                    </svg>
                                                    {{ $commandLine->command->fonctionaire->telephone }}
                                                </span>
                                            </dd>
                                        </div>
                                        <div class="flex flex-col">
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Date de Commande</dt>
                                            <dd class="mt-1 text-md text-gray-900 dark:text-white flex items-center gap-2">
                                                <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                                </svg>
                                                {{ \Carbon\Carbon::parse($commandLine->command->date_commande)->format('d/m/Y') }}
                                            </dd>
                                        </div>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Affectations Section -->
                @if($commandLine->affectations->count() > 0)
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 mb-8">
                    <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Affectations ({{ $commandLine->affectations->count() }})
                        </h3>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-700">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">N° Inventaire</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">État</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Local</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Type de Local</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Département</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                                @foreach($commandLine->affectations as $affectation)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        {{ $affectation->created_at->format('d/m/Y') }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2.5 py-1 text-sm font-medium rounded-full bg-blue-100 text-blue-800 dark:bg-blue-800 dark:text-blue-100">
                                            {{ $affectation->numero_inventaire }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2.5 py-1 text-sm font-medium rounded-full
                                            @if($affectation->etat->name === 'Bon') bg-green-100 text-green-800 dark:bg-green-800 dark:text-green-100
                                            @elseif($affectation->etat->name === 'Moyen') bg-yellow-100 text-yellow-800 dark:bg-yellow-800 dark:text-yellow-100
                                            @else bg-red-100 text-red-800 dark:bg-red-800 dark:text-red-100
                                            @endif">
                                            {{ $affectation->etat->name }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        {{ $affectation->local->name ?? 'Local non défini' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        {{ $affectation->local->typeLocal->name ?? 'Type non défini' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        {{ $affectation->local->departement->name ?? $affectation->commandLine->command->fonctionaire->departement->name ?? 'Département non défini' }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white">
                                        <a href="{{ route('affectations.show', $affectation) }}"
                                           class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300">
                                            Voir
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                @endif

                <!-- Back Button -->
                <div class="flex justify-end">
                    <a href="{{ route('commands.show', $commandLine->command_id) }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out shadow-sm">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour à la commande
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
