@extends('layouts.main')

@section('content')
<div class="p-4">
    <div class="max-w-7xl mx-auto">
        <!-- Breadcrumb -->
        <div class="mb-4">
            <nav class="flex text-gray-500 text-sm">
                <a href="{{ route('type-materials.index') }}" class="hover:text-gray-700">Type Materials</a>
                <span class="mx-2">/</span>
                <span class="text-gray-700">{{ $typeMaterial->name }}</span>
            </nav>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <div class="px-6 py-4 border-b border-gray-200 flex justify-between items-center bg-gray-50">
                <h3 class="text-xl font-semibold text-gray-800 flex items-center">
                    <i class="fas fa-box-open mr-2"></i>
                    Type Material Details
                </h3>
                <div class="space-x-2">
                    <a href="{{ route('type-materials.edit', $typeMaterial) }}" 
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        <i class="fas fa-edit mr-2"></i> Edit
                    </a>
                    <a href="{{ route('type-materials.index') }}" 
                       class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-500">
                        <i class="fas fa-arrow-left mr-2"></i> Back
                    </a>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-12 gap-6">
                    <!-- Basic Information -->
                    <div class="md:col-span-4">
                        <div class="bg-white rounded-lg border border-gray-200">
                            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50">
                                <h5 class="font-semibold text-gray-800">Basic Information</h5>
                            </div>
                            <div class="p-4">
                                <div class="divide-y divide-gray-200">
                                    <div class="py-3 grid grid-cols-2">
                                        <span class="text-gray-600 font-medium">Name</span>
                                        <span class="text-gray-900">{{ $typeMaterial->name }}</span>
                                    </div>
                                    <div class="py-3 grid grid-cols-2">
                                        <span class="text-gray-600 font-medium">Total Materials</span>
                                        <span class="text-gray-900">
                                            <span class="px-2.5 py-0.5 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                                {{ $typeMaterial->materials->count() }}
                                            </span>
                                        </span>
                                    </div>
                                    <div class="py-3 grid grid-cols-2">
                                        <span class="text-gray-600 font-medium">Created At</span>
                                        <span class="text-gray-900">{{ $typeMaterial->created_at->format('Y-m-d H:i') }}</span>
                                    </div>
                                    <div class="py-3 grid grid-cols-2">
                                        <span class="text-gray-600 font-medium">Last Updated</span>
                                        <span class="text-gray-900">{{ $typeMaterial->updated_at->format('Y-m-d H:i') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Related Materials -->
                    <div class="md:col-span-8">
                        <div class="bg-white rounded-lg border border-gray-200">
                            <div class="px-4 py-3 border-b border-gray-200 bg-gray-50 flex justify-between items-center">
                                <h5 class="font-semibold text-gray-800">Related Materials</h5>
                                <a href="{{ route('materials.create') }}" 
                                   class="inline-flex items-center px-3 py-1.5 bg-green-600 text-white text-sm rounded-md hover:bg-green-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500">
                                    <i class="fas fa-plus mr-2"></i> Add Material
                                </a>
                            </div>
                            <div class="p-4">
                                @if($typeMaterial->materials->count() > 0)
                                    <div class="overflow-x-auto">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead class="bg-gray-50">
                                                <tr>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                                                    <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider w-20">Actions</th>
                                                </tr>
                                            </thead>
                                            <tbody class="bg-white divide-y divide-gray-200">
                                                @foreach($typeMaterial->materials as $material)
                                                    <tr class="hover:bg-gray-50 transition-colors duration-200">
                                                        <td class="px-6 py-4 text-sm text-gray-900">
                                                            {{ $material->name }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-500">
                                                            {{ Str::limit($material->description, 50) ?: 'N/A' }}
                                                        </td>
                                                        <td class="px-6 py-4 text-sm text-gray-900">
                                                            <span class="px-2.5 py-0.5 rounded-full text-sm font-medium {{ $material->quantity > 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                                                {{ $material->quantity }}
                                                            </span>
                                                        </td>
                                                        <td class="px-6 py-4 text-center text-sm space-x-2">
                                                            <a href="{{ route('materials.show', $material) }}" 
                                                               class="inline-flex items-center p-1.5 bg-blue-100 text-blue-700 rounded-md hover:bg-blue-200 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500"
                                                               title="View Details">
                                                                <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                                                </svg>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                @else
                                    <div class="rounded-md bg-blue-50 p-4">
                                        <div class="flex">
                                            <i class="fas fa-info-circle text-blue-400 mr-2"></i>
                                            <p class="text-sm text-blue-700">
                                                No materials associated with this type. Click the "Add Material" button to add one.
                                            </p>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
