@props(['offices'])
<div>
   <!-- Add Office Button -->
   <div class="flex justify-end mb-4">
      <!-- Add Office Button -->
      {{-- <button type="button" id="addOfficeButton" class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
            Add Office
      </button> --}}

      <button type="button" id="addOfficeButton"class="flex items-center rounded-md border border-blue-600 py-2 px-4 text-center text-sm transition-all shadow-sm hover:shadow-lg text-blue-600 hover:text-white hover:bg-blue-800 hover:border-blue-800 focus:text-white focus:bg-slate-800 focus:border-blue-800 active:border-slate-800 active:text-white active:bg-slate-800 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
         Add Office
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-circle-plus w-4 h-4 ml-1.5"><circle cx="12" cy="12" r="10"/><path d="M8 12h8"/><path d="M12 8v8"/></svg>
      </button>
   </div>

   <!-- Offices Table -->
   {{-- <div class="overflow-x-auto bg-white p-4 rounded-xl">

      {{-- <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div>

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
   <x-officepagetable :offices="$offices"/>



    <!-- Modal -->
    <x-addofficemodal/>

    <x-editofficemodal/>

    <x-deleteofficemodal/>
</div>
<script>
   window.deleteOfficeRoute = "{{ route('offices.delete', ['id' => ':id']) }}";
   // window.updateOfficeRoute = "{{ route('offices.update', ['id' => ':id']) }}";
</script>

@vite('resources/js/crud-offices.js')
