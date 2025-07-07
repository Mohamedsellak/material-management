@extends('layouts.main')

@section('title','Dashboard')

@section('content')
<div class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50">
    <div class="container mx-auto px-4 py-6">
        <!-- Header Section - Professional Design -->
        <div class="mb-8">
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4">
                <div class="space-y-2">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-lg">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl lg:text-4xl font-bold bg-gradient-to-r from-slate-900 via-blue-900 to-indigo-900 bg-clip-text text-transparent tracking-tight">
                                Dashboard
                            </h1>
                            <p class="text-slate-600 mt-1">
                                Welcome back, <span class="font-semibold text-blue-700">{{ session('user')->name }}</span>
                            </p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3 text-sm text-slate-500">
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-green-400 rounded-full animate-pulse"></div>
                            <span>System Online</span>
                        </div>
                        <div class="w-1 h-3 bg-slate-300"></div>
                        <span>{{ now()->format('l, F j, Y') }}</span>
                    </div>
                </div>

                <div class="flex flex-wrap gap-2">
                    <a href="{{ route('commands.create') }}"
                       class="group bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white px-4 py-2.5 rounded-xl flex items-center transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm">
                        <svg class="w-4 h-4 mr-2 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                        </svg>
                        <span class="font-semibold">New Command</span>
                    </a>
                    <a href="{{ route('materials.create') }}"
                       class="group bg-white hover:bg-slate-50 text-slate-700 border-2 border-slate-200 hover:border-blue-300 px-4 py-2.5 rounded-xl flex items-center transition-all duration-300 shadow-md hover:shadow-lg text-sm">
                        <svg class="w-4 h-4 mr-2 group-hover:scale-110 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                        </svg>
                        <span class="font-semibold">Add Material</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Enhanced Stats Grid with Professional Design -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4 mb-8">
            <!-- Materials Stats -->
            <div class="group bg-white rounded-xl p-4 shadow-md border border-slate-200 hover:shadow-lg transition-all duration-300 hover:border-blue-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-blue-100 to-transparent rounded-full -translate-y-10 translate-x-10 opacity-50 group-hover:opacity-70 transition-opacity"></div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span class="text-xs text-green-600 font-medium">+12%</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-medium text-slate-600 uppercase tracking-wider">Total Materials</p>
                        <h3 class="text-2xl font-bold text-slate-900">{{ \App\Models\Material::count() }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 border border-blue-200">
                                {{ \App\Models\TypeMaterial::count() }} Types
                            </span>
                            <span class="text-xs text-slate-500">Active</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Commands Stats -->
            <div class="group bg-white rounded-xl p-4 shadow-md border border-slate-200 hover:shadow-lg transition-all duration-300 hover:border-purple-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-purple-100 to-transparent rounded-full -translate-y-10 translate-x-10 opacity-50 group-hover:opacity-70 transition-opacity"></div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-purple-500 to-purple-600 rounded-lg flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span class="text-xs text-green-600 font-medium">+8%</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-medium text-slate-600 uppercase tracking-wider">Active Commands</p>
                        <h3 class="text-2xl font-bold text-slate-900">{{ \App\Models\Command::count() }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-purple-50 text-purple-700 border border-purple-200">
                                {{ \App\Models\CommandLine::count() }} Lines
                            </span>
                            <span class="text-xs text-slate-500">Progress</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Locations Stats -->
            <div class="group bg-white rounded-xl p-4 shadow-md border border-slate-200 hover:shadow-lg transition-all duration-300 hover:border-emerald-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-emerald-100 to-transparent rounded-full -translate-y-10 translate-x-10 opacity-50 group-hover:opacity-70 transition-opacity"></div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-emerald-500 to-emerald-600 rounded-lg flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span class="text-xs text-green-600 font-medium">+5%</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-medium text-slate-600 uppercase tracking-wider">Total Locations</p>
                        <h3 class="text-2xl font-bold text-slate-900">{{ \App\Models\Local::count() }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-200">
                                {{ \App\Models\TypeLocal::count() }} Types
                            </span>
                            <span class="text-xs text-slate-500">Available</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Personnel Stats -->
            <div class="group bg-white rounded-xl p-4 shadow-md border border-slate-200 hover:shadow-lg transition-all duration-300 hover:border-amber-300 relative overflow-hidden">
                <div class="absolute top-0 right-0 w-20 h-20 bg-gradient-to-bl from-amber-100 to-transparent rounded-full -translate-y-10 translate-x-10 opacity-50 group-hover:opacity-70 transition-opacity"></div>
                <div class="relative">
                    <div class="flex justify-between items-start mb-3">
                        <div class="w-10 h-10 bg-gradient-to-r from-amber-500 to-amber-600 rounded-lg flex items-center justify-center shadow-sm group-hover:scale-105 transition-transform duration-300">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <div class="flex items-center space-x-1">
                            <svg class="w-3 h-3 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/>
                            </svg>
                            <span class="text-xs text-green-600 font-medium">+3%</span>
                        </div>
                    </div>
                    <div class="space-y-1">
                        <p class="text-xs font-medium text-slate-600 uppercase tracking-wider">Personnel</p>
                        <h3 class="text-2xl font-bold text-slate-900">{{ \App\Models\Fonctionaire::count() }}</h3>
                        <div class="flex items-center justify-between">
                            <span class="inline-flex items-center px-2 py-0.5 rounded-full text-xs font-medium bg-amber-50 text-amber-700 border border-amber-200">
                                {{ \App\Models\Departement::count() }} Depts
                            </span>
                            <span class="text-xs text-slate-500">Active</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Enhanced Material Inventory Section -->
        <div class="bg-white rounded-xl shadow-lg border border-slate-200 overflow-hidden mb-6">
            <!-- Compact Header -->
            <div class="bg-gradient-to-r from-slate-50 to-blue-50 px-6 py-4 border-b border-slate-200">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-3">
                    <div class="flex items-center space-x-3">
                        <div class="w-8 h-8 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-lg flex items-center justify-center">
                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2-2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-lg font-bold text-slate-900">Material Inventory Status</h2>
                            <p class="text-slate-600 text-xs">Monitor stock levels and material status</p>
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center gap-3">
                        <!-- Compact Status Legend -->
                        <div class="flex items-center space-x-2 text-xs">
                            <div class="flex items-center space-x-1">
                                <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                                <span class="font-medium text-slate-600">Critical</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-2 h-2 bg-amber-500 rounded-full"></div>
                                <span class="font-medium text-slate-600">Low</span>
                            </div>
                            <div class="flex items-center space-x-1">
                                <div class="w-2 h-2 bg-emerald-500 rounded-full"></div>
                                <span class="font-medium text-slate-600">Good</span>
                            </div>
                        </div>

                        <a href="{{ route('materials.create') }}"
                           class="group inline-flex items-center px-3 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white rounded-lg transition-all duration-300 shadow-md hover:shadow-lg text-sm">
                            <svg class="w-3 h-3 mr-1 group-hover:rotate-90 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="font-semibold">Add Material</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Compact Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Material Details
                            </th>
                            <th class="px-3 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Type & Category
                            </th>
                            <th class="px-3 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Quantity
                            </th>
                            <th class="px-3 py-3 text-left text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Stock Status
                            </th>
                            <th class="px-3 py-3 text-right text-xs font-bold text-slate-700 uppercase tracking-wider">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-100">
                        @foreach(\App\Models\Material::latest()->take(3)->get() as $material)
                            <tr class="group hover:bg-slate-50 transition-all duration-200 @if($material->quantity <= 3) bg-red-50/30 @elseif($material->quantity <= 10) bg-amber-50/30 @endif">
                                <td class="px-4 py-4">
                                    <div class="flex items-center space-x-3">
                                        <div class="flex-shrink-0">
                                            <div class="w-8 h-8 rounded-lg bg-gradient-to-r from-slate-100 to-slate-200 flex items-center justify-center shadow-sm group-hover:shadow-md transition-shadow">
                                                <span class="text-sm font-bold text-slate-700">{{ substr($material->name, 0, 2) }}</span>
                                            </div>
                                        </div>
                                        <div class="space-y-0.5">
                                            <div class="text-sm font-semibold text-slate-900 group-hover:text-blue-700 transition-colors">
                                                {{ $material->name }}
                                            </div>
                                            <div class="text-xs text-slate-500">
                                                ID: <span class="font-mono">#{{ str_pad($material->id, 4, '0', STR_PAD_LEFT) }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="space-y-0.5">
                                        <div class="text-sm font-medium text-slate-900">
                                            {{ $material->typeMaterial->name ?? 'Uncategorized' }}
                                        </div>
                                        <div class="text-xs text-slate-500">
                                            {{ $material->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <span @class([
                                        'inline-flex items-center px-2 py-1 rounded-lg text-sm font-bold shadow-sm',
                                        'bg-red-100 text-red-800 border border-red-200' => $material->quantity <= 3,
                                        'bg-amber-100 text-amber-800 border border-amber-200' => $material->quantity > 3 && $material->quantity <= 10,
                                        'bg-emerald-100 text-emerald-800 border border-emerald-200' => $material->quantity > 10,
                                    ])>
                                        {{ $material->quantity }}
                                        <span class="ml-1 text-xs opacity-75">units</span>
                                    </span>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="space-y-2">                        <div class="w-full bg-slate-200 rounded-full h-1.5 overflow-hidden">
                            <div @class([
                                'h-full rounded-full transition-all duration-500 shadow-sm',
                                'bg-gradient-to-r from-red-400 to-red-500' => $material->quantity <= 3,
                                'bg-gradient-to-r from-amber-400 to-amber-500' => $material->quantity > 3 && $material->quantity <= 10,
                                'bg-gradient-to-r from-emerald-400 to-emerald-500' => $material->quantity > 10,
                            ])
                            style="width: {{ min(($material->quantity / 25) * 100, 100) }}%"></div>
                        </div>
                                        <div class="text-xs text-slate-600 font-medium">
                                            @if($material->quantity <= 3)
                                                🔴 Critical - Reorder now
                                            @elseif($material->quantity <= 10)
                                                🟡 Low - Reorder soon
                                            @else
                                                🟢 Healthy level
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-3 py-4">
                                    <div class="flex items-center justify-end space-x-1">
                                        <a href="{{ route('materials.show', $material) }}"
                                           class="group/btn p-1.5 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-md transition-all duration-200"
                                           title="View Details">
                                            <svg class="w-4 h-4 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                            </svg>
                                        </a>
                                        <a href="{{ route('materials.edit', $material) }}"
                                           class="group/btn p-1.5 text-slate-400 hover:text-amber-600 hover:bg-amber-50 rounded-md transition-all duration-200"
                                           title="Edit Material">
                                            <svg class="w-4 h-4 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                            </svg>
                                        </a>
                                        <button type="button"
                                                class="group/btn p-1.5 text-slate-400 hover:text-red-600 hover:bg-red-50 rounded-md transition-all duration-200"
                                                title="Delete Material">
                                            <svg class="w-4 h-4 group-hover/btn:scale-110 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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

            <!-- Compact Table Footer -->
            <div class="bg-slate-50 px-6 py-3 border-t border-slate-200">
                <div class="flex items-center justify-center">
                    <a href="{{ route('materials.index') }}"
                       class="group inline-flex items-center px-4 py-2 text-sm font-semibold text-blue-700 hover:text-blue-800 transition-all duration-200">
                        <span>View Complete Inventory</span>
                        <svg class="w-4 h-4 ml-2 transform group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <!-- Professional Recent Activities Section -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
            <!-- Recent Commands -->
            <div class="group bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-4 py-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-white">Recent Commands</h3>
                        </div>
                        <a href="{{ route('commands.index') }}"
                           class="text-blue-100 hover:text-white text-xs font-medium transition-colors group-hover:underline">
                            View All →
                        </a>
                    </div>
                </div>
                <div class="p-4 space-y-3">
                    @forelse(\App\Models\Command::latest()->take(5)->get() as $command)
                        <div class="group/item bg-slate-50 hover:bg-blue-50 rounded-lg p-3 transition-all duration-200 border border-slate-100 hover:border-blue-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-blue-100 rounded-md flex items-center justify-center group-hover/item:bg-blue-200 transition-colors">
                                        <span class="text-xs font-bold text-blue-700">#{{ $command->id }}</span>
                                    </div>
                                    <div>
                                        <p class="text-sm font-semibold text-slate-900 group-hover/item:text-blue-700 transition-colors">
                                            Command #{{ $command->id }}
                                        </p>
                                        <p class="text-xs text-slate-500">Created recently</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <p class="text-xs font-medium text-slate-600">
                                        {{ $command->created_at->diffForHumans() }}
                                    </p>
                                    <p class="text-xs text-slate-400">Active</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <svg class="w-8 h-8 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                            </svg>
                            <p class="text-slate-500 text-xs">No commands yet</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Materials -->
            <div class="group bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="bg-gradient-to-r from-purple-500 to-purple-600 px-4 py-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-white">Recent Materials</h3>
                        </div>
                        <a href="{{ route('materials.index') }}"
                           class="text-purple-100 hover:text-white text-xs font-medium transition-colors group-hover:underline">
                            View All →
                        </a>
                    </div>
                </div>
                <div class="p-4 space-y-3">
                    @forelse(\App\Models\Material::latest()->take(5)->get() as $material)
                        <div class="group/item bg-slate-50 hover:bg-purple-50 rounded-lg p-3 transition-all duration-200 border border-slate-100 hover:border-purple-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-purple-100 rounded-md flex items-center justify-center group-hover/item:bg-purple-200 transition-colors">
                                        <span class="text-xs font-bold text-purple-700">{{ substr($material->name, 0, 2) }}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-slate-900 group-hover/item:text-purple-700 transition-colors truncate">
                                            {{ $material->name }}
                                        </p>
                                        <p class="text-xs text-slate-500">{{ $material->quantity }} units available</p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <span @class([
                                        'inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium',
                                        'bg-red-100 text-red-700' => $material->quantity <= 3,
                                        'bg-amber-100 text-amber-700' => $material->quantity > 3 && $material->quantity <= 10,
                                        'bg-emerald-100 text-emerald-700' => $material->quantity > 10,
                                    ])>
                                        @if($material->quantity <= 3)
                                            Critical
                                        @elseif($material->quantity <= 10)
                                            Low
                                        @else
                                            Good
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <svg class="w-8 h-8 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                            <p class="text-slate-500 text-xs">No materials yet</p>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Recent Locations -->
            <div class="group bg-white rounded-xl shadow-md border border-slate-200 overflow-hidden hover:shadow-lg transition-all duration-300">
                <div class="bg-gradient-to-r from-emerald-500 to-emerald-600 px-4 py-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-2">
                            <div class="w-6 h-6 bg-white/20 rounded-lg flex items-center justify-center">
                                <svg class="w-3 h-3 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </div>
                            <h3 class="text-base font-bold text-white">Recent Locations</h3>
                        </div>
                        <a href="{{ route('locals.index') }}"
                           class="text-emerald-100 hover:text-white text-xs font-medium transition-colors group-hover:underline">
                            View All →
                        </a>
                    </div>
                </div>
                <div class="p-4 space-y-3">
                    @forelse(\App\Models\Local::latest()->take(5)->get() as $local)
                        <div class="group/item bg-slate-50 hover:bg-emerald-50 rounded-lg p-3 transition-all duration-200 border border-slate-100 hover:border-emerald-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-2">
                                    <div class="w-6 h-6 bg-emerald-100 rounded-md flex items-center justify-center group-hover/item:bg-emerald-200 transition-colors">
                                        <span class="text-xs font-bold text-emerald-700">{{ substr($local->name, 0, 2) }}</span>
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <p class="text-sm font-semibold text-slate-900 group-hover/item:text-emerald-700 transition-colors truncate">
                                            {{ $local->name }}
                                        </p>
                                        <p class="text-xs text-slate-500">{{ $local->type->name ?? 'No type assigned' }}</p>
                                    </div>
                                </div>
                                <div class="flex-shrink-0">
                                    <span class="inline-flex items-center px-1.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-700">
                                        Active
                                    </span>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-6">
                            <svg class="w-8 h-8 text-slate-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            <p class="text-slate-500 text-xs">No locations yet</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
