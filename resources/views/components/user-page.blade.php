@props(['users', 'offices'])
<div class="bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 lg:p-2">
   {{-- <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div> --}}
   <x-toast/>
   <div class="relative flex flex-col w-full h-full text-gray-700 bg-white border dark:border-gray-900 dark:bg-slate-800 dark:text-gray-50 shadow-md rounded-xl">
      <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white dark:border-gray-900 dark:bg-gray-800 dark:text-gray-50 rounded-none">
        <div class="flex items-center justify-between gap-8 mb-8">
          <div>
            <h5
              class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900">
              Members list
            </h5>
            <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700">
              See information about all members
            </p>
          </div>
          <div class="flex flex-col gap-2 shrink-0 sm:flex-row">
            <button
               {{-- data-dialog-target="addUserModal"
               data-modal-target="addUserModal"
               data-modal-toggle="addUserModal" --}}
               data-user-create-url="{{ route('user.create') }}"
               class="flex select-none items-center gap-3 rounded-lg bg-blue-500/100 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md hover:shadow-lg focus:opacity-[0.85] focus:shadow-none"
               type="button"
               id="AddUserButton" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-scale-animation-modal" data-hs-overlay="#hs-scale-animation-modal">
               <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                  class="w-4 h-4">
                  <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z">
                  </path>
               </svg>
               Add Member
            </button>
            <!-- Add User Modal -->
            <x-addmodaluser :offices="$offices"/>

            </div>
        </div>
        <div class="flex flex-col items-center justify-between gap-4 md:flex-row">
          <div class="block w-full overflow-hidden md:w-max">
            <nav>
              <ul role="tablist" class="relative flex flex-row p-1 rounded-lg bg-blue-gray-50 bg-opacity-60">
                <li role="tab"
                  class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                  data-value="all">
                  <div class="z-20 text-inherit">
                    &nbsp;&nbsp;All&nbsp;&nbsp;
                  </div>
                  <div class="absolute inset-0 z-10 h-full bg-white rounded-md shadow"></div>
                </li>
                <li role="tab"
                  class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                  data-value="active">
                  <div class="z-20 text-inherit">
                    &nbsp;&nbsp;Active&nbsp;&nbsp;
                  </div>
                </li>
                <li role="tab"
                  class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                  data-value="excluded">
                  <div class="z-20 text-inherit">
                    &nbsp;&nbsp;Excluded&nbsp;&nbsp;
                  </div>
                </li>
              </ul>
            </nav>
          </div>
          <div class="w-full md:w-72">
            <div class="relative h-10 w-full min-w-[200px]">
              <div class="absolute grid w-5 h-5 top-2/4 right-3 -translate-y-2/4 place-items-center text-blue-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                  stroke="currentColor" aria-hidden="true" class="w-5 h-5">
                  <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                </svg>
              </div>
              <input
               class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50"
               placeholder=""
               />
              <label
                class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500">
                Search users
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="p-6 px-0 overflow-x-scroll">
         <!-- user datatable-->
         <x-user-page-table :users="$users" :offices="$offices"/>

      </div>
      {{-- <div class="flex items-center flex-col p-4 ">
         {{ $users->links('vendor.pagination.tailwind') }}

      </div> --}}

      <!-- Pagination -->
      <div class="flex flex-col items-center space-y-3 p-4 ">
         <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
               {{-- Previous Page Button --}}
               @if ($users->onFirstPage())
                  <li>
                     <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-s-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Previous</span>
                  </li>
               @else
                  <li>
                     <a href="{{ $users->previousPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                  </li>
               @endif

               {{-- Page Numbers --}}
               @foreach(range(1, $users->lastPage()) as $i)
                  <li>
                     <a href="{{ $users->url($i) }}" class="px-3 h-8 flex items-center justify-center border border-gray-300
                        {{ $i == $users->currentPage() ? 'text-blue-600 bg-blue-50 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                        {{ $i }}
                     </a>
                  </li>
               @endforeach

               {{-- Next Page Button --}}
               @if ($users->hasMorePages())
                  <li>
                     <a href="{{ $users->nextPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                  </li>
               @else
                  <li>
                     <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-e-lg dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Next</span>
                  </li>
               @endif
            </ul>
         </nav>
      </div>
   </div>
</div>
<script>
   // modal for other recipient inside three dot icon
   document.querySelectorAll('[data-modal-target]').forEach(button => {
      button.addEventListener('click', function () {
         const modalId = this.getAttribute('data-modal-target');
         const modal = document.querySelector(modalId);
         if (modal) modal.classList.remove('hidden');
      });
   });

   document.querySelectorAll('.close-modal').forEach(button => {
      button.addEventListener('click', function () {
         const modal = this.closest('.fixed');
         if (modal) modal.classList.add('hidden');
      });
   });

   // document.addEventListener("DOMContentLoaded", function () {
   //    const rowsPerPage = 5; // Adjust as needed
   //    let currentPage = 1;
   //    let rows = Array.from(document.querySelectorAll("#documentTableBody tr"));
   //    const totalPages = Math.ceil(rows.length / rowsPerPage);

   //    function showPage(page) {
   //       currentPage = page;
   //       let start = (page - 1) * rowsPerPage;
   //       let end = start + rowsPerPage;

   //       rows.forEach((row, index) => {
   //          row.style.display = index >= start && index < end ? "table-row" : "none";
   //       });

   //       updatePagination();
   //    }

   //    function updatePagination() {
   //       let paginationButtons = document.querySelectorAll(".pagination-button");
   //       paginationButtons.forEach((button) => {
   //          let pageNumber = parseInt(button.textContent);
   //          if (pageNumber === currentPage) {
   //             button.classList.add("bg-slate-800", "text-white");
   //             button.classList.remove("border-slate-300", "text-slate-600");
   //          } else {
   //             button.classList.remove("bg-slate-800", "text-white");
   //             button.classList.add("border-slate-300", "text-slate-600");
   //          }
   //       });

   //       document.getElementById("prevPage").disabled = currentPage === 1;
   //       document.getElementById("nextPage").disabled = currentPage === totalPages;
   //    }

   //    // Initialize Pagination
   //    showPage(currentPage);

   //    // Handle Click Events
   //    document.getElementById("prevPage").addEventListener("click", function () {
   //       if (currentPage > 1) showPage(currentPage - 1);
   //    });

   //    document.getElementById("nextPage").addEventListener("click", function () {
   //       if (currentPage < totalPages) showPage(currentPage + 1);
   //    });

   //    document.querySelectorAll(".pagination-button").forEach((button) => {
   //       button.addEventListener("click", function () {
   //          showPage(parseInt(this.textContent));
   //       });
   //    });
   });

</script>
