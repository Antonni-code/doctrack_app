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
