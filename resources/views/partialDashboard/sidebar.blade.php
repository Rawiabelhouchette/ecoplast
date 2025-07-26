  <!-- Sidebar -->
  <div id="hs-application-sidebar"
      class="hs-overlay  [--auto-close:lg]
    hs-overlay-open:translate-x-0
    -translate-x-full transition-all duration-300 transform
    w-[260px] h-full
    hidden
    fixed inset-y-0 start-0 z-[60]
    bg-white border-e border-gray-200
    lg:block lg:translate-x-0 lg:end-auto lg:bottom-0
    dark:bg-neutral-900
   "
      role="dialog" tabindex="-1" aria-label="Sidebar">
      <div class="relative flex flex-col h-full max-h-full">
          <div class="px-6 pt-4">
              <!-- Logo -->
              <a class="flex-none rounded-xl text-xl inline-block font-semibold focus:outline-none focus:opacity-80 dark:text-white"
                  href="#" aria-label="Preline">
                  EcoPlast
              </a>
              <!-- End Logo -->
          </div>

          <!-- Content -->
          <div
              class="h-full flex flex-coloverflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
              <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">


                      <li>
                          <a class="flex dark:text-white items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->is('dashboard') ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                              href="/dashboard">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                  <line x1="16" x2="16" y1="2" y2="6" />
                                  <line x1="8" x2="8" y1="2" y2="6" />
                                  <line x1="3" x2="21" y1="10" y2="10" />
                                  <path d="M8 14h.01" />
                                  <path d="M12 14h.01" />
                                  <path d="M16 14h.01" />
                                  <path d="M8 18h.01" />
                                  <path d="M12 18h.01" />
                                  <path d="M16 18h.01" />
                              </svg>
                              Dashboard
                          </a>
                      </li>

                      <li>
                          <a class="flex dark:text-white items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->is('productDashboard') ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                              href="/productDashboard">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                                  <line x1="16" x2="16" y1="2" y2="6" />
                                  <line x1="8" x2="8" y1="2" y2="6" />
                                  <line x1="3" x2="21" y1="10" y2="10" />
                                  <path d="M8 14h.01" />
                                  <path d="M12 14h.01" />
                                  <path d="M16 14h.01" />
                                  <path d="M8 18h.01" />
                                  <path d="M12 18h.01" />
                                  <path d="M16 18h.01" />
                              </svg>
                              Produits
                          </a>
                      </li>

                      <li>
                          <a class="flex dark:text-white items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->is('requests') ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                              href="/requests">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z" />
                                  <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z" />
                              </svg>
                              Demande de vis
                          </a>
                      </li>

                      <li>
                          <a class="flex dark:text-white items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->is('users') ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                              href="/users">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <circle cx="12" cy="12" r="10" />
                                  <path d="M14.5 11a3.5 3.5 0 0 1-5 0" />
                                  <path d="M9 17a5 5 0 0 1 6 0" />
                              </svg>
                              Utilisateur
                          </a>
                      </li>

                      <li>
                          <a class="flex dark:text-white items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->is('roles') ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                              href="/roles">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M3 3h18v4H3z" />
                                  <path d="M4 7v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7" />
                                  <path d="M12 10v4" />
                                  <path d="M9 14h6" />
                              </svg>
                              Role
                          </a>
                      </li>




                      <li>
                          <a class="flex dark:text-white items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->is('parthner') ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                              href="/parthner">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M3 3h18v4H3z" />
                                  <path d="M4 7v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7" />
                                  <path d="M12 10v4" />
                                  <path d="M9 14h6" />
                              </svg>
                              Parthenaire
                          </a>
                      </li>


                      <li>
                          <a class="flex dark:text-white items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 dark:hover:bg-neutral-700 {{ request()->is('contact') ? 'bg-gray-100 dark:bg-neutral-700' : '' }}"
                              href="/contact">
                              <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                  height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                  stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                  <path d="M3 3h18v4H3z" />
                                  <path d="M4 7v11a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3V7" />
                                  <path d="M12 10v4" />
                                  <path d="M9 14h6" />
                              </svg>
                              Contact
                          </a>
                      </li>

                  </ul>
                  <ul class="mt-auto">
                    <li class="py-3 px-5 rounded-t-lg">
        <p class="text-sm text-gray-500">Connecté en tant que</p>
        <p class="text-sm font-medium text-gray-800">{{ auth()->user()->email }}</p>

      </li>
      <li class="p-1.5 space-y-0.5">

        <form action="{{ route('logout') }}" method="POST" class="inline">
            @csrf
            <button type="submit"
                class="w-full flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 14.899A7 7 0 1 1 15.71 8h1.79a4.5 4.5 0 0 1 2.5 8.242" />
                    <path d="M12 12v9" />
                    <path d="m8 17 4 4 4-4" />
                </svg>
                Déconnexion
            </button>
        </form>

    </li>
</ul>
              </nav>
          </div>
          
          <!-- End Content -->
      </div>
  </div>
  <!-- End Sidebar -->
