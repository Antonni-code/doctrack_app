<div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div>
<div id="toast-template" class="hidden toast items-center space-x-4 bg-white shadow-lg rounded-lg p-4 border-l-4 animate-fadeIn">
   <!-- Success Toast -->
   <div
     class="toast flex items-center space-x-4 bg-white shadow-lg rounded-lg p-4 border-l-4 border-green-500"
     role="alert"
     data-type="success"
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

   <!-- Error Toast -->
   <div
     class="toast flex items-center space-x-4 bg-white shadow-lg rounded-lg p-4 border-l-4 border-red-500"
     role="alert"
     data-type="error"
   >
     <div class="flex items-center justify-center bg-red-100 p-2 rounded-full">
       <svg class="w-6 h-6 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
         <path
           d="M12 0a12 12 0 1012 12A12 12 0 0012 0zm0 22a10 10 0 1110-10 10 10 0 01-10 10zm0-14a1 1 0 00-1 1v4a1 1 0 002 0v-4a1 1 0 00-1-1zm0 8a1.5 1.5 0 101.5 1.5A1.5 1.5 0 0012 16z"
         />
       </svg>
     </div>
     <div>
       <p class="font-semibold text-red-700 message-text">Error</p>
       <p class="text-sm text-gray-600 sub-text">Something went wrong.</p>
     </div>
     <button class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring focus:ring-gray-300 close-toast">
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

   <!-- Info Toast -->
   <div
   class="toast flex items-center space-x-4 bg-white shadow-lg rounded-lg p-4 border-l-4 border-blue-500"
   role="alert"
   data-type="info"
   >
      <div class="flex items-center justify-center bg-blue-100 p-2 rounded-full">
      <svg class="w-6 h-6 text-blue-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
         <path
            d="M12 0a12 12 0 1012 12A12 12 0 0012 0zm0 22a10 10 0 1110-10 10 10 0 01-10 10zm-.75-15h1.5v1.5h-1.5zm0 3h1.5v7.5h-1.5z"
         />
      </svg>
      </div>
      <div>
      <p class="font-semibold text-blue-700 message-text">Info</p>
      <p class="text-sm text-gray-600 sub-text">Helpful information for you.</p>
      </div>
      <button class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring focus:ring-gray-300 close-toast">
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

   <!-- Warning Toast -->
   <div
   class="toast flex items-center space-x-4 bg-white shadow-lg rounded-lg p-4 border-l-4 border-yellow-500"
   role="alert"
   data-type="warning"
   >
      <div class="flex items-center justify-center bg-yellow-100 p-2 rounded-full">
      <svg class="w-6 h-6 text-yellow-500" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
         <path
            d="M12 0a12 12 0 1012 12A12 12 0 0012 0zm0 22a10 10 0 1110-10 10 10 0 01-10 10zm-.75-16.5h1.5v7.5h-1.5zm0 9h1.5v1.5h-1.5z"
         />
      </svg>
      </div>
      <div>
      <p class="font-semibold text-yellow-700 message-text">Warning</p>
      <p class="text-sm text-gray-600 sub-text">Warning message.</p>
      </div>
      <button class="text-gray-400 hover:text-gray-700 focus:outline-none focus:ring focus:ring-gray-300 close-toast">
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

{{-- Usage of toast --}}
{{-- Success
showToast('success', 'Action Successful!', 'Your operation was completed successfully.');
Error
showToast('error', 'Error Occurred!', 'There was a problem processing your request.');
Info
showToast('info', 'Heads Up!', 'This is some helpful information.');
Warning
showToast('warning', 'Caution!', 'Please double-check your inputs.'); --}}
