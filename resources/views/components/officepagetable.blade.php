@props(['offices'])
<div class="overflow-x-auto bg-white dark:bg-gray-800 rounded-xl">
   {{-- <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div> --}}
   <x-toast/>
   <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
      <div>
          <h3 class="text-lg font-semibold text-slate-800 dark:text-white">Offices</h3>
          <p class="text-slate-500 dark:text-slate-400">Overview of all the offices.</p>
      </div>
      <div class="ml-3">
          <div class="w-full max-w-sm min-w-[200px] relative flex">
              <div class="relative">
               <div class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500 dark:text-gray-400">
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                     <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                     </svg>
               </div>
                  <input
                     class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 dark:text-white dark:border-gray-700 dark:placeholder-shown:border-gray-700 dark:focus:border-gray-500"
                     placeholder=" " />
                     <label
                        class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 dark:text-gray-300 dark:before:border-gray-700 dark:after:border-gray-700 dark:peer-focus:text-gray-200 dark:peer-focus:before:!border-gray-500 dark:peer-focus:after:!border-gray-500">
                              Search
                     </label>
              </div>
              <div class="ps-4">
                  <button id="addOfficeButton" class="flex items-center gap-3 rounded-lg bg-gray-900 dark:bg-gray-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none dark:hover:bg-gray-600" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus w-4 h-4"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
                     Add Office
                   </button>
              </div>
          </div>
      </div>
   </div>

   <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 dark:text-gray-200 bg-white dark:bg-gray-800 shadow-md rounded-lg bg-clip-border">
      <table class="w-full text-left table-auto min-w-max">
          <thead>
              <tr>
                  <th class="p-4 border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800">
                      <p class="text-sm font-normal leading-none text-slate-500 dark:text-slate-400">ID</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800">
                      <p class="text-sm font-normal leading-none text-slate-500 dark:text-slate-400">Name</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800">
                      <p class="text-sm font-normal leading-none text-slate-500 dark:text-slate-400">Location</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800">
                      <p class="text-sm font-normal leading-none text-slate-500 dark:text-slate-400">Code</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50 dark:border-slate-700 dark:bg-slate-800 text-center">
                      <p class="text-sm font-normal leading-none text-slate-500 dark:text-slate-400">Actions</p>
                  </th>
              </tr>
          </thead>
          <tbody id="officeTableBody">
              @forelse ($offices as $office)
                  <tr class="hover:bg-slate-50 dark:hover:bg-slate-700 border-b border-slate-200 dark:border-slate-700">
                      <td class="p-4 py-5">
                          <p class="block font-semibold text-sm text-slate-800 dark:text-white">{{ $office->id }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500 dark:text-slate-400">{{ $office->name }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500 dark:text-slate-400">{{ $office->location }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500 dark:text-slate-400">{{ $office->code }}</p>
                      </td>
                      <td class="p-4 py-5 text-center">
                          <button
                              data-tooltip-target="edit-tooltip-{{ $office->id }}"
                              class="edit-office text-center relative rounded-full p-2 transition-all duration-300 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-gray-700 dark:active:bg-gray-600"
                              data-id="{{ $office->id }}"
                              data-office-name="{{ $office->name }}"
                              data-office-location="{{ $office->location }}"
                              data-office-code="{{ $office->code }}"
                          >
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4 text-green-500">
                                 <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                              </svg>
                          </button>
                           <!-- Edit Tooltip -->
                           <div id="edit-tooltip-{{ $office->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-800">
                              Edit
                              <div class="tooltip-arrow" data-popper-arrow></div>
                          </div>

                          <button
                              data-tooltip-target="delete-tooltip-{{ $office->id }}"
                              class="delete-office relative rounded-full p-2 transition-all duration-300 hover:bg-gray-200 active:bg-gray-300 dark:hover:bg-gray-700 dark:active:bg-gray-600"
                              data-office-id="{{ $office->id }}"
                              data-office-name="{{ $office->name }}"
                              id="deleteButton"
                          >
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash w-4 h-4 text-red-500">
                                 <path d="M3 6h18"/>
                                 <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/>
                                 <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                              </svg>
                          </button>
                           <!-- Delete Tooltip -->
                           <div id="delete-tooltip-{{ $office->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-800">
                              Delete
                              <div class="tooltip-arrow" data-popper-arrow></div>
                          </div>
                      </td>
                  </tr>
             @empty
                  <tr>
                     <td colspan="5" class="p-4 text-center text-slate-500 dark:text-slate-400">No offices found.</td>
                  </tr>
              @endforelse
          </tbody>
      </table>
   </div>
   <!-- Pagination -->
   <div class="flex flex-col items-center space-y-4 p-4 ">
      <nav aria-label="Page navigation example">
         <ul class="inline-flex -space-x-px text-sm">
             {{-- Previous Page Button --}}
             @if ($offices->onFirstPage())
                 <li>
                     <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-s-lg
                     dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Previous</span>
                 </li>
             @else
                 <li>
                     <a href="{{ $offices->previousPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-s-lg
                     hover:bg-gray-100 hover:text-gray-700
                     dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                 </li>
             @endif

             {{-- Page Numbers --}}
             @foreach(range(1, $offices->lastPage()) as $i)
                 <li>
                     <a href="{{ $offices->url($i) }}" class="px-3 h-8 flex items-center justify-center border border-gray-300
                         {{ $i == $offices->currentPage() ? 'text-blue-600 bg-blue-50 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                         {{ $i }}
                     </a>
                 </li>
             @endforeach

             {{-- Next Page Button --}}
             @if ($offices->hasMorePages())
                 <li>
                     <a href="{{ $offices->nextPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-e-lg
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
