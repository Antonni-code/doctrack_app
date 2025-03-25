{{-- Delete modal --}}
<div id="deleteModal" class="hidden fixed inset-0 z-[999] h-screen w-screen justify-center place-items-center content-center bg-black bg-opacity-60 backdrop-blur-sm">
   <div class="relative m-4 p-4 w-2/5 min-w-[40%] max-w-[40%] rounded-lg bg-white shadow-sm">
      <div class="p-4 md:p-5 text-center">
         <svg class="mx-auto mb-4 text-gray-400 w-12 h-12" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
               <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
         </svg>
         <h3 class="mb-5 text-lg font-normal text-gray-500">Are you sure you want to delete Office: <span class="text-red-600 uppercase" id="officeNameToDelete"></span>?</h3>
         <!-- Form for deleting user -->
         <div class="flex justify-center">
            <form id="deleteOfficeForm" method="POST" action="#">
               @csrf
               {{method_field('delete')}}
               <input type="hidden" id="deleteOfficeId" name="office_id">
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
