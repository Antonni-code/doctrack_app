
// Wait until the document is fully loaded before calling showToast
// $(document).ready(function () {
//    console.log("Document Ready!");

//    // Example of using showToast after the document is ready
//    showToast('success', 'Welcome!', 'This is a toast notification.');
// });

$(document).ready(function () {
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
   });

   // Function to fetch documents based on page number
   function fetchDocuments(page) {
      $.ajax({
         url: window.location.href, // Current URL
         type: "GET",
         data: { page: page }, // Send page number in the request
         dataType: "json",
         success: function (data) {
            if (data.html && data.pagination) {
               $("#documents-table tbody").html(data.html);
               $("#pagination-links").html(data.pagination);
            } else {
               console.warn("No data received.");
            }
            // Scroll to top of the table after loading new content
            $("#documents-table").get(0).scrollIntoView({ behavior: "smooth" });
         },
         error: function (xhr, status, error) {
            console.error("Error fetching documents:", error);
         },
      });
   }

   // Handle pagination click event using delegation
   $(document).on("click", ".pagination-link", function (e) {
      e.preventDefault();
      const page = $(this).data("page");
      fetchDocuments(page);
   });

   // Open delete modal (Event Delegation Fix)
   $(document).on("click", ".open-delete-modal", function () {
      let attachmentId = $(this).data("id");
      let attachmentName = $(this).data("name");
      let deleteUrl = $(this).data("route"); // Get delete route directly from button

      if (!attachmentId || !deleteUrl) {
         console.error("Attachment ID or Delete URL is missing.");
         showToast("error", "Attachment ID is missing!", "Try again.");
         return;
      }

      // Set modal values
      $("#attachmentName").text(attachmentName);
      $("#deleteAttachmentForm").attr("action", deleteUrl);
      $("#deleteAttachmentForm").data("id", attachmentId); // ✅ Store ID in the form

      console.log("Opening modal for:", attachmentName, "ID:", attachmentId); // Debugging
      $("#deleteModal").removeClass("hidden"); // Show modal
   });

   // Close modal
   $("#cancelDeleteButton, #closeModalButton").on("click", function () {
      $("#deleteModal").addClass("hidden");
   });

   // Handle AJAX delete request
   $("#deleteAttachmentForm").on("submit", function (e) {
      e.preventDefault(); // Prevent default form submission

      // let attachmentId = $("#deleteAttachmentForm").data("id"); // Get attachment ID
      let form = $(this);
      let attachmentId = form.data("id"); // ✅ Get attachment ID from form

      if (!attachmentId) {
         showToast("error", "Attachment ID is missing!", "Try again.");
         return;
      }
      let deleteUrl = window.deleteAttachmentRoute.replace(':id', attachmentId); // Correct URL format
      console.log("Generated delete URL:", deleteUrl);


      $.ajax({
         url: deleteUrl,
         type: "POST",
         headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
         },
         data: {
            _method: "DELETE", // Spoof DELETE method
            _token: $('meta[name="csrf-token"]').attr("content"),
         },
         success: function (response) {
            $("#deleteModal").addClass("hidden"); // Hide modal
            // $(`#attachment-${attachmentId}`).remove(); // Remove from UI

            // // Remove deleted attachment from the list
            // $('button[data-id="' + response.id + '"]').closest("li").fadeOut(300, function () {
            //    $(this).remove();
            // });
            let attachmentItem = $(`button[data-id="${attachmentId}"]`).closest("li");
            attachmentItem.fadeOut(300, function () {
               $(this).remove(); // Remove after animation
            });

            showToast("success", "Attachment deleted!", "The file has been removed.");
            // Delay for 4 seconds before reloading or performing another action
            // setTimeout(function() {
            //    location.reload(); // Optional
            // }, 4000);
         },
         error: function (xhr) {
            $("#deleteModal").addClass("hidden");
            showToast("error", xhr.responseJSON?.message || "Failed to delete the attachment.");
         },
      });
   });

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

document.addEventListener('DOMContentLoaded', function() {
   // Cache the pagination links and table
   const paginationLinks = document.querySelectorAll('.pagination-link');
   const tableBody = document.querySelector('#documents-table tbody');
   const paginationContainer = document.querySelector('#pagination-links');

   // Add event listener to all pagination links
   paginationLinks.forEach(link => {
      link.addEventListener('click', function(e) {
         e.preventDefault(); // Prevent default link behavior
         const page = this.getAttribute('data-page');
         fetchDocuments(page);
      });
   });

   // Fetch documents based on the selected page
   function fetchDocuments(page) {
      const url = new URL(window.location.href);
      url.searchParams.set('page', page); // Set the page number in the URL

      // Make a GET request to the server to fetch the documents
      fetch(url)
         .then(response => response.json())
         .then(data => {
               // Update the table content and pagination links
               if (data.html && data.pagination) {
                  tableBody.innerHTML = data.html;
                  paginationContainer.innerHTML = data.pagination;
               } else {
                  console.warn('No data received.');
               }

               // Optionally, scroll to the top of the table after loading new content
               tableBody.scrollIntoView({ behavior: 'smooth' });
         })
         .catch(error => {
            console.error('Error fetching documents:', error);
            // Optionally, handle errors by showing an error message to the user
         });
   }

   // Open Modal
   document.querySelectorAll("[data-modal-target]").forEach(button => {
      button.addEventListener("click", function () {
         const modalId = this.getAttribute("data-modal-target");
         const modal = document.getElementById(modalId);
         if (modal) {
            modal.classList.remove("hidden");
         }
      });
   });

  // Close Modal
   document.querySelectorAll(".close-modal").forEach(button => {
      button.addEventListener("click", function () {
         const modalId = this.getAttribute("data-close-target");
         const modal = document.getElementById(modalId);
         if (modal) {
            modal.classList.add("hidden");
         }
      });
   });

  // Close Modal when clicking outside of it
   document.querySelectorAll(".modal").forEach(modal => {
      modal.addEventListener("click", function (event) {
         if (event.target === modal) {
            modal.classList.add("hidden");
         }
      });
   });

   // Delete attachment confirmation
      // const deleteModal = document.getElementById("deleteModal");
      // const deleteForm = document.getElementById("deleteAttachmentForm");
      // const attachmentName = document.getElementById("attachmentName");
      // const closeModalButton = document.getElementById("closeModalButton");
      // const cancelDeleteButton = document.getElementById("cancelDeleteButton");

      // document.querySelectorAll(".open-delete-modal").forEach(button => {
      //    button.addEventListener("click", function () {
      //       const attachmentId = this.getAttribute("data-id");
      //       const fileName = this.getAttribute("data-name");

      //       // Update modal text and form action
      //       attachmentName.textContent = fileName;
      //       deleteForm.action = `/attachments/delete/${attachmentId}`;

      //       // Show modal
      //       deleteModal.classList.remove("hidden");
      //    });
      // });

      // // Close modal functions
      // closeModalButton.addEventListener("click", () => deleteModal.classList.add("hidden"));
      // cancelDeleteButton.addEventListener("click", () => deleteModal.classList.add("hidden"));


   // Function to show toast notifications

});
