@extends('layouts.main')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Success Alert -->
        @if (session('success'))
            <div class="mb-8">
                <div class="bg-green-50 dark:bg-green-900/50 border border-green-200 dark:border-green-800 rounded-xl p-4">
                    <div class="flex">
                        <svg class="flex-shrink-0 h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-green-800 dark:text-green-200">
                                {{ session('success') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-xl">
            <div class="p-8">
                <!-- Profile Header -->
                <div class="flex flex-col md:flex-row items-center md:space-x-8 pb-8 border-b dark:border-gray-700">
                    <div class="shrink-0 mb-4 md:mb-0">
                        <div class="relative group">
                            <div class="absolute -inset-0.5 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full blur opacity-30 group-hover:opacity-50 transition duration-300"></div>
                            <img class="relative h-32 w-32 rounded-full object-cover border-4 border-white dark:border-gray-700" 
                                 src="https://ui-avatars.com/api/?name={{ urlencode(session('user')->name) }}&background=0D8ABC&color=fff" 
                                 alt="Profile avatar">
                        </div>
                    </div>
                    <div class="text-center md:text-left">
                        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
                            {{ session('user')->name }}
                        </h1>
                        <p class="mt-2 text-gray-600 dark:text-gray-400">
                            Member since {{ session('user')->created_at->format('F Y') }}
                        </p>
                    </div>
                </div>

                <!-- Settings Cards -->
                <div class="mt-8 grid gap-6 md:grid-cols-2">
                    <!-- Email Card -->
                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/50 dark:to-blue-800/50 rounded-xl border border-blue-100/50 dark:border-blue-700/50 shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-blue-600 rounded-xl">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Email Address</h3>
                                        <p class="text-gray-700 dark:text-gray-300">{{ session('user')->email }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('profile.editEmail') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out shadow-sm">
                                    Change Email
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Password Card -->
                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/50 dark:to-purple-800/50 rounded-xl border border-purple-100/50 dark:border-purple-700/50 shadow-sm hover:shadow-md transition-all duration-300">
                        <div class="p-6">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-4">
                                    <div class="p-3 bg-purple-600 rounded-xl">
                                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Password</h3>
                                        <p class="text-gray-700 dark:text-gray-300">Last updated {{ session('user')->updated_at->diffForHumans() }}</p>
                                    </div>
                                </div>
                                <a href="{{ route('profile.editPassword') }}" 
                                   class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors duration-150 ease-in-out shadow-sm">
                                    Change Password
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Account Information -->
                <div class="mt-8">
                    <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700/50 dark:to-gray-800/50 rounded-xl p-6 border border-gray-200/50 dark:border-gray-600/50">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-6 flex items-center">
                            <svg class="w-6 h-6 mr-2 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Account Information
                        </h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div class="bg-white/50 dark:bg-gray-800/50 rounded-lg p-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Status</p>
                                <p class="mt-2 text-sm font-semibold text-gray-900 dark:text-white flex items-center">
                                    <span class="w-2 h-2 bg-green-500 rounded-full mr-2"></span>
                                    Active
                                </p>
                            </div>
                            <div class="bg-white/50 dark:bg-gray-800/50 rounded-lg p-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Account Type</p>
                                <p class="mt-2 text-sm font-semibold text-gray-900 dark:text-white">
                                    {{ ucfirst(session('user')->role ?? 'User') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
