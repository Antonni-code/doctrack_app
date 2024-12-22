$(document).ready(function () {
   // Set up CSRF token for all AJAX requests
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
       },
   });

   // Add Class
   $("#addClassButton").on("click", function (e) {
       e.preventDefault();
       // Open the modal to add class
       $("#hs-scale-animation-modal").removeClass("hidden").addClass("flex");
   });

   // Handle Form Submission via AJAX (add class)
   $("#classForm").on("submit", function (e) {
       e.preventDefault(); // Prevent default form submission

       const data = {
           name: $("#name").val(), // Updated to match the correct id in the form
           sub_class: $("#sub-class").val(), // Updated to match the correct id in the form
       };

       $.ajax({
           url: "/dashboard/maintenance/sub-category", // Correct URL based on your route
           method: "POST",
           data: data,
           success: function () {
               showToast("success", "Class added successfully!");
               location.reload(); // Reload the page to reflect changes
           },
           error: function () {
               showToast("error", "Failed to add class.");
           },
       });

       // Close modal after submitting the form
       $("#hs-scale-animation-modal").removeClass("flex").addClass("hidden");
   });

   // Function to show toast notifications
   function showToast(type, message) {
       const toastConfig = {
           normal: {
               color: "text-blue-500",
               icon: '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>',
           },
           success: {
               color: "text-teal-500",
               icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>',
           },
           error: {
               color: "text-red-500",
               icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>',
           },
       };

       const { color, icon } = toastConfig[type] || toastConfig["normal"];

       const toast = document.createElement("div");
       toast.className = "max-w-xl bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700";
       toast.setAttribute("role", "alert");
       toast.innerHTML = `
           <div class="flex p-4">
               <div class="shrink-0">
                   <svg class="shrink-0 size-4 ${color} mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                       ${icon}
                   </svg>
               </div>
               <div class="ms-3">
                   <p class="text-sm text-gray-700 dark:text-neutral-400">${message}</p>
               </div>
           </div>
       `;
       const toastContainer = document.querySelector(".space-y-3") || document.body;
       toastContainer.appendChild(toast);

       setTimeout(() => {
           toast.remove();
       }, 5000);
   }
});
