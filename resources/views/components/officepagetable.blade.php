@props(['offices'])
{{-- <div class="overflow-x-auto bg-white p-4 rounded-xl">
   <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div>

    <table class="table-auto w-full text-sm text-left text-gray-500">
        <thead class="text-xs uppercase bg-gray-50 text-gray-700">
            <tr>
                <th class="px-4 py-2">ID</th>
                <th class="px-4 py-2">Name</th>
                <th class="px-4 py-2">Location</th>
                <th class="px-4 py-2">Code</th>
                <th class="px-4 py-2 text-center">Actions</th>
            </tr>
        </thead>
        <tbody id="officeTableBody">
            <!-- Example data for dynamic rendering -->
            <!-- Replace with server-side rendering or dynamic loading -->
            @foreach ($offices as $office)
                <tr>
                    <td class="px-4 py-2">{{ $office->id }}</td>
                    <td class="px-4 py-2">{{ $office->name }}</td>
                    <td class="px-4 py-2">{{ $office->location }}</td>
                    <td class="px-4 py-2">{{ $office->code }}</td>
                    <td class="px-4 py-2 text-center">
                        <!-- Edit Button -->
                        <button
                            class="edit-office bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                            data-id="{{ $office->id }}"
                            data-office-name="{{ $office->name }}"
                            data-office-location="{{ $office->location }}"
                            data-office-code="{{ $office->code }}"
                        >
                            Edit
                        </button>
                        <!-- Delete Button -->
                        <button
                            class="delete-office bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                            data-office-id="{{ $office->id }}"
                            data-office-name="{{ $office->name }}"
                            id="deleteButton"
                        >
                            Delete
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div> --}}


<div class="overflow-x-auto bg-white p-4 rounded-xl">
   <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div>
   <div class="w-full flex justify-between items-center mb-3 mt-1 pl-3">
      <div>
          <h3 class="text-lg font-semibold text-slate-800">Offices</h3>
          <p class="text-slate-500">Overview of all the offices.</p>
      </div>
      <div class="ml-3">
          <div class="w-full max-w-sm min-w-[200px] relative">
              <div class="relative">
                  <input
                      class="bg-white w-full pr-11 h-10 pl-3 py-2 bg-transparent placeholder:text-slate-400 text-slate-700 text-sm border border-slate-200 rounded transition duration-200 ease focus:outline-none focus:border-slate-400 hover:border-slate-400 shadow-sm focus:shadow-md"
                      placeholder="Search for office..."
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
              @foreach ($offices as $office)
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
                              class="edit-office bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600"
                              data-id="{{ $office->id }}"
                              data-office-name="{{ $office->name }}"
                              data-office-location="{{ $office->location }}"
                              data-office-code="{{ $office->code }}"
                          >
                              Edit
                          </button>
                          <button
                              class="delete-office bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                              data-office-id="{{ $office->id }}"
                              data-office-name="{{ $office->name }}"
                              id="deleteButton"
                          >
                              Delete
                          </button>
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
