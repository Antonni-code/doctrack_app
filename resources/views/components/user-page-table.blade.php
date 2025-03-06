@props(['users', 'offices'])
<table class="w-full mt-4 text-left table-auto min-w-max">
   <thead>
     <tr>
       <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
         <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
           Member
         </p>
       </th>
       <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
         <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
           Office
         </p>
       </th>
       <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
         <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
           Role
         </p>
       </th>
       <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
         <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
           Status
         </p>
       </th>
       <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
         <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
           Created
         </p>
       </th>
       <th class="p-4 border-y border-blue-gray-100 bg-blue-gray-50/50">
         <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
         </p>
       </th>
     </tr>
   </thead>
   <tbody id="documentTableBody">
     @foreach ($users as $user)
        <tr data-status="{{ $user->excluded ? 'excluded' : ($user->active ? 'active' : 'inactive') }}">
           <td class="p-4 border-b border-blue-gray-50">
              <div class="flex items-center gap-3">
                 <img src="{{ $user->profile_photo_url }}"
                 alt="{{ $user->name }}" class="relative inline-block h-9 w-9 !rounded-full object-cover object-center" />
                 <div class="flex flex-col">
                 <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                    {{ $user->name }}
                 </p>
                 <p
                    class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70">
                    {{ $user->email }}
                 </p>
                 </div>
              </div>
           </td>
           <td class="p-4 border-b border-blue-gray-50">
            <div class="flex flex-col">
                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                    {{ $user->designation }}
                </p>
                <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70">
                    {{ $user->office->name ?? 'No Office Assigned' }}
                </p>
            </div>
           </td>

           <td class="p-4 border-b border-blue-gray-50">
              <div class="w-max">
                 <div
                 class="relative grid items-center px-2 py-1 font-sans text-xs font-bold text-green-900 uppercase rounded-md select-none whitespace-nowrap bg-green-500/20">
                 <span class="">{{ $user->role }}</span>
                 </div>
              </div>
           </td>
           <td class="p-4 border-b border-blue-gray-50">
              <div class="w-max">
                 <div
                     class="relative grid items-center px-2 py-1 font-sans text-xs font-bold uppercase rounded-md select-none whitespace-nowrap
                     @if ($user->excluded)
                        text-red-900 bg-red-500/20
                     @elseif (!$user->active)
                        text-yellow-900 bg-yellow-500/20
                     @else
                        text-green-900 bg-green-500/20
                     @endif">
                     <span class="">
                        @if ($user->excluded)
                           Excluded
                        @elseif (!$user->active)
                           Inactive
                        @else
                           Active
                        @endif
                     </span>
                 </div>
              </div>
           </td>
           <td class="p-4 border-b border-blue-gray-50">
              <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900">
                 {{ $user->created_at->format('d/m/y') }}
              </p>
           </td>
           <td class="flex p-4 justify-center content-center border-b border-blue-gray-50">
              <!-- Edit Button -->
               <button
                  data-tooltip-target="edit-tooltip-{{ $user->id }}"
                  data-user-id="{{ $user->id }}"
                  data-user-name="{{ $user->name }}"
                  data-user-email="{{ $user->email }}"
                  data-user-role="{{ $user->role }}"
                  data-office-id="{{ $user->office_id }}"
                  data-user-designation="{{ $user->designation }}"
                  class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none edit-button"
                  type="button">
                  <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4 text-green-500">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                     </svg>
                  </span>
               </button>


               <!-- Edit Tooltip -->

               <div id="edit-tooltip-{{ $user->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                  Edit
                  <div class="tooltip-arrow" data-popper-arrow></div>
               </div>
              <!-- Reactivate Button -->
              @if (!$user->active)
              <!-- Button -->
                 <button
                    data-tooltip-target="restore-tooltip-{{ $user->id }}"
                    data-user-id="{{ $user->id }}"
                    data-user-name="{{ $user->name }}"
                    id="reactivateButton"
                    class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20"
                    type="button">
                    <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                       <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6 text-emerald-500">
                          <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                       </svg>
                    </span>
                 </button>

                 <!-- Reactivate Tooltip -->

               <div id="restore-tooltip-{{ $user->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                  Reactivate
                  <div class="tooltip-arrow" data-popper-arrow></div>
               </div>
              @else
                 <!-- Delete Button -->
                 <button
                 data-tooltip-target="delete-tooltip-{{ $user->id }}"
                 data-user-id="{{ $user->id }}"
                 data-user-name="{{ $user->name }}"
                 id="deleteButton"
                 class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                 type="button">
                 <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-trash w-4 h-4 text-red-500"><path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/></svg>
                 </span>
                 </button>

                  <!-- Delete Tooltip -->

                  <div id="delete-tooltip-{{ $user->id }}" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-xs opacity-0 tooltip dark:bg-gray-700">
                     Delete
                     <div class="tooltip-arrow" data-popper-arrow></div>
                  </div>
              @endif

              <!-- Delete Confirmation Modal -->
              <x-deleteusermodal/>

              <!-- Reactivate Confirmation Modal -->
              <x-reactivateusermodal/>

              <!-- Edit Modal -->
              <x-editusermodal :user="$user" :offices="$offices" />

         </td>
      </tr>
   @endforeach
   </tbody>
</table>
<!-- Pass the route to JS -->
<script>
   window.userCreateRoute = '{{ route('user.create') }}';
   window.editUserRoute = '{{ route('user.update', ':id') }}';
   window.deleteUserRoute = "{{ route('user.delete', ['id' => ':id']) }}";  // Pass the delete user route to JS
   window.restoreUserRoute = '{{ route('user.restore', ':id') }}';  // Pass the restore user route to JS

</script>
@vite('resources/js/crud-user.js')
@vite('resources/js/filter-tabs.js')
