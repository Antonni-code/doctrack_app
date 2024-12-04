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
   <tbody>
     @foreach ($users as $user)
        <tr>
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
                 <p
                 class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 opacity-70">
                 {{ $user->office }}
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
                  data-tooltip-target="edit-tooltip"
                  data-user-id="{{ $user->id }}"
                  data-user-name="{{ $user->name }}"
                  data-user-email="{{ $user->email }}"
                  data-user-role="{{ $user->role }}"
                  data-user-office="{{ $user->office }}"
                  data-user-designation="{{ $user->designation }}"
                  class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none edit-button"
                  type="button">
                  <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                     <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true" class="w-4 h-4 text-blue-500">
                        <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                     </svg>
                  </span>
               </button>


                  <!-- Edit Tooltip -->
                  <div
                     data-tooltip="edit-tooltip"
                     data-tooltip-mount="opacity-100 scale-100"
                     data-tooltip-unmount="opacity-0 scale-0 pointer-events-none"
                     data-tooltip-transition="transition-all duration-200 origin-bottom"
                     class="absolute z-50 whitespace-normal break-words rounded-lg bg-black py-1.5 px-3 font-sans text-sm font-normal text-white focus:outline-none">
                     Edit User
                  </div>
              <!-- Reactivate Button -->
              @if (!$user->active)
              <!-- Button -->
                 <button
                    data-tooltip-target="restore-tooltip"
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
                 <div
                    data-tooltip="restore-tooltip"
                    data-tooltip-mount="opacity-100 scale-100"
                    data-tooltip-unmount="opacity-0 scale-0 pointer-events-none"
                    data-tooltip-transition="transition-all duration-200 origin-bottom"
                    class="absolute z-50 whitespace-normal break-words rounded-lg bg-black py-1.5 px-3 font-sans text-sm font-normal text-white focus:outline-none">
                    Reactivate User
                 </div>
              @else
                 <!-- Delete Button -->
                 <button
                 data-tooltip-target="delete-tooltip"
                 data-user-id="{{ $user->id }}"
                 data-user-name="{{ $user->name }}"
                 id="deleteButton"
                 class="relative h-10 max-h-[40px] w-10 max-w-[40px] select-none rounded-lg text-center align-middle font-sans text-xs font-medium uppercase text-gray-900 transition-all hover:bg-gray-900/10 active:bg-gray-900/20 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                 type="button">
                 <span class="absolute transform -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2">
                    <svg class="w-4 h-4 text-red-500 dark:text-red-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                       <path fill-rule="evenodd" d="M8.586 2.586A2 2 0 0 1 10 2h4a2 2 0 0 1 2 2v2h3a1 1 0 1 1 0 2v12a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V8a1 1 0 0 1 0-2h3V4a2 2 0 0 1 .586-1.414ZM10 6h4V4h-4v2Zm1 4a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Zm4 0a1 1 0 1 0-2 0v8a1 1 0 1 0 2 0v-8Z" clip-rule="evenodd" />
                    </svg>
                 </span>
                 </button>

                  <!-- Delete Tooltip -->
                  <div
                     data-tooltip="delete-tooltip"
                     data-tooltip-mount="opacity-100 scale-100"
                     data-tooltip-unmount="opacity-0 scale-0 pointer-events-none"
                     data-tooltip-transition="transition-all duration-200 origin-bottom"
                     class="absolute z-50 whitespace-normal break-words rounded-lg bg-black py-1.5 px-3 font-sans text-sm font-normal text-white focus:outline-none">
                     Delete User
                  </div>
              @endif

              <!-- Delete Confirmation Modal -->
              <div id="deleteModal" class="hidden fixed inset-0 z-[999] h-screen w-screen justify-center place-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm">
                 <div class="relative m-4 p-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white shadow-sm">
                    <button
                       id="closeModalButton"
                       type="button"
                       class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                       <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                       </svg>
                       <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 md:p-5 text-center">
                       <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                       </svg>
                       <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete user: <span class="text-red-600 uppercase" id="userNameToDelete"></span>?</h3>
                       <!-- Form for deleting user -->
                       <div class="flex justify-center">
                          <form id="deleteUserForm" method="POST" action="#">
                             @method('DELETE')
                             @csrf
                             <input type="hidden" id="deleteUserId" name="user_id">
                             <button
                                id="confirmDeleteButton"
                                type="submit"
                                class="text-white bg-red-600 hover:bg-red-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                Yes, I'm sure
                             </button>
                          </form>
                          <button
                                id="cancelDeleteButton"
                                type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border hover:bg-gray-100 hover:text-red-700">
                                No, cancel
                          </button>
                       </div>
                    </div>
                 </div>
              </div>

              <!-- Reactivate Confirmation Modal -->
              <div id="reactivateModal" class="hidden fixed inset-0 z-[999] h-screen w-screen justify-center place-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm">
                 <div class="relative m-4 p-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white shadow-sm">
                    <button
                       id="closeReactivateModalButton"
                       type="button"
                       class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center">
                       <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                       </svg>
                       <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-4 text-center">
                       <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to reactivate user: <span class="text-green-600 uppercase" id="userNameToReactivate"></span>?</h3>
                       <div class="flex justify-center">
                             <form id="reactivateUserForm" method="POST" action="#">
                                @csrf
                                <input type="hidden" id="reactivateUserId" name="user_id">
                                <button
                                   id="confirmReactivateButton"
                                   type="submit"
                                   class="text-white bg-green-600 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                   Yes, Reactivate
                                </button>
                             </form>
                             <button
                                id="cancelReactivateButton"
                                type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 bg-white rounded-lg border hover:bg-gray-100 hover:text-red-700">
                                No, cancel
                             </button>
                       </div>
                    </div>
                 </div>
              </div>

              <!-- Edit Modal -->
              {{-- <x-editusermodal :user="$user" /> --}}
              <div id="editModal" class="hidden fixed inset-0 z-[999] h-screen w-screen justify-center place-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm">
               <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
                   <h2 class="text-xl font-semibold mb-4">Edit User</h2>
                   <form id="editUserForm" method="POST" action="{{ route('user.update', ['id' => $user->id ?? '']) }}">
                     @csrf
                     @method('PUT')

                     <!-- Name -->
                     <div class="mb-4">
                        <label for="editName" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" id="editName" name="editName" value="{{ $user->name }}"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                     </div>

                     <!-- Email -->
                     <div class="mb-4">
                        <label for="editEmail" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="editEmail" name="editEmail" value="{{ $user->email }}"
                               class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                     </div>

                     <!-- Role -->
                     <div class="mb-4">
                        <label for="editRole" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="editRole" name="editRole" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                           <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                           <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                        </select>
                     </div>

                     <!-- Password -->
                     <div class="mb-4">
                        <label for="editPassword" class="block text-sm font-medium text-gray-700">New Password</label>
                        <div class="relative">
                           <input type="password" id="editPassword" name="editPassword"
                                  class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                            <button type="button" data-hs-toggle-password='{
                                    "target": "#editPassword"
                                  }' class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-none focus:text-blue-600 dark:text-neutral-600 dark:focus:text-blue-500">
                                  <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24"></path>
                                    <path class="hs-password-active:hidden" d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68"></path>
                                    <path class="hs-password-active:hidden" d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61"></path>
                                    <line class="hs-password-active:hidden" x1="2" x2="22" y1="2" y2="22"></line>
                                    <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z"></path>
                                    <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3"></circle>
                                  </svg>
                              </button>
                        </div>

                        <p class="text-xs text-gray-500">Leave blank to keep the current password.</p>
                     </div>

                     <!-- Office -->
                     <div class="mb-4">
                        <label for="editOffice" class="block text-sm font-medium text-gray-700">Office</label>
                        <select id="editOffice" name="editOffice" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                           <option value="Office A" {{ $user->office == 'Office A' ? 'selected' : '' }}>Office A</option>
                           <option value="Office B" {{ $user->office == 'Office B' ? 'selected' : '' }}>Office B</option>
                           <option value="Office C" {{ $user->office == 'Office C' ? 'selected' : '' }}>Office C</option>
                        </select>
                     </div>

                     <!-- Designation -->
                     <div class="mb-4">
                        <label for="editDesignation" class="block text-sm font-medium text-gray-700">Designation</label>
                        <select id="editDesignation" name="editDesignation" required
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                           <option value="Manager" {{ $user->designation == 'Manager' ? 'selected' : '' }}>Manager</option>
                           <option value="Assistant" {{ $user->designation == 'Assistant' ? 'selected' : '' }}>Assistant</option>
                           <option value="Director" {{ $user->designation == 'Director' ? 'selected' : '' }}>Director</option>
                        </select>
                     </div>

                     <!-- Modal Actions -->
                     <div class="flex justify-end">
                        <button type="button" id="cancelEditButton" class="text-gray-700 hover:text-gray-900 mr-2">Cancel</button>
                        <button type="submit" id="confirmEditButton"
                                class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Save</button>
                     </div>
                  </form>
               </div>
           </div>

           </div>
         </td>
      </tr>
   @endforeach
   </tbody>
</table>
<!-- Pass the route to JS -->
<script>
   window.editUserRoute = '{{ route('user.update', ':id') }}';
   window.deleteUserRoute = '{{ route('user.delete', ':id') }}';  // Pass the delete user route to JS
   window.restoreUserRoute = '{{ route('user.restore', ':id') }}';  // Pass the restore user route to JS
   // document.addEventListener('DOMContentLoaded', function () {
   //    // Select all edit buttons and modal elements
   //    const editButtons = document.querySelectorAll('.edit-button');
   //    const editModal = document.getElementById('editModal');
   //    const cancelEditButton = document.getElementById('cancelEditButton');
   //    const editForm = document.getElementById('editUserForm');

   //    // Select modal fields
   //    const editName = document.getElementById('editName');
   //    const editEmail = document.getElementById('editEmail');
   //    const editRole = document.getElementById('editRole');
   //    const editOffice = document.getElementById('editOffice');
   //    const editDesignation = document.getElementById('editDesignation');

   //    // Attach event listener to each edit button
   //    editButtons.forEach((button) => {
   //       button.addEventListener('click', () => {
   //          // Get data attributes from the button
   //          const userId = button.getAttribute('data-user-id');
   //          const userName = button.getAttribute('data-user-name');
   //          const userEmail = button.getAttribute('data-user-email');
   //          const userRole = button.getAttribute('data-user-role');
   //          const userOffice = button.getAttribute('data-user-office');
   //          const userDesignation = button.getAttribute('data-user-designation');

   //          // Populate the modal fields with the fetched data
   //          editName.value = userName;
   //          editEmail.value = userEmail;
   //          editRole.value = userRole;
   //          editOffice.value = userOffice;
   //          editDesignation.value = userDesignation;

   //          // Update the form action to point to the correct user route with PUT method
   //          editForm.action = `/users/${userId}`;
   //          editForm.method = 'POST'; // This ensures the form will be submitted as POST for Laravel
   //          const methodField = document.createElement('input');
   //          methodField.setAttribute('type', 'hidden');
   //          methodField.setAttribute('name', '_method');
   //          methodField.setAttribute('value', 'PUT');
   //          editForm.appendChild(methodField);

   //          // Show the modal
   //          editModal.classList.remove('hidden');
   //          editModal.classList.add('flex');
   //       });
   //    });

   //    // Handle form submission
   //    editForm.addEventListener('submit', (event) => {
   //       event.preventDefault(); // Prevent default form submission (if using AJAX)

   //       // Example AJAX request for form submission
   //       const formData = new FormData(editForm);
   //       fetch(editForm.action, {
   //          method: 'POST', // Use POST method because we added the _method field for PUT
   //          headers: {
   //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
   //             'Accept': 'application/json',
   //          },
   //          body: formData,
   //       })
   //       .then((response) => {
   //          if (response.ok) {
   //             // Close the modal
   //             editModal.classList.add('hidden');
   //             editModal.classList.remove('flex');

   //             // Show success toast and reload page after success
   //             showToast('success', 'User data successfully updated!', true);
   //          } else {
   //             // Handle error cases
   //             response.json().then((data) => {
   //                showToast('error', data.message || 'Failed to update user data. Please try again.');
   //             });
   //          }
   //       })
   //       .catch(() => {
   //          showToast('error', 'An unexpected error occurred.');
   //       });

   //    });

   //    // Close modal when cancel button is clicked
   //    cancelEditButton.addEventListener('click', () => {
   //       editModal.classList.add('hidden');
   //       editModal.classList.remove('flex');
   //    });

   //    // Function to show toast notifications
   //    function showToast(type, message, reloadAfter = false) {
   //       const toastConfig = {
   //          normal: { color: 'text-blue-500', icon: '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>' },
   //          success: { color: 'text-teal-500', icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>' },
   //          error: { color: 'text-red-500', icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0-.708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>' },
   //          warning: { color: 'text-yellow-500', icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>' }
   //       };

   //       const { color, icon } = toastConfig[type] || toastConfig['normal'];

   //       const toast = document.createElement('div');
   //       toast.className = 'max-w-xl bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700 fixed top-5 right-5 z-50';
   //       toast.innerHTML = `
   //          <div class="flex p-4">
   //             <div class="shrink-0">
   //                <svg class="shrink-0 size-4 ${color}" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
   //                      ${icon}
   //                </svg>
   //             </div>
   //             <div class="ms-3">
   //                <p class="text-sm text-gray-700 dark:text-neutral-400">${message}</p>
   //             </div>
   //          </div>
   //       `;

   //       const toastContainer = document.querySelector('.space-y-3') || document.body;
   //       toastContainer.appendChild(toast);

   //       setTimeout(() => toast.remove(), 5000);

   //       if (reloadAfter) {
   //          setTimeout(() => {
   //             location.reload();
   //          }, 5000); // Reloads the page after the toast disappears
   //       }
   //    }
   // });
</script>
@vite('resources/js/crud-user.js')
