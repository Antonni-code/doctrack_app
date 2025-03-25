<!-- Edit Category Modal -->
<div id="editCategoryModal" class="hidden fixed inset-0 z-[888] flex items-center justify-center bg-black bg-opacity-60 backdrop-blur-sm">
   <div class="w-full sm:max-w-lg bg-white rounded-lg shadow-lg p-6">
       <div class="flex justify-between items-center border-b pb-3 mb-4">
           <h3 class="text-xl font-semibold text-gray-800">Edit Category</h3>
           <button type="button" class="close-modal text-gray-500 hover:text-gray-700">
               <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                   <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
               </svg>
           </button>
       </div>
       <form id="editCategoryForm">
           @csrf
           @method('PUT')
           <input type="hidden" id="editCategoryId" name="id">
           <div class="mb-4">
            <label for="editCategoryName" class="block text-sm font-medium text-gray-700">Category Name</label>
            <select id="editCategoryName" name="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
               <option selected>Select classification</option>
               @foreach ($categories as $category)
                  <option value="{{ $category->name }}" {{ old('name', $category->name) == $category->name ? 'selected' : '' }}>
                     {{ $category->name }}
                  </option>
               @endforeach
            </select>
         </div>

           <div class="mb-4">
               <label for="editSubClass" class="block text-sm font-medium text-gray-700">Sub-class</label>
               <input type="text" id="editSubClass" name="sub_class" class="mt-1 block w-full border-gray-300 rounded-lg p-2">
           </div>
           <div class="flex justify-end">
               <button type="button" class="close-modal py-2 px-4 text-sm font-medium text-gray-600 border rounded-lg hover:bg-gray-200">
                   Close
               </button>
               <button type="submit" class="ml-2 py-2 px-4 text-sm font-medium text-white bg-blue-600 border rounded-lg hover:bg-blue-700">
                   Save Changes
               </button>
           </div>
       </form>
   </div>
</div>
<!-- Add this script to remove duplicate options -->
<script>
   document.addEventListener('DOMContentLoaded', function () {
      const selectElement = document.getElementById('editCategoryName');
      const options = selectElement.querySelectorAll('option');
      const seen = new Set();

      options.forEach(option => {
         if (seen.has(option.value)) {
            option.remove();  // Remove duplicate options
         } else {
            seen.add(option.value);  // Add unique options to the set
         }
      });
   });
</script>
