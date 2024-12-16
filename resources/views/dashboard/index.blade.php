@extends('layouts.main')

@section('title','Dashboard')

@section('content')
<div class="container mx-auto px-4 py-6 bg-white dark:bg-gray-900 min-h-screen">
    <!-- Header Section -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-3xl font-bold text-gray-900 dark:text-white">Dashboard</h1>
            <p class="text-gray-600 dark:text-gray-400">Welcome back, {{ session('user')->name }}</p>
        </div>
        <div class="flex space-x-3">
            <a href="{{ route('commands.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                </svg>
                New Command
            </a>
            <a href="{{ route('materials.create') }}" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-lg flex items-center">
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
        <div class="bg-gradient-to-r from-blue-900 to-blue-800 rounded-xl p-6 text-gray-900 dark:text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-200 dark:text-gray-300 opacity-80">Total Materials</p>
                    <h3 class="text-3xl font-bold text-gray-900 dark:text-white">{{ \App\Models\Material::count() }}</h3>
                    <p class="text-sm mt-2 flex items-center text-blue-600 dark:text-blue-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        Types: {{ \App\Models\TypeMaterial::count() }}
                    </p>
                </div>
                <div class="p-3 bg-blue-100 dark:bg-blue-700 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Commands Stats -->
        <div class="bg-gradient-to-r from-purple-900 to-purple-800 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm opacity-80">Active Commands</p>
                    <h3 class="text-3xl font-bold">{{ \App\Models\Command::count() }}</h3>
                    <p class="text-sm mt-2 flex items-center text-purple-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        Lines: {{ \App\Models\CommandLine::count() }}
                    </p>
                </div>
                <div class="p-3 bg-purple-700 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Locations Stats -->
        <div class="bg-gradient-to-r from-green-900 to-green-800 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm opacity-80">Total Locations</p>
                    <h3 class="text-3xl font-bold">{{ \App\Models\Local::count() }}</h3>
                    <p class="text-sm mt-2 flex items-center text-green-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        Types: {{ \App\Models\TypeLocal::count() }}
                    </p>
                </div>
                <div class="p-3 bg-green-700 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                    </svg>
                </div>
            </div>
        </div>

        <!-- Personnel Stats -->
        <div class="bg-gradient-to-r from-red-900 to-red-800 rounded-xl p-6 text-white shadow-lg transform hover:scale-105 transition-transform duration-200">
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm opacity-80">Fonctionaires</p>
                    <h3 class="text-3xl font-bold">{{ \App\Models\Fonctionaire::count() }}</h3>
                    <p class="text-sm mt-2 flex items-center text-red-300">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                        </svg>
                        Departments: {{ \App\Models\Departement::count() }}
                    </p>
                </div>
                <div class="p-3 bg-red-700 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Material Inventory Table -->
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 mb-8">
        <div class="flex justify-between items-center mb-6">
            <div>
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Material Inventory Status</h2>
                <p class="text-gray-600 dark:text-gray-400 text-sm mt-1">Monitor stock levels and material status</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center space-x-2">
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-900 text-red-300">
                        Critical Stock
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-900 text-yellow-300">
                        Low Stock
                    </span>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-900 text-green-300">
                        In Stock
                    </span>
                </div>
                <a href="{{ route('materials.create') }}" 
                   class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                    </svg>
                    Add Material
                </a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                <thead class="bg-gray-50 dark:bg-gray-700/50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
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
                    @foreach(\App\Models\Material::with('typeMaterial')->get() as $material)
                        <tr class="@if($material->quantity <= 3) 
                                    bg-red-50 dark:bg-red-900/20 
                                @elseif($material->quantity <= 10) 
                                    bg-yellow-50 dark:bg-yellow-900/20 
                                @endif 
                                hover:bg-gray-50 dark:hover:bg-gray-700/30 transition-colors">
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
                                        'bg-red-900 text-red-300' => $material->quantity <= 3,
                                        'bg-yellow-900 text-yellow-300' => $material->quantity > 3 && $material->quantity <= 10,
                                        'bg-green-900 text-green-300' => $material->quantity > 10,
                                    ])>
                                        {{ $material->quantity }} units
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="w-full bg-gray-700 rounded-full h-2.5">
                                    <div @class([
                                        'h-2.5 rounded-full',
                                        'bg-red-600' => $material->quantity <= 3,
                                        'bg-yellow-600' => $material->quantity > 3 && $material->quantity <= 10,
                                        'bg-green-600' => $material->quantity > 10,
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
    </div>

    <!-- Recent Activities Section -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
        <!-- Recent Commands -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Recent Commands</h2>
                <a href="{{ route('commands.index') }}" class="text-indigo-600 dark:text-indigo-400 hover:text-indigo-900 dark:hover:text-indigo-300 text-sm">View All</a>
            </div>
            <div class="space-y-4">
                @foreach(\App\Models\Command::latest()->take(5)->get() as $command)
                    <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-900 dark:text-gray-300">Command #{{ $command->id }}</span>
                            <span class="text-sm text-gray-500 dark:text-gray-400">{{ $command->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Recent Materials -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-white">Recent Materials</h2>
                <a href="{{ route('materials.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm">View All</a>
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
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Recent Locations</h2>
                <a href="{{ route('locals.index') }}" class="text-indigo-400 hover:text-indigo-300 text-sm">View All</a>
            </div>
            <div class="space-y-4">
                @foreach(\App\Models\Local::latest()->take(5)->get() as $local)
                <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-4">
                    <div class="flex justify-between items-center">
                        <span class="text-gray-900 dark:text-gray-Total Materials300">{{ $local->name }}</span>
                        <span class="text-sm text-gray-400">{{ $local->type->name ?? 'N/A' }}</span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection