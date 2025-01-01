$(document).ready(function () {
   $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
         },
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

   $('#document-form').off('submit').on('submit', function (e) {
      e.preventDefault(); // Prevent multiple submissions

      const formData = new FormData(this);

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
            $('#document-form')[0].reset(); // Reset the form

            // Delay for 4 seconds before reloading or performing another action
            setTimeout(function() {
               location.reload(); // Optional
            }, 4000);
         },
         error: function (xhr) {
            console.error(xhr.responseText);
            showToast('error', 'Error Occurred!', 'There was a problem processing your request.');
         },
      });
   });

   // Reset the Add form when the modal is closed
   $(document).on('click', '.close-modal', function () {
      // Select the form element
      const form = document.getElementById('document-form');
      // Reset the form fields
      form.reset();
   });

   // // Function to show toast notifications
   // function showToast(message, subtext, isSuccess = true) {
   //    console.log("Show Toast Called"); // Debugging

   //    const toastContainer = document.getElementById("toast-container");
   //    const toastTemplate = document.getElementById("toast-template").cloneNode(true);

   //    if (!toastContainer || !toastTemplate) {
   //       console.error("Toast container or template is missing in the DOM.");
   //       return;
   //    }

   //    toastTemplate.id = ""; // Remove the ID to avoid duplicates
   //    toastTemplate.classList.remove("hidden");

   //    toastTemplate.querySelector(".message-text").textContent = message;
   //    toastTemplate.querySelector(".sub-text").textContent = subtext;

   //    if (!isSuccess) {
   //       toastTemplate.classList.replace("border-green-500", "border-red-500");
   //       toastTemplate.querySelector(".message-text").classList.replace("text-green-700", "text-red-700");
   //    }

   //    toastTemplate.querySelector(".close-toast").addEventListener("click", () => {
   //       toastTemplate.remove();
   //    });

   //    console.log("Appending toast to container:", toastTemplate); // Debugging
   //    toastContainer.appendChild(toastTemplate);

   //    setTimeout(() => {
   //       console.log("Removing toast after 5 seconds"); // Debugging
   //       toastTemplate.remove();
   //    }, 5000);
   // }


   // Function to show toast notifications
   function showToast(type, message, subtext) {
      console.log("Show Toast Called with type:", type); // Debugging

      const toastContainer = document.getElementById("toast-container");
      const toastTemplate = document.querySelector(`#toast-template .toast[data-type="${type}"]`);

      if (!toastContainer || !toastTemplate) {
         console.error("Toast container or template for type", type, "is missing in the DOM.");
         return;
      }

      const toastClone = toastTemplate.cloneNode(true);
      toastClone.classList.remove("hidden", "animate-fadeOut");
      toastClone.classList.add("animate-fadeIn");
      toastClone.querySelector(".message-text").textContent = message;
      toastClone.querySelector(".sub-text").textContent = subtext;

      // Add close functionality with fade-out animation
      const removeToast = () => {
         console.log("Closing toast:", toastClone); // Debugging
         toastClone.classList.remove("animate-fadeIn");
         toastClone.classList.add("animate-fadeOut");
         setTimeout(() => {
            toastClone.remove();
            console.log("Toast removed after fade-out"); // Debugging
         }, 300); // Match fadeOut animation duration
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
