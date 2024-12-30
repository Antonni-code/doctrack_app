<div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div>
<div id="toast-template" class="hidden">
   <div
     class="toast flex items-center space-x-4 bg-white shadow-lg rounded-lg p-4 border-l-4 border-green-500"
     role="alert"
   >
     <div class="flex items-center justify-center bg-green-100 p-2 rounded-full">
       <svg
         class="w-6 h-6 text-green-500"
         xmlns="http://www.w3.org/2000/svg"
         fill="currentColor"
         viewBox="0 0 24 24"
       >
         <path
           d="M12 0a12 12 0 1012 12A12 12 0 0012 0zm0 22a10 10 0 1110-10 10 10 0 01-10 10zm5.93-13.59l-6.93 6.93-3.93-3.93 1.41-1.41L11 12.59l5.52-5.52z"
         />
       </svg>
     </div>
     <div>
       <p class="font-semibold text-green-700 message-text">Success</p>
       <p class="text-sm text-gray-600 sub-text">Everything seems great.</p>
     </div>
     <button
       class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring focus:ring-gray-300 close-toast"
     >
       <svg
         class="w-5 h-5"
         xmlns="http://www.w3.org/2000/svg"
         fill="currentColor"
         viewBox="0 0 24 24"
       >
         <path
           d="M18.36 5.64l-1.41-1.41L12 9.59 7.05 4.64 5.64 6.05 10.59 11l-4.95 4.95 1.41 1.41L12 12.41l4.95 4.95 1.41-1.41L13.41 11l4.95-4.95z"
         />
       </svg>
     </button>
   </div>
</div>
