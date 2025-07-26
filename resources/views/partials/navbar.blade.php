<!-- Announcement Banner -->
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto">
    <div
        class="bg-blue-600 bg-[url('https://preline.co/assets/svg/examples/abstract-1.svg')] bg-no-repeat bg-cover bg-center p-4 rounded-lg text-center">
        <p class="me-2 inline-block text-white">
            EcoPlast
        </p>
        <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border-2 border-white text-white hover:border-white/70 hover:text-white/70 focus:outline-none focus:border-white/70 focus:text-white/70 disabled:opacity-50 disabled:pointer-events-none"
            href="/demande-avis">
            Demande de vis
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6" />
            </svg>
        </a>
    </div>
</div>
<!-- End Announcement Banner -->
<header class="flex flex-wrap md:justify-start md:flex-nowrap z-50 w-full py-7">
    <nav class="relative max-w-7xl w-full flex flex-wrap md:grid md:grid-cols-12 basis-full items-center px-4 md:px-6 md:px-8 mx-auto"
        aria-label="Global">
        <div class="md:col-span-3">
            <!-- Logo -->
            <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80 dark:text-white"
                href="/" aria-label="Preline">
                EcoPlast
            </a>
            <!-- End Logo -->
        </div>

        <!-- Button Group -->
        <div class="flex items-center gap-x-2 ms-auto py-1 md:ps-6 md:order-3 md:col-span-3">
            <a href="/demande-avis">

                <button type="button"
                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-xl border border-transparent bg-blue-400 text-black hover:bg-lime-500 transition disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-lime-500">
                    Demande Avis
                </button>
            </a>
            <div class="md:hidden">
                <button type="button"
                    class="hs-collapse-toggle size-[38px] flex justify-center items-center text-sm font-semibold rounded-xl border border-gray-200 text-black hover:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none"
                    data-hs-collapse="#navbar-collapse-with-animation" aria-controls="navbar-collapse-with-animation"
                    aria-label="Toggle navigation">
                    <svg class="hs-collapse-open:hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <line x1="3" x2="21" y1="6" y2="6" />
                        <line x1="3" x2="21" y1="12" y2="12" />
                        <line x1="3" x2="21" y1="18" y2="18" />
                    </svg>
                    <svg class="hs-collapse-open:block hidden flex-shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M18 6 6 18" />
                        <path d="m6 6 12 12" />
                    </svg>
                </button>
            </div>
        </div>
        <!-- End Button Group -->

        <!-- Collapse -->
        <div id="navbar-collapse-with-animation"
            class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow md:block md:w-auto md:basis-auto md:order-2 md:col-span-6">
            <div
                class="flex flex-col gap-y-4 gap-x-0 mt-5 md:flex-row md:justify-center md:items-center md:gap-y-0 md:gap-x-7 md:mt-0">
                <div>
                    <a class="relative inline-block text-black dark:text-white
        {{ Request::is('/') ? 'before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400' : '' }}"
                        href="/" aria-current="page">Acceuil</a>
                </div>
                <div>
                    <a class="relative inline-block text-black dark:text-white
        {{ Request::is('products') ? 'before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400' : '' }}"
                        href="/products">Produits</a>
                </div>
                <div>
                    <a class="relative inline-block text-black dark:text-white
        {{ Request::is('about-us') ? 'before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400' : '' }}"
                        href="/about-us">A propos</a>
                </div>
  <div>
                    <a class="relative inline-block text-black dark:text-white
        {{ Request::is('contact-us') ? 'before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400' : '' }}"
                        href="/contact-us">Contact</a>
                </div>

            </div>
        </div>
        <!-- End Collapse -->
    </nav>
</header>
