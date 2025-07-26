  <!-- ========== HEADER ========== -->
  <header
      class="dark:bg-neutral-900 sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px]">
      <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
          <div class="me-5 lg:me-0 lg:hidden">
              <!-- Logo -->
              <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80 dark:text-white"
                  href="#" aria-label="Preline">
                  EcoPlast
              </a>
              <!-- End Logo -->
          </div>

          <div class="w-full flex gap-x-1 md:gap-x-3 justify-end">


              <div class="flex flex-row items-center justify-end gap-1">


                  <!-- Dropdown -->
                  <div class="hs-dropdown [--placement:bottom-right] relative inline-flex flex justify-end">
                      <button id="hs-dropdown-account" type="button"
                          class="size-[38px] inline-flex justify-end items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none"
                          aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                          <img class="shrink-0 size-[38px] rounded-full"
                              src="https://images.unsplash.com/photo-1568602471122-7832951cc4c5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80"
                              alt="Avatar">
                      </button>

                      <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full"
                          role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                          <div class="py-3 px-5 bg-gray-100 rounded-t-lg">
                              <p class="text-sm text-gray-500">Connecté en tant que</p>
                              <p class="text-sm font-medium text-gray-800">{{ auth()->user()->email }}</p>

                          </div>
                          <div class="p-1.5 space-y-0.5">

                              <form action="{{ route('logout') }}" method="POST" class="inline">
                                  @csrf
                                  <button type="submit"
                                      class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
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

                          </div>
                      </div>
                  </div>
                  <!-- End Dropdown -->
              </div>
          </div>
      </nav>
  </header>
