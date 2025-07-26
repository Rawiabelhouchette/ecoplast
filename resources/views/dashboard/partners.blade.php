<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://preline.co/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description"
        content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Eco plast">
    <meta name="twitter:description"
        content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="https://preline.co/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="Eco plast">
    <meta property="og:description"
        content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title>Eco plast</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="../../favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') ===
            'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' &&
            window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>

    <!-- Apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.css">
    <style type="text/css">
        .apexcharts-tooltip.apexcharts-theme-light {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
    </style>

    <!-- CSS Preline -->
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">

    <style>
        .theme-toggle {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #4b5563;
            color: white;
            border: none;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .theme-toggle:hover {
            background-color: #374151;
        }
    </style>
    <script>
        const updateTheme = () => {
            const html = document.querySelector('html');
            const currentTheme = localStorage.getItem('hs_theme');
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            if (newTheme === 'dark') {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }

            localStorage.setItem('hs_theme', newTheme);
        };

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('hs_theme') || 'light';
            const html = document.querySelector('html');

            if (savedTheme === 'dark') {
                html.classList.add('dark');
            } else {
                html.classList.remove('dark');
            }
        });
    </script>
</head>

<body class="dark:bg-neutral-900">

    <!-- ========== MAIN CONTENT ========== -->




    @include('partialDashboard.sidebar')
    <button type="button"
        class="dark:text-white size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none"
        aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar"
        aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
        <span class="sr-only">Toggle Navigation</span>
        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
            stroke-linejoin="round">
            <rect width="18" height="18" x="3" y="3" rx="2" />
            <path d="M15 3v18" />
            <path d="m8 9 3 3-3 3" />
        </svg>
    </button>
    <div class="w-full lg:ps-64 bg-white dark:bg-neutral-900">
        <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
            <ol class="flex items-center whitespace-nowrap">

                <li class="inline-flex items-center">
                    <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-white"
                        href="/">
                        <svg class="shrink-0 me-3 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        Dashboard
                    </a>
                    <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-white" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>

                <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-white"
                    aria-current="page">
                    Parthnaire
                </li>
            </ol>
            <!-- JS Implementing Plugins -->
        </div>





        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-none">
                        <!-- Header -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                                    Parthnaire
                                </h2>


                                <p class="text-sm text-gray-600 dark:text-white">
                                    Ajouter un Parthnaire
                                </p>

                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">

                                    <a href="/parthners/export-excel"
                                        class="inline-block px-4 py-2 text-sm font-semibold rounded bg-green-500 text-white hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M8 17l4 4m0 0l4-4m-4 4V3" />
                                        </svg>
                                        <span>Exporter en csv</span>
                                    </a>

                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-white"
                                        href="{{ route('parthner.create') }}">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                            width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Ajouter un Parthenaire
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <form action="{{ route('parthner.index') }}" method="GET"
                            class="mb-6 flex flex-wrap items-end gap-6 p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-neutral-900 dark:border-none dark:text-white">
                            <div class="w-full sm:w-auto flex-1">
                                <label for="recherche"
                                    class="block text-lg font-medium dark:text-white">
                                    Rechercher dans toutes les colonnes
                                </label>
                                <input type="text" name="recherche" id="recherche"
                                    value="{{ request('recherche') }}" placeholder="Entrez un mot-clé"
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                            </div>
                            <div class="w-full sm:w-auto">
                                <button type="submit"
                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none dark:text-white"
                            >Rechercher
                            </button>
                            </div>
                        </form>

                        <!-- Table -->
                        <div class="flex flex-col">
                            <div class="-m-1.5 overflow-x-auto">
                                <div class="p-1.5 min-w-full inline-block align-middle">
                                    <div class="overflow-hidden">
                                        <table class="min-w-full divide-y divide-gray-200">
                                            <thead>
                                                <tr>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-lg font-medium  uppercase dark:text-white">
                                                        Image
                                                    </th>
                                                    <th scope="col"
                                                        class="px-6 py-3 text-start text-lg font-medium uppercase dark:text-white">
                                                        Nom de Parthnaire
                                                    </th>


                                                    <th scope="col"
                                                        class="px-6 py-3 text-end text-lg font-medium uppercase dark:text-white">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody class="divide-y divide-gray-200">
                                                @forelse ($partners as $product)
                                                    <tr>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-white">
                                                            @if ($product->image)
                                                                <img src="{{ 'storage/' . $product->image }}"
                                                                    alt="{{ $product->name }}"
                                                                    class="h-10 w-10 object-cover rounded">
                                                            @else
                                                                <span class="text-gray-500">No Image</span>
                                                            @endif
                                                        </td>
                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-white">
                                                            {{ $product->name }}
                                                        </td>

                                                        <td
                                                            class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                                            <!-- Edit Button -->
                                                            <a href="{{ route('parthner.edit', $product->id) }}"
                                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-green-600 hover:text-green-800 focus:outline-none focus:text-green-800">
                                                                Edit
                                                            </a>


                                                            <!-- Delete Button -->
                                                            <form
                                                                action="{{ route('parthner.destroy', $product->id) }}"
                                                                method="POST" style="display: inline-block;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-red-600 hover:text-red-800 focus:outline-none focus:text-red-800"
                                                                    onclick="return confirm('Are you sure you want to delete this parthner?');">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td colspan="5"
                                                            class="px-6 py-4 text-center text-gray-500 dark:text-white">
                                                            Pas de parthnaire
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- End Table -->

                        <!-- Footer -->
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:text-white">
                            <div>
                                <p class="text-sm text-gray-600 dark:text-white">
                                    <span class="font-semibold text-gray-800 dark:text-white">
                                        {{ $partners->total() }}
                                    </span>
                                    results
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    @if ($partners->onFirstPage())
                                        <button
                                            class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-400 shadow-sm disabled:pointer-events-none">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m15 18-6-6 6-6" />
                                            </svg>
                                            Precedent
                                        </button>
                                    @else
                                        <a href="{{ $partners->previousPageUrl() }}"
                                            class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m15 18-6-6 6-6" />
                                            </svg>
                                            Precedent
                                        </a>
                                    @endif

                                    @if ($partners->hasMorePages())
                                        <a href="{{ $partners->nextPageUrl() }}"
                                            class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50">
                                            Suivant
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m9 18 6-6-6-6" />
                                            </svg>
                                        </a>
                                    @else
                                        <button
                                            class="py-1.5 px-2 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-400 shadow-sm disabled:pointer-events-none">
                                            Suivant
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="m9 18 6-6-6-6" />
                                            </svg>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- End Footer -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Card -->












    </div>
    <button class="theme-toggle" onclick="updateTheme()">
        <span id="theme-icon">🌙</span>
    </button>


    <!-- JS PLUGINS -->
    <!-- Required plugins -->
    <script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

    <!-- Apexcharts -->
    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>



</body>

</html>
