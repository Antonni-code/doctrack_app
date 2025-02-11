$(document).ready(function () {
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


   // AJAX Attachment upload
   // $(document).on("change", "#attachmentInput", function (e) {
   //    e.preventDefault();
   //    let formData = new FormData(document.getElementById("attachmentForm"));

   //    $.ajax({
   //       url: $("#attachmentForm").attr("action"),
   //       type: "POST",
   //       data: formData,
   //       processData: false,
   //       contentType: false,
   //       headers: { "X-CSRF-TOKEN": $('input[name="_token"]').val() },
   //       success: function (data) {
   //          if (data.success) {
   //             let attachmentList = $("#attachmentList");
   //             let newAttachment = `
   //                <li class="flex items-center justify-between bg-gray-100 dark:bg-gray-700 p-2 rounded-md">
   //                   <span class="text-gray-700 dark:text-gray-300">${data.attachment.file_name}</span>
   //                   <div class="flex items-center gap-2">
   //                      <a href="${data.attachment.file_url}" target="_blank" class="text-blue-500 hover:text-blue-700">
   //                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
   //                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m6 0L9 6m6 6l-6 6" />
   //                         </svg>
   //                      </a>
   //                      <a href="${data.attachment.download_url}" class="text-gray-600 hover:text-gray-800">
   //                         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
   //                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4m-4 4V4" />
   //                         </svg>
   //                      </a>
   //                   </div>
   //                </li>`;
   //             attachmentList.append(newAttachment);
   //             showToast("success", "File Attached successfully.");
   //          } else {
   //             showToast("error", "Failed to upload file.");
   //          }
   //       },
   //       error: function (xhr, status, error) {
   //          console.error("Error uploading file:", error);
   //          showToast("error", "Error uploading file:", error);
   //       },
   //    });
   // });

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
