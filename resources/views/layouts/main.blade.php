<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ isSidebarOpen: false }" :class="{ 'overflow-hidden': isSidebarOpen }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title') - FSDM Inventory</title>

    <!-- Preload Font Awesome fonts to prevent icons flash -->
    <link rel="preload" href="{{ asset('build/webfonts/fa-solid-900.woff2') }}" as="font" type="font/woff2" crossorigin>
    <link rel="preload" href="{{ asset('build/webfonts/fa-regular-400.woff2') }}" as="font" type="font/woff2" crossorigin>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('build/assets/all.min.css') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="{{ asset('build/assets/css-fonts.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('build/assets/app-DMv7BnxK.css') }}">

    <!-- DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.dataTables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/buttons.dataTables.min.css') }}">

    @stack('styles')

    <!-- Core Scripts - Load jQuery first -->
    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
</head>
<body class="font-sans antialiased bg-gray-50">
    <!-- Top Navigation -->
    <nav class="bg-white/90 backdrop-blur-xl border-b border-gray-100 fixed w-full z-40 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo and Mobile Menu Button -->
                <div class="flex items-center">
                    <div class="flex-shrink-0 flex items-center">
                        <a href="{{ session('user')->role == 'admin' ? route('dashboard') : route('fonctionnaire-reclamations.index') }}" class="group flex items-center space-x-3 transition-all duration-300 hover:scale-105">
                            <div class="bg-blue-600 rounded-lg p-2 shadow-md">
                                <svg class="w-6 h-6 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"/>
                                </svg>
                            </div>
                            <span class="text-xl font-bold text-gray-800 hidden sm:block">
                                FSDM Inventory
                            </span>
                        </a>
                    </div>
                    <!-- Mobile menu button -->
                    <button @click="isSidebarOpen = !isSidebarOpen" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-blue-500 lg:hidden ml-2">
                        <span class="sr-only">Open main menu</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>

                <!-- Desktop Navigation -->
                @if (session('user')->role == "admin")
                <div class="hidden lg:flex lg:items-center lg:space-x-4">
                    <!-- Gestion Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 rounded-md group-hover:bg-gray-50 transition-all duration-300">
                            <span>Gestion</span>
                            <svg class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5 transform opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-2 px-1">
                                <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-users mr-3 text-blue-500"></i>
                                    Utilisateurs
                                </a>
                                <a href="{{ route('etats.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-tasks mr-3 text-blue-500"></i>
                                    États
                                </a>
                                <a href="{{ route('departements.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-building mr-3 text-blue-500"></i>
                                    Départements
                                </a>
                                <a href="{{ route('type-locals.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-door-open mr-3 text-blue-500"></i>
                                    Types de Local
                                </a>
                                <a href="{{ route('locals.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-warehouse mr-3 text-blue-500"></i>
                                    Locals
                                </a>
                                <a href="{{ route('type-materials.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-boxes mr-3 text-blue-500"></i>
                                    Types de Matériel
                                </a>
                                <a href="{{ route('fournisseurs.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-truck mr-3 text-blue-500"></i>
                                    Fournisseurs
                                </a>
                                <a href="{{ route('fonctionaires.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user-tie mr-3 text-blue-500"></i>
                                    Fonctionaires
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Gestion de Stock Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 rounded-md group-hover:bg-gray-50 transition-all duration-300">
                            <span>Gestion de Stock</span>
                            <svg class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5 transform opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-2 px-1">
                                <a href="{{ route('materials.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-boxes mr-3 text-blue-500"></i>
                                    Matériels
                                </a>
                                <a href="{{ route('entrees.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-sign-in-alt mr-3 text-blue-500"></i>
                                    Entrées
                                </a>
                                <a href="{{ route('commands.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-shopping-cart mr-3 text-blue-500"></i>
                                    Commandes
                                </a>
                                <a href="{{ route('command_lines.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-list mr-3 text-blue-500"></i>
                                    Lignes de Commande
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Affectations Dropdown -->
                    <div class="relative group">
                        <button class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 rounded-md group-hover:bg-gray-50 transition-all duration-300">
                            <span>Affectations</span>
                            <svg class="ml-2 h-4 w-4 transition-transform duration-300 group-hover:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="absolute left-0 mt-2 w-56 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5 transform opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-2 px-1">
                                <a href="{{ route('affectations.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-exchange-alt mr-3 text-blue-500"></i>
                                    Affectations
                                </a>
                                <a href="{{ route('casse.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-hammer mr-3 text-blue-500"></i>
                                    Casse
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reclamations Link -->
                    <a href="{{ route('reclamations.index') }}" class="flex items-center px-3 py-2 text-sm font-medium text-gray-600 hover:text-blue-600 rounded-md hover:bg-gray-50 transition-all duration-300">
                        <i class="fas fa-exclamation-triangle mr-2 text-blue-500"></i>
                        <span>Reclamations</span>
                    </a>
                </div>
                @endif

                <!-- Right Side -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <!-- User Menu -->
                    <div class="relative group">
                        <button class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-100 transition-colors duration-300">
                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center">
                                <span class="text-white text-sm font-semibold">{{ substr(session('user')->name ?? 'U', 0, 1) }}</span>
                            </div>
                            <span class="text-sm font-medium text-gray-700 hidden sm:block">{{ session('user')->name ?? 'User' }}</span>
                        </button>

                        <div class="absolute right-0 mt-2 w-48 rounded-xl shadow-lg bg-white ring-1 ring-black ring-opacity-5 transform opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <div class="py-2 px-1">
                                <a href="{{ route('profile.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-user mr-3 text-blue-500"></i>
                                    Profile
                                </a>
                                <a href="{{ route('logout') }}" class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-red-50 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-sign-out-alt mr-3"></i>
                                    Déconnexion
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Sidebar -->
    <div x-show="isSidebarOpen"
         x-transition:enter="transition-opacity ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition-opacity ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @click="isSidebarOpen = false"
         class="fixed inset-0 bg-gray-900/50 backdrop-blur-sm z-40 lg:hidden">
    </div>

    <div x-show="isSidebarOpen"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed right-0 top-0 bottom-0 w-80 bg-white shadow-xl z-50 lg:hidden overflow-y-auto">
        <!-- Mobile Menu Content -->
        <div class="p-4">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-xl font-semibold text-gray-800">Menu</h2>
                <button @click="isSidebarOpen = false" class="p-2 rounded-lg hover:bg-gray-100">
                    <svg class="w-6 h-6 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            @if (session('user')->role == "admin")
                <!-- Gestion Section -->
                <div class="mb-6">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Gestion</h3>
                    <div class="space-y-1">
                        <a href="{{ route('users.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-users mr-3 text-blue-500"></i>
                            <span>Utilisateurs</span>
                        </a>
                        <a href="{{ route('etats.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-tasks mr-3 text-blue-500"></i>
                            <span>États</span>
                        </a>
                        <a href="{{ route('departements.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-building mr-3 text-blue-500"></i>
                            <span>Départements</span>
                        </a>
                        <a href="{{ route('type-locals.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-door-open mr-3 text-blue-500"></i>
                            <span>Types de Local</span>
                        </a>
                        <a href="{{ route('locals.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-warehouse mr-3 text-blue-500"></i>
                            <span>Locals</span>
                        </a>
                        <a href="{{ route('type-materials.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-boxes mr-3 text-blue-500"></i>
                            <span>Types de Matériel</span>
                        </a>
                        <a href="{{ route('fournisseurs.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-truck mr-3 text-blue-500"></i>
                            <span>Fournisseurs</span>
                        </a>
                        <a href="{{ route('fonctionaires.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-user-tie mr-3 text-blue-500"></i>
                            <span>Fonctionaires</span>
                        </a>
                    </div>
                </div>

                <!-- Stock Management Section -->
                <div class="mb-6">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Gestion de Stock</h3>
                    <div class="space-y-1">
                        <a href="{{ route('materials.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-boxes mr-3 text-blue-500"></i>
                            <span>Matériels</span>
                        </a>
                        <a href="{{ route('entrees.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-sign-in-alt mr-3 text-blue-500"></i>
                            <span>Entrées</span>
                        </a>
                        <a href="{{ route('commands.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-shopping-cart mr-3 text-blue-500"></i>
                            <span>Commandes</span>
                        </a>
                        <a href="{{ route('command_lines.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-list mr-3 text-blue-500"></i>
                            <span>Lignes de Commande</span>
                        </a>
                    </div>
                </div>

                <!-- Affectations Section -->
                <div class="mb-6">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Affectations</h3>
                    <div class="space-y-1">
                        <a href="{{ route('affectations.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-exchange-alt mr-3 text-blue-500"></i>
                            <span>Affectations</span>
                        </a>
                        <a href="{{ route('casse.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-hammer mr-3 text-blue-500"></i>
                            <span>Casse</span>
                        </a>
                    </div>
                </div>

                <!-- Reclamations Section -->
                <div class="mb-6">
                    <h3 class="px-4 text-xs font-semibold text-gray-400 uppercase tracking-wider mb-2">Autres</h3>
                    <div class="space-y-1">
                        <a href="{{ route('reclamations.index') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-blue-50 rounded-lg transition-colors duration-200">
                            <i class="fas fa-exclamation-triangle mr-3 text-blue-500"></i>
                            <span>Reclamations</span>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Page Content -->
    <main class="pt-16">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-white/80 backdrop-blur-xl border-t border-gray-100 mt-auto">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center space-x-2">
                    <span class="text-sm text-gray-500">
                        © {{ date('Y') }} FSDM - La Faculté des Sciences Dhar El Mahraz de Fès
                    </span>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')

    <!-- Application Scripts -->
    <script src="{{ asset('build/assets/app-Xaw6OIO1.js') }}"></script>
    <script src="{{ asset('js/alpinejs.js') }}"></script>

    <!-- DataTables and Plugins -->
    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('js/jszip.min.js') }}"></script>
    <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('js/xlsx.full.min.js') }}"></script>
</body>
</html>
