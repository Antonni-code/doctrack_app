<div class="relative flex flex-col w-full h-full text-gray-700 bg-white border dark:border-gray-900 dark:bg-slate-800 dark:text-gray-50 shadow-md rounded-xl">
   <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white dark:border-gray-900 dark:bg-gray-800 dark:text-gray-50 rounded-none">
      <div class="flex items-center justify-between gap-8 mb-8">
         <div>
               <h5
               class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 dark:text-blue-gray-50">
               Outgoing file(s) list
               </h5>
               <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700 dark:text-gray-50">
               See information about all outgoing files
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
         <div class="w-full md:w-72">
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
                     <span class="font-semibold text-sm text-gray-700 dark:text-gray-300">Recipients</span>
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
            @foreach ($outgoingDocuments as $document)
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
                  <div class="flex items-center gap-2">
                     @if ($document->recipients->isNotEmpty())
                     <div class="flex flex-col">
                        <span class="text-sm font-medium text-gray-800 dark:text-gray-200">{{ $document->recipients->first()->recipient->name }}</span>
                        <span class="text-xs text-gray-500 dark:text-gray-400">{{ $document->recipients->first()->recipient->email }}</span>
                     </div>
                     @endif

                     @if ($document->recipients->count() > 1)
                     <div class="relative ml-1" x-data="{ open: false }">
                        <button class="p-1 rounded-full hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors"
                                @click="open = !open"
                                data-modal-target="#recipientModal-{{ $document->id }}">
                           <span class="inline-flex items-center justify-center h-6 w-6 rounded-full bg-blue-100 text-blue-800 text-xs font-medium dark:bg-blue-900 dark:text-blue-200">
                              +{{ $document->recipients->count() - 1 }}
                           </span>
                        </button>

                        <!-- Dropdown for Recipients - Modern Alternative to Modal -->
                        <div class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900 bg-opacity-50" id="recipientModal-{{ $document->id }}">
                           <div class="bg-white dark:bg-gray-800 rounded-lg shadow-xl w-96 max-w-md mx-auto">
                              <div class="flex items-center justify-between p-5 border-b border-gray-200 dark:border-gray-700">
                                 <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Additional Recipients</h2>
                                 <button class="text-gray-500 hover:text-gray-700 dark:text-gray-400 dark:hover:text-gray-200 close-modal">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                 </button>
                              </div>
                              <div class="p-5 max-h-60 overflow-y-auto">
                                 @foreach ($document->recipients->skip(1) as $recipient)
                                 <div class="mb-3 pb-3 border-b border-gray-100 dark:border-gray-700 last:border-0 last:mb-0 last:pb-0">
                                    <p class="font-medium text-gray-800 dark:text-gray-200">{{ $recipient->recipient->name }}</p>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">{{ $recipient->recipient->email }}</p>
                                 </div>
                                 @endforeach
                              </div>
                           </div>
                        </div>
                     </div>
                     @endif
                  </div>
               </td>
               <td class="px-6 py-4">
                  <div class="line-clamp-2 text-sm text-gray-800 dark:text-gray-200">
                     {{ $document->brief_description }}
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
                           'bg-red-100 text-red-800 dark:bg-red-900/40 dark:text-red-300') }}">
                     <span class="flex-none rounded-full h-1.5 w-1.5 mr-1.5
                        {{ $document->status === 'Pending' ? 'bg-yellow-500' :
                           ($document->status === 'Released' ? 'bg-green-500' :
                           'bg-red-500') }}">
                     </span>
                     {{ $document->status }}
                  </span>
               </td>
               <td class="px-6 py-4">
                  <div class="flex items-center justify-center space-x-1">
                     <button class="group p-2 rounded-lg text-gray-500 hover:bg-blue-100 hover:text-blue-600 dark:text-gray-400 dark:hover:bg-blue-900/30 dark:hover:text-blue-400 transition-all" data-modal-target="documentModal-{{ $document->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                     </button>

                     <div id="view-tooltip-{{ $document->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        View
                        <div class="tooltip-arrow" data-popper-arrow></div>
                     </div>

                     <button class="group p-2 rounded-lg text-gray-500 hover:bg-green-100 hover:text-green-600 dark:text-gray-400 dark:hover:bg-green-900/30 dark:hover:text-green-400 transition-all" data-tooltip-target="edit-tooltip-{{ $document->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path><path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path></svg>
                     </button>

                     <div id="edit-tooltip-{{ $document->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Edit
                        <div class="tooltip-arrow" data-popper-arrow></div>
                     </div>

                     <button id="deleteButton" data-document-id="{{ $document->id }}" data-document-code="{{ $document->document_code }}" class="delete-document group p-2 rounded-lg text-gray-500 hover:bg-red-100 hover:text-red-600 dark:text-gray-400 dark:hover:bg-red-900/30 dark:hover:text-red-400 transition-all" data-tooltip-target="delete-tooltip-{{ $document->id }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                     </button>

                     <div id="delete-tooltip-{{ $document->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                        Delete
                        <div class="tooltip-arrow" data-popper-arrow></div>
                     </div>
                  </div>

                  <!-- Minimalist Modal for the document -->
                  <x-attachfilemodal :document="$document"/>
               </td>
            </tr>
            @endforeach

            <!-- Empty State -->
            @if(count($outgoingDocuments) === 0)
            <tr>
               <td colspan="6" class="px-6 py-12">
                  <div class="flex flex-col items-center justify-center">
                     <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 dark:text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                     <p class="mt-4 text-gray-500 dark:text-gray-400">No documents found</p>
                     <button class="mt-4 px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Create your first document
                     </button>
                  </div>
               </td>
            </tr>
            @endif
         </tbody>
      </table>
   </div>
   <!-- Pagination -->
   <div class="flex flex-col items-center space-y-3 p-4 ">
      <nav aria-label="Page navigation example">
         <ul class="inline-flex -space-x-px text-sm">
             {{-- Previous Page Button --}}
             @if ($outgoingDocuments->onFirstPage())
                 <li>
                     <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-s-lg
                     dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Previous</span>
                 </li>
             @else
                 <li>
                     <a href="{{ $outgoingDocuments->previousPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-s-lg
                     hover:bg-gray-100 hover:text-gray-700
                     dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                 </li>
             @endif

             {{-- Page Numbers --}}
             @foreach(range(1, $outgoingDocuments->lastPage()) as $i)
                 <li>
                     <a href="{{ $outgoingDocuments->url($i) }}" class="px-3 h-8 flex items-center justify-center border border-gray-300
                         {{ $i == $outgoingDocuments->currentPage() ? 'text-blue-600 bg-blue-50 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                         {{ $i }}
                     </a>
                 </li>
             @endforeach

             {{-- Next Page Button --}}
             @if ($outgoingDocuments->hasMorePages())
                 <li>
                     <a href="{{ $outgoingDocuments->nextPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-e-lg
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
<script>
   // modal for other recipient inside three dot icon
   document.querySelectorAll('[data-modal-target]').forEach(button => {
      button.addEventListener('click', function () {
         const modalId = this.getAttribute('data-modal-target');
         const modal = document.querySelector(modalId);
         if (modal) modal.classList.remove('hidden');
      });
   });

   document.querySelectorAll('.close-modal').forEach(button => {
      button.addEventListener('click', function () {
         const modal = this.closest('.fixed');
         if (modal) modal.classList.add('hidden');
      });
   });

</script>
@vite(['resources/js/incoming.js', 'resources/css/scrollbar.css'])
