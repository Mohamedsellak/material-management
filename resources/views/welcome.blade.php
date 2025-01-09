<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Gestion des Matériels - FSDM Fès</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="{{ asset('build/assets/css-fonts.css') }}" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('build/assets/app-BxPl0S0X.css') }}">
    <script src="{{ asset('build/assets/app-Xaw6OIO1.js') }}"></script>
    
</head>
<body class="font-sans antialiased bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
    <!-- Navigation -->
    <nav class="bg-white/80 backdrop-blur-xl dark:bg-gray-800/80 border-b border-gray-100 dark:border-gray-700 fixed w-full z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('welcome') }}" class="group flex items-center space-x-3">
                            <div class="bg-blue-500/10 group-hover:bg-blue-500/20 transition duration-300 rounded-lg p-2">
                                <svg class="w-8 h-8 text-blue-500" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <div class="flex flex-col">
                                <span class="text-xl font-bold bg-gradient-to-r from-blue-600 to-indigo-600 dark:from-blue-400 dark:to-indigo-400 bg-clip-text text-transparent">
                                    FSDM Inventory
                                </span>
                                <span class="text-sm text-gray-500 dark:text-gray-400">La Faculté des Sciences Dhar El Mahraz</span>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="flex items-center space-x-4">
                    <a href="{{ route('login') }}" class="transform hover:scale-105 transition-all duration-300 inline-flex items-center justify-center rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 px-5 py-2 font-semibold text-white shadow-lg hover:shadow-blue-500/25">
                        Connexion
                        <svg class="ml-2 -mr-1 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="relative isolate pt-14">
        <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80" aria-hidden="true">
            <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-blue-500 to-indigo-600 opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
        </div>

        <!-- Main Content -->
        <div class="py-24 sm:py-32 lg:pb-40">
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                <div class="mx-auto max-w-2xl text-center">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" style="width: 100%; height: 100%; object-fit: contain;">
                    <h1 class="text-4xl font-bold tracking-tight text-gray-900 dark:text-white sm:text-6xl">
                        Gestion des Matériels
                        <span class="block text-blue-600 dark:text-blue-400">FSDM Fès</span>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
                        Système intégré de gestion du matériel pour La Faculté des Sciences Dhar El Mahraz de Fès.
                        Une solution complète pour le suivi, la maintenance et l'inventaire.
                    </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('login') }}" class="rounded-xl bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-3 text-sm font-semibold text-white shadow-lg hover:shadow-blue-500/25 transition-all duration-200">
                            Commencer maintenant
                        </a>
                        <a href="#features" class="text-sm font-semibold leading-6 text-gray-900 dark:text-white">
                            En savoir plus <span aria-hidden="true">→</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Features Section -->
        <div id="features" class="py-24 sm:py-32 backdrop-blur-xl relative overflow-hidden">
            <!-- Decorative background elements -->
            <div class="absolute inset-0 bg-gradient-to-b from-blue-50/50 to-white/50 dark:from-gray-900/50 dark:to-gray-800/50"></div>
            <div class="absolute inset-y-0 right-1/2 -z-10 mr-16 w-[200%] origin-bottom-left skew-x-[-30deg] bg-white/80 dark:bg-gray-800/80 shadow-xl shadow-blue-600/10 ring-1 ring-blue-50 dark:ring-blue-900/20"></div>

            <div class="mx-auto max-w-7xl px-6 lg:px-8 relative">
                <!-- Enhanced Header Section -->
                <div class="mx-auto max-w-2xl lg:text-center mb-16">
                    <span class="inline-flex items-center rounded-full px-4 py-1 text-sm font-medium bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-300 ring-1 ring-inset ring-blue-600/20 mb-4">
                        <svg class="mr-2 h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                        </svg>
                        Fonctionnalités
                    </span>
                    <h2 class="mt-4 text-4xl font-bold tracking-tight bg-gradient-to-r from-gray-900 to-gray-600 dark:from-white dark:to-gray-200 bg-clip-text text-transparent sm:text-5xl">
                        Une solution complète pour votre gestion
                    </h2>
                    <p class="mt-6 text-lg leading-8 text-gray-600 dark:text-gray-300">
                        Découvrez les outils puissants qui vous permettront de gérer efficacement votre matériel universitaire
                    </p>
                </div>

                <!-- Features Grid -->
                <div class="mx-auto max-w-2xl lg:max-w-none">
                    <dl class="grid max-w-xl grid-cols-1 gap-x-12 gap-y-12 lg:max-w-none lg:grid-cols-3">
                        <!-- Feature 1: Inventaire -->
                        <div class="relative group">
                            <div class="absolute -inset-2 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl blur opacity-0 group-hover:opacity-10 transition duration-500"></div>
                            <div class="relative p-8 backdrop-blur-xl rounded-xl border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-colors duration-300 h-full">
                                <div class="flex items-center justify-between">
                                    <div class="rounded-lg bg-blue-500/10 p-3 w-fit">
                                        <svg class="h-7 w-7 text-blue-600 dark:text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">01</span>
                                </div>
                                <dt class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                    Inventaire en temps réel
                                </dt>
                                <dd class="mt-4 text-base leading-7 text-gray-600 dark:text-gray-400">
                                    <ul class="space-y-3">
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Suivi précis des équipements
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Gestion des entrées/sorties
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Historique des mouvements
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </div>

                        <!-- Feature 2: Maintenance -->
                        <div class="relative group">
                            <div class="absolute -inset-2 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl blur opacity-0 group-hover:opacity-10 transition duration-500"></div>
                            <div class="relative p-8 backdrop-blur-xl rounded-xl border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-colors duration-300 h-full">
                                <div class="flex items-center justify-between">
                                    <div class="rounded-lg bg-blue-500/10 p-3 w-fit">
                                        <svg class="h-7 w-7 text-blue-600 dark:text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">02</span>
                                </div>
                                <dt class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                    Maintenance préventive
                                </dt>
                                <dd class="mt-4 text-base leading-7 text-gray-600 dark:text-gray-400">
                                    <ul class="space-y-3">
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Planification des interventions
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Suivi des réparations
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Alertes automatiques
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </div>

                        <!-- Feature 3: Rapports -->
                        <div class="relative group">
                            <div class="absolute -inset-2 bg-gradient-to-r from-blue-500 to-indigo-500 rounded-xl blur opacity-0 group-hover:opacity-10 transition duration-500"></div>
                            <div class="relative p-8 backdrop-blur-xl rounded-xl border border-gray-200 dark:border-gray-700 hover:border-blue-500 dark:hover:border-blue-500 transition-colors duration-300 h-full">
                                <div class="flex items-center justify-between">
                                    <div class="rounded-lg bg-blue-500/10 p-3 w-fit">
                                        <svg class="h-7 w-7 text-blue-600 dark:text-blue-400" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4v-6m2 10H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <span class="text-sm font-medium text-blue-600 dark:text-blue-400">03</span>
                                </div>
                                <dt class="mt-6 text-xl font-semibold text-gray-900 dark:text-white">
                                    Analyses et rapports
                                </dt>
                                <dd class="mt-4 text-base leading-7 text-gray-600 dark:text-gray-400">
                                    <ul class="space-y-3">
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Tableaux de bord interactifs
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Statistiques détaillées
                                        </li>
                                        <li class="flex items-center">
                                            <svg class="h-4 w-4 mr-2 text-blue-500" viewBox="0 0 24 24" fill="currentColor">
                                                <path d="M20 6L9 17l-5-5"/>
                                            </svg>
                                            Export des données
                                        </li>
                                    </ul>
                                </dd>
                            </div>
                        </div>
                    </dl>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white/80 backdrop-blur-xl dark:bg-gray-800/80 border-t border-gray-100 dark:border-gray-700">
        <div class="mx-auto max-w-7xl px-6 py-12 md:flex md:items-center md:justify-between lg:px-8">
            <div class="flex justify-center space-x-6 md:order-2">
                <a href="http://www.FSDM.ac.ma/" class="text-gray-400 hover:text-blue-500 dark:hover:text-blue-400">
                    Site FSDM
                </a>
            </div>
            <div class="mt-8 md:order-1 md:mt-0">
                <p class="text-center text-xs leading-5 text-gray-500 dark:text-gray-400">
                    &copy; {{ date('Y') }} FSDM - La Faculté des Sciences Dhar El Mahraz de Fès. Tous droits réservés.
                </p>
            </div>
        </div>
    </footer>
</body>
</html>
