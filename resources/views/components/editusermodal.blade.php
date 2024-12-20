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
                   class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm" readonly>
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

         <!-- New Password -->
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
               @foreach ($offices as $office)
                  <option value="{{ $office->id }}" {{ $user->office_id == $office->id ? 'selected' : '' }}>
                        {{ $office->name }}
                  </option>
               @endforeach
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
