@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">Nouvelles Affectations</h1>
            <a href="{{ route('affectations.index') }}" class="text-gray-600 hover:text-gray-800">
                Retour à la liste
            </a>
        </div>

        @if($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-hidden mb-6">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-lg font-semibold text-gray-700">Détails du Matériel</h2>
            </div>
            <div class="p-6 grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <p class="text-sm font-medium text-gray-500">Matériel</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $commandLine->material->name }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Marque</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $commandLine->material->marque }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Quantité à affecter</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $commandLine->quantity }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Description</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $commandLine->material->description }}</p>
                </div>
                <div>
                    <p class="text-sm font-medium text-gray-500">Catégorie</p>
                    <p class="mt-1 text-sm text-gray-900">{{ $commandLine->material->name }}</p>
                </div>
            </div>
        </div>

        <form action="{{ route('affectations.store') }}" method="POST">
            @csrf
            <input type="hidden" name="command_line_id" value="{{ $commandLine->id }}">

            <div class="bg-white shadow-md rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-gray-700">Liste des Affectations</h2>
                </div>
                
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Numéro d'inventaire
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    État
                                </th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Local
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @for($i = 0; $i < $commandLine->quantity; $i++)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                    {{ $i + 1 }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-sm @error('numero_inventaire.'.$i) border-red-500 @enderror"
                                           type="number"
                                           name="numero_inventaire[]"
                                           value="{{ old('numero_inventaire.'.$i) }}"
                                           placeholder="Numéro d'inventaire"
                                           required>
                                    @error('numero_inventaire.'.$i)
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-sm @error('etat_id.'.$i) border-red-500 @enderror"
                                            name="etat_id[]"
                                            required>
                                        <option value="">Sélectionnez un état</option>
                                        @foreach($etats as $etat)
                                            <option value="{{ $etat->id }}" {{ old('etat_id.'.$i) == $etat->id ? 'selected' : '' }}>
                                                {{ $etat->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('etat_id.'.$i)
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <select class="shadow-sm border-gray-300 rounded-md w-full py-2 px-3 text-sm @error('local_id.'.$i) border-red-500 @enderror"
                                            name="local_id[]"
                                            required>
                                        <option value="">Sélectionnez un local</option>
                                        @foreach($locals as $local)
                                            <option value="{{ $local->id }}" {{ old('local_id.'.$i) == $local->id ? 'selected' : '' }}>
                                                {{ $local->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('local_id.'.$i)
                                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                            @endfor
                        </tbody>
                    </table>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                    <div class="flex justify-end space-x-3">
                        <a href="{{ route('affectations.index') }}"
                           class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Annuler
                        </a>
                        <button type="submit"
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Créer les affectations
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 