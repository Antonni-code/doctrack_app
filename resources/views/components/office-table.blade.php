<div>
   <!-- Add Office Button -->
   <div class="flex justify-end mb-4">
      <!-- Add Office Button -->
      <button type="button" id="addOfficeButton" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
            Add Office
      </button>
   </div>

   <!-- Offices Table -->
   <div class="overflow-x-auto">
      {{-- my custom toast --}}
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
                               data-id="{{ $office->id }}"
                           >
                               Delete
                           </button>
                       </td>
                   </tr>
               @endforeach
           </tbody>
       </table>
   </div>

    <!-- Modal -->
    <x-addofficemodal/>

    <x-editofficemodal/>
</div>
@vite('resources/js/crud-offices.js')
