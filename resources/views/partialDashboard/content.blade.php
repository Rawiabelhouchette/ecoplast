   <!-- Content -->
   <div class="w-full lg:ps-64">
       <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
           <!-- Grid -->
           <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
               <!-- Card -->
               <div
                   class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                   <div class="p-4 md:p-5">
                       <div class="flex items-center gap-x-2">
                           <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-white">
                               Total Utulisateur
                           </p>

                       </div>

                       <div class="mt-1 flex items-center gap-x-2">
                           <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-white">
                               {{ $totalUsers }}
                           </h3>

                       </div>
                   </div>
               </div>
               <!-- End Card -->

               <!-- Card -->
               <div
                   class="flex flex-col bg-white border shadow-sm rounded-xl  dark:bg-neutral-800 dark:border-neutral-700">
                   <div class="p-4 md:p-5">
                       <div class="flex items-center gap-x-2">
                           <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-white">
                               Nombre de demande
                           </p>
                       </div>

                       <div class="mt-1 flex items-center gap-x-2">
                           <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-white">
                               {{ $totalRequests }}
                           </h3>
                       </div>
                   </div>
               </div>
               <!-- End Card -->

               <!-- Card -->
               <div
                   class="flex flex-col bg-white border shadow-sm rounded-xl  dark:bg-neutral-800 dark:border-neutral-700">
                   <div class="p-4 md:p-5">
                       <div class="flex items-center gap-x-2">
                           <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-white">
                               Nombre des contact
                           </p>
                       </div>

                       <div class="mt-1 flex items-center gap-x-2">
                           <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-white">
                               {{ $totalContacts }}
                           </h3>

                       </div>
                   </div>
               </div>
               <!-- End Card -->

               <!-- Card -->
               <div
                   class="flex flex-col bg-white border shadow-sm rounded-xl  dark:bg-neutral-800 dark:border-neutral-700">
                   <div class="p-4 md:p-5">
                       <div class="flex items-center gap-x-2">
                           <p class="text-xs uppercase tracking-wide text-gray-500 dark:text-white">
                               Nombre des produits
                           </p>
                       </div>

                       <div class="mt-1 flex items-center gap-x-2">
                           <h3 class="text-xl sm:text-2xl font-medium text-gray-800 dark:text-white">
                               {{ $totalProducts }}
                           </h3>
                       </div>
                   </div>
               </div>
               <!-- End Card -->
           </div>
           <!-- End Grid -->

           <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
               <!-- Card -->
               <div
                   class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl  dark:bg-neutral-800 dark:border-neutral-700">
                   <!-- Header -->
                   <div class="flex justify-between items-center">
                       <div>
                           <h2 class="text-sm text-gray-500 dark:text-white">
                               Demande De vis
                           </h2>

                       </div>

                       <div>

                       </div>
                   </div>
                   <!-- End Header -->
                   <div class="dark:text-white">

                       <div id="requestsChart" class="dark:text-white"></div>
                   </div>
               </div>
               <!-- End Card -->

               <!-- Card -->
               <div
                   class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl dark:bg-neutral-800 dark:border-neutral-700">
                   <!-- Header -->
                   <div class="flex justify-between items-center">
                       <div>
                           <h2 class="text-sm text-gray-500 dark:text-white">
                               Contact
                           </h2>

                       </div>


                   </div>
                   <!-- End Header -->
                   <div class="dark:text-white">

                       <div id="hs-single-area-chart"></div>

                   </div>
               </div>
               <!-- End Card -->
           </div>

           <!-- Card -->
           <div class="flex flex-col">
               <div class="-m-1.5 overflow-x-auto">
                   <div class="p-1.5 min-w-full inline-block align-middle">
                       <div
                           class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-800 dark:border-neutral-700">
                           <!-- Header -->
                           <div
                               class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                               <div>
                                   <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
                                       Produits avec demande de vis
                                   </h2>

                               </div>


                           </div>
                           <!-- End Header -->

                           <!-- Table -->
                           <table class="min-w-full divide-y divide-gray-200 dark:text-white">
                               <thead class="bg-gray-50 dark:bg-neutral-800 dark:border-neutral-700">
                                   <tr>

                                       <th scope="col" class="ps-6 lg:ps-3 xl:ps-0 pe-6 py-3 text-start">
                                           <div class="flex items-center gap-x-2">
                                               <span
                                                   class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-white">
                                                   Image & Nom
                                               </span>
                                           </div>
                                       </th>
                                       <th scope="col" class="px-6 py-3 text-start">
                                           <div class="flex items-center gap-x-2">
                                               <span
                                                   class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-white">
                                                   Description
                                               </span>
                                           </div>
                                       </th>
                                       <th scope="col" class="px-6 py-3 text-start">
                                           <div class="flex items-center gap-x-2">
                                               <span
                                                   class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-white">
                                                   Demande de vis
                                               </span>
                                           </div>
                                       </th>
                                       <th scope="col" class="px-6 py-3 text-end">
                                           <!-- Action column for actions like Delete -->
                                       </th>
                                   </tr>
                               </thead>

                               <tbody class="divide-y divide-gray-200">
                                   <!-- Loop through each product and its request count -->
                                   @foreach ($topProductsWithDetails as $product)
                                       <tr>

                                           <td
                                               class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-white">
                                               <!-- Display product image and name -->
                                               <div class="flex items-center">
                                                   <img src="{{ asset('storage/' . $product->image) }}"
                                                       alt="Product Image" class="w-8 h-8 mr-2 rounded-full">
                                                   <span class="dark:text-white">{{ $product->name }}</span>
                                               </div>
                                           </td>
                                           <td
                                               class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-white">
                                               <!-- Display product description -->
                                               <p>{{ $product->description }}</p>
                                           </td>
                                           <td
                                               class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-white">
                                               <!-- Display request count -->
                                               <span>{{ $product->request_count }}</span>
                                           </td>
                                           <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                               <!-- Action buttons like delete can go here -->
                                               <a href="/viewproduct/{{ $product->id }}">
                                                   <button type="button"
                                                       class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none">
                                                       Voir Detail
                                                   </button>
                                               </a>
                                           </td>
                                       </tr>
                                   @endforeach
                               </tbody>
                           </table>

                           <!-- End Table -->


                       </div>
                   </div>
               </div>
           </div>
           <!-- End Card -->
       </div>
   </div>
   <!-- End Content -->
