<x-app-layout>
   <x-slot name="header">
      <x-loader/>
       <div class="flex items-center justify-between">
        {{-- <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div> --}}
        <x-toast/>
           <nav class="flex" aria-label="Breadcrumb">
               <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                   <li class="inline-flex items-center lg:text-5xl sm:text-xl">
                       <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                           <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                           </svg>
                           <h2 class="font-semibold lg:text-xl sm:text-md text-gray-800 dark:text-gray-200 leading-tight">
                               {{ __('Dashboards') }}
                           </h2>
                       </a>
                   </li>
                   <li aria-current="page">
                       <div class="flex items-center lg:text-5xl sm:text-xl">
                           <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                           </svg>

                           <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chart-no-axes-combined w-3 h-3 text-gray-500 dark:text-gray-500"><path d="M12 16v5"/><path d="M16 14v7"/><path d="M20 10v11"/><path d="m22 3-8.646 8.646a.5.5 0 0 1-.708 0L9.354 8.354a.5.5 0 0 0-.707 0L2 15"/><path d="M4 18v3"/><path d="M8 14v7"/></svg>


                           <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Analytics</span>
                       </div>
                   </li>
               </ol>
           </nav>

       </div>

   </x-slot>

   <div class="py-12 z-0 md:z-40">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
         <x-dashboard/>
      </div>
   </div>
</x-app-layout>
@vite(['resources/js/dashboard.js'])
