@props(['offices'])
<div id="addUserModal" class="hidden fixed inset-0 z-50 items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm">

   <div class="bg-white rounded-lg shadow-lg w-3/4 max-w-2xl">
      <!-- Modal Header -->
      <div class="flex items-center justify-between px-4 py-3 border-b">
         <h3 class="text-lg font-semibold text-gray-800">Add New User</h3>
      </div>

      <!-- Modal Content -->
      <div class="p-4">

         <form
            id="addUserForm"
            action="{{ route('user.create') }}"
            method="POST"
            class="space-y-4"
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
               <button
                  id="cancelAddUserButton"
                  type="button"
                  class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white rounded-lg border hover:bg-gray-100 hover:text-red-700"
               >
                  Cancel
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
