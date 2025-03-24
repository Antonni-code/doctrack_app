{{-- @props(['offices'])
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
               <form id="addUserForm" action="#" method="POST">
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
</div> --}}
@props(['offices'])
<div id="hs-scale-animation-modal" class="hidden fixed inset-0 z-[888] h-screen w-screen flex justify-center items-center bg-black/60 backdrop-blur-sm dark:bg-black/80" role="dialog" tabindex="-1" aria-labelledby="hs-scale-animation-modal-label">
   <div class="hs-overlay-animation-target hs-overlay-open:scale-100 hs-overlay-open:opacity-100 scale-95 opacity-0 ease-out transition-all duration-300 sm:max-w-md w-full m-3 sm:mx-auto flex items-center">
       <div class="w-full flex flex-col bg-white border-0 shadow-lg rounded-xl overflow-hidden dark:bg-gray-800">
           <!-- Header -->
           <div class="flex justify-between items-center py-3 px-4 border-b border-gray-100 dark:border-gray-700">
               <h3 id="hs-scale-animation-modal-label" class="flex items-center gap-2 text-base font-semibold text-gray-800 dark:text-white">
                   <svg class="size-5 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M19 7.5v3m0 0v3m0-3h3m-3 0h-3m-2.25-4.125a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zM4 19.235v-.11a6.375 6.375 0 0112.75 0v.109A12.318 12.318 0 0110.374 21c-2.331 0-4.512-.645-6.374-1.766z" />
                   </svg>
                   Add New User
               </h3>
               <button type="button"
               class="close-modal flex justify-center items-center size-8 rounded-full text-gray-500 hover:text-gray-700 hover:bg-gray-100 transition-colors focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:text-gray-200 dark:hover:bg-gray-700 dark:focus:ring-gray-700"
               aria-label="Close"
               data-hs-overlay="#hs-scale-animation-modal"
               id="closeModalButton">
                   <span class="sr-only">Close</span>
                   <svg class="size-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                       <path d="M18 6 6 18"></path>
                       <path d="m6 6 12 12"></path>
                   </svg>
               </button>
           </div>

           <!-- Body -->
           <div class="p-4 overflow-y-auto space-y-4">
               <form id="addUserForm" action="#" method="POST" class="space-y-4">
                  @csrf

                  <!-- Full Name -->
                  <div class="space-y-1">
                     <label for="name" class="text-sm font-medium flex items-center gap-1 text-gray-700 dark:text-gray-300">
                        Full Name <span class="text-red-500">*</span>
                     </label>
                     <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                           <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                           </svg>
                        </div>
                        <input
                           type="text"
                           id="name"
                           name="name"
                           required
                           class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                           placeholder="John Doe"
                        />
                     </div>
                  </div>

                  <!-- Email -->
                  <div class="space-y-1">
                     <label for="email" class="text-sm font-medium flex items-center gap-1 text-gray-700 dark:text-gray-300">
                        Email <span class="text-red-500">*</span>
                     </label>
                     <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                           <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75" />
                           </svg>
                        </div>
                        <input
                           type="email"
                           id="email"
                           name="email"
                           required
                           class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                           placeholder="john@example.com"
                        />
                     </div>
                  </div>

                  <!-- Office -->
                  <div class="space-y-1">
                     <label for="office" class="text-sm font-medium flex items-center gap-1 text-gray-700 dark:text-gray-300">
                        Office <span class="text-red-500">*</span>
                     </label>
                     <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                           <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
                           </svg>
                        </div>
                        <select
                           id="office"
                           name="office_id"
                           required
                           class="w-full pl-10 pr-3 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white appearance-none"
                        >
                           <option value="" disabled selected>Select an office</option>
                           @foreach ($offices as $office)
                              <option value="{{ $office->id }}">{{ $office->name }}</option>
                           @endforeach
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                           <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                           </svg>
                        </div>
                     </div>
                  </div>

                  <!-- Two columns layout for Designation and Role -->
                  <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                     <!-- Designation -->
                     <div class="space-y-1">
                        <label for="designation" class="text-sm font-medium flex items-center gap-1 text-gray-700 dark:text-gray-300">
                           Designation <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                           <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 14.15v4.25c0 1.094-.787 2.036-1.872 2.18-2.087.277-4.216.42-6.378.42s-4.291-.143-6.378-.42c-1.085-.144-1.872-1.086-1.872-2.18v-4.25m16.5 0a2.18 2.18 0 00.75-1.661V8.706c0-1.081-.768-2.015-1.837-2.175a48.114 48.114 0 00-3.413-.387m4.5 8.006c-.194.165-.42.295-.673.38A23.978 23.978 0 0112 15.75c-2.648 0-5.195-.429-7.577-1.22a2.016 2.016 0 01-.673-.38m0 0A2.18 2.18 0 013 12.489V8.706c0-1.081.768-2.015 1.837-2.175a48.111 48.111 0 013.413-.387m7.5 0V5.25A2.25 2.25 0 0013.5 3h-3a2.25 2.25 0 00-2.25 2.25v.894m7.5 0a48.667 48.667 0 00-7.5 0M12 12.75h.008v.008H12v-.008z" />
                              </svg>
                           </div>
                           <select
                              id="designation"
                              name="designation"
                              required
                              class="w-full pl-10 pr-8 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white appearance-none"
                           >
                              <option value="" disabled selected>Select designation</option>
                              <option value="Manager">Manager</option>
                              <option value="Assistant">Assistant</option>
                              <option value="Director">Director</option>
                           </select>
                           <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>
                           </div>
                        </div>
                     </div>

                     <!-- Role -->
                     <div class="space-y-1">
                        <label for="role" class="text-sm font-medium flex items-center gap-1 text-gray-700 dark:text-gray-300">
                           Role <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                           <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z" />
                              </svg>
                           </div>
                           <select
                              id="role"
                              name="role"
                              required
                              class="w-full pl-10 pr-8 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white appearance-none"
                           >
                              <option value="" disabled>Select role</option>
                              <option value="admin">Admin</option>
                              <option value="staff" selected>Staff</option>
                           </select>
                           <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-gray-500">
                              <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                 <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                              </svg>
                           </div>
                        </div>
                     </div>
                  </div>

                  <!-- Password fields with strength indicator -->
                  <div class="space-y-1">
                     <label for="password" class="text-sm font-medium flex items-center gap-1 text-gray-700 dark:text-gray-300">
                        Password <span class="text-red-500">*</span>
                     </label>
                     <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                           <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                           </svg>
                        </div>
                        <input
                           type="password"
                           id="password"
                           name="password"
                           required
                           class="w-full pl-10 pr-10 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                           placeholder="••••••••"
                        />
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                           <svg class="size-4 toggle-password" data-target="password" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                           </svg>
                        </button>
                     </div>
                     <!-- Password strength indicator -->
                     <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden dark:bg-gray-700">
                        <div class="h-1 bg-green-500 rounded-full transition-all duration-300" style="width: 70%;"></div>
                     </div>
                     <p class="text-xs text-gray-500 dark:text-gray-400">Password must be at least 8 characters</p>
                  </div>

                  <!-- Confirm Password -->
                  <div class="space-y-1">
                     <label for="password_confirmation" class="text-sm font-medium flex items-center gap-1 text-gray-700 dark:text-gray-300">
                        Confirm Password <span class="text-red-500">*</span>
                     </label>
                     <div class="relative">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none text-gray-500">
                           <svg class="size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                           </svg>
                        </div>
                        <input
                           type="password"
                           id="password_confirmation"
                           name="password_confirmation"
                           required
                           class="w-full pl-10 pr-10 py-2 rounded-lg border border-gray-200 bg-gray-50 text-gray-800 focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                           placeholder="••••••••"
                        />
                        <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-gray-500 hover:text-gray-700 dark:hover:text-gray-300">
                           <svg class="size-4 toggle-password" data-target="password_confirmation" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                              <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                           </svg>
                        </button>
                     </div>
                  </div>
               </form>
           </div>

           <!-- Footer -->
           <div class="flex justify-end items-center gap-2 py-3 px-4 border-t border-gray-100 bg-gray-50 dark:bg-gray-800 dark:border-gray-700">
               <button type="button" class="close-modal py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-all dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:hover:bg-gray-600">
                   Cancel
               </button>
               <button
                  type="submit"
                  form="addUserForm"
                  class="py-2 px-3 inline-flex items-center gap-x-1 text-sm font-medium rounded-lg border border-blue-600 bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-1 transition-all dark:bg-blue-600 dark:hover:bg-blue-700"
               >
                  <svg class="size-3.5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                  </svg>
                  Create User
               </button>
           </div>
       </div>
   </div>
</div>
<!-- Optional: JavaScript for password toggle visibility -->
<script>
   document.addEventListener('DOMContentLoaded', function() {
       const toggleButtons = document.querySelectorAll('.toggle-password');

       toggleButtons.forEach(button => {
           button.addEventListener('click', function() {
               const targetId = this.getAttribute('data-target');
               const input = document.getElementById(targetId);

               if (input.type === 'password') {
                   input.type = 'text';
                   this.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88" />`;
               } else {
                   input.type = 'password';
                   this.innerHTML = `<path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z" />
                   <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />`;
               }
           });
       });
   });
</script>
