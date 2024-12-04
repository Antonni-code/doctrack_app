<div id="editModal" class="hidden fixed inset-0 z-[999] h-screen w-screen justify-center place-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm">
   <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-md">
      <h2 class="text-xl font-semibold mb-4">Edit User</h2>
         <form id="editUserForm" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="mb-4">
               <label for="editUserName" class="block text-sm font-medium text-gray-700">Name</label>
               <input type="text" id="editUserName" name="name" value="{{ $user->name }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <!-- Email -->
            <div class="mb-4">
               <label for="editUserEmail" class="block text-sm font-medium text-gray-700">Email</label>
               <input type="email" id="editUserEmail" name="email" value="{{ $user->email }}" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <!-- Role -->
            <div class="mb-4">
               <label for="editRole" class="block text-sm font-medium text-gray-700">Role</label>
               <select id="editRole" name="role" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                  <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
               </select>
            </div>

            <!-- Password -->
            <div class="mb-4">
               <label for="editUserPassword" class="block text-sm font-medium text-gray-700">Password</label>
               <input type="password" id="editUserPassword" name="password" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
            </div>

            <!-- Office -->
            <div class="mb-4">
               <label for="editoffice" class="block text-sm font-medium text-gray-700">Office</label>
               <select id="editoffice" name="office" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <option value="Office A" {{ $user->office == 'Office A' ? 'selected' : '' }}>Office A</option>
                  <option value="Office B" {{ $user->office == 'Office B' ? 'selected' : '' }}>Office B</option>
                  <option value="Office C" {{ $user->office == 'Office C' ? 'selected' : '' }}>Office C</option>
               </select>
            </div>

            <!-- Designation -->
            <div class="mb-4">
               <label for="editdesignation" class="block text-sm font-medium text-gray-700">Designation</label>
               <select id="editdesignation" name="designation" required class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                  <option value="Manager" {{ $user->designation == 'Manager' ? 'selected' : '' }}>Manager</option>
                  <option value="Assistant" {{ $user->designation == 'Assistant' ? 'selected' : '' }}>Assistant</option>
                  <option value="Director" {{ $user->designation == 'Director' ? 'selected' : '' }}>Director</option>
               </select>
            </div>

            <div class="flex justify-end">
               <button type="button" id="cancelEditButton" class="text-gray-700 hover:text-gray-900 mr-2">Cancel</button>
               <button type="submit" id="confirmEditButton" class="bg-blue-500 text-white px-4 py-2 rounded-md">Save</button>
            </div>
         </form>
      </div>
  </div>
