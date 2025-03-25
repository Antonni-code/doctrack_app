@props(['incomingDocuments', 'users', 'classifications', 'documentCode', 'loggedInUser', 'activeUsers', 'excludedUsers', 'countIncoming', 'countOutgoing', 'countPending', 'totalPages', 'page', 'perPage', 'totalItems', 'usualCount', 'urgentCount'])
<div>
   <div class="flex flex-wrap gap-x-8 gap-y-12 px-4 py-8 lg:px-8 items-center justify-center">
      <div class="flex lg:w-64 w-96">
         <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white dark:border-slate-900 dark:bg-slate-800 dark:text-white text-gray-600 shadow-lg">
         <div class="p-3">
            <div class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-indigo-700 to-indigo-400 text-center text-white shadow-lg">
                  <svg class="mt-4 h-7 w-16 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" stroke-width="2" fill="none" viewBox="0 0 24 24">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1v-4m5-13v4a1 1 0 0 1-1 1H5m0 6h9m0 0-2-2m2 2-2 2"/>
                  </svg>
            </div>
            <div class="pt-1 text-right">
            <p class="text-sm font-light capitalize">All Incoming</p>
            <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{$countIncoming}}</h4>
            </div>
         </div>
         <hr class="opacity-50"/>
         <div class="p-4">
            <p class="font-light"><span class="text-sm font-bold text-green-600">+22% </span>vs last month</p>
         </div>
         </div>
      </div>
      <div class="flex lg:w-64 w-96">
         <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg dark:border-slate-900 dark:bg-slate-800 dark:text-white">
            <div class="p-3">
                  <div class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-emerald-700 to-emerald-400 text-center text-white shadow-lg">
                     <svg class="mt-4 h-7 w-16 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" stroke-width="2" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 3v4a1 1 0 0 1-1 1H5m4 6 2 2 4-4m4-8v16a1 1 0 0 1-1 1H6a1 1 0 0 1-1-1V7.914a1 1 0 0 1 .293-.707l3.914-3.914A1 1 0 0 1 9.914 3H18a1 1 0 0 1 1 1Z"/>
                     </svg>

                  </div>
                  <!-- Content -->
                  {{-- <div class="pt-1 text-right">
                     <p class="text-sm font-light capitalize">All Recieved</p>
                     <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">$5,360</h4>
                  </div> --}}
                  <div class="pt-1 text-right grid grid-flow-col auto-cols-max gap-2 flex justify-end">
                     <div>
                        <p class="text-sm font-light capitalize">Urgent</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $urgentCount }}</h4>
                     </div>
                     <div class="pl-1">
                        <p class="text-sm font-light capitalize">Usual</p>
                        <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{ $usualCount }}</h4>
                     </div>
                  </div>
                  <!-- End content -->
            </div>
            <hr class="opacity-50" />
            <div class="p-4">
                  <p class="font-light"><span class="text-sm font-bold text-red-600">-3% </span>vs last month</p>
            </div>
         </div>
      </div>
      <div class="flex lg:w-64 w-96">
         <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg dark:border-slate-900 dark:bg-slate-800 dark:text-white">
            <div class="p-3">
                  <div class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-yellow-300 to-yellow-200 text-center text-white shadow-lg">
                     <svg class="mt-4 h-7 w-16 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" stroke-width="2" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 10V4a1 1 0 0 0-1-1H9.914a1 1 0 0 0-.707.293L5.293 7.207A1 1 0 0 0 5 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2M10 3v4a1 1 0 0 1-1 1H5m5 6h9m0 0-2-2m2 2-2 2"/>
                     </svg>

                  </div>
                  <div class="pt-1 text-right">
                  <p class="text-sm font-light capitalize">All Outgoing</p>
                  <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{$countOutgoing}}</h4>
                  </div>
            </div>
            <hr class="opacity-50" />
            <div class="p-4">
                  <p class="font-light"><span class="text-sm font-bold text-red-600">-3% </span>vs last month</p>
            </div>
         </div>
      </div>
      <div class="flex lg:w-64 w-96">
         <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg dark:border-slate-900 dark:bg-slate-800 dark:text-white">
            <div class="p-3">
                  <div class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-yellow-300 to-yellow-200 text-center text-white shadow-lg">
                     <svg class="mt-4 h-7 w-16 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" stroke-width="2" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 10V4a1 1 0 0 0-1-1H9.914a1 1 0 0 0-.707.293L5.293 7.207A1 1 0 0 0 5 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2M10 3v4a1 1 0 0 1-1 1H5m5 6h9m0 0-2-2m2 2-2 2"/>
                     </svg>

                  </div>
                  <div class="pt-1 text-right">
                  <p class="text-sm font-light capitalize">All Pending</p>
                  <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{$countPending}}</h4>
                  </div>
            </div>
            <hr class="opacity-50" />
            <div class="p-4">
                  <p class="font-light"><span class="text-sm font-bold text-red-600">-3% </span>vs last month</p>
            </div>
         </div>
      </div>
      @if (auth()->user()->role === 'admin')
         <div class="flex lg:w-64 w-96">
            <div class="flex w-full max-w-full flex-col break-words rounded-lg border border-gray-100 bg-white text-gray-600 shadow-lg dark:border-slate-900 dark:bg-slate-800 dark:text-white">
               <div class="p-3">
                  <div class="absolute -mt-10 h-16 w-16 rounded-xl bg-gradient-to-tr from-blue-700 to-blue-500 text-center text-white shadow-lg">
                  <svg xmlns="http://www.w3.org/2000/svg" class="mt-4 h-7 w-16" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  </div>
                  <div class="pt-1 text-right">
                  <p class="text-sm font-light capitalize">All Users</p>
                  <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">{{$activeUsers }}</h4>
                  </div>
               </div>
               <hr class="opacity-50" />
               {{-- display the total count of active and excluded user this month(monthly) --}}
               <div class="p-4">
                  <p class="font-light">
                     Active Users This Month:
                     <span class="text-sm font-bold text-green-600">{{ $activeUsers }}</span>
                  </p>
                  {{-- Display total count and percentage change of excluded users --}}
                  <p class="font-light">
                     Excluded Users This Month:
                     <span class="text-sm font-bold text-red-600">{{ $excludedUsers }}</span>
                  </p>
               </div>
            </div>
         </div>
      @endif
   </div>

   <div class="bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-2">
   {{-- <x-incomingtable :incomingDocuments=""/> --}}
   <div class="relative flex flex-col w-full h-full text-gray-700 bg-white border dark:border-gray-900 dark:bg-slate-800 dark:text-gray-50 shadow-md rounded-xl">
         <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white dark:border-gray-900 dark:bg-gray-800 dark:text-gray-50 rounded-none">
            <div class="flex items-center justify-between gap-8 mb-8">
                  <div>
                     <h5
                     class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 dark:text-blue-gray-50">
                     Incoming file(s) list
                     </h5>
                     <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700 dark:text-gray-50">
                     See information about all incoming files
                     </p>
                  </div>
            </div>
            <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
            <div class="block w-full overflow-hidden md:w-max">
                  <nav>
                  <ul role="tablist" class="relative flex flex-row p-1 rounded-lg bg-blue-gray-50 bg-opacity-60">
                     <li role="tab"
                     class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                     data-value="all">
                     <div class="z-20 text-inherit">
                        &nbsp;&nbsp;All&nbsp;&nbsp;
                     </div>
                     <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"></div>
                     </li>
                     <li role="tab"
                     class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                     data-value="urgent">
                     <div class="z-20 text-inherit">
                        &nbsp;&nbsp;Urgent&nbsp;&nbsp;
                     </div>
                     </li>
                     <li role="tab"
                     class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                     data-value="usual">
                     <div class="z-20 text-inherit">
                        &nbsp;&nbsp;Usual&nbsp;&nbsp;
                     </div>
                     </li>
                  </ul>
                  </nav>
            </div>
            <div class="w-full md:w-64">
               <div class="relative h-10 w-full min-w-[200px]">
                  <div class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                           d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                        </svg>
                  </div>
                     <input
                        class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 dark:text-white"
                        placeholder=" " />
                        <label
                           class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 dark:text-white dark:border-blue-gray-50">
                           Search
                        </label>
                  </div>
               </div>
            </div>
         </div>
         <div class="p-2 px-0 overflow-scroll custom-scroll">
            <table class="w-full text-left">
               <thead>
                  <tr class="bg-gray-50 dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700">
                     <th class="group px-6 py-4 cursor-pointer">
                        <div class="flex items-center">
                           <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Document code</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="invisible group-hover:visible h-5 w-5 ml-1 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"></path><path d="m7 9 5-5 5 5"></path></svg>
                        </div>
                     </th>
                     <th class="group px-6 py-4 cursor-pointer">
                        <div class="flex items-center">
                           <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Sender</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="invisible group-hover:visible h-5 w-5 ml-1 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"></path><path d="m7 9 5-5 5 5"></path></svg>
                        </div>
                     </th>
                     <th class="group px-6 py-4 cursor-pointer">
                        <div class="flex items-center">
                           <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Details</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="invisible group-hover:visible h-5 w-5 ml-1 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"></path><path d="m7 9 5-5 5 5"></path></svg>
                        </div>
                     </th>
                     <th class="group px-6 py-4 cursor-pointer">
                        <div class="flex items-center">
                           <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Required Action</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="invisible group-hover:visible h-5 w-5 ml-1 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"></path><path d="m7 9 5-5 5 5"></path></svg>
                        </div>
                     </th>
                     <th class="group px-6 py-4 cursor-pointer">
                        <div class="flex items-center">
                           <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Date of letter</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="invisible group-hover:visible h-5 w-5 ml-1 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"></path><path d="m7 9 5-5 5 5"></path></svg>
                        </div>
                     </th>
                     <th class="group px-6 py-4 cursor-pointer">
                        <div class="flex items-center">
                           <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Status</span>
                           <svg xmlns="http://www.w3.org/2000/svg" class="invisible group-hover:visible h-5 w-5 ml-1 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m7 15 5 5 5-5"></path><path d="m7 9 5-5 5 5"></path></svg>
                        </div>
                     </th>
                     <th class="px-6 py-4 text-center">
                        <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Actions</span>
                     </th>
                  </tr>
               </thead>
               <tbody id="documentTableBody" class="divide-y divide-gray-200 dark:divide-gray-700">
                  @foreach ($incomingDocuments as $document)
                  <tr data-status="{{ $document->priority === 'Urgent' ? 'urgent' : 'usual' }}"
                      class="group bg-white dark:bg-gray-900 hover:bg-blue-50 dark:hover:bg-blue-900/10 transition-colors duration-150">
                     <td class="px-6 py-4">
                        <div class="flex items-center">
                           <span class="font-mono font-medium text-red-500 dark:text-red-400">
                              {{ $document->document_code}}
                           </span>
                           @if($document->priority === 'Urgent')
                           <span class="ml-2 flex h-2 w-2">
                              <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-red-400 opacity-75"></span>
                              <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                           </span>
                           @endif
                        </div>
                     </td>
                     <td class="px-6 py-4">
                        <div class="flex items-center gap-3">
                           <img src="{{ $document->sender->profile_photo_url }}" alt="{{ $document->sender->name }}" class="relative h-9 w-9 rounded-full object-cover object-center" />
                           <div class="flex flex-col">
                              <span class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $document->sender->name }}</span>
                              <span class="text-xs text-gray-500 dark:text-gray-400">{{ $document->sender->email }}</span>
                           </div>
                        </div>
                     </td>
                     <td class="px-6 py-4">
                        <div class="flex flex-col">
                           <span class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $document->classification }} - {{ $document->sub_classification }}</span>
                           <span class="text-xs text-gray-500 dark:text-gray-400">{{ $document->subject }}</span>
                        </div>
                     </td>
                     <td class="px-6 py-4">
                        <div class="text-sm text-gray-800 dark:text-gray-200">
                           {{ $document->action }}
                        </div>
                     </td>
                     <td class="px-6 py-4">
                        <div class="flex items-center text-sm text-gray-800 dark:text-gray-200">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1.5 text-gray-400" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                           {{ $document->letter_date->format('d/m/Y') }}
                        </div>
                     </td>
                     <td class="px-6 py-4">
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                              {{ $document->status === 'Pending' ? 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900/40 dark:text-yellow-300' :
                                 ($document->status === 'Released' ? 'bg-green-100 text-green-800 dark:bg-green-900/40 dark:text-green-300' :
                                 ($document->status === 'Received' ? 'bg-blue-100 text-blue-800 dark:bg-blue-900/40 dark:text-blue-300' :
                                 'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300')) }}">
                           <span class="flex-none rounded-full h-1.5 w-1.5 mr-1.5
                              {{ $document->status === 'Pending' ? 'bg-yellow-500' :
                                 ($document->status === 'Released' ? 'bg-green-500' :
                                 ($document->status === 'Received' ? 'bg-blue-500' :
                                 'bg-red-500')) }}">
                           </span>
                           {{ $document->status }}
                        </span>
                     </td>
                     <td class="px-6 py-4">
                        <div class="flex items-center justify-center">
                           <button class="group p-2 rounded-lg text-gray-500 hover:bg-blue-100 hover:text-blue-600 dark:text-gray-400 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-all" data-modal-target="documentModal-{{ $document->id }}" data-tooltip-target="action-tooltip-{{ $document->id }}">
                              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.7 2.3a2.6 2.6 0 0 0-3.7 0L5.8 14.4a5.3 5.3 0 0 0-1.3 2.2l-.8 2.7a.8.8 0 0 0 .9.9l2.7-.8a5.3 5.3 0 0 0 2.2-1.3L19.5 6l1.2-1.2a2.6 2.6 0 0 0 0-3.7z"></path></svg>
                           </button>

                           <div id="action-tooltip-{{ $document->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                              Action
                              <div class="tooltip-arrow" data-popper-arrow></div>
                           </div>

                           <!-- Minimalist Modal for the document -->
                           <x-attachfilemodal :document="$document"/>
                        </div>
                     </td>
                  </tr>
                  @endforeach

                  <!-- Empty State -->
                  @if(count($incomingDocuments) === 0)
                  <tr>
                     <td colspan="7" class="px-6 py-12">
                        <div class="flex flex-col items-center justify-center">
                           <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 dark:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-4l-3 9L9 3l-3 9H2"></path></svg>
                           <p class="mt-4 text-gray-500 dark:text-gray-400">No incoming documents found</p>
                           <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                              Upload document
                           </button>
                        </div>
                     </td>
                  </tr>
                  @endif
               </tbody>
            </table>
               {{-- end here for table data --}}
               <!--Delete Modal -->
               <x-deleteattachmentmodal/>
         </div>
         <!-- Pagination -->
         <div class="flex items-center flex-col space-y-3 p-4">
            <nav aria-label="Page navigation example">
               <ul class="inline-flex -space-x-px text-sm">
                   {{-- Previous Page Button --}}
                   @if ($incomingDocuments->onFirstPage())
                       <li>
                           <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-s-lg
                           dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Previous</span>
                       </li>
                   @else
                       <li>
                           <a href="{{ $incomingDocuments->previousPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-s-lg
                           hover:bg-gray-100 hover:text-gray-700
                           dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                       </li>
                   @endif

                   {{-- Page Numbers --}}
                   @foreach(range(1, $incomingDocuments->lastPage()) as $i)
                       <li>
                           <a href="{{ $incomingDocuments->url($i) }}" class="px-3 h-8 flex items-center justify-center border border-gray-300
                               {{ $i == $incomingDocuments->currentPage() ? 'text-blue-600 bg-blue-50 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                               {{ $i }}
                           </a>
                       </li>
                   @endforeach

                   {{-- Next Page Button --}}
                   @if ($incomingDocuments->hasMorePages())
                       <li>
                           <a href="{{ $incomingDocuments->nextPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-e-lg
                           hover:bg-gray-100 hover:text-gray-700
                           dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                       </li>
                   @else
                       <li>
                           <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-e-lg
                           dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Next</span>
                       </li>
                   @endif
               </ul>
            </nav>
         </div>
   </div>
</div>

<script>
   window.deleteAttachmentRoute = "{{ route('attachments.delete', ['id' => ':id']) }}";

   document.querySelectorAll('input[type="file"]').forEach(input => {
      input.addEventListener('change', function () {
         let formData = new FormData();
         let fileInput = this;
         let documentId = fileInput.id.split('-')[2]; // Extract document ID

         formData.append('_token', '{{ csrf_token() }}');
         formData.append('attachment', fileInput.files[0]);

         fetch("{{ route('attachments.upload', ':id') }}".replace(':id', documentId), {
               method: 'POST',
               body: formData,
               headers: {
                  'X-Requested-With': 'XMLHttpRequest'
               }
         })
         .then(response => response.text()) // Expect raw HTML
         .then(html => {
               if (html.trim() !== "") {
                  let attachmentList = document.querySelector(`#attachment-list-${documentId}`);
                  attachmentList.insertAdjacentHTML('beforeend', html);
               } else {
                  alert("Failed to upload file.");
               }
         })
         .catch(error => console.error('Error:', error));
      });
   });
</script>

@vite(['resources/js/incoming.js', 'resources/css/scrollbar.css'])
