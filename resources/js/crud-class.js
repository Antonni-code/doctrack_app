$(document).ready(function () {
   $.ajaxSetup({
      headers: {
         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
      },
   });

   // Open the modal to add class
   $("#addClassButton").on("click", function (e) {
       e.preventDefault();
       $("#hs-scale-animation-modal").removeClass("hidden").addClass("flex");
   });

   // Handle form submission via AJAX (add class)
   $("#classForm").on("submit", function (e) {
       e.preventDefault();

       const data = {
           name: $("#name").val(),
           sub_class: $("#sub-class").val(),
       };

       $.ajax({
           url: "/dashboard/maintenance/sub-category", // Ensure this URL is correct
           method: "POST",
           data: data,
           success: function () {
               // Show success toast with the message
               showToast("success", "Classification added successfully!");
               // Delay for 4 seconds before reloading or performing another action
               setTimeout(function() {
                  location.reload(); // Optional
               }, 4000);

               // Clear the form inputs and close the modal
               $("#name").val("");
               $("#sub-class").val("");
               $("#hs-scale-animation-modal").removeClass("flex").addClass("hidden");
           },
           error: function () {
               showToast('error', "Failed to add office.");
           }
       });
       // Close modal after submitting the form
      $("#hs-scale-animation-modal").removeClass("flex").addClass("hidden");
   });

   // Reset the Add form when the modal is closed
   $(document).on('click', '.close-modal', function () {
      // Select the form element
      const form = document.getElementById('classForm');
      // Reset the form fields
      form.reset();
   });

   // Edit----
   // When the edit button is clicked
   $(".editClassButton").on("click", function (e) {
      e.preventDefault();

      const categoryId = $(this).data("id");
      const categoryName = $(this).data("class-name");
      const categorySub = $(this).data("class-sub");

      // Set the category name for the select field
      $("#editCategoryName").val(categoryName);

      // Populate other fields
      $("#editCategoryId").val(categoryId);
      $("#editSubClass").val(categorySub);

      // Show the modal
      $("#editCategoryModal").removeClass("hidden");
   });




  // Close the modal when the close button is clicked
  $(".close-modal").on("click", function () {
      $("#editCategoryModal").addClass("hidden");
  });

  // Handle form submission via AJAX
  $("#editCategoryForm").on("submit", function (e) {
      e.preventDefault();

      const formData = $(this).serialize();

      $.ajax({
          url: "/dashboard/maintenance/sub-category/" + $("#editCategoryId").val(),
          method: "PUT",
          data: formData,
          success: function(response) {
            showToast("success", "Classification updated successfully!");
            // Delay for 4 seconds before reloading or performing another action
            setTimeout(function() {
               location.reload(); // Optional
            }, 4000);
          },
          error: function(xhr, status, error) {
            showToast('error', "Failed to edit Classification.");
          }
      });
  });

   // Delete------
   // Delete button click
   $(".delete-category").on("click", function (e) {
      e.preventDefault();

      const categoryId = $(this).data("class-id");
      const categoryName = $(this).data("class-name");

      // Set the category name in the delete modal
      $("#officeNameToDelete").text(categoryName);
      $("#deleteOfficeId").val(categoryId);

      // Show the delete confirmation modal
      $("#deleteModal").removeClass("hidden").addClass("flex");
  });

  // Close the delete modal
  $("#cancelDeleteButton").on("click", function (e) {
      e.preventDefault();
      $("#deleteModal").removeClass("flex").addClass("hidden");
  });

  // Delete form submission (AJAX)
  $("#deleteOfficeForm").on("submit", function (e) {
      e.preventDefault();

      const categoryId = $("#deleteOfficeId").val();

      $.ajax({
          url: "/dashboard/maintenance/sub-category/" + categoryId,  // Replace with the correct delete URL
          method: "DELETE",
          success: function () {
              // Show success message
              showToast("success", "Category deleted successfully!");

              // Delay for 4 seconds before reloading or performing another action
              setTimeout(function() {
                  location.reload(); // Optional
              }, 4000);

              $("#deleteModal").removeClass("flex").addClass("hidden");  // Close the modal
          },
          error: function () {
              showToast('error', "Failed to delete category.");
          }
      });
  });

   // Function to show toast notifications
   // function showToast(type, message) {
   //    const toastConfig = {
   //       normal: {
   //          color: 'text-blue-500',
   //          icon: '<path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"></path>',
   //       },
   //       success: {
   //          color: 'text-teal-500',
   //          icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"></path>',
   //       },
   //       error: {
   //          color: 'text-red-500',
   //          icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"></path>',
   //       },
   //       warning: {
   //          color: 'text-yellow-500',
   //          icon: '<path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"></path>',
   //       },
   //    };

   //    // Get the configuration for the provided type
   //    const { color, icon } = toastConfig[type] || toastConfig['normal'];

   //    // Create the toast element
   //    const toast = document.createElement('div');
   //    toast.className = 'max-w-xl bg-white border border-gray-200 rounded-xl shadow-lg dark:bg-neutral-800 dark:border-neutral-700';
   //    toast.setAttribute('role', 'alert');
   //    toast.innerHTML = `
   //       <div class="flex p-4">
   //          <div class="shrink-0">
   //             <svg class="shrink-0 size-4 ${color} mt-0.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
   //                ${icon}
   //             </svg>
   //          </div>
   //          <div class="ms-3">
   //             <p class="text-sm text-gray-700 dark:text-neutral-400">${message}</p>
   //          </div>
   //       </div>
   //    `;
   //    // Append the toast to the container with the new id
   //    const toastContainer = document.querySelector('#toast-container-class');
   //    toastContainer.appendChild(toast);

   //    // Automatically remove the toast after 5 seconds
   //    setTimeout(() => {
   //       toast.remove();
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
