@props(['offices'])
<div id="hs-scale-animation-modal" class="hidden fixed inset-0 z-[888] h-screen w-screen justify-center place-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
   <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-in-out transition-all duration-200 sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-3.5rem)] flex items-center">
       <div class="w-full flex flex-col bg-white border shadow-sm rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
           <div class="flex justify-between items-center py-3 px-4 border-b dark:border-neutral-700">
               <h3 id="hs-scale-animation-modal-label" class="font-bold text-gray-800 dark:text-white">
                   Add User
               </h3>
               <button type="button"
               class="close-modal size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-none focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
               aria-label="Close"
               data-hs-overlay="#hs-scale-animation-modal"
               id="closeModalButton">
                   <span class="sr-only">Close</span>
                   <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                       <path d="M18 6 6 18"></path>
                       <path d="m6 6 12 12"></path>
                   </svg>
               </button>
           </div>
           <div class="p-4 overflow-y-auto">
               <form id="addUserForm" action="{{ route('user.create') }}"
                  method="POST"
                  class=""
                  >
                  @csrf

                  <!-- Full Name -->
                  <div>
                     <label
                        for="name"
                        class="block text-sm font-medium text-gray-700"
                        >Full Name</label
                     >
                     <input
                        type="text"
                        id="name"
                        name="name"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     />
                  </div>

                  <!-- Email -->
                  <div>
                     <label
                        for="email"
                        class="block text-sm font-medium text-gray-700"
                        >Email</label
                     >
                     <input
                        type="email"
                        id="email"
                        name="email"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     />
                  </div>

                  <!-- Office -->
                  <div>
                     <label for="office" class="block text-sm font-medium text-gray-700">Office</label>
                     <select
                        id="office"
                        name="office_id"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     >
                        @foreach ($offices as $office)
                           <option value="{{ $office->id }}">{{ $office->name }}</option>
                        @endforeach
                     </select>
                  </div>

                  <!-- Designation -->
                  <div>
                     <label
                        for="designation"
                        class="block text-sm font-medium text-gray-700"
                        >Designation</label
                     >
                     <select
                        id="designation"
                        name="designation"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     >
                        <option value="Manager">Manager</option>
                        <option value="Assistant">Assistant</option>
                        <option value="Director">Director</option>
                     </select>
                  </div>

                  <!-- Role -->
                  <div>
                     <label
                        for="role"
                        class="block text-sm font-medium text-gray-700"
                        >Role</label
                     >
                     <select
                        id="role"
                        name="role"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     >
                        <option value="admin">Admin</option>
                        <option value="staff" selected>Staff</option>
                     </select>
                  </div>

                  <!-- Password -->
                  <div>
                     <label
                        for="password"
                        class="block text-sm font-medium text-gray-700"
                        >Password</label
                     >
                     <input
                        type="password"
                        id="password"
                        name="password"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     />
                  </div>

                  <!-- Password Confirmation -->
                  <div>
                     <label
                        for="password_confirmation"
                        class="block text-sm font-medium text-gray-700"
                        >Confirm Password</label
                     >
                     <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        required
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                     />
                  </div>

                  <!-- Modal Action Buttons -->
                  <div class="flex justify-end mt-6">
                     <button type="button" class="close-modal py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" data-hs-overlay="#hs-scale-animation-modal">
                           Close
                     </button>
                     <button
                        type="submit"
                        class="ml-3 text-white bg-green-600 hover:bg-green-800 font-medium rounded-lg text-sm px-5 py-2.5"
                     >
                        Create User
                     </button>
                  </div>
               </form>
           </div>
       </div>
   </div>
</div>
