<x-app-layout>
   <x-slot name="header">
      <x-loader/>
       <div class="flex items-center justify-between">
           <nav class="flex" aria-label="Breadcrumb">
               <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                   <li class="inline-flex items-center">
                       <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                           <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                           </svg>
                           <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                               {{ __('Dashboards') }}
                           </h2>
                       </a>
                   </li>
                   <li aria-current="page">
                       <div class="flex items-center">
                           <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                           <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                           </svg>

                           <svg class="w-4 h-4 text-gray-400 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 20 20">
                              <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                           </svg>


                           <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Track files</span>
                       </div>
                   </li>
               </ol>
           </nav>
       </div>

   </x-slot>

   <div class="py-4">
       <div class="max-w-screen-2xl mx-auto sm:px-20 lg:px-28">
           <x-track-document :document="$document" :sender="$sender" :recipients="$recipients" :documentCode="$documentCode"/>
       </div>
   </div>
</x-app-layout>
