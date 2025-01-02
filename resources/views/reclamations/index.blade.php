@extends('layouts.main')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 py-10">
    <div class="container mx-auto px-4">
        <!-- Header Section -->
        <div class="bg-white/80 backdrop-blur-lg rounded-3xl shadow-xl p-8 mb-8 border border-white/20">
            <div class="flex flex-col lg:flex-row justify-between items-start lg:items-center gap-8">
                <div class="flex flex-col gap-3">
                    <div class="flex items-center gap-3">
                        <h1 class="text-4xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 bg-clip-text text-transparent">
                            Liste des Réclamations
                        </h1>
                        <span class="px-4 py-1.5 bg-blue-100 text-blue-800 rounded-full text-sm font-semibold inline-flex items-center shadow-sm">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            {{ count($reclamations) }} Total
                        </span>
                    </div>
                    <p class="text-gray-600 text-lg">Gérez et suivez vos réclamations efficacement</p>
                    <a href="{{ route('reclamations.create') }}" 
                       class="inline-flex items-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-600 text-white px-6 py-3 rounded-xl hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 shadow-lg hover:shadow-xl w-fit">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        Nouvelle Réclamation
                    </a>
                </div>

                <div class="w-full lg:w-auto space-y-6">
                    <!-- Search Bar -->
                    <div class="relative group">
                        <input type="text" id="searchInput" placeholder="Rechercher une réclamation..." 
                               class="w-full lg:w-96 pl-12 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white/70 backdrop-blur-sm transition-all duration-300 group-hover:shadow-md">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400 group-hover:text-blue-500 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                    </div>

                    <!-- Filter Pills -->
                    <div class="flex flex-wrap gap-3">
                        <button data-filter="all" 
                                class="filter-btn px-5 py-2.5 rounded-xl bg-gradient-to-r from-blue-600 to-indigo-600 text-white hover:from-blue-700 hover:to-indigo-700 transition-all duration-300 shadow-md hover:shadow-lg">
                            Tous
                        </button>
                        <button data-filter="en attente" 
                                class="filter-btn px-5 py-2.5 rounded-xl bg-white hover:bg-gray-50 text-gray-700 transition-all duration-300 shadow-md hover:shadow-lg border border-gray-100">
                            En Attente
                        </button>
                        <button data-filter="en cours" 
                                class="filter-btn px-5 py-2.5 rounded-xl bg-white hover:bg-gray-50 text-gray-700 transition-all duration-300 shadow-md hover:shadow-lg border border-gray-100">
                            En Cours
                        </button>
                        <button data-filter="resolue" 
                                class="filter-btn px-5 py-2.5 rounded-xl bg-white hover:bg-gray-50 text-gray-700 transition-all duration-300 shadow-md hover:shadow-lg border border-gray-100">
                            Résolue
                        </button>
                    </div>
                </div>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-50/80 backdrop-blur-sm border border-green-100 p-4 mb-8 rounded-xl shadow-lg animate-fade-in-down" role="alert">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-green-800 font-medium">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        <!-- Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($reclamations as $reclamation)
                <div class="reclamation-card group bg-white/80 backdrop-blur-sm rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden transform hover:-translate-y-1" 
                     data-status="{{ $reclamation->status }}"
                     data-name="{{ $reclamation->name }}">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <h2 class="text-xl font-semibold text-gray-800 group-hover:text-blue-600 transition-colors duration-200">
                                {{ $reclamation->name }}
                            </h2>
                            <span class="inline-flex items-center px-4 py-1.5 rounded-full text-sm font-semibold shadow-sm
                                {{ $reclamation->status === 'en attente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                {{ $reclamation->status === 'en cours' ? 'bg-blue-100 text-blue-800' : '' }}
                                {{ $reclamation->status === 'resolue' ? 'bg-green-100 text-green-800' : '' }}">
                                <span class="w-2.5 h-2.5 rounded-full mr-2
                                    {{ $reclamation->status === 'en attente' ? 'bg-yellow-500 animate-pulse' : '' }}
                                    {{ $reclamation->status === 'en cours' ? 'bg-blue-500 animate-pulse' : '' }}
                                    {{ $reclamation->status === 'resolue' ? 'bg-green-500' : '' }}">
                                </span>
                                {{ ucfirst($reclamation->status) }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-6 line-clamp-2 text-base">{{ $reclamation->description }}</p>
                        
                        <div class="flex items-center text-gray-500 mb-4 bg-gray-50 rounded-xl p-3">
                            <svg class="w-5 h-5 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="text-sm font-medium">{{ $reclamation->local->name }}</span>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50/80 px-6 py-4 border-t border-gray-100">
                        <div class="flex justify-between items-center">
                            <div class="flex space-x-2">
                                <a href="{{ route('reclamations.show', $reclamation) }}" 
                                   class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-gray-200 hover:bg-blue-50 hover:border-blue-300 transition-all duration-300 group shadow-sm hover:shadow-md"
                                   title="Voir détails">
                                    <svg class="w-5 h-5 text-gray-500 group-hover:text-blue-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('reclamations.edit', $reclamation) }}" 
                                   class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-gray-200 hover:bg-indigo-50 hover:border-indigo-300 transition-all duration-300 group shadow-sm hover:shadow-md"
                                   title="Modifier">
                                    <svg class="w-5 h-5 text-gray-500 group-hover:text-indigo-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                </a>
                                <a href="{{ route('reclamations.editStatus', $reclamation) }}" 
                                   class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-gray-200 hover:bg-purple-50 hover:border-purple-300 transition-all duration-300 group shadow-sm hover:shadow-md"
                                   title="Changer le statut">
                                    <svg class="w-5 h-5 text-gray-500 group-hover:text-purple-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                    </svg>
                                </a>
                            </div>
                            <form action="{{ route('reclamations.destroy', $reclamation) }}" method="POST" class="inline-flex">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="relative inline-flex items-center justify-center w-10 h-10 rounded-xl bg-white border border-gray-200 hover:bg-red-50 hover:border-red-300 transition-all duration-300 group shadow-sm hover:shadow-md"
                                        title="Supprimer"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation?')">
                                    <svg class="w-5 h-5 text-gray-500 group-hover:text-red-600 transition-colors duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const cards = document.querySelectorAll('.reclamation-card');
    const filterBtns = document.querySelectorAll('.filter-btn');
    let currentFilter = 'all';

    function updateFilterButtons(selectedFilter) {
        filterBtns.forEach(btn => {
            const isSelected = btn.dataset.filter === selectedFilter;
            btn.classList.toggle('bg-gradient-to-r', isSelected);
            btn.classList.toggle('from-blue-600', isSelected);
            btn.classList.toggle('to-indigo-600', isSelected);
            btn.classList.toggle('text-white', isSelected);
            btn.classList.toggle('bg-white', !isSelected);
            btn.classList.toggle('text-gray-700', !isSelected);
        });
    }

    searchInput.addEventListener('input', function() {
        const searchText = this.value.toLowerCase();
        filterCards();
    });

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            currentFilter = this.dataset.filter;
            updateFilterButtons(currentFilter);
            filterCards();
        });
    });

    function filterCards() {
        const searchText = searchInput.value.toLowerCase();
        
        cards.forEach(card => {
            const cardName = card.dataset.name.toLowerCase();
            const cardStatus = card.dataset.status;
            const matchesSearch = cardName.includes(searchText);
            const matchesFilter = currentFilter === 'all' || cardStatus === currentFilter;
            
            card.style.opacity = '0';
            card.style.transform = 'scale(0.95)';
            
            setTimeout(() => {
                if (matchesSearch && matchesFilter) {
                    card.classList.remove('hidden');
                    card.style.opacity = '1';
                    card.style.transform = 'scale(1)';
                } else {
                    card.classList.add('hidden');
                }
            }, 150);
        });
    }
});
</script>
@endpush
@endsection 