$(document).ready(function () {
   // Set up CSRF token for all AJAX requests
   $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
   });

   // Add Office
   $("#addOfficeButton").on("click", function (e) {
      e.preventDefault();
      // Open the modal to add office
      $("#hs-scale-animation-modal").removeClass("hidden").addClass("flex");
   });

   // Handle Form Submission via AJAX (add office)
   $("#officeForm").on("submit", function (e) {
      e.preventDefault(); // Prevent default form submission

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
         error: function () {
            showToast('error', "Failed to add office.");
         },
      });

      // Close modal after submitting the form
      $("#hs-scale-animation-modal").removeClass("flex").addClass("hidden");
   });

   // Reset the Add form when any close button is clicked
   $(document).on('click', '.close-modal', function () {
      // Select the form element
      const form = document.getElementById('officeForm');
      // Reset the form fields
      form.reset();
   });

   // Edit Office
   $(".edit-office").on("click", function () {
         const officeId = $(this).data("id");

         // Fetch Office Data
         $.ajax({
            url: `/dashboard/maintenance/offices/${officeId}`,
            method: "GET",
            success: function (office) {
               // Populate Modal Fields
               $("#officeId").val(office.id);
               $("#officeName").val(office.name);
               $("#officeLocation").val(office.location);
               $("#officeCode").val(office.code);

               // Set form action dynamically
               $("#editOfficeForm").attr("action", `/dashboard/maintenance/offices/${office.id}`);

               // Show Modal for Editing
               $("#editOfficeModal").removeClass("hidden").addClass("flex");
            },
            error: function () {
               showToast('error', "Failed to fetch office details.");
            },
         });
   });

   // Save Edited Office
   $("#saveOfficeBtn").on("click", function () {
         const officeId = $("#officeId").val();
         const data = {
            _method: 'PUT',
            name: $("#officeName").val(),
            location: $("#officeLocation").val(),
            code: $("#officeCode").val(),
         };

         $.ajax({
            url: `/dashboard/maintenance/offices/${officeId}`,
            method: "POST", // Use POST with _method set to PUT
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

   // Close Modal
   $("#closeModalBtn").on("click", function () {
      $("#editOfficeModal").removeClass("flex").addClass("hidden");
   });

   // Open the delete modal and set the form action
   $('button#deleteButton').on('click', function () {
      var officeId = $(this).data('office-id'); // Ensure this matches the button's attribute
      var officeName = $(this).data('office-name');

      if (!officeId) {
         console.error("Office ID is missing for the delete action!");
         return;
      }

      // Set the modal's user name
      $('#officeNameToDelete').text(officeName);

      // Dynamically set the form's action URL
      var actionUrl = window.deleteOfficeRoute.replace(':id', officeId); // Use the global route
      console.log('Generated action URL:', actionUrl);

      $('#deleteOfficeForm').attr('action', actionUrl);
      $('#deleteOfficeId').val(officeId); // Set the hidden user_id input
      $('#deleteModal').removeClass('hidden'); // Open modal
   });

   // Close the modal
   $('#cancelDeleteButton, #closeModalButton').on('click', function () {
      $('#deleteModal').addClass('hidden');
   });

   // Handle the confirmation of delete
   $('#confirmDeleteButton').on('click', function () {
      var officeId = $('#deleteOfficeId').val(); // Use the hidden input for the user ID

      // Perform the delete action via AJAX
      $.ajax({
         url: window.deleteOfficeRoute.replace(':id', officeId), // Replace placeholder with actual ID
         method: 'DELETE',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
         },
         success: function (response) {
            // Close the modal
            $('#deleteModal').addClass('hidden');

            // Show success toast
            showToast('success', response.message);

            // Optionally, refresh the page or update the UI
            window.location.reload();
         },
         error: function (xhr) {
            // Close the modal
            $('#deleteModal').addClass('hidden');

            // Show error toast
            const errorMessage = xhr.responseJSON?.message || 'An error occurred while deleting the office.';
            showToast('error', errorMessage);
         }
      });

      // Prevent any default form submission or link behavior
      return false;
   });

   // Function to show toast notifications
   function showToast(type, message) {
         const toastConfig = {
            normal: {
               color: 'text-blue-500',
               icon: '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>',
            },
            success: {
               color: 'text-teal-500',
               icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>',
            },
            error: {
               color: 'text-red-500',
               icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>',
            },
            warning: {
               color: 'text-yellow-500',
               icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>',
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
                  <p class="text-sm text-gray-700 dark:text-neutral-400">${message}</p>
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
