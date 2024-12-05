$(document).ready(function () {
   // When the Add Member button is clicked
   $('[data-modal-target="addUserModal"]').on('click', function () {
      // Get the user create URL from the data attribute
      var userCreateUrl = $(this).data('user-create-url');

      // Store the URL in a global variable or directly use it in the form submission
      window.userCreateUrl = userCreateUrl;
   });
    // Add user submission
   $('#addUserForm').on('submit', function (e) {
       e.preventDefault();

       // Get form data
       var formData = $(this).serialize();

       // Perform the add user action via AJAX
       $.ajax({
          url: window.userCreateUrl,  // Use the URL passed from the button
          method: 'POST',
          data: formData,
          success: function (response) {
             // Show success toast
             showToast('success', response.message);
             // Optionally reload the page or update the DOM
             window.location.reload();
          },
          error: function (xhr) {
             // Show error toast
             const errorMessage = xhr.responseJSON?.message || 'An error occurred while adding the user.';
             showToast('error', errorMessage);
          }
       });
   });

   // Open the delete modal and set the form action
   $('button#deleteButton').on('click', function () {
      var userId = $(this).data('user-id'); // Ensure this matches the button's attribute
      var userName = $(this).data('user-name');

      if (!userId) {
         console.error("User ID is missing for the delete action!");
         return;
      }

      // Set the modal's user name
      $('#userNameToDelete').text(userName);

      // Dynamically set the form's action URL
      // Replace :id in the route with the actual user ID
      var actionUrl = window.deleteUserRoute.replace(':id', userId); // Use the global route
      console.log('Generated action URL:', actionUrl);

      $('#deleteUserForm').attr('action', actionUrl);
      $('#deleteUserId').val(userId); // Set the hidden user_id input
      $('#deleteModal').removeClass('hidden'); // Open modal
   });

   // Close the modal
   $('#cancelDeleteButton, #closeModalButton').on('click', function () {
      $('#deleteModal').addClass('hidden');
   });

   // Handle the confirmation of delete
   $('#confirmDeleteButton').on('click', function () {
      var userId = $('#deleteUserId').val(); // Use the hidden input for the user ID

      // Perform the delete action via AJAX
      $.ajax({
         url: window.deleteUserRoute.replace(':id', userId), // Replace placeholder with actual ID
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
            const errorMessage = xhr.responseJSON?.message || 'An error occurred while deleting the user.';
            showToast('error', errorMessage);
         }
      });

      // Prevent any default form submission or link behavior
      return false;
   });

   // Reactivate user action
   $('button#reactivateButton').on('click', function () {
      var userId = $(this).data('user-id'); // Get the user ID from the button
      var userName = $(this).data('user-name'); // Get the user name

      if (!userId) {
         console.error("User ID is missing for the reactivation action!");
         return;
      }

      // Open Reactivate Modal and set the form data
      $('#userNameToReactivate').text(userName);
      $('#reactivateUserId').val(userId); // Set hidden input value

      $('#reactivateModal').removeClass('hidden'); // Open modal
   });

   // Close the Reactivate Modal
   $('#cancelReactivateButton, #closeReactivateModalButton').on('click', function () {
      $('#reactivateModal').addClass('hidden');
   });

   // Confirm Reactivate user
   $('#confirmReactivateButton').on('click', function (e) {
      e.preventDefault();
      var userId = $('#reactivateUserId').val(); // Get the user ID from the hidden input

      // Perform the reactivation via AJAX
      $.ajax({
         url: window.restoreUserRoute.replace(':id', userId),  // Use the global route
         method: 'POST',
         headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Get CSRF token from meta tag
         },
         success: function (response) {
            $('#reactivateModal').addClass('hidden'); // Close modal
            showToast('success', response.message); // Show success toast
            window.location.reload(); // Reload the page or update DOM
         },
         error: function (xhr) {
            $('#reactivateModal').addClass('hidden');
            const errorMessage = xhr.responseJSON?.message || 'An error occurred while reactivating the user.';
            showToast('error', errorMessage);
         }
      });
   });

   //Edit section here
         // Select all edit buttons and modal elements
         const editButtons = document.querySelectorAll('.edit-button');
         const editModal = document.getElementById('editModal');
         const cancelEditButton = document.getElementById('cancelEditButton');
         const editForm = document.getElementById('editUserForm');

         // Select modal fields
         const editName = document.getElementById('editName');
         const editEmail = document.getElementById('editEmail');
         const editRole = document.getElementById('editRole');
         const editOffice = document.getElementById('editOffice');
         const editDesignation = document.getElementById('editDesignation');

         // Attach event listener to each edit button
         editButtons.forEach((button) => {
            button.addEventListener('click', () => {
               // Get data attributes from the button
               const userId = button.getAttribute('data-user-id');
               const userName = button.getAttribute('data-user-name');
               const userEmail = button.getAttribute('data-user-email');
               const userRole = button.getAttribute('data-user-role');
               const userOffice = button.getAttribute('data-user-office');
               const userDesignation = button.getAttribute('data-user-designation');

               // Populate the modal fields with the fetched data
               editName.value = userName;
               editEmail.value = userEmail;
               editRole.value = userRole;
               editOffice.value = userOffice;
               editDesignation.value = userDesignation;

               // Update the form action to point to the correct user route
               editForm.action = `/users/${userId}`;
               editForm.method = 'POST'; // This ensures the form will be submitted as POST for Laravel
               const methodField = document.createElement('input');
               methodField.setAttribute('type', 'hidden');
               methodField.setAttribute('name', '_method');
               methodField.setAttribute('value', 'PUT');
               editForm.appendChild(methodField);

               // Show the modal
               editModal.classList.remove('hidden');
               editModal.classList.add('flex');
            });
         });

         // Handle form submission via AJAX
         editForm.addEventListener('submit', (event) => {
            event.preventDefault(); // Prevent default form submission

            // Example AJAX request for form submission
            const formData = new FormData(editForm);

            $.ajax({
               url: editForm.action,  // Use the URL set in the form action
               method: 'POST',  // Use POST method because we added the _method field for PUT
               data: formData,
               processData: false,
               contentType: false,
               headers: {
                     'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                     'Accept': 'application/json',
               },
               success: function (response) {
                     // Close the modal
                     editModal.classList.add('hidden');
                     editModal.classList.remove('flex');

                     // Show success toast and reload page after success
                     showToast('success', 'User data successfully updated!', true);
                     // Optionally reload the page or update the DOM
                     window.location.reload();
               },
               error: function (xhr) {
                     // Handle error cases
                     const errorMessage = xhr.responseJSON?.message || 'Failed to update user data. Please try again.';
                     showToast('error', errorMessage);
               }
            });
         });

         // Close modal when cancel button is clicked
         cancelEditButton.addEventListener('click', () => {
            editModal.classList.add('hidden');
            editModal.classList.remove('flex');
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
