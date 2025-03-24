$(document).ready(function () {
   $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
   });

  // Clear sub-classification dropdown when classification changes
   $('#classification').on('change', function () {
      $('#sub_classification').val(null).trigger('change'); // Clear selection
   });

   // Function to generate a random document code
   function generateDocumentCode() {
         const year = new Date().getFullYear(); // Current year
         const prefix = 'DOC';
         const randomCode = Math.floor(Math.random() * 90000) + 10000; // Random number between 10000 and 99999
         return `${prefix}-${year}-${randomCode}`;
   }

   // When the modal is about to be shown
   $('[data-modal-toggle="extralarge-modal"]').on('click', function () {
         // Generate a new document code
         const documentCodeElement = $('#document-code');
         const documentCode = generateDocumentCode();
         documentCodeElement.text(documentCode); // Update the document code in the modal
         console.log('Generated Document Code:', documentCode); // Debugging

         // Optionally set this code in a hidden input for form submission
         $('#hidden-document-code-input').val(documentCode);
   });

   // File size validation
   $('input[type="file"]').on('change', function (event) {
      const maxFileSize = 10 * 1024 * 1024; // 10 MB

      const files = event.target.files;

      let totalFileSize = 0;

      for (let i = 0; i < files.length; i++) {
         const fileSize = files[i].size;
         totalFileSize += fileSize;

         if (fileSize > maxFileSize) {
               showToast('error', `File "${files[i].name}" is too large.`, `Maximum allowed size is 10 MB.`);
               event.target.value = ''; // Clear the file input
               return;
         }
      }

      // Update the file size display
      updateFileSize(); // This triggers the display of the total file size

      // Display total file size
      const totalFileSizeMB = (totalFileSize / (1024 * 1024)).toFixed(2); // Convert to MB
      document.getElementById('total-file-size').textContent = `Total size: ${totalFileSizeMB} MB`;

      if (totalFileSize > maxFileSize) {
         showToast('error', 'Total file size exceeds limit.', 'Maximum allowed size for all files is 10 MB.');
         event.target.value = ''; // Clear the file input
      } else {
         showToast('success', 'Files are valid.', `Total size: ${totalFileSizeMB} MB`);
      }
   });

   $('#recipient').select2({
      placeholder: "Select recipients...",
      allowClear: true,
      width: '100%',
      ajax: {
         url: '/dashboard/users/search', // Use your defined route here
         dataType: 'json',
         delay: 250,
         data: function (params) {
            return {
               q: params.term // Send the search term
            };
         },
         processResults: function (data) {
            return {
               results: data // Return the data as it is (already formatted by the controller)
            };
         },
         cache: true
      }
   });

   // Handle form submission - Compose modal
   $('#document-form').off('submit').on('submit', function (e) {
      e.preventDefault(); // Prevent multiple submissions

      const sendBtn = document.getElementById('send-btn');
      const sendText = document.getElementById('send-text');
      const sendSpinner = document.getElementById('send-spinner');

      // Disable button and show spinner
      sendBtn.disabled = true;
      sendText.textContent = 'Sending...';
      sendSpinner.classList.remove('hidden');
      sendBtn.classList.remove('bg-blue-700', 'hover:bg-primary-800');
      sendBtn.classList.add('bg-gray-500', 'cursor-not-allowed');


      const formData = new FormData(this);
      const uploadUrl = '/dashboard/document/store';

      // Retrieve and validate the sender ID
      const senderId = parseInt($('#sender_id').val(), 10);
      if (!isNaN(senderId)) {
         formData.append('sender_id', senderId);
      } else {
         console.error('Sender ID is invalid or missing.');
         showToast('error', 'Sender ID is missing or invalid.');
         return;
      }

      // Append recipient IDs
      const selectedRecipients = $('select[name="recipient[]"] option:checked').map(function () {
         return this.value;
      }).get();

      // Debugging: Ensure recipients are captured
      console.log('Selected Recipients:', selectedRecipients);


      if (selectedRecipients.length === 0) {
         showToast('error', 'No recipients selected.', 'Please choose at least one recipient.');
         return;
      }
      formData.append('recipients', JSON.stringify(selectedRecipients));
      selectedRecipients.forEach(id => formData.append('recipient[]', id));

      // Append document code
      const documentCode = $('#document-code').text();
      formData.append('document_code', documentCode);

      // Debugging log
      for (let pair of formData.entries()) {
         console.log(`${pair[0]}: ${pair[1]}`);

      }

      // Submit form data
      $.ajax({
         url: '/dashboard/document/store',
         type: 'POST',
         data: formData,
         processData: false,
         contentType: false,
         success: function (response) {
            showToast('success', 'Action Successful!', 'Your operation was completed successfully.');

            // Success state
            sendBtn.classList.remove('bg-gray-500');
            sendBtn.classList.add('bg-green-700', 'hover:bg-green-800');
            sendText.textContent = 'Sent Successfully!';

            $('#document-form')[0].reset(); // Reset the form

            // Delay for 4 seconds before reloading or performing another action
            setTimeout(function() {
               location.reload(); // Optional
            }, 3000);
         },
         error: function (xhr) {
            console.error(xhr.responseText);

            // Failure state (if validation fails or any error occurs)
            sendBtn.classList.remove('bg-gray-500');
            sendBtn.classList.add('bg-red-700', 'hover:bg-red-800');
            sendText.textContent = 'Failed to Send';

            let errorMessage = 'An error occurred while processing your request.';
            if (xhr.responseJSON && xhr.responseJSON.errors) {
               errorMessage = Object.values(xhr.responseJSON.errors).flat().join(' ');
            }
            showToast('error', 'Error Occurred!', errorMessage);
         },

         complete: function () {
            // Reset button after a delay
            setTimeout(() => {
               sendBtn.disabled = false;
               sendText.textContent = 'Send';
               sendSpinner.classList.add('hidden');
               sendBtn.classList.remove(
                  'bg-green-700',
                  'hover:bg-green-800',
                  'bg-red-700',
                  'hover:bg-red-800'
               );
               sendBtn.classList.add('bg-blue-700', 'hover:bg-primary-800');
            }, 2000);
         }
      });
   });

   // Reset the Add form when the modal is closed
   $(document).on('click', '.close-modal', function () {
      // Select the form element
      const form = document.getElementById('document-form');
      // Reset the form fields
      form.reset();

      // dropzone.removeAllFiles(true); // Reset Dropzone
   });

   // Open the delete modal and set the form action
   $('button#deleteButton').on('click', function () {
      var documentId = $(this).data('document-id'); // Ensure this matches the button's attribute
      var documentName = $(this).data('document-code');

      if (!documentId) {
         console.error("Document ID is missing for the delete action!");
         return;
      }

      // Set the modal's user name
      $('#documentNameToDelete').text(documentName);

      // Dynamically set the form's action URL
      var actionUrl = window.deleteDocumentRoute.replace(':id', documentId); // Use the global route
      console.log('Generated action URL:', actionUrl);

      $('#deleteDocumentForm').attr('action', actionUrl);
      $('#deleteDocumentId').val(documentId); // Set the hidden user_id input
      $('#deleteModal').removeClass('hidden'); // Open modal
   });

   // Close the modal
   $('#cancelDeleteButton, #closeModalButton').on('click', function () {
      $('#deleteModal').addClass('hidden');
   });

   // Handle the confirmation of delete
   $('#confirmDeleteButton').on('click', function () {
      var documentId = $('#deleteDocumentId').val(); // Use the hidden input for the user ID

      // Perform the delete action via AJAX
      $.ajax({
         url: window.deleteDocumentRoute.replace(':id', documentId), // Replace placeholder with actual ID
         method: 'DELETE',
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
         },
         success: function (response) {
            // Close the modal
            $('#deleteModal').addClass('hidden');

            // Show success toast
            showToast('success', response.message);

            // Delay for 4 seconds before reloading or performing another action
            setTimeout(function() {
               location.reload(); // Optional
            }, 4000);
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


   // For Releasing the document
   // $(".release-document button").on("click", function () {
   //    let documentCode = $(this).closest(".modal").find("[id^='modal-document-code']").text().trim(); // Ensure it grabs the correct code
   //    $.ajax({
   //       url: `/dashboard/document/release/${documentCode}`,
   //       type: "POST",
   //       headers: {
   //          "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
   //       },
   //       success: function (response) {
   //          if (response.success) {
   //             showToast("success", "Document released successfully.");
   //             $(".modal").addClass("hidden"); // Hide all modals
   //             location.reload(); // Refresh page
   //          } else {
   //             showToast("error", "Failed to release document.");
   //          }
   //       },
   //       error: function (xhr) {
   //          console.error("Error:", xhr.responseText);
   //          showToast("error", "Something went wrong. Please try again.");
   //       }
   //    });
   // });

//    $(document).on("click", ".release-document", function () {
//       console.log("Button clicked!");

//       let documentId = $(this).data("document-id"); // Get document ID from button attribute
//       console.log("Document ID:", documentId);

//       if (!documentId) {
//           console.error("Error: Document ID not found.");
//           showToast("error", "Document ID not found.");
//           return;
//       }

//       let releaseUrl = `/dashboard/document/release/${documentId}`;

//       $.ajax({
//           url: releaseUrl,
//           type: "POST",
//           headers: {
//               "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
//           },
//           success: function (response) {
//               console.log("Success response:", response);
//               if (response.success) {
//                   showToast("success", "Document released successfully.");
//                   location.reload();
//               } else {
//                   showToast("error", response.message || "Failed to release document.");
//               }
//           },
//           error: function (xhr) {
//               console.error("AJAX Error:", xhr.responseText);
//               showToast("error", "Something went wrong. Please try again.");
//           }
//       });
//   });




   function updateFileSize() {
      const fileInput = document.getElementById('file-input');
      const totalFileSize = Array.from(fileInput.files).reduce((total, file) => total + file.size, 0);

      // Convert size to KB, MB, etc.
      const totalFileSizeKB = (totalFileSize / 1024).toFixed(2); // In KB
      const totalFileSizeMB = (totalFileSize / (1024 * 1024)).toFixed(2); // In MB

      // Display total file size in the paragraph
      const sizeDisplay = document.getElementById('total-file-size');
      if (totalFileSizeMB >= 1) {
         sizeDisplay.textContent = `Total size: ${totalFileSizeMB} MB`;
      } else {
         sizeDisplay.textContent = `Total size: ${totalFileSizeKB} KB`;
      }
   }


   // Function to show toast notifications
   function showToast(type, message, subtext) {
      console.log("Show Toast Called with type:", type); // Debugging

      const toastContainer = document.getElementById("toast-container");
      const toastTemplate = document.querySelector(`#toast-template .toast[data-type="${type}"]`);

      if (!toastContainer || !toastTemplate) {
         console.error("Toast container or template for type", type, "is missing in the DOM.");
         return;
      }

      // const toastClone = toastTemplate.cloneNode(true);
      // toastClone.classList.remove("hidden", "animate-fadeOut");
      // toastClone.classList.add("animate-fadeIn");
      // toastClone.querySelector(".message-text").textContent = message;
      // toastClone.querySelector(".sub-text").textContent = subtext;

      const toastClone = toastTemplate.cloneNode(true);
      toastClone.classList.remove('hidden', 'animate-fadeOut');
      toastClone.classList.add('animate-fadeIn');
      toastClone.querySelector('.message-text').textContent = message;

      // Display subtext only if provided
      if (subtext) {
         toastClone.querySelector('.sub-text').textContent = subtext;
         toastClone.querySelector('.sub-text').classList.remove('hidden');
      } else {
         toastClone.querySelector('.sub-text').classList.add('hidden');
      }

      // Add close functionality with fade-out animation
      const removeToast = () => {
         console.log("Closing toast:", toastClone); // Debugging
         toastClone.classList.remove("animate-fadeIn");
         toastClone.classList.add("animate-fadeOut");
         setTimeout(() => {
            toastClone.remove();
            console.log("Toast removed after fade-out"); // Debugging
         }, 500); // Match fadeOut animation duration
      };

      toastClone.querySelector(".close-toast").addEventListener("click", removeToast);

      console.log("Appending toast to container:", toastClone); // Debugging
      toastContainer.appendChild(toastClone);

      // Auto-remove after 5 seconds
      setTimeout(() => {
         console.log("Removing toast after 5 seconds"); // Debugging
         removeToast();
      }, 5000);
   }
});
