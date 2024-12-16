@extends('layouts.main')

@section('content')
<div class="py-12 bg-gray-50 dark:bg-gray-900">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-xl">
            <div class="p-8">
                <!-- Header Section -->
                <div class="mb-8">
                    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">Change Password</h2>
                    <p class="mt-2 text-gray-600 dark:text-gray-400">
                        Keep your account secure by using a strong password that includes numbers, letters, and special characters.
                    </p>
                </div>

                <!-- Alert Messages -->
                @if (session('error'))
                    <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg" role="alert">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-red-700">{{ session('error') }}</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Password Change Form -->
                <form method="POST" action="{{ route('profile.updatePassword') }}" class="space-y-6">
                    @csrf
                    @method("PUT")

                    <!-- Current Password -->
                    <div class="space-y-2">
                        <label for="old_password" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                            Current Password
                        </label>
                        <div class="relative">
                            <input type="password" 
                                   value="{{ old('old_password') }}"
                                   name="old_password" 
                                   id="old_password" 
                                   required
                                   class="block w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                        </div>
                        @error('old_password')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- New Password -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                            New Password
                        </label>
                        <div class="relative">
                            <input type="password"
                                   value="{{ old('password') }}"
                                   name="password" 
                                   id="password" 
                                   required
                                   class="block w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                        </div>
                        @error('password')
                            <p class="text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Confirm New Password -->
                    <div class="space-y-2">
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-900 dark:text-gray-100">
                            Confirm New Password
                        </label>
                        <div class="relative">
                            <input type="password"
                                   value="{{ old('password_confirmation') }}"
                                   name="password_confirmation" 
                                   id="password_confirmation" 
                                   required
                                   class="block w-full px-4 py-3 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-colors">
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="flex items-center justify-end gap-4 pt-4 mt-8 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('profile.index') }}" 
                           class="px-6 py-3 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Cancel
                        </a>
                        <button type="submit"
                                class="px-6 py-3 text-sm font-medium text-white bg-indigo-600 rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                            Update Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 