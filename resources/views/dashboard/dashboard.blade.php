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

            window.location.reload()
        };

        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('hs_theme') || 'light';
            const html = document.querySelector('html');

            if (savedTheme === 'dark') {
                html.classList.add('dark');
                window.loation.reload()

            } else {

                html.classList.remove('dark');
                window.loation.reload()

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


            </ol>
            <!-- JS Implementing Plugins -->
        </div>


















    </div>
    @include('partialDashboard.content', [
        'totalUsers' => $totalUsers,
        'totalProducts' => $totalProducts,
        'totalContacts' => $totalContacts,
        'totalRequests' => $totalRequests,
        'topProductsWithDetails' => $topProductsWithDetails,
    ])
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

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            var currentRequestsData = @json($currentRequests);
            var previousRequestsData = @json($previousRequests);
            // Vérifie si la classe 'dark' est présente dans le body
            let isDarkMode = document.documentElement.classList.contains('dark');


            // Appliquer le mode en fonction de la présence de la classe 'dark'
            const themeMode = isDarkMode ? 'dark' : 'light';

            // Définir les noms des mois (pour référence)
            const monthNames = [
                "Janvier", "Février", "Mars", "Avril", "Mai", "Juin",
                "Juillet", "Août", "Septembre", "Octobre", "Novembre", "Décembre"
            ];

            // Fonction pour convertir l'objet currentRequests en un tableau de 12 mois
            function convertRequestsToArray(requestsData) {
                // Initialiser un tableau avec 12 zéros (un pour chaque mois)
                const requestsArray = new Array(12).fill(0);

                // Boucler sur l'objet requestsData
                for (const month in requestsData) {
                    const monthIndex = monthNames.indexOf(
                        month); // Obtenir l'index du mois (0 pour Janvier, 11 pour Décembre)
                    if (monthIndex !== -1) {
                        requestsArray[monthIndex] = requestsData[
                            month]; // Affecter la valeur à l'index correspondant du mois
                    }
                }

                return requestsArray;
            }

            const seriesDataCurentYear = convertRequestsToArray(currentRequestsData); // [3, 5, 10]
            const seriesDataPrevieusYear = convertRequestsToArray(previousRequestsData); // [3, 5, 10]

            var categories = @json($categories);
            var options = {
                chart: {
                    type: 'bar',
                    height: 350,
                    background: 'transparent', // Set background to transparent to remove any default background color

                },
                series: [{
                        name: 'Demande de vis cette année',
                        data: seriesDataCurentYear
                    },
                    {
                        name: "Demande de vis de l'année précédente",
                        data: seriesDataPrevieusYear
                    }
                ],
                xaxis: {
                    categories: categories
                },
                theme: {
                    mode: themeMode, // Mode sombre
                }
            };

            var chart = new ApexCharts(document.querySelector("#requestsChart"), options);
            chart.render();
        });
    </script>

    <script>
        const contactsData = @json($contactsData);
        const isDarkMode = document.documentElement.classList.contains('dark');


        console.log(document.documentElement.classList.contains('dark'))
        // Appliquer le mode en fonction de la présence de la classe 'dark'
        const themeMode = isDarkMode ? 'dark' : 'light';
        const categories = Object.keys(contactsData); // ["Novembre", "Décembre", "Janvier"]
        const seriesData = Object.values(contactsData); // [3, 5, 10]

        window.addEventListener("load", () => {
            (function() {
                buildChart(
                    "#hs-single-area-chart",
                    (mode) => ({
                        chart: {
                            height: 300,
                            type: "bar", // Type de graphique en barre
                            background: 'transparent', // Set background to transparent to remove any default background color

                            toolbar: {
                                show: false,
                            },
                            zoom: {
                                enabled: false,
                            },
                        },
                        series: [{
                            name: "Contact",
                            data: seriesData,
                        }, ],
                        legend: {
                            show: false,
                        },
                        dataLabels: {
                            enabled: false,
                        },
                        stroke: {
                            curve: "straight",
                            width: 2,
                        },
                        grid: {
                            strokeDashArray: 2,
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                opacityFrom: 0.1,
                                opacityTo: 0.8,
                            },
                        },
                        xaxis: {
                            type: "category",
                            tickPlacement: "on",
                            categories: categories,
                            axisBorder: {
                                show: false,
                            },
                            axisTicks: {
                                show: false,
                            },
                            crosshairs: {
                                stroke: {
                                    dashArray: 0,
                                },
                                dropShadow: {
                                    show: false,
                                },
                            },
                            tooltip: {
                                enabled: false,
                            },
                            labels: {
                                style: {
                                    colors: "#9ca3af",
                                    fontSize: "13px",
                                    fontFamily: "Inter, ui-sans-serif",
                                    fontWeight: 400,
                                },
                            },
                        },
                        yaxis: {
                            labels: {
                                align: "left",
                                minWidth: 0,
                                maxWidth: 140,
                                style: {
                                    colors: "#9ca3af",
                                    fontSize: "13px",
                                    fontFamily: "Inter, ui-sans-serif",
                                    fontWeight: 400,
                                },
                                formatter: (value) =>
                                    value >= 1000 ? `${value / 1000}k` : value,
                            },
                        },
                        tooltip: {
                            x: {
                                format: "MMMM yyyy",
                            },
                            y: {
                                formatter: (value) =>
                                    `${value >= 1000 ? `${value / 1000}k` : value}`,
                            },
                        },
                        responsive: [{
                            breakpoint: 568,
                            options: {
                                chart: {
                                    height: 300,
                                },
                                labels: {
                                    style: {
                                        colors: "#9ca3af",
                                        fontSize: "11px",
                                        fontFamily: "Inter, ui-sans-serif",
                                        fontWeight: 400,
                                    },
                                    offsetX: -2,
                                },
                                yaxis: {
                                    labels: {
                                        align: "left",
                                        minWidth: 0,
                                        maxWidth: 140,
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "11px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        formatter: (value) =>
                                            value >= 1000 ?
                                            `${value / 1000}k` : value,
                                    },
                                },
                            },
                        }, ],
                    }), {
                        colors: ["#2563eb", "#9333ea"],
                        fill: {
                            gradient: {
                                stops: [0, 90, 100],
                            },
                        },
                        grid: {
                            borderColor: "#e5e7eb",
                        },
                        theme: {
                            mode: themeMode, // Mode sombre
                        }
                    }, {
                        colors: ["#3b82f6", "#a855f7"],
                        fill: {
                            gradient: {
                                stops: [100, 90, 0],
                            },
                        },
                        grid: {
                            borderColor: "#404040",
                        },
                        theme: {
                            mode: 'dark', // Mode sombre
                        }
                    }
                );
            })();
        });
    </script>

</body>

</html>
