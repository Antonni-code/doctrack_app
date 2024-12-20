$(document).ready(function () {
   // Set up CSRF token for all AJAX requests
   $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
   });

   // Add Office
   $("#addOfficeButton").on("click", function () {
       const data = {
           name: $("#name").val(),
           location: $("#location").val(),
           code: $("#code").val(),
       };

       $.ajax({
           url: "/dashboard/maintenance/offices", // Make sure URL matches the route
           method: "POST",
           data: data,
           success: function () {
               showToast('success', "Office added successfully!");
               location.reload(); // Reload the page to reflect changes
           },
           error: function (xhr) {
               showToast('error', "Failed to add office.");
           },
       });
   });

   // Edit Office
   $(".edit-office").on("click", function () {
       const officeId = $(this).data("id");

       // Fetch Office Data
       $.ajax({
           url: `/offices/${officeId}`,
           method: "GET",
           success: function (office) {
               // Populate Modal Fields
               $("#officeId").val(office.id);
               $("#name").val(office.name);
               $("#location").val(office.location);
               $("#code").val(office.code);

               // Show Modal for Editing
               $("#officeModal").show();
           },
           error: function () {
               showToast('error', "Failed to fetch office details.");
           },
       });
   });

   // Save Edited Office
   $("#saveOfficeButton").on("click", function () {
       const officeId = $("#officeId").val();
       const data = {
           name: $("#name").val(),
           location: $("#location").val(),
           code: $("#code").val(),
       };

       $.ajax({
           url: `/offices/${officeId}`,
           method: "PUT",
           data: data,
           success: function () {
               showToast('success', "Office updated successfully!");
               location.reload(); // Reload to reflect changes
           },
           error: function () {
               showToast('error', "Failed to update office.");
           },
       });
   });

   // Delete Office
   $(".delete-office").on("click", function () {
       const officeId = $(this).data("id");

       if (confirm("Are you sure you want to delete this office?")) {
           $.ajax({
               url: `/offices/${officeId}`,
               method: "DELETE",
               success: function () {
                   showToast('success', "Office deleted successfully!");
                   location.reload(); // Reload to reflect changes
               },
               error: function () {
                   showToast('error', "Failed to delete office.");
               },
           });
       }
   });

   // Function to show toast notifications
   function showToast(type, message) {
       const toastConfig = {
           normal: {
               color: 'text-blue-500',
               icon: `<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>`,
           },
           success: {
               color: 'text-teal-500',
               icon: `<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>`,
           },
           error: {
               color: 'text-red-500',
               icon: `<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>`,
           },
           warning: {
               color: 'text-yellow-500',
               icon: `<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>`,
           },
       };

       // Get the configuration for the provided type
       const { color, icon } = toastConfig[type] || toastConfig['normal'];

       // Create the toast element
       const toast = document.createElement('div');
       toast.className = 'max-w-xl bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700';
       toast.setAttribute('role', 'alert');
       toast.innerHTML = `
           <div class="flex p-4">
               <div class="shrink-0">
                   <svg class="shrink-0 size-4 ${color} mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                       ${icon}
                   </svg>
               </div>
               <div class="ms-3">
                   <p class="text-sm text-gray-700 dark:text-neutral-400">
                       ${message}
                   </p>
               </div>
           </div>
       `;

       // Append the toast to the container
       const toastContainer = document.querySelector('.space-y-3') || document.body;
       toastContainer.appendChild(toast);

       // Automatically remove the toast after 5 seconds
       setTimeout(() => {
           toast.remove();
       }, 5000);
   }
});
