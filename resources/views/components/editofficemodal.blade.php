<!-- Edit Office Modal -->
<div id="editOfficeModal" class="hidden fixed inset-0 z-[888] h-screen w-screen justify-center place-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm">
   <div class="bg-white rounded-lg shadow-xl w-full max-w-md p-6">
      <div class="flex justify-between items-center border-b pb-3">
         <h3 class="text-lg font-medium" id="modalTitle">Edit Office</h3>
         <button type="button" id="closeModalBtn" class="text-gray-500 hover:text-gray-700">&times;</button>
      </div>
      <form id="editOfficeForm" method="POST"  class="mt-4">
         @csrf
         @method('PUT')
         <input type="hidden" id="officeId" name="id">
         <div class="mb-4">
            <label for="officeName" class="block text-sm font-medium text-gray-700">Office Name</label>
            <input type="text" id="officeName" name="name" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
         </div>
         <div class="mb-4">
            <label for="officeLocation" class="block text-sm font-medium text-gray-700">Location</label>
            <input type="text" id="officeLocation" name="location" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
         </div>
         <div class="mb-4">
            <label for="officeCode" class="block text-sm font-medium text-gray-700">Code</label>
            <input type="text" id="officeCode" name="code" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
         </div>
         <div class="flex justify-end">
            <button type="button" id="saveOfficeBtn" class="bg-blue-600 text-white px-4 py-2 rounded-md">Save</button>
         </div>
      </form>
   </div>
</div>
