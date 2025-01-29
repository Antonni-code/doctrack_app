@props(['offices'])
<div class="overflow-x-auto bg-white p-4 rounded-xl">
   {{-- <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div> --}}
   <x-toast/>
   <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
      <div>
          <h3 class="text-lg font-semibold text-slate-800">Offices</h3>
          <p class="text-slate-500">Overview of all the offices.</p>
      </div>
      <div class="ml-3">
          <div class="w-full max-w-sm min-w-[200px] relative flex">
              <div class="relative">
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
              <div class="ps-4">

                  <button id="addOfficeButton" class="flex items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">

                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus w-4 h-4"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>

                     Add Office
                   </button>
              </div>
          </div>
      </div>
   </div>

   <div class="relative flex flex-col w-full h-full overflow-scroll text-gray-700 bg-white shadow-md rounded-lg bg-clip-border">
      <table class="w-full text-left table-auto min-w-max">
          <thead>
              <tr>
                  <th class="p-4 border-b border-slate-200 bg-slate-50">
                      <p class="text-sm font-normal leading-none text-slate-500">ID</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50">
                      <p class="text-sm font-normal leading-none text-slate-500">Name</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50">
                      <p class="text-sm font-normal leading-none text-slate-500">Location</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50">
                      <p class="text-sm font-normal leading-none text-slate-500">Code</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50 text-center">
                      <p class="text-sm font-normal leading-none text-slate-500">Actions</p>
                  </th>
              </tr>
          </thead>
          <tbody id="officeTableBody">
              @forelse ($offices as $office)
                  <tr class="hover:bg-slate-50 border-b border-slate-200">
                      <td class="p-4 py-5">
                          <p class="block font-semibold text-sm text-slate-800">{{ $office->id }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500">{{ $office->name }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500">{{ $office->location }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500">{{ $office->code }}</p>
                      </td>
                      <td class="p-4 py-5 text-center">
                          <button
                              data-tooltip-target="edit-tooltip"
                              class="edit-office text-center"
                              data-id="{{ $office->id }}"
                              data-office-name="{{ $office->name }}"
                              data-office-location="{{ $office->location }}"
                              data-office-code="{{ $office->code }}"
                          >
                              <svg class="w-5 h-5 text-green-400 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                 <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                              </svg>

                          </button>
                           <!-- Edit Tooltip -->
                           <div
                           data-tooltip="edit-tooltip"
                           data-tooltip-mount="opacity-100 scale-100"
                           data-tooltip-unmount="opacity-0 scale-0 pointer-events-none"
                           data-tooltip-transition="transition-all duration-200 origin-bottom"
                           class="absolute z-50 whitespace-normal break-words rounded-lg bg-black py-1.5 px-3 font-sans text-sm font-normal text-white focus:outline-none">
                              Edit Office
                           </div>

                          <button
                              data-tooltip-target="delete-tooltip"
                              class="delete-office"
                              data-office-id="{{ $office->id }}"
                              data-office-name="{{ $office->name }}"
                              id="deleteButton"
                          >
                              <svg class="w-5 h-5 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                 <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                              </svg>
                          </button>
                           <!-- Delete Tooltip -->
                           <div
                           data-tooltip="delete-tooltip"
                           data-tooltip-mount="opacity-100 scale-100"
                           data-tooltip-unmount="opacity-0 scale-0 pointer-events-none"
                           data-tooltip-transition="transition-all duration-200 origin-bottom"
                           class="absolute z-50 whitespace-normal break-words rounded-lg bg-black py-1.5 px-3 font-sans text-sm font-normal text-white focus:outline-none">
                              Delete Office
                           </div>
                      </td>
                  </tr>
             @empty
                  <tr>
                     <td colspan="5" class="p-4 text-center text-slate-500">No offices found.</td>
                  </tr>
              @endforelse
          </tbody>
      </table>

      <!-- Pagination -->
      <div class="flex flex-col items-center space-y-3 px-4 py-3">
         {{-- <div class="text-sm text-slate-500">
           Showing <b>1-5</b> of 45

         </div>
         <div class="flex space-x-1">
           <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
             Prev
           </button>
           <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-white bg-slate-800 border border-slate-800 rounded hover:bg-slate-600 hover:border-slate-600 transition duration-200 ease">
             1
           </button>
           <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
             2
           </button>
           <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
             3
           </button>
           <button class="px-3 py-1 min-w-9 min-h-9 text-sm font-normal text-slate-500 bg-white border border-slate-200 rounded hover:bg-slate-50 hover:border-slate-400 transition duration-200 ease">
             Next
           </button>
         </div> --}}
         {{ $offices->links('vendor.pagination.tailwind') }}
      </div>
   </div>
</div>
