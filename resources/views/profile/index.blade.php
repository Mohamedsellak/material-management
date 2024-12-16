@extends('layouts.main')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6">
                @if (session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <span class="block sm:inline">{{ session('success') }}</span>
                    </div>
                @endif

                <!-- Profile Header -->
                <div class="flex items-center space-x-6 pb-6 border-b">
                    <div class="shrink-0">
                        <img class="h-32 w-32 rounded-full object-cover border-4 border-gray-100 shadow-lg" 
                             src="https://ui-avatars.com/api/?name={{ urlencode(session('user')->name) }}&background=0D8ABC&color=fff" 
                             alt="Profile avatar">
                    </div>
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">{{ session('user')->name }}</h1>
                        <p class="text-gray-500">Member since {{ session('user')->created_at->format('F Y') }}</p>
                    </div>
                </div>

                <!-- Settings Sections -->
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <!-- Email Section -->
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-blue-50 rounded-lg">
                                        <svg class="w-6 h-6 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">Email Address</h3>
                                        <p class="text-gray-600">{{ session('user')->email }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('profile.editEmail') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors duration-150">
                                    Change Email
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Password Section -->
                    <div class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition-shadow duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-3">
                                    <div class="p-2 bg-purple-50 rounded-lg">
                                        <svg class="w-6 h-6 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900">Password</h3>
                                        <p class="text-gray-600">Last updated {{ session('user')->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('profile.editPassword') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-purple-600 border border-transparent rounded-lg font-medium text-sm text-white hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-colors duration-150">
                                    Change Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Info Section -->
                <div class="mt-8">
                    <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Account Information</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <p class="text-sm font-medium text-gray-500">Account Status</p>
                                <p class="mt-1 text-sm text-gray-900">Active</p>
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-500">Account Type</p>
                                <p class="mt-1 text-sm text-gray-900">{{ ucfirst(session('user')->role ?? 'User') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
