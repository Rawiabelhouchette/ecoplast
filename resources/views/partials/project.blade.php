  <!-- Works -->
  <div class="max-w-7xl px-4 lg:px-6 lg:px-8 py-4 lg:py-4 mx-auto">
      <div class="mb-6 sm:mb-10 max-w-2xl text-center mx-auto">
          <h1 class="font-medium text-black text-2xl sm:text-4xl dark:text-white">
              Produit
          </h1>
      </div>

      <!-- Card Grid -->
      <div class=" grid grid-cols-2 gap-4 sm:gap-6 md:gap-8 lg:gap-12">




          @foreach ($products as $product)
              <!-- Card -->
              <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                  href="#">
                  <div class="aspect-w-16 aspect-h-9">
                      <img class="w-full object-cover rounded-t-xl" src="{{ '/storage/' . $product->image }}"
                          alt="{{ $product->name }}">
                  </div>
                  <div class="p-4 md:p-5">
                      <p class="mt-2 text-xs uppercase text-gray-600 dark:text-neutral-400">
                          {{ $product->name }}
                      </p>
                      <h3
                          class="mt-2 text-lg font-medium text-gray-800 group-hover:text-blue-600 dark:text-neutral-300 dark:group-hover:text-white">
                          {{ $product->description }}
                      </h3>
                  </div>
              </a>
              <!-- End Card -->
          @endforeach


      </div>
      <!-- End Card Grid -->

      <div class="mt-10 lg:mt-20 text-center">
          <a class=" dark:text-white relative inline-block font-medium md:text-lg text-black before:absolute before:bottom-0.5 before:start-0 before:-z-[1] before:w-full before:h-1 before:bg-lime-400 hover:before:bg-black focus:outline-none focus:before:bg-black"
              href="/products">
              Voir tous les produits
          </a>
      </div>
  </div>
  <!-- End Works -->
