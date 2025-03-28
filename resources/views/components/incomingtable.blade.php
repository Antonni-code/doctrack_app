@props(['incomingDocuments', 'users', 'classifications', 'documentCode', 'loggedInUser', 'activeUsers', 'excludedUsers', 'countIncoming', 'countOutgoing', 'countPending', 'totalPages', 'page', 'perPage', 'totalItems', 'usualCount', 'urgentCount'])
<div>
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
                     @foreach ($incomingDocuments as $document)
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
                                 {{ $document->status === 'Pending' ? 'bg-yellow-400/20 text-yellow-700' : ($document->status === 'Released' ? 'bg-green-500/20 text-green-900' : 'bg-red-500/20 text-red-900') }}">
                                       <span>{{ $document->status }}</span>
                                 </div>
                              </div>
                           </td>
                           <td class="p-4 border-b border-blue-gray-50">

                              <button
                                 data-tooltip-target="action-tooltip-{{ $document->id }}"
                                 class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 dark:text-white transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                                 type="button"
                                 data-bs-toggle="modal"
                                 data-modal-target="documentModal-{{ $document->id }}"
                              >
                                 <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4">
                                       <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                    </svg>
                                 </span>
                              </button>

                              <!-- tool tip flowbite-->
                              <div id="action-tooltip-{{ $document->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                                 Action
                                 <div class="tooltip-arrow" data-popper-arrow></div>
                              </div>

                              <!-- Minimalist Modal for the document -->
                              <x-attachfilemodal :document="$document"/>

                           </td>
                        </tr>
                     @endforeach
                     {{-- end here for table data --}}
                     <!--Delete Modal -->
                     <x-deleteattachmentmodal/>
                  </tbody>
            </table>
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
