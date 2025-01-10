<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Page Non Trouvée - FSDM Inventory</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="{{ asset('build/assets/css-fonts.css') }}" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('build/assets/app-BxPl0S0X.css') }}">
    <script src="{{ asset('build/assets/app-Xaw6OIO1.js') }}"></script>

</head>
<body class="font-sans antialiased min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <!-- Logo -->
        <div class="mb-8">
            <a href="{{ route('welcome') }}" class="group flex flex-col items-center">
                <div class="bg-blue-500/10 group-hover:bg-blue-500/20 transition duration-300 rounded-lg p-2">
                    <svg class="w-8 h-8 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                    </svg>
                </div>
                <div class="flex flex-col items-center">
                    <span class="mt-4 text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">
                        FSDM Inventory
                    </span>
                    <span class="text-sm text-gray-500 dark:text-gray-400">La Faculté des Sciences Dhar El Mahraz</span>
                </div>
            </a>
        </div>

        <!-- Error Content -->
        <div class="w-full max-w-2xl px-8 py-8 bg-white/80 dark:bg-gray-800/80 backdrop-blur-xl shadow-xl rounded-2xl">
            <div class="text-center">
                <!-- Error Code -->
                <h1 class="relative pt-8">
                    <span class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-[10rem] font-bold text-gray-100 dark:text-gray-700/50 select-none">
                        404
                    </span>
                    <span class="relative text-4xl font-bold bg-gradient-to-r from-gray-800 to-gray-900 dark:from-white dark:to-gray-200 bg-clip-text text-transparent">
                        Page Non Trouvée
                    </span>
                </h1>

                <!-- Error Message -->
                <p class="mt-6 text-lg text-gray-600 dark:text-gray-300">
                    Désolé, la page que vous recherchez n'existe pas ou a été déplacée.
                </p>

                <!-- Illustration -->
                <div class="my-8 flex justify-center">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-full blur-2xl opacity-20 animate-pulse"></div>
                        <svg class="relative w-48 h-48 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 5.5L8.51 16.5M19.5 5.5v7M19.5 5.5h-7M6.5 3.5l-3 3 3 3M3.5 6.5h6M6.5 18.5l-3-3 3-3M3.5 15.5h6"/>
                        </svg>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="mt-10 flex flex-col sm:flex-row items-center justify-center gap-4">
                    <a href="{{ route('welcome') }}"
                       class="inline-flex items-center px-6 py-3 rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 text-white font-semibold shadow-lg hover:shadow-blue-500/25 transition-all duration-200 group">
                        <svg class="w-5 h-5 mr-2 transform group-hover:-translate-x-1 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Retour à l'accueil
                    </a>
                    <button onclick="window.history.back()"
                            class="inline-flex items-center px-6 py-3 rounded-xl border-2 border-gray-200 dark:border-gray-700 text-gray-600 dark:text-gray-300 font-semibold hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-all duration-200">
                        Page précédente
                    </button>
                </div>
            </div>
        </div>

        <!-- Help Text -->
        <div class="mt-8 text-center">
            <p class="text-sm text-gray-500 dark:text-gray-400">
                Si vous pensez qu'il s'agit d'une erreur, veuillez contacter l'administrateur.
            </p>
        </div>
    </div>

    <!-- Decorative Elements -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-1/2 left-0 w-96 h-96 bg-gradient-to-r from-blue-500/30 to-indigo-500/30 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-1/2 right-0 w-96 h-96 bg-gradient-to-r from-indigo-500/30 to-blue-500/30 rounded-full blur-3xl"></div>
    </div>
</body>
</html>
