
<div class="relative flex flex-col w-full h-full text-gray-700 bg-white border dark:border-gray-900 dark:bg-slate-800 dark:text-gray-50 shadow-md rounded-xl">
   <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white dark:border-gray-900 dark:bg-gray-800 dark:text-gray-50 rounded-none">
      <div class="flex items-center justify-between gap-8 mb-8">
         <div>
               <h5
               class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 dark:text-blue-gray-50">
               Mail Sent file(s) list
               </h5>
               <p class="block mt-1 font-sans text-base antialiased font-normal leading-relaxed text-gray-700 dark:text-gray-50">
               See information about all Mail Sent
               </p>
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
                  data-value="urgent">
                  <div class="z-20 text-inherit">
                     &nbsp;&nbsp;Urgent&nbsp;&nbsp;
                  </div>
                  </li>
                  <li role="tab"
                  class="relative flex items-center justify-center w-full h-full px-2 py-1 font-sans text-base antialiased font-normal leading-relaxed text-center bg-transparent cursor-pointer select-none text-blue-gray-900"
                  data-value="usual">
                  <div class="z-20 text-inherit">
                     &nbsp;&nbsp;Usual&nbsp;&nbsp;
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
                  class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 !pr-9 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 dark:text-white"
                  placeholder=" " />
            <label
                  class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none !overflow-visible truncate text-[11px] font-normal leading-tight text-gray-500 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-900 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:!border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:!border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 dark:text-white dark:border-blue-gray-50">
                  Search
            </label>
            </div>
         </div>
      </div>
   </div>
   <div class="p-6 overflow-auto">
      <table class="w-full text-left border-collapse table-auto min-w-max">
          <thead>
              <tr>
                  <th class="p-4 bg-gray-100 border-b-2 border-gray-200 rounded-tl-lg">
                      <p class="block font-sans text-sm font-medium text-gray-700 dark:text-white">
                          Document Code
                      </p>
                  </th>
                  <th class="p-4 bg-gray-100 border-b-2 border-gray-200">
                      <p class="block font-sans text-sm font-medium text-gray-700 dark:text-white">
                          Recipients
                      </p>
                  </th>
                  <th class="p-4 bg-gray-100 border-b-2 border-gray-200">
                      <p class="block font-sans text-sm font-medium text-gray-700 dark:text-white">
                          Details
                      </p>
                  </th>
                  <th class="p-4 bg-gray-100 border-b-2 border-gray-200">
                      <p class="block font-sans text-sm font-medium text-gray-700 dark:text-white">
                          Date of Letter
                      </p>
                  </th>
                  <th class="p-4 bg-gray-100 border-b-2 border-gray-200">
                      <p class="block font-sans text-sm font-medium text-gray-700 dark:text-white">
                          Status
                      </p>
                  </th>
                  <th class="p-4 bg-gray-100 border-b-2 border-gray-200 rounded-tr-lg">
                      <p class="block font-sans text-sm font-medium text-gray-700 dark:text-white">
                          Actions
                      </p>
                  </th>
              </tr>
          </thead>
          <tbody id="documentTableBody">
              @foreach ($mailSent as $document)
                  <tr data-status="{{ $document->priority === 'Urgent' ? 'urgent' : 'usual' }}"
                      class="hover:bg-gray-50 transition-colors duration-150 ease-in-out {{ $loop->even ? 'bg-gray-50/30' : '' }}">
                      <td class="p-4 border-b border-gray-200">
                          <div class="flex">
                              <p class="block font-sans text-sm font-medium text-red-500 dark:text-red-400">
                                  {{ $document->document_code }}
                              </p>
                          </div>
                      </td>

                      <td class="p-4 border-b border-gray-200">
                          @if ($document->recipients && $document->recipients->isNotEmpty())
                              <div class="flex items-center gap-3">
                                  <div class="relative">
                                      <img src="{{ $document->recipients->first()->recipient->profile_photo_url ?? asset('default-profile.png') }}"
                                          alt="{{ $document->recipients->first()->recipient->name }}"
                                          class="h-10 w-10 rounded-full object-cover border-2 border-white shadow-sm" />
                                      @if ($document->recipients->count() > 1)
                                          <span class="absolute -bottom-1 -right-1 flex h-5 w-5 items-center justify-center rounded-full bg-blue-500 text-xs text-white">
                                              +{{ $document->recipients->count() - 1 }}
                                          </span>
                                      @endif
                                  </div>
                                  <div class="flex flex-col">
                                      <p class="text-sm font-medium text-gray-800 dark:text-white">
                                          {{ $document->recipients->first()->recipient->name }}
                                      </p>
                                      <p class="text-xs text-gray-500 dark:text-gray-300">
                                          {{ $document->recipients->first()->recipient->email }}
                                      </p>
                                  </div>
                              </div>

                              @if ($document->recipients->count() > 1)
                                  <!-- Recipient Modal Trigger -->
                                  <button
                                      class="mt-1 text-xs text-blue-600 hover:text-blue-800 hover:underline focus:outline-none"
                                      data-modal-target="#recipientModal-{{ $document->id }}">
                                      View all recipients
                                  </button>

                                  <!-- Recipients Modal -->
                                  <div class="fixed inset-0 z-50 flex items-center justify-center hidden bg-gray-900 bg-opacity-50"
                                      id="recipientModal-{{ $document->id }}">
                                      <div class="bg-white rounded-lg shadow-lg w-96 max-h-[80vh] overflow-auto">
                                          <div class="p-4 border-b sticky top-0 bg-white z-10">
                                              <div class="flex justify-between items-center">
                                                  <h2 class="text-lg font-semibold">All Recipients ({{ $document->recipients->count() }})</h2>
                                                  <button class="text-gray-500 hover:text-gray-700 close-modal">
                                                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                          fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                          stroke-linejoin="round" class="w-5 h-5">
                                                          <line x1="18" y1="6" x2="6" y2="18"></line>
                                                          <line x1="6" y1="6" x2="18" y2="18"></line>
                                                      </svg>
                                                  </button>
                                              </div>
                                          </div>
                                          <div class="p-4">
                                              @foreach ($document->recipients as $index => $recipient)
                                                  <div class="flex items-center gap-3 py-2 {{ $index < count($document->recipients) - 1 ? 'border-b border-gray-100' : '' }}">
                                                      <img src="{{ $recipient->recipient->profile_photo_url ?? asset('default-profile.png') }}"
                                                          alt="{{ $recipient->recipient->name }}"
                                                          class="h-10 w-10 rounded-full object-cover" />
                                                      <div class="flex flex-col">
                                                          <p class="text-sm font-medium text-gray-800 dark:text-white">
                                                              {{ $recipient->recipient->name }}
                                                          </p>
                                                          <p class="text-xs text-gray-500 dark:text-gray-300">
                                                              {{ $recipient->recipient->email }}
                                                          </p>
                                                      </div>
                                                  </div>
                                              @endforeach
                                          </div>
                                      </div>
                                  </div>
                              @endif
                          @else
                              <div class="flex items-center text-gray-500 text-sm">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                                      stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                      class="mr-2">
                                      <circle cx="12" cy="8" r="5"></circle>
                                      <path d="M20 21a8 8 0 0 0-16 0"></path>
                                  </svg>
                                  No recipients found
                              </div>
                          @endif
                      </td>

                      <td class="p-4 border-b border-gray-200">
                          <p class="text-sm text-gray-700 dark:text-gray-200">{{ $document->brief_description }}</p>
                      </td>

                      <td class="p-4 border-b border-gray-200">
                          <p class="text-sm text-gray-700 dark:text-gray-200">{{ $document->letter_date->format('d/m/Y') }}</p>
                      </td>

                      <td class="p-4 border-b border-gray-200">
                          <div class="w-max">
                              <div class="relative grid items-center px-3 py-1.5 font-sans text-xs font-bold uppercase rounded-full select-none whitespace-nowrap
                              {{ $document->status === 'Pending' ? 'bg-yellow-100 text-yellow-800' :
                                 ($document->status === 'Approved' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800') }}">
                                  <span>{{ $document->status }}</span>
                              </div>
                          </div>
                      </td>

                      <td class="p-4 border-b border-gray-200">
                          <div class="flex items-center justify-center gap-2">
                              <button
                                  data-tooltip-target="edit-tooltip-{{ $document->id }}"
                                  class="flex items-center justify-center h-8 w-8 rounded-full bg-green-50 hover:bg-green-100 transition-colors text-green-600"
                                  type="button">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                                      <path d="M21.731 2.269a2.625 2.625 0 00-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 000-3.712zM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 00-1.32 2.214l-.8 2.685a.75.75 0 00.933.933l2.685-.8a5.25 5.25 0 002.214-1.32L19.513 8.2z"></path>
                                  </svg>
                              </button>

                              <!-- Edit Tooltip -->
                              <div id="edit-tooltip-{{ $document->id }}" role="tooltip"
                                  class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip">
                                  Edit Document
                                  <div class="tooltip-arrow" data-popper-arrow></div>
                              </div>

                              <button
                                  id="deleteButton"
                                  data-document-id="{{ $document->id }}"
                                  data-document-code="{{ $document->document_code }}"
                                  data-tooltip-target="delete-tooltip-{{ $document->id }}"
                                  class="delete-document flex items-center justify-center h-8 w-8 rounded-full bg-red-50 hover:bg-red-100 transition-colors text-red-600"
                                  type="button">
                                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                      stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4">
                                      <path d="M3 6h18"/><path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"/><path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"/>
                                  </svg>
                              </button>

                              <!-- Delete Tooltip -->
                              <div id="delete-tooltip-{{ $document->id }}" role="tooltip"
                                  class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-800 rounded-lg shadow-sm opacity-0 tooltip">
                                  Delete Document
                                  <div class="tooltip-arrow" data-popper-arrow></div>
                              </div>
                          </div>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>

      <!-- Empty State (Optional) -->
      @if(count($mailSent) === 0)
      <div class="flex flex-col items-center justify-center py-12">
          <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
              stroke="currentColor" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"
              class="text-gray-300 mb-4">
              <rect width="18" height="13" x="3" y="8" rx="2" ry="2"></rect>
              <path d="m19 8-8 5-8-5"></path>
              <path d="M15 13h2"></path>
              <path d="M15 16h2"></path>
          </svg>
          <h3 class="text-lg font-medium text-gray-700">No documents found</h3>
          <p class="text-sm text-gray-500 mt-1">Documents sent will appear here</p>
      </div>
      @endif
  </div>
      <!-- Pagination -->
      <div class="flex flex-col items-center space-y-3 p-4 ">
         <nav aria-label="Page navigation example">
            <ul class="inline-flex -space-x-px text-sm">
                {{-- Previous Page Button --}}
                @if ($mailSent->onFirstPage())
                    <li>
                        <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-s-lg
                        dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Previous</span>
                    </li>
                @else
                    <li>
                        <a href="{{ $mailSent->previousPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-s-lg
                        hover:bg-gray-100 hover:text-gray-700
                        dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                @endif

                {{-- Page Numbers --}}
                @foreach(range(1, $mailSent->lastPage()) as $i)
                    <li>
                        <a href="{{ $mailSent->url($i) }}" class="px-3 h-8 flex items-center justify-center border border-gray-300
                            {{ $i == $mailSent->currentPage() ? 'text-blue-600 bg-blue-50 dark:bg-gray-700 dark:text-white' : 'text-gray-500 bg-white hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white' }}">
                            {{ $i }}
                        </a>
                    </li>
                @endforeach

                {{-- Next Page Button --}}
                @if ($mailSent->hasMorePages())
                    <li>
                        <a href="{{ $mailSent->nextPageUrl() }}" class="px-3 h-8 flex items-center justify-center text-gray-500 bg-white border border-gray-300 rounded-e-lg
                        hover:bg-gray-100 hover:text-gray-700
                        dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                @else
                    <li>
                        <span class="px-3 h-8 flex items-center justify-center text-gray-400 bg-gray-200 border border-gray-300 rounded-e-lg
                        dark:bg-gray-800 dark:border-gray-700 dark:text-gray-500">Next</span>
                    </li>
                @endif
            </ul>
         </nav>
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

   document.addEventListener("DOMContentLoaded", function () {
      const rowsPerPage = 13; // Adjust as needed
      let currentPage = 1;
      let rows = Array.from(document.querySelectorAll("#documentTableBody tr"));
      const totalPages = Math.ceil(rows.length / rowsPerPage);

      function showPage(page) {
         currentPage = page;
         let start = (page - 1) * rowsPerPage;
         let end = start + rowsPerPage;

         rows.forEach((row, index) => {
            row.style.display = index >= start && index < end ? "table-row" : "none";
         });

         updatePagination();
      }

      function updatePagination() {
         let paginationButtons = document.querySelectorAll(".pagination-button");
         paginationButtons.forEach((button) => {
            let pageNumber = parseInt(button.textContent);
            if (pageNumber === currentPage) {
               button.classList.add("bg-slate-800", "text-white");
               button.classList.remove("border-slate-300", "text-slate-600");
            } else {
               button.classList.remove("bg-slate-800", "text-white");
               button.classList.add("border-slate-300", "text-slate-600");
            }
         });

         document.getElementById("prevPage").disabled = currentPage === 1;
         document.getElementById("nextPage").disabled = currentPage === totalPages;
      }

      // Initialize Pagination
      showPage(currentPage);

      // Handle Click Events
      document.getElementById("prevPage").addEventListener("click", function () {
         if (currentPage > 1) showPage(currentPage - 1);
      });

      document.getElementById("nextPage").addEventListener("click", function () {
         if (currentPage < totalPages) showPage(currentPage + 1);
      });

      document.querySelectorAll(".pagination-button").forEach((button) => {
         button.addEventListener("click", function () {
            showPage(parseInt(this.textContent));
         });
      });
   });

</script>
