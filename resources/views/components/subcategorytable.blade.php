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
                  <input
                      class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                      placeholder="Search for category..."
                  />
                  <button
                      class="absolute h-8 w-8 right-1 top-1 my-auto px-2 flex items-center bg-white rounded "
                      type="button"
                  >
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" class="w-8 h-8 text-slate-600">
                          <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                      </svg>
                  </button>
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

      <div class="flex justify-between items-center px-4 py-3">
         <div class="text-sm text-slate-500">
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
         </div>
       </div>
   </div>
</div>
