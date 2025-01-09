@extends('layouts.main')

@section('title','Dashboard')

@section('content')
<div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-900 min-h-screen">
    <!-- Header Section - Enhanced typography and colors -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-4xl font-extrabold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600 tracking-tight">Dashboard</h1>
            <p class="text-gray-600 dark:text-gray-400 mt-2">Welcome back, <span class="font-semibold text-blue-600 dark:text-blue-400">{{ session('user')->name }}</span></p>
        </div>
        <div class="flex space-x-4">
            <a href="{{ route('commands.create') }}" 
               class="bg-gray-900 hover:bg-gray-800 dark:bg-gray-700 dark:hover:bg-gray-600 text-white px-4 py-2 rounded-lg flex items-center transition-all duration-200 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                New Command
            </a>
            <a href="{{ route('materials.create') }}" 
               class="bg-gray-100 hover:bg-gray-200 dark:bg-gray-800 dark:hover:bg-gray-700 text-gray-700 dark:text-gray-200 px-4 py-2 rounded-lg flex items-center transition-all duration-200 shadow-sm">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Add Material
            </a>
        </div>
    </div>

    <!-- Quick Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Materials Stats -->
        <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 transition-all duration-200 border border-blue-400/20">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm font-medium text-blue-100 uppercase tracking-wider">Total Materials</p>
                    <h3 class="text-3xl font-bold text-white mt-1 tracking-tight">{{ \App\Models\Material::count() }}</h3>
                    <div class="flex items-center mt-3">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-blue-400/30 text-blue-50">
                            {{ \App\Models\TypeMaterial::count() }} Types
                        </span>
                    </div>
                </div>
                <div class="p-3 bg-blue-400/30 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Commands Stats -->
        <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 transition-all duration-200 border border-purple-400/20">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-purple-100 opacity-90">Active Commands</p>
                    <h3 class="text-3xl font-bold text-white mt-1">{{ \App\Models\Command::count() }}</h3>
                    <div class="flex items-center mt-3">
                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-purple-400/30 text-purple-50">
                            Lines: {{ \App\Models\CommandLine::count() }}
                        </span>
                    </div>
                </div>
                <div class="p-3 bg-purple-400/30 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Locations Stats -->
        <div class="bg-gradient-to-br from-emerald-500 to-emerald-600 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 transition-all duration-200 border border-emerald-400/20">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm opacity-80">Total Locations</p>
                    <h3 class="text-3xl font-bold">{{ \App\Models\Local::count() }}</h3>
                    <p class="text-sm mt-2 flex items-center text-teal-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        Types: {{ \App\Models\TypeLocal::count() }}
                    </p>
                </div>
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Personnel Stats -->
        <div class="bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 transition-all duration-200 border border-amber-400/20">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm opacity-80">Fonctionaires</p>
                    <h3 class="text-3xl font-bold">{{ \App\Models\Fonctionaire::count() }}</h3>
                    <p class="text-sm mt-2 flex items-center text-zinc-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        Departments: {{ \App\Models\Departement::count() }}
                    </p>
                </div>
                <div class="p-3 bg-white/10 backdrop-blur-sm rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Material Inventory Table Header -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8 border border-gray-100 dark:border-gray-700">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-gray-900 to-gray-700 dark:from-white dark:to-gray-300 tracking-tight">Material Inventory Status</h2>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1 font-medium">Monitor stock levels and material status</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-600 dark:text-red-300 border border-red-200 dark:border-red-800/30">
                        Critical Stock
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-amber-100 dark:bg-amber-900/30 text-amber-600 dark:text-amber-300 border border-amber-200 dark:border-amber-800/30">
                        Low Stock
                    </span>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-emerald-100 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-800/30">
                        In Stock
                    </span>
                </div>
                <a href="{{ route('materials.create') }}" 
                   class="inline-flex items-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Material
                </a>
            </div>
        </div>

        <!-- Table styling improvements -->
        <div class="overflow-x-auto ring-1 ring-gray-200 dark:ring-gray-700 rounded-lg">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-800">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-wider">
                            Material Info
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Type & Status
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Quantity
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Stock Level
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                    @foreach(\App\Models\Material::latest()->take(3)->get() as $material)
                        <tr class="@if($material->quantity <= 3) 
                                    bg-red-50/50 dark:bg-red-900/10 
                                @elseif($material->quantity <= 10) 
                                    bg-amber-50/50 dark:bg-amber-900/10 
                                @endif 
                                hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-all duration-200">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10 rounded-full bg-gray-100 dark:bg-gray-700 flex items-center justify-center">
                                        <span class="text-lg text-gray-600 dark:text-gray-300">{{ substr($material->name, 0, 2) }}</span>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-200">{{ $material->name }}</div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400">ID: #{{ $material->id }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm text-gray-200">{{ $material->typeMaterial->name ?? 'N/A' }}</div>
                                <div class="text-sm text-gray-400">Added {{ $material->created_at->diffForHumans() }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div @class([
                                        'px-3 py-1.5 rounded-full text-sm font-medium',
                                        'bg-red-50 dark:bg-red-900/20 text-red-700 dark:text-red-200' => $material->quantity <= 3,
                                        'bg-amber-50 dark:bg-amber-900/20 text-amber-700 dark:text-amber-200' => $material->quantity > 3 && $material->quantity <= 10,
                                        'bg-teal-50 dark:bg-teal-900/20 text-teal-700 dark:text-teal-200' => $material->quantity > 10,
                                    ])>
                                        {{ $material->quantity }} units
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-full bg-gray-100 dark:bg-gray-700 rounded-full h-2.5">
                                    <div @class([
                                        'h-2.5 rounded-full transition-all duration-300',
                                        'bg-red-400' => $material->quantity <= 3,
                                        'bg-amber-400' => $material->quantity > 3 && $material->quantity <= 10,
                                        'bg-teal-400' => $material->quantity > 10,
                                    ]) style="width: {{ min(($material->quantity / 20) * 100, 100) }}%"></div>
                                </div>
                                <div class="text-xs text-gray-400 mt-1">
                                    @if($material->quantity <= 3)
                                        Critical - Reorder Required
                                    @elseif($material->quantity <= 10)
                                        Low Stock - Consider Reordering
                                    @else
                                        Healthy Stock Level
                                    @endif
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-3">
                                    <a href="{{ route('materials.show', $material) }}" 
                                       class="text-gray-400 hover:text-blue-400 transition-colors"
                                       title="View Details">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                        </svg>
                                    </a>
                                    <a href="{{ route('materials.edit', $material) }}" 
                                       class="text-gray-400 hover:text-indigo-400 transition-colors"
                                       title="Edit Material">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                        </svg>
                                    </a>
                                    <button type="button" 
                                            class="text-gray-400 hover:text-red-400 transition-colors"
                                            title="Delete Material">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-4 flex justify-center">
            <a href="{{ route('materials.index') }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 transition-colors group">
                View All Materials
                <svg class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                </svg>
            </a>
        </div>
    </div>

    <!-- Recent Activities Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Recent Commands -->
        <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-gray-800 dark:to-gray-800 rounded-xl shadow-lg p-6 border border-blue-200 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold text-blue-900 dark:text-white tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-blue-800 dark:from-blue-400 dark:to-blue-600">Recent Commands</span>
                </h2>
                <a href="{{ route('commands.index') }}" 
                   class="text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300 text-sm font-medium transition-colors">
                    View All →
                </a>
            </div>
            <div class="space-y-3">
                @foreach(\App\Models\Command::latest()->take(5)->get() as $command)
                    <div class="bg-white dark:bg-gray-700/50 rounded-lg p-4 hover:bg-blue-50 dark:hover:bg-gray-700 transition-all duration-200 group border border-blue-100 dark:border-gray-600">
                        <div class="flex justify-between items-center">
                            <span class="font-semibold text-gray-700 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                Command #{{ $command->id }}
                            </span>
                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                {{ $command->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Materials -->
        <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-gray-800 dark:to-gray-800 rounded-xl shadow-lg p-6 border border-purple-200 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-purple-800 dark:from-purple-400 dark:to-purple-600">Recent Materials</span>
                </h2>
                <a href="{{ route('materials.index') }}" 
                   class="text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 text-sm font-medium transition-colors">
                    View All →
                </a>
            </div>
            <div class="space-y-4">
                @foreach(\App\Models\Material::latest()->take(5)->get() as $material)
                <div class="bg-white dark:bg-gray-700 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-900 dark:text-gray-300">{{ $material->name }}</span>
                        <span class="px-2 py-1 text-xs rounded-full {{ $material->etat == 'active' ? 'bg-green-900 text-green-300' : 'bg-red-900 text-red-300' }}">
                            {{ $material->etat }}
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Locations -->
        <div class="bg-gradient-to-br from-emerald-50 to-emerald-100 dark:from-gray-800 dark:to-gray-800 rounded-xl shadow-lg p-6 border border-emerald-200 dark:border-gray-700">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-lg font-bold tracking-tight">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-600 to-emerald-800 dark:from-emerald-400 dark:to-emerald-600">Recent Locations</span>
                </h2>
                <a href="{{ route('locals.index') }}" 
                   class="text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 text-sm font-medium transition-colors">
                    View All →
                </a>
            </div>
            <div class="space-y-4">
                @foreach(\App\Models\Local::latest()->take(5)->get() as $local)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-900 dark:text-gray-300">{{ $local->name }}</span>
                        <span class="text-sm text-gray-400">{{ $local->type->name ?? 'N/A' }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection