<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Connexion - FSDM Inventory</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="{{ asset('build/assets/css-fonts.css') }}" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('build/assets/app-PaP-0BHV.css') }}">
    <script src="{{ asset('build/assets/app-Xaw6OIO1.js') }}"></script>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-[radial-gradient(ellipse_at_top,_var(--tw-gradient-stops))] from-sky-50 via-indigo-50 to-emerald-50">
        <div class="relative">
            <div class="absolute -top-8 -left-8 w-64 h-64 bg-purple-300 rounded-full mix-blend-multiply filter blur-lg opacity-30 "></div>
            <div class="absolute -top-8 -right-8 w-64 h-64 bg-yellow-300 rounded-full mix-blend-multiply filter blur-lg opacity-30 "></div>
            <div class="absolute -bottom-8 left-20 w-64 h-64 bg-pink-300 rounded-full mix-blend-multiply filter blur-lg opacity-30 "></div>

            <a href="{{ route('welcome') }}" class="group relative flex flex-col items-center transform hover:scale-102 transition duration-300">
                <div class="bg-white/20 group-hover:bg-white/30 backdrop-blur-sm transition duration-300 rounded-2xl p-4 shadow-lg">
                    <svg class="w-12 h-12 text-indigo-600 transform group-hover:rotate-6 transition-all duration-300" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div class="flex flex-col items-center mt-4 space-y-1">
                    <span class="text-2xl font-extrabold bg-gradient-to-r from-indigo-600 via-purple-600 to-indigo-600 bg-clip-text text-transparent">
                        FSDM Inventory
                    </span>
                    <span class="text-sm font-medium text-gray-600">La Faculté des Sciences Dhar El Mahraz</span>
                </div>
            </a>
        </div>

        <div class="w-full sm:max-w-md mt-8 px-8 py-10 bg-white/90 backdrop-blur-sm shadow-[0_8px_30px_rgb(0,0,0,0.12)] rounded-2xl border border-white/20">
            <div class="space-y-8">
                <div class="text-center space-y-2">
                    <h2 class="text-3xl font-bold bg-gradient-to-r from-gray-900 via-indigo-800 to-gray-900 bg-clip-text text-transparent">
                        Connexion
                    </h2>
                    <p class="text-sm text-gray-600">
                        Bienvenue ! Connectez-vous à votre compte
                    </p>
                </div>

                @if (session('error'))
                    <div class="relative px-4 py-3 mb-4 border border-red-100 rounded-xl bg-red-50/50 backdrop-blur-xl">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-sm font-medium text-red-800">
                                {{ session('error') }}
                            </span>
                        </div>
                    </div>
                @endif

                <form class="space-y-6" action="#" method="POST">
                    @csrf

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Adresse email
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input id="email" name="email" type="email" autocomplete="email" required
                                class="block w-full pl-10 rounded-xl border-gray-200 bg-white/50 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200"
                                placeholder="vous@exemple.com">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-medium text-gray-700">
                            Mot de passe
                        </label>
                        <div class="relative group">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 group-focus-within:text-indigo-500 transition-colors duration-200" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                class="block w-full pl-10 rounded-xl border-gray-200 bg-white/50 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm transition-all duration-200"
                                placeholder="••••••••">
                        </div>
                    </div>

                    <div>
                        <button type="submit" class="relative w-full inline-flex items-center justify-center px-8 py-3 overflow-hidden text-sm font-medium text-white transition-all duration-300 bg-gradient-to-r from-indigo-500 via-purple-500 to-indigo-500 rounded-xl group hover:bg-gradient-to-r focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                                <svg class="h-5 w-5 text-indigo-300 group-hover:text-indigo-200" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"/>
                                </svg>
                            </span>
                            <span class="relative">Se connecter</span>
                        </button>
                    </div>
                </form>

                <div class="relative">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-200"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <a href="{{ route('welcome') }}"
                           class="px-6 py-2 bg-white/80 rounded-xl text-gray-600 hover:text-indigo-600 transition-all duration-200 hover:shadow-md hover:scale-105 border border-gray-100">
                            Retour à l'accueil
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
