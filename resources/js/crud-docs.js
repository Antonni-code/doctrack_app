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

  // Form submission handler
  $('#document-form').on('submit', function (e) {
      e.preventDefault();

      const formData = new FormData(this);

      // Get selected recipient IDs
      const recipientIds = $('#recipient').val();
      console.log('Selected recipient IDs:', recipientIds);

      // Append recipient IDs as a JSON string
      if (recipientIds && recipientIds.length > 0) {
          formData.append('recipient[]', recipientIds); // Send each recipient ID as a separate array element
      }
      
      // Generate the document code and append it to the formData
      const documentCode = $('#document-code').text(); // Assuming this is set in your modal
      formData.append('document_code', documentCode);

      // Get the sender ID from a hidden input or other source
      const senderId = $('#sender-id').val(); // Replace with your actual sender input ID
      formData.append('sender_id', senderId);

      // Retrieve and append selected recipients
      let selectedRecipients = [...document.querySelectorAll('select[name="recipient[]"] option:checked')]
      .map(option => parseInt(option.value));

      selectedRecipients.forEach(id => formData.append('recipient[]', id)); // Attach each recipient as a separate value

      // Get the selected classification and sub-classification names
      const classificationName = $('#classification').val(); // Get selected classification name
      const subClassificationName = $('#sub_classification').val(); // Get selected sub-classification name
      // Append classification and sub-classification names to the form data
      formData.append('classification', classificationName);
      formData.append('sub_classification', subClassificationName);

      // Get the brief description and detailed description
      const briefDescription = $('#brief_description').val(); // Get brief description
      const detailedDescription = $('#detailed_description').val(); // Get detailed description
      // Append brief and detailed descriptions to the form data
      formData.append('brief_description', briefDescription);
      formData.append('detailed_description', detailedDescription);


      // Ensure the file field is handled as an array
      const fileInput = document.getElementById('file-input');
      const files = fileInput.files;
      // Append each file to formData
      if (files.length > 0) {
          for (let i = 0; i < files.length; i++) {
              formData.append('file[]', files[i]);
          }
      }

      // Log form data for debugging
      for (var pair of formData.entries()) {
          console.log(pair[0] + ': ' + pair[1]);
      }

      $.ajax({
          url: '/dashboard/document/store',  // Use form's action attribute for the URL
          type: 'POST', // Use form's method attribute (e.g., POST)
          data: formData,
          processData: false,
          contentType: false,
          success: function () {
              showToast('success', 'Document sent successfully!');
              // location.reload();  // Reload the page after successful submission
          },
          error: function (xhr) {
              console.error(xhr.responseText);  // Log any errors
              showToast('error', 'Failed to send the document.');
          },
      });
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

       // Append the toast to the container with the new id
       const toastContainer = document.querySelector('#toast-container');
       toastContainer.appendChild(toast);

       // Automatically remove the toast after 5 seconds
       setTimeout(() => {
           toast.remove();
       }, 5000);
   }
});
