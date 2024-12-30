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
            showToast('Document sent successfully!', response.message || '', true);
            $('#document-form')[0].reset(); // Reset the form
            // location.reload();
         },
         error: function (xhr) {
            console.error(xhr.responseText);
            showToast('Failed to send the document.', xhr.responseText || '', false);
         },
      });
   });

   // Function to show toast notifications
   function showToast(message, subtext, isSuccess = true) {
      console.log("Show Toast Called"); // Debugging

      const toastContainer = document.getElementById("toast-container");
      const toastTemplate = document.getElementById("toast-template").cloneNode(true);

      if (!toastContainer || !toastTemplate) {
         console.error("Toast container or template is missing in the DOM.");
         return;
      }

      toastTemplate.id = ""; // Remove the ID to avoid duplicates
      toastTemplate.classList.remove("hidden");

      toastTemplate.querySelector(".message-text").textContent = message;
      toastTemplate.querySelector(".sub-text").textContent = subtext;

      if (!isSuccess) {
         toastTemplate.classList.replace("border-green-500", "border-red-500");
         toastTemplate.querySelector(".message-text").classList.replace("text-green-700", "text-red-700");
      }

      toastTemplate.querySelector(".close-toast").addEventListener("click", () => {
         toastTemplate.remove();
      });

      console.log("Appending toast to container:", toastTemplate); // Debugging
      toastContainer.appendChild(toastTemplate);

      setTimeout(() => {
         console.log("Removing toast after 5 seconds"); // Debugging
         toastTemplate.remove();
      }, 5000);
   }
});
