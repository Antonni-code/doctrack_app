{{-- <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8 transition-colors duration-200">
   <div class="max-w-3xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-10">
         <h1 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-gray-900 dark:text-white mb-4">
            Track Document
         </h1>
         <p class="text-gray-600 dark:text-gray-400 max-w-2xl mx-auto">
            Enter your document code below to track its current status
         </p>
      </div>

      <!-- Search Form -->
      <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl p-6 mb-8 transition-all duration-200">
         <form method="GET" action="{{ route('searchLog', ['documentCode' => request('documentCode')]) }}">
            <div class="relative">
               <div class="absolute inset-y-0 left-0 flex items-center pl-4 pointer-events-none">
                  <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
               </div>
               <input
                  type="text"
                  id="track"
                  name="track"
                  value="{{ session('documentCode') }}"
                  class="w-full py-4 pl-12 pr-20 text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white transition-colors duration-200"
                  placeholder="Enter document code"
                  required
               />
               <!-- Clear button (X) -->
               <button
                  type="button"
                  id="clearInput"
                  class="absolute right-[100px] top-1/2 -translate-y-1/2 p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 transition-colors duration-200"
                  onclick="document.getElementById('track').value = ''"
               >
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
               </button>
               <!-- Track button -->
               <button
                  type="submit"
                  class="absolute right-2 top-1/2 -translate-y-1/2 px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800"
               >
                  Track
               </button>
            </div>
         </form>
      </div>

      <!-- Error Message -->
      @if (session('error'))
      <div class="p-4 mb-8 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400 border border-red-200 dark:border-red-900 flex items-center transition-colors duration-200" role="alert">
         <svg class="flex-shrink-0 inline w-5 h-5 mr-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM10 15a1 1 0 1 1 0-2 1 1 0 0 1 0 2Zm1-4a1 1 0 0 1-2 0V6a1 1 0 0 1 2 0v5Z"/>
         </svg>
         <span class="font-medium">{{ session('error') }}</span>
      </div>
      @endif

      <!-- Results Section -->
      @if ($document)
      <div class="bg-white dark:bg-gray-800 shadow-md rounded-xl overflow-hidden transition-all duration-200">
         <!-- Header -->
         <div class="border-b border-gray-200 dark:border-gray-700 px-6 py-4">
            <div class="flex items-center space-x-3">
               <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
               </svg>
               <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Document Status</h2>
            </div>
         </div>

         <!-- Timeline -->
         <div class="px-6 py-6">
            <ol class="relative border-l border-gray-200 dark:border-gray-700 ml-3">
               <!-- Document Created -->
               <li class="mb-10 ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800 dark:bg-blue-900">
                     <svg class="w-4 h-4 text-blue-800 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2">
                     <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 sm:mb-0">Document Created</h3>
                     <time class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        {{ $document->created_at->format('F d, Y') }}
                     </time>
                  </div>
                  <div class="p-4 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600 mb-3">
                     <div class="mb-2">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Subject:</span>
                        <span class="ml-2 text-gray-800 dark:text-gray-200">{{ $document->subject }}</span>
                     </div>
                     <div class="mb-2">
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Sender:</span>
                        <span class="ml-2 text-gray-800 dark:text-gray-200">{{ $sender->name }}</span>
                     </div>
                     <div>
                        <span class="font-semibold text-gray-700 dark:text-gray-300">Recipients:</span>
                        <span class="ml-2 text-gray-800 dark:text-gray-200">
                           @foreach($recipients as $recipient)
                              {{ $recipient->recipient->name }}@if(!$loop->last), @endif
                           @endforeach
                        </span>
                     </div>
                  </div>
               </li>

               <!-- Pending Status (Only if not released yet) -->
               @if($document->status === 'Pending')
               <li class="mb-10 ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-yellow-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800 dark:bg-yellow-900">
                     <svg class="w-4 h-4 text-yellow-800 dark:text-yellow-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2">
                     <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 sm:mb-0">Pending</h3>
                     <span class="px-3 py-1 text-xs font-medium text-yellow-800 bg-yellow-100 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                        Awaiting Processing
                     </span>
                  </div>
                  <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                     This document is currently being processed.
                  </p>
               </li>
               @endif

               <!-- Received & Released (Only if Released) -->
               @if($document->status === 'Released')
               <li class="mb-10 ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-green-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800 dark:bg-green-900">
                     <svg class="w-4 h-4 text-green-800 dark:text-green-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2">
                     <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 sm:mb-0">Received</h3>
                     <time class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                     Document has been received by the recipient(s).
                  </p>
               </li>

               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-100 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800 dark:bg-blue-900">
                     <svg class="w-4 h-4 text-blue-800 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center justify-between mb-2">
                     <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-1 sm:mb-0">Released</h3>
                     <time class="text-sm font-normal text-gray-500 dark:text-gray-400">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                     Document has been officially released and completed processing.
                  </p>
               </li>
               @endif
            </ol>
         </div>
      </div>
      @endif
   </div>
</div> --}}

<!-- Dark mode toggle button (optional) -->


<!-- Scripts for dark mode toggle -->
<script>
   // On page load or when changing themes, best to add inline in `head` to avoid FOUC
   // if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) &&
   //     window.matchMedia('(prefers-color-scheme: dark)').matches)) {
   //     document.documentElement.classList.add('dark');
   //     document.getElementById('theme-toggle-light-icon').classList.remove('hidden');
   // } else {
   //     document.documentElement.classList.remove('dark');
   //     document.getElementById('theme-toggle-dark-icon').classList.remove('hidden');
   // }

   // Toggle theme button functionality
   // document.getElementById('theme-toggle').addEventListener('click', function() {
   //     // Toggle icons
   //     document.getElementById('theme-toggle-dark-icon').classList.toggle('hidden');
   //     document.getElementById('theme-toggle-light-icon').classList.toggle('hidden');

   //     // Toggle dark class on document root
   //     if (document.documentElement.classList.contains('dark')) {
   //         document.documentElement.classList.remove('dark');
   //         localStorage.setItem('color-theme', 'light');
   //     } else {
   //         document.documentElement.classList.add('dark');
   //         localStorage.setItem('color-theme', 'dark');
   //     }
   // });
</script>

{{-- <div class="min-h-screen bg-slate-100 dark:bg-slate-900 py-16 px-4 sm:px-6 lg:px-8">
   <div class="max-w-3xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12">
         <h1 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
            DOCUMENT TRACKER
         </h1>
         <div class="h-1 w-16 bg-indigo-600 mx-auto mt-3"></div>
      </div>

      <!-- Search Form -->
      <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm p-5 mb-8">
         <form method="GET" action="{{ route('searchLog', ['documentCode' => request('documentCode')]) }}">
            <div class="relative">
               <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                  <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
               </div>
               <input
                  type="text"
                  id="track"
                  name="track"
                  value="{{ session('documentCode') }}"
                  class="w-full py-3 pl-12 pr-24 text-slate-800 bg-slate-50 border-0 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-slate-700 dark:text-white"
                  placeholder="Enter document code"
                  required
               />
               <!-- Clear button (X) -->
               <button
                  type="button"
                  id="clearInput"
                  class="absolute right-20 top-1/2 -translate-y-1/2 p-2 text-slate-400 hover:text-slate-600 dark:text-slate-500 dark:hover:text-slate-300"
                  onclick="document.getElementById('track').value = ''"
               >
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
               </button>
               <!-- Track button -->
               <button
                  type="submit"
                  class="absolute right-2 top-1/2 -translate-y-1/2 px-4 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors"
               >
                  Track
               </button>
            </div>
         </form>
      </div>

      <!-- Error Message -->
      @if (session('error'))
      <div class="p-4 mb-8 rounded-lg bg-red-50 border-l-3 border-red-500 dark:bg-red-900/30 dark:border-red-600" role="alert">
         <div class="flex items-center">
            <svg class="w-5 h-5 mr-2 text-red-500 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="font-medium text-red-700 dark:text-red-300">{{ session('error') }}</span>
         </div>
      </div>
      @endif

      <!-- Results Section -->
      @if ($document)
      <div class="bg-white dark:bg-slate-800 rounded-xl shadow-sm overflow-hidden">
         <!-- Header -->
         <div class="bg-indigo-600 px-6 py-4">
            <div class="flex items-center">
               <svg class="w-5 h-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
               </svg>
               <h2 class="ml-2.5 text-lg font-semibold text-white">Document Status</h2>
            </div>
         </div>

         <!-- Document Details -->
         <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-700 bg-slate-50 dark:bg-slate-900/50">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
               <div>
                  <h3 class="text-xs font-medium uppercase text-slate-500 dark:text-slate-400">Subject</h3>
                  <p class="mt-1 text-base font-medium text-slate-800 dark:text-white">{{ $document->subject }}</p>
               </div>
               <div>
                  <h3 class="text-xs font-medium uppercase text-slate-500 dark:text-slate-400">Created On</h3>
                  <p class="mt-1 text-base font-medium text-slate-800 dark:text-white">{{ $document->created_at->format('F d, Y') }}</p>
               </div>
               <div>
                  <h3 class="text-xs font-medium uppercase text-slate-500 dark:text-slate-400">Sender</h3>
                  <p class="mt-1 text-base font-medium text-slate-800 dark:text-white">{{ $sender->name }}</p>
               </div>
               <div>
                  <h3 class="text-xs font-medium uppercase text-slate-500 dark:text-slate-400">Recipients</h3>
                  <p class="mt-1 text-base font-medium text-slate-800 dark:text-white">
                     @foreach($recipients as $recipient)
                        {{ $recipient->recipient->name }}@if(!$loop->last), @endif
                     @endforeach
                  </p>
               </div>
            </div>
         </div>

         <!-- Timeline -->
         <div class="px-6 py-6">
            <h3 class="text-sm font-semibold uppercase text-slate-700 dark:text-slate-300 mb-6">Document Timeline</h3>

            <ol class="relative border-l-2 border-slate-200 dark:border-slate-700 ml-3 space-y-8">
               <!-- Document Created -->
               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-7 h-7 bg-indigo-600 rounded-full -left-3.5 ring-4 ring-white dark:ring-slate-800">
                     <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                     <h3 class="text-base font-medium text-slate-800 dark:text-white">Document Created</h3>
                     <time class="mt-1 sm:mt-0 px-2.5 py-0.5 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full dark:bg-indigo-900/50 dark:text-indigo-300">
                        {{ $document->created_at->format('F d, Y') }}
                     </time>
                  </div>
               </li>

               <!-- Pending Status (Only if not released yet) -->
               @if($document->status === 'Pending')
               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-7 h-7 bg-amber-500 rounded-full -left-3.5 ring-4 ring-white dark:ring-slate-800">
                     <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                     <h3 class="text-base font-medium text-slate-800 dark:text-white">Pending</h3>
                     <span class="mt-1 sm:mt-0 px-2.5 py-0.5 text-xs font-medium bg-amber-100 text-amber-800 rounded-full dark:bg-amber-900/50 dark:text-amber-300">
                        In Progress
                     </span>
                  </div>
                  <p class="text-sm text-slate-600 dark:text-slate-400">
                     This document is currently being processed and is awaiting completion.
                  </p>
               </li>
               @endif

               <!-- Received & Released (Only if Released) -->
               @if($document->status === 'Released')
               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-7 h-7 bg-emerald-500 rounded-full -left-3.5 ring-4 ring-white dark:ring-slate-800">
                     <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                     <h3 class="text-base font-medium text-slate-800 dark:text-white">Received</h3>
                     <time class="mt-1 sm:mt-0 px-2.5 py-0.5 text-xs font-medium bg-emerald-100 text-emerald-800 rounded-full dark:bg-emerald-900/50 dark:text-emerald-300">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <p class="text-sm text-slate-600 dark:text-slate-400">
                     Document has been received by the intended recipient(s).
                  </p>
               </li>

               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-7 h-7 bg-indigo-600 rounded-full -left-3.5 ring-4 ring-white dark:ring-slate-800">
                     <svg class="w-3.5 h-3.5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2">
                     <h3 class="text-base font-medium text-slate-800 dark:text-white">Released</h3>
                     <time class="mt-1 sm:mt-0 px-2.5 py-0.5 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full dark:bg-indigo-900/50 dark:text-indigo-300">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <p class="text-sm text-slate-600 dark:text-slate-400">
                     Document has been successfully released and completed processing.
                  </p>
               </li>
               @endif
            </ol>
         </div>
      </div>
      @endif
   </div>
</div> --}}

<div class="min-h-screen bg-gradient-to-b from-slate-50 to-slate-100 dark:from-slate-950 dark:to-slate-900 py-16 px-4 sm:px-6 lg:px-8">
   <div class="max-w-3xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-14">
         <div class="inline-flex items-center justify-center mb-4">
            <svg class="w-8 h-8 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
         </div>
         <h1 class="text-3xl font-bold text-slate-800 dark:text-white tracking-tight">
            DOCUMENT TRACKER
         </h1>
         <div class="h-0.5 w-16 bg-indigo-600 mx-auto mt-3"></div>
      </div>

      <!-- Search Form -->
      <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg p-6 mb-10 border border-slate-100 dark:border-slate-700">
         <form method="GET" action="{{ route('searchLog', ['documentCode' => request('documentCode')]) }}">
            <div class="relative">
               <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                  <svg class="w-5 h-5 text-indigo-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
               </div>
               <input
                  type="text"
                  id="track"
                  name="track"
                  value="{{ session('documentCode') }}"
                  class="w-full py-3.5 pl-12 pr-24 text-slate-800 bg-slate-50 border-0 rounded-xl focus:ring-2 focus:ring-indigo-500 shadow-sm dark:bg-slate-700/60 dark:text-white transition-all duration-200"
                  placeholder="Enter document code"
                  required
               />
               <!-- Clear button (X) -->
               <button
                  type="button"
                  id="clearInput"
                  class="absolute right-24 top-1/2 -translate-y-1/2 p-2 text-slate-400 hover:text-slate-600 dark:text-slate-500 dark:hover:text-slate-300 transition-colors"
                  onclick="document.getElementById('track').value = ''"
               >
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
               </button>
               <!-- Track button -->
               <button
                  type="submit"
                  class="absolute right-2 top-1/2 -translate-y-1/2 px-6 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg shadow-sm hover:shadow transition-all duration-200"
               >
                  Track
               </button>
            </div>
         </form>
      </div>

      <!-- Error Message -->
      @if (session('error'))
      <div class="p-4 mb-8 rounded-xl bg-red-50 border border-red-100 dark:bg-red-900/20 dark:border-red-800/30" role="alert">
         <div class="flex items-center">
            <svg class="w-5 h-5 mr-3 text-red-500 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="font-medium text-red-700 dark:text-red-300">{{ session('error') }}</span>
         </div>
      </div>
      @endif

      <!-- Results Section -->
      @if ($document)
      <div class="bg-white dark:bg-slate-800 rounded-2xl shadow-lg overflow-hidden border border-slate-100 dark:border-slate-700">
         <!-- Header -->
         <div class="bg-gradient-to-r from-indigo-600 to-indigo-500 px-6 py-5">
            <div class="flex items-center">
               <svg class="w-5 h-5 text-white/90" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
               </svg>
               <h2 class="ml-2.5 text-lg font-semibold text-white">Document Status</h2>
            </div>
         </div>

         <!-- Document Details -->
         <div class="px-6 py-6 border-b border-slate-200 dark:border-slate-700 bg-slate-50/80 dark:bg-slate-900/40 backdrop-blur-sm">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
               <div class="p-4 rounded-xl bg-white/80 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700/60 shadow-sm">
                  <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Subject</h3>
                  <p class="mt-2 text-base font-medium text-slate-800 dark:text-white">{{ $document->subject }}</p>
               </div>
               <div class="p-4 rounded-xl bg-white/80 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700/60 shadow-sm">
                  <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Created On</h3>
                  <p class="mt-2 text-base font-medium text-slate-800 dark:text-white">{{ $document->created_at->format('F d, Y') }}</p>
               </div>
               <div class="p-4 rounded-xl bg-white/80 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700/60 shadow-sm">
                  <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Sender</h3>
                  <p class="mt-2 text-base font-medium text-slate-800 dark:text-white">{{ $sender->name }}</p>
               </div>
               <div class="p-4 rounded-xl bg-white/80 dark:bg-slate-800/60 border border-slate-100 dark:border-slate-700/60 shadow-sm">
                  <h3 class="text-xs font-semibold uppercase tracking-wider text-slate-500 dark:text-slate-400">Recipients</h3>
                  <p class="mt-2 text-base font-medium text-slate-800 dark:text-white">
                     @foreach($recipients as $recipient)
                        {{ $recipient->recipient->name }}@if(!$loop->last), @endif
                     @endforeach
                  </p>
               </div>
            </div>
         </div>

         <!-- Timeline -->
         <div class="px-6 py-8">
            <h3 class="text-sm font-semibold uppercase tracking-wider text-slate-700 dark:text-slate-300 mb-8 flex items-center">
               <svg class="w-4 h-4 mr-2 text-indigo-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
               </svg>
               Document Timeline
            </h3>

            <ol class="relative border-l-2 border-indigo-200 dark:border-indigo-900 ml-3 space-y-10">
               <!-- Document Created -->
               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-indigo-600 rounded-full -left-4 ring-4 ring-white dark:ring-slate-800 shadow-md">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3">
                     <h3 class="text-lg font-medium text-slate-800 dark:text-white">Document Created</h3>
                     <time class="mt-2 sm:mt-0 px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full dark:bg-indigo-900/50 dark:text-indigo-300 shadow-sm">
                        {{ $document->created_at->format('F d, Y') }}
                     </time>
                  </div>
                  <div class="p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg mt-2 border border-slate-100 dark:border-slate-700/50">
                     <p class="text-sm text-slate-600 dark:text-slate-400">
                        Document has been successfully created and entered into the system.
                     </p>
                  </div>
               </li>

               <!-- Pending Status (Only if not released yet) -->
               @if($document->status === 'Pending')
               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-amber-500 rounded-full -left-4 ring-4 ring-white dark:ring-slate-800 shadow-md">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3">
                     <h3 class="text-lg font-medium text-slate-800 dark:text-white">Pending</h3>
                     <span class="mt-2 sm:mt-0 px-3 py-1 text-xs font-medium bg-amber-100 text-amber-800 rounded-full dark:bg-amber-900/50 dark:text-amber-300 shadow-sm">
                        In Progress
                     </span>
                  </div>
                  <div class="p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg mt-2 border border-slate-100 dark:border-slate-700/50">
                     <p class="text-sm text-slate-600 dark:text-slate-400">
                        This document is currently being processed and is awaiting completion.
                     </p>
                  </div>
               </li>
               @endif

               <!-- Received & Released (Only if Released) -->
               @if($document->status === 'Released')
               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-emerald-500 rounded-full -left-4 ring-4 ring-white dark:ring-slate-800 shadow-md">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3">
                     <h3 class="text-lg font-medium text-slate-800 dark:text-white">Received</h3>
                     <time class="mt-2 sm:mt-0 px-3 py-1 text-xs font-medium bg-emerald-100 text-emerald-800 rounded-full dark:bg-emerald-900/50 dark:text-emerald-300 shadow-sm">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <div class="p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg mt-2 border border-slate-100 dark:border-slate-700/50">
                     <p class="text-sm text-slate-600 dark:text-slate-400">
                        Document has been received by the intended recipient(s).
                     </p>
                  </div>
               </li>

               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-indigo-600 rounded-full -left-4 ring-4 ring-white dark:ring-slate-800 shadow-md">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-3">
                     <h3 class="text-lg font-medium text-slate-800 dark:text-white">Released</h3>
                     <time class="mt-2 sm:mt-0 px-3 py-1 text-xs font-medium bg-indigo-100 text-indigo-800 rounded-full dark:bg-indigo-900/50 dark:text-indigo-300 shadow-sm">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <div class="p-3 bg-slate-50 dark:bg-slate-800/50 rounded-lg mt-2 border border-slate-100 dark:border-slate-700/50">
                     <p class="text-sm text-slate-600 dark:text-slate-400">
                        Document has been successfully released and completed processing.
                     </p>
                  </div>
               </li>
               @endif
            </ol>
         </div>
      </div>
      @endif
   </div>
</div>





{{-- <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-12 px-4 sm:px-6 lg:px-8">
   <div class="max-w-4xl mx-auto">
      <!-- Header -->
      <div class="text-center mb-12">
         <h1 class="text-4xl font-bold text-gray-900 dark:text-white">
            TRACK DOCUMENT
         </h1>
         <div class="h-1 w-24 bg-blue-600 mx-auto mt-4"></div>
      </div>

      <!-- Search Form -->
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-6 mb-10">
         <form method="GET" action="{{ route('searchLog', ['documentCode' => request('documentCode')]) }}">
            <div class="relative">
               <div class="absolute inset-y-0 left-0 flex items-center pl-4">
                  <svg class="w-5 h-5 text-blue-600 dark:text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                  </svg>
               </div>
               <input
                  type="text"
                  id="track"
                  name="track"
                  value="{{ session('documentCode') }}"
                  class="w-full py-4 pl-12 pr-24 text-gray-900 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                  placeholder="Enter document code"
                  required
               />
               <!-- Clear button (X) -->
               <button
                  type="button"
                  id="clearInput"
                  class="absolute right-24 top-1/2 -translate-y-1/2 p-2 text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200"
                  onclick="document.getElementById('track').value = ''"
               >
                  <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                  </svg>
               </button>
               <!-- Track button -->
               <button
                  type="submit"
                  class="absolute right-2 top-1/2 -translate-y-1/2 px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg"
               >
                  Track
               </button>
            </div>
         </form>
      </div>

      <!-- Error Message -->
      @if (session('error'))
      <div class="p-4 mb-8 rounded-lg bg-red-100 border-l-4 border-red-500 dark:bg-red-900 dark:border-red-600" role="alert">
         <div class="flex items-center">
            <svg class="w-5 h-5 mr-2 text-red-600 dark:text-red-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
               <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="font-medium text-red-800 dark:text-red-200">{{ session('error') }}</span>
         </div>
      </div>
      @endif

      <!-- Results Section -->
      @if ($document)
      <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg overflow-hidden">
         <!-- Header -->
         <div class="bg-blue-600 dark:bg-blue-700 px-6 py-4">
            <div class="flex items-center">
               <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
               </svg>
               <h2 class="ml-3 text-xl font-bold text-white">Document Status</h2>
            </div>
         </div>

         <!-- Document Details -->
         <div class="px-6 py-5 border-b border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
               <div>
                  <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Subject</h3>
                  <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $document->subject }}</p>
               </div>
               <div>
                  <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Created On</h3>
                  <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $document->created_at->format('F d, Y') }}</p>
               </div>
               <div>
                  <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Sender</h3>
                  <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">{{ $sender->name }}</p>
               </div>
               <div>
                  <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">Recipients</h3>
                  <p class="mt-1 text-lg font-semibold text-gray-900 dark:text-white">
                     @foreach($recipients as $recipient)
                        {{ $recipient->recipient->name }}@if(!$loop->last), @endif
                     @endforeach
                  </p>
               </div>
            </div>
         </div>

         <!-- Timeline -->
         <div class="px-6 py-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-6">Document Timeline</h3>

            <ol class="relative border-l-2 border-gray-200 dark:border-gray-700 ml-3">
               <!-- Document Created -->
               <li class="mb-10 ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                     </svg>
                  </span>
                  <div class="flex items-center justify-between mb-2">
                     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Document Created</h3>
                     <time class="px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-900 dark:text-blue-300">
                        {{ $document->created_at->format('F d, Y') }}
                     </time>
                  </div>
               </li>

               <!-- Pending Status (Only if not released yet) -->
               @if($document->status === 'Pending')
               <li class="mb-10 ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-yellow-500 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex items-center justify-between mb-2">
                     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Pending</h3>
                     <span class="px-3 py-1 text-sm font-medium bg-yellow-100 text-yellow-800 rounded-full dark:bg-yellow-900 dark:text-yellow-300">
                        In Progress
                     </span>
                  </div>
                  <p class="text-base font-normal text-gray-600 dark:text-gray-400">
                     This document is currently being processed and is awaiting completion.
                  </p>
               </li>
               @endif

               <!-- Received & Released (Only if Released) -->
               @if($document->status === 'Released')
               <li class="mb-10 ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-green-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                     </svg>
                  </span>
                  <div class="flex items-center justify-between mb-2">
                     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Received</h3>
                     <time class="px-3 py-1 text-sm font-medium bg-green-100 text-green-800 rounded-full dark:bg-green-900 dark:text-green-300">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <p class="text-base font-normal text-gray-600 dark:text-gray-400">
                     Document has been received by the intended recipient(s).
                  </p>
               </li>

               <li class="ml-6">
                  <span class="absolute flex items-center justify-center w-8 h-8 bg-blue-600 rounded-full -left-4 ring-4 ring-white dark:ring-gray-800">
                     <svg class="w-4 h-4 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                     </svg>
                  </span>
                  <div class="flex items-center justify-between mb-2">
                     <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Released</h3>
                     <time class="px-3 py-1 text-sm font-medium bg-blue-100 text-blue-800 rounded-full dark:bg-blue-900 dark:text-blue-300">
                        {{ $document->updated_at->format('F d, Y') }}
                     </time>
                  </div>
                  <p class="text-base font-normal text-gray-600 dark:text-gray-400">
                     Document has been successfully released and completed processing.
                  </p>
               </li>
               @endif
            </ol>
         </div>
      </div>
      @endif
   </div>
</div> --}}
