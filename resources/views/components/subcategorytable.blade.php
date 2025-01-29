<div class="overflow-x-auto bg-white p-4 rounded-xl">
   <!-- custom toast -->
   {{-- <div id="toast-container-class" class="space-y-3 fixed top-5 right-5 z-[999]"></div> --}}
   <x-toast/>
   <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
      <div>
          <h3 class="text-lg font-semibold text-slate-800">Classification</h3>
          <p class="text-slate-500">Overview of all the classifications.</p>
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

                  <button id="addclassButton" class="flex items-center rounded-md bg-gradient-to-tr from-slate-800 to-slate-700 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">

                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus w-4 h-4 mr-1.5"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/>
                     </svg>

                     Add
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
                      <p class="text-sm font-normal leading-none text-slate-500">Sub-classification</p>
                  </th>
                  <th class="p-4 border-b border-slate-200 bg-slate-50 text-center">
                      <p class="text-sm font-normal leading-none text-slate-500">Actions</p>
                  </th>
              </tr>
          </thead>
          <tbody id="officeTableBody">
              @foreach ($categories as $category)
                  <tr class="hover:bg-slate-50 border-b border-slate-200">
                      <td class="p-4 py-5">
                          <p class="block font-semibold text-sm text-slate-800">{{ $category->id }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500">{{ $category->name }}</p>
                      </td>
                      <td class="p-4 py-5">
                          <p class="text-sm text-slate-500">{{ $category->sub_class }}</p>
                      </td>
                      <td class="p-4 py-5 text-center">
                        <button data-tooltip-target="edit-tooltip" class="editClassButton text-center" data-id="{{ $category->id }}" data-class-name="{{ $category->name }}" data-class-sub="{{ $category->sub_class }}">
                              <svg class="w-6 h-6 text-green-400 dark:text-green-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
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
                              Edit category
                           </div>

                          <button
                              data-tooltip-target="delete-tooltip"
                              class="delete-category"
                              data-class-id="{{ $category->id }}"
                              data-class-name="{{ $category->name }}"
                              id="deleteButton"
                          >
                              {{-- <svg class="w-5 h-5 text-red-500 dark:text-red-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                 <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd"/>
                              </svg> --}}
                              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash w-5 h-5 text-red-500"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                              </svg>
                          </button>
                           <!-- Delete Tooltip -->
                           <div
                           data-tooltip="delete-tooltip"
                           data-tooltip-mount="opacity-100 scale-100"
                           data-tooltip-unmount="opacity-0 scale-0 pointer-events-none"
                           data-tooltip-transition="transition-all duration-200 origin-bottom"
                           class="absolute z-50 whitespace-normal break-words rounded-lg bg-black py-1.5 px-3 font-sans text-sm font-normal text-white focus:outline-none">
                              Delete category
                           </div>
                      </td>
                  </tr>
               @endforeach
          </tbody>
      </table>

      <!-- Custom Pagination Controls -->
      {{-- <div class="flex flex-col space-y-3 items-center px-4 py-3">
         <!-- Previous Page Link -->
         @if ($page > 1)
            <a href="{{ route('subcategory', ['page' => $page - 1]) }}" class="px-4 py-2 text-sm text-white bg-blue-500 hover:bg-blue-700 rounded-md">Previous</a>
         @endif

         <!-- Page Number Links -->
         <div class="flex items-center space-x-2">
            @for ($i = 1; $i <= $totalPages; $i++)
               <a href="{{ route('subcategory', ['page' => $i]) }}" class="px-4 py-2 text-sm text-gray-700 hover:bg-gray-300 {{ $i == $page ? 'bg-blue-500 text-white' : '' }} rounded-md">
                     {{ $i }}
               </a>
            @endfor
         </div>

         <!-- Next Page Link -->
         @if ($page < $totalPages)
            <a href="{{ route('subcategory', ['page' => $page + 1]) }}" class="px-4 py-2 text-sm text-white bg-blue-500 hover:bg-blue-700 rounded-md">Next</a>
         @endif
      </div> --}}

      <!-- Custom Pagination Controls -->
{{-- <div class="flex items-center justify-between px-4 py-3 sm:px-6">
   <!-- Previous Page Link -->
   @if ($page > 1)
       <a href="{{ route('subcategory', ['page' => $page - 1]) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
           Previous
       </a>
   @else
       <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-l-md">
           Previous
       </span>
   @endif

   <!-- Page Number Links -->
   <div class="hidden sm:flex-1 sm:flex sm:justify-center">
       <div class="inline-flex -space-x-px">
           @for ($i = 1; $i <= $totalPages; $i++)
               <a href="{{ route('subcategory', ['page' => $i]) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 {{ $i == $page ? 'z-10 bg-blue-50 border-blue-500 text-blue-600' : 'text-gray-500 hover:bg-gray-100 hover:border-gray-300' }} focus:z-10 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                   {{ $i }}
               </a>
           @endfor
       </div>
   </div>

   <!-- Next Page Link -->
   @if ($page < $totalPages)
       <a href="{{ route('subcategory', ['page' => $page + 1]) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
           Next
       </a>
   @else
       <span class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-300 bg-white border border-gray-300 rounded-r-md">
           Next
       </span>
   @endif
</div> --}}

<!-- Pagination Links -->
{{-- @if ($totalPages > 1)
    <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
        <!-- Previous Button -->
        @if ($page > 1)
            <a href="{{ route('subcategory', ['page' => $page - 1]) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500">
                {!! __('pagination.previous') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span>
        @endif

        <!-- Page Number Links -->
        <span class="text-sm text-gray-700">Page {{ $page }} of {{ $totalPages }}</span>

        <!-- Next Button -->
        @if ($page < $totalPages)
            <a href="{{ route('subcategory', ['page' => $page + 1]) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500">
                {!! __('pagination.next') !!}
            </a>
        @else
            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.next') !!}
            </span>
        @endif
    </nav>
@endif --}}
      <div class="flex flex-col space-y-3 items-center px-4 py-3">
         @if ($totalPages > 1)
            <nav role="navigation" aria-label="Pagination Navigation" class="flex items-center justify-between">
               <div class="flex justify-between flex-1 sm:hidden">
                     @if ($page == 1)
                        <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md dark:text-gray-600 dark:bg-gray-800 dark:border-gray-600">
                           {!! __('pagination.previous') !!}
                        </span>
                     @else
                        <a href="{{ route('subcategory', ['page' => $page - 1]) }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
                           {!! __('pagination.previous') !!}
                        </a>
                     @endif

                     @if ($page < $totalPages)
                        <a href="{{ route('subcategory', ['page' => $page + 1]) }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-700 dark:active:bg-gray-700 dark:active:text-gray-300">
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
                                 <a href="{{ route('subcategory', ['page' => $page - 1]) }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('pagination.previous') }}">
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
                                    <a href="{{ route('subcategory', ['page' => $i]) }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('Go to page :page', ['page' => $i]) }}">
                                       {{ $i }}
                                    </a>
                                 @endif
                           @endfor

                           {{-- Next Page Link --}}
                           @if ($page < $totalPages)
                                 <a href="{{ route('subcategory', ['page' => $page + 1]) }}" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:active:bg-gray-700 dark:focus:border-blue-800" aria-label="{{ __('pagination.next') }}">
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
