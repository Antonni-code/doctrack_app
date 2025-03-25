@props(['incomingDocuments', 'users', 'classifications', 'documentCode', 'loggedInUser', 'activeUsers', 'excludedUsers', 'countIncoming', 'countOutgoing', 'countPending', 'totalPages', 'page', 'perPage', 'totalItems'])
<div>
   {{-- <x-incomingtable
    :classifications="$classifications"
    :users="$users"
    :documentCode="$documentCode"
    :loggedInUser="$loggedInUser"
    :incomingDocuments="$incomingDocuments"
    :activeUsers="$activeUsers"
    :excludedUsers="$excludedUsers"
    :countIncoming="$countIncoming"
    :countOutgoing="$countOutgoing"
    :countPending="$countPending"
    :totalPages="$totalPages" :page="$page" :perPage="$perPage" :totalItems="$totalItems"/> --}}
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
                  <div class="pt-1 text-right">
                  <p class="text-sm font-light capitalize">All Recieved</p>
                  <h4 class="text-2xl font-semibold tracking-tighter xl:text-2xl">$5,360</h4>
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
         <div class="p-6 px-0 overflow-scroll">
            <table class="w-full mt-4 text-left table-auto min-w-max">
                  <thead>
                     <tr>
                        <th class="p-4 border-y border-gray-100 bg-gray-50/50 w-3">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70 dark:text-white">
                              Document code
                              </p>
                        </th>
                        <th class="p-4 border-y border-gray-100 bg-gray-50/50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70 dark:text-white">
                              Sender
                              </p>
                        </th>
                        <th class="p-4 border-y border-gray-100 bg-gray-50/50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70 dark:text-white">
                              Details
                              </p>
                        </th>
                        <th class="p-4 border-y border-gray-100 bg-gray-50/50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70 dark:text-white">
                              Required Action
                              </p>
                        </th>
                        <th class="p-4 border-y border-gray-100 bg-gray-50/50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70 dark:text-white">
                              Date of letter
                              </p>
                        </th>
                        <th class="p-4 border-y border-gray-100 bg-gray-50/50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70 dark:text-white">
                              Status
                              </p>
                        </th>
                        <th class="p-4 border-y border-gray-100 bg-gray-50/50">
                              <p class="block font-sans text-sm antialiased font-normal leading-none text-gray-900 opacity-70">
                              </p>
                        </th>
                     </tr>
                  </thead>
                  <tbody id="documentTableBody">
                     @forelse ($incomingDocuments as $document)
                        <tr data-status="{{ $document->priority === 'Urgent' ? 'urgent' : 'usual' }}">
                           <td class="p-4 border-b border-blue-gray-50">
                              <div class="flex w-40">
                                 <p class="block font-sans text-sm antialiased font-normal leading-normal text-red-400 dark:text-red-400">
                                 {{ $document->document_code}}
                                 </p>
                              </div>
                           </td>
                           <td class="p-4 border-b border-gray-50">
                              <div class="flex items-center gap-3">
                                    <img src="{{ $document->sender->profile_photo_url }}" alt="{{ $document->sender->name }}" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                                    <div class="flex flex-col">
                                       <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 dark:text-white">{{ $document->sender->name }}</p>
                                       <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70 dark:text-white">{{ $document->sender->email }}</p>
                                    </div>
                              </div>
                           </td>
                           <td class="p-4 border-b border-blue-gray-50">
                              <div class="flex items-center gap-3">
                                 <div class="flex flex-col">
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 dark:text-white">{{ $document->classification }} - {{ $document->sub_classification }}</p>
                                    <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70 dark:text-white">{{ $document->subject }}</p>
                                 </div>
                              </div>

                           </td>
                           <td class="p-4 border-b border-blue-gray-50">{{ $document->action }}</td>
                           <td class="p-4 border-b border-blue-gray-50">{{ $document->letter_date->format('d/m/Y') }}</td>
                           <td class="p-4 border-b border-blue-gray-50">
                              <div class="w-max">
                                 <div class="relative grid items-center px-2 py-1 font-sans text-xs font-bold uppercase rounded-md select-none whitespace-nowrap
                                 {{ $document->status === 'Pending' ? 'bg-yellow-500/20 text-yellow-900' : ($document->status === 'Approved' ? 'bg-green-500/20 text-green-900' : 'bg-red-500/20 text-red-900') }}">
                                       <span>{{ $document->status }}</span>
                                 </div>
                              </div>
                           </td>
                           <td class="p-4 border-b border-blue-gray-50">
                              <button class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 dark:text-white transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
                                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4">
                                          <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                       </svg>
                                    </span>
                              </button>
                           </td>
                        </tr>
                     @empty
                        <tr>
                           <td colspan="5" class="p-4 text-center text-slate-500">No incoming data found.</td>
                        </tr>
                     @endforelse
                     {{-- end here for table data --}}
                  </tbody>
            </table>
         </div>
         <!-- Pagination -->
         <div class="flex flex-col space-y-3 items-center px-4 py-3">
            @if ($totalPages > 1)
               <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
                  <div class="flex justify-between flex-1 sm:hidden">
                        @if ($page == 1)
                           <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                              {!! __('pagination.previous') !!}
                           </span>
                        @else
                           <a href="{{ route('dashboard', ['page' => $page - 1]) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                              {!! __('pagination.previous') !!}
                           </a>
                        @endif

                        @if ($page < $totalPages)
                           <a href="{{ route('dashboard', ['page' => $page + 1]) }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                              {!! __('pagination.next') !!}
                           </a>
                        @else
                           <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                              {!! __('pagination.next') !!}
                           </span>
                        @endif
                  </div>

                  <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                           <p class="text-sm text-gray-700 leading-5 dark:text-gray-400">
                              {!! __('Showing') !!}
                              <span class="font-medium">{{ ($page - 1) * $perPage + 1 }}</span>
                              {!! __('to') !!}
                              <span class="font-medium">{{ min($page * $perPage, $totalItems) }}</span>
                              {!! __('of') !!}
                              <span class="font-medium">{{ $totalItems }}</span>
                              {!! __('results') !!}
                           </p>
                        </div>

                        <div>
                           <span class="relative z-0 inline-flex rtl:flex-row-reverse shadow-sm rounded-md">
                              {{-- Previous Page Link --}}
                              @if ($page == 1)
                                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                                       <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5 dark:bg-gray-800 dark:border-gray-600" aria-hidden="true">
                                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                          </svg>
                                       </span>
                                    </span>
                              @else
                                    <a href="{{ route('dashboard', ['page' => $page - 1]) }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('pagination.previous') }}">
                                       <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                          <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                       </svg>
                                    </a>
                              @endif

                              {{-- Pagination Elements --}}
                              @for ($i = 1; $i <= $totalPages; $i++)
                                    @if ($i == $page)
                                       <span aria-current="page">
                                          <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $i }}</span>
                                       </span>
                                    @else
                                       <a href="{{ route('dashboard', ['page' => $i]) }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('Go to page :page', ['page' => $i]) }}">
                                          {{ $i }}
                                       </a>
                                    @endif
                              @endfor

                              {{-- Next Page Link --}}
                              @if ($page < $totalPages)
                                    <a href="{{ route('dashboard', ['page' => $page + 1]) }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('pagination.next') }}">
                                       <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                          <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                       </svg>
                                    </a>
                              @else
                                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                                       <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5 dark:bg-gray-800 dark:border-gray-600" aria-hidden="true">
                                          <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                          </svg>
                                       </span>
                                    </span>
                              @endif
                           </span>
                        </div>
                  </div>
               </nav>
            @endif
         </div>
   </div>

</div>
