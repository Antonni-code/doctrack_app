<!-- Minimalist Modal for the document -->
<div id="documentModal-{{ $document->id }}" class="modal fixed z-50 inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 backdrop-blur-sm hidden">
   <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-full max-w-2xl">
      <!-- Header -->
      <div class="flex justify-between items-center p-4 border-b"
         :class="{
               'bg-yellow-300 text-black': '{{ $document->status }}' === 'Pending',
               'bg-green-400 text-black': '{{ $document->status }}' === 'Released',
               'bg-gray-500 text-white': '{{ $document->status }}' !== 'Pending' && '{{ $document->status }}' !== 'Released'
         }">
         {{-- <h2 class="text-xl font-semibold">{{ strtoupper($document->status) }}</h2> --}}
         <!-- Status and Priority -->
         <h2 class="text-xl font-semibold">
            {{ strtoupper($document->status) }}
            <span class="ml-2 px-2 py-1 text-sm font-medium rounded-md"
               :class="{
                     'bg-red-500 text-white': '{{ $document->priority }}' === 'Urgent',
                     'bg-yellow-500 text-black': '{{ $document->priority }}' === 'Medium',
                     'bg-blue-500 text-white': '{{ $document->priority }}' === 'Usual'
               }">
               {{ strtoupper($document->priority) }}
            </span>
         </h2>
         <button data-close-target="documentModal-{{ $document->id }}" class="text-black text-lg close-modal">
               <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 6 6 18"/><path d="M6 6l12 12"/></svg>
         </button>
      </div>
      <!-- Content -->
      <div class="p-6 space-y-5 max-h-[60vh] overflow-y-auto bg-white dark:bg-gray-800 text-gray-800 dark:text-gray-200">
         <!-- Document Info Grid -->
         <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- Document Code -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg flex items-center gap-3 shadow-sm dark:shadow-gray-900">
               <div class="bg-blue-100 dark:bg-blue-900/50 p-2 rounded-md">
                  <svg class="h-5 w-5 text-blue-600 dark:text-blue-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
               </div>
               <div>
                  <div class="text-xs font-medium text-gray-500 dark:text-gray-400">Document Code</div>
                  <div class="font-semibold dark:text-white">{{ strtoupper($document->document_code) }}</div>
               </div>
            </div>

            <!-- Sender -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg flex items-center gap-3 shadow-sm dark:shadow-gray-900">
               <div class="bg-indigo-100 dark:bg-indigo-900/50 p-2 rounded-md">
                  <svg class="h-5 w-5 text-indigo-600 dark:text-indigo-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
               </div>
               <div>
                  <div class="text-xs font-medium text-gray-500 dark:text-gray-400">Sender</div>
                  <div class="font-semibold dark:text-white">{{ $document->sender->name }}</div>
                  <div class="text-xs text-gray-500 dark:text-gray-400">{{ $document->sender->email }}</div>
               </div>
            </div>

            <!-- Classification -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg flex items-center gap-3 shadow-sm dark:shadow-gray-900">
               <div class="bg-purple-100 dark:bg-purple-900/50 p-2 rounded-md">
                  <svg class="h-5 w-5 text-purple-600 dark:text-purple-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
               </div>
               <div>
                  <div class="text-xs font-medium text-gray-500 dark:text-gray-400">Classification</div>
                  <div class="font-semibold dark:text-white">{{ $document->classification }}</div>
                  <div class="text-xs dark:text-gray-300">{{ $document->sub_classification }}</div>
               </div>
            </div>

            <!-- Subject -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg flex items-center gap-3 shadow-sm dark:shadow-gray-900">
               <div class="bg-green-100 dark:bg-green-900/50 p-2 rounded-md">
                  <svg class="h-5 w-5 text-green-600 dark:text-green-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
               </div>
               <div>
                  <div class="text-xs font-medium text-gray-500 dark:text-gray-400">Subject</div>
                  <div class="font-semibold dark:text-white">{{ $document->subject }}</div>
               </div>
            </div>

            <!-- Action -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg flex items-center gap-3 shadow-sm dark:shadow-gray-900">
               <div class="bg-amber-100 dark:bg-amber-900/50 p-2 rounded-md">
                  <svg class="h-5 w-5 text-amber-600 dark:text-amber-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>
               </div>
               <div>
                  <div class="text-xs font-medium text-gray-500 dark:text-gray-400">Action</div>
                  <div class="font-semibold dark:text-white">{{ $document->action }}</div>
               </div>
            </div>

            <!-- Letter Date -->
            <div class="bg-gray-50 dark:bg-gray-700 p-4 rounded-lg flex items-center gap-3 shadow-sm dark:shadow-gray-900">
               <div class="bg-red-100 dark:bg-red-900/50 p-2 rounded-md">
                  <svg class="h-5 w-5 text-red-600 dark:text-red-300" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
               </div>
               <div>
                  <div class="text-xs font-medium text-gray-500 dark:text-gray-400">Letter Date</div>
                  <div class="font-semibold dark:text-white">{{ $document->letter_date->format('d/m/Y') }}</div>
               </div>
            </div>
         </div>
      </div>
      <!-- Attachments Section -->
      @if ($document->attachments->isNotEmpty())
      <div class="mt-6 pt-5 border-t border-gray-200 dark:border-gray-700">
         <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-medium text-gray-800 dark:text-gray-200 flex items-center">
               <span class="inline-flex items-center justify-center w-8 h-8 bg-blue-100 dark:bg-blue-900/40 rounded-full mr-2">
                  <svg class="w-5 h-5 text-blue-600 dark:text-blue-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                     <path stroke-linecap="round" stroke-linejoin="round" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
               </span>
               Attachments
            </h3>

            <form id="attachment-form-{{ $document->id }}" enctype="multipart/form-data" class="relative">
               @csrf
               <input type="file" name="attachment" class="hidden" id="attachment-input-{{ $document->id }}">
               <label for="attachment-input-{{ $document->id }}" class="inline-flex items-center justify-center p-2 bg-gray-100 hover:bg-gray-200 dark:bg-gray-700 dark:hover:bg-gray-600 rounded-full cursor-pointer text-gray-600 dark:text-gray-300 hover:text-gray-800 dark:hover:text-white transition-all duration-200">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                     <path d="M12 5v14M5 12h14" />
                  </svg>
               </label>
            </form>
         </div>

         <!-- Attachments List -->
         {{-- <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg p-1">
            <ul id="attachment-list-{{ $document->id }}" class="divide-y divide-gray-200 dark:divide-gray-700">
               @each('partials.attachment-item', $document->attachments, 'attachment')
            </ul>
         </div> --}}
         <div class="bg-gray-50 dark:bg-gray-800/50 rounded-lg">
            <div id="attachment-list-{{ $document->id }}" class="thin-scrollbar">
               <ul class="divide-y divide-gray-200 dark:divide-gray-700">
                  @each('partials.attachment-item', $document->attachments, 'attachment')
               </ul>
            </div>
         </div>
      </div>
      @endif

      <!-- Action Buttons -->
      <div class="flex justify-end gap-2 p-4 mt-4 border-t border-gray-200 dark:border-gray-700">
      {{-- @if ($document->status == 'Pending')
         <button class="release-document px-5 py-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2"
      data-document-id="{{ $document->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <polyline points="9 11 12 14 22 4"></polyline>
               <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
            Release
         </button>
      @endif --}}
      @if ($document->status == 'Pending')
        <button class="receive-document px-5 py-2 bg-green-500 hover:bg-green-600 dark:bg-green-600 dark:hover:bg-green-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2"
            data-document-id="{{ $document->id }}">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <polyline points="9 11 12 14 22 4"></polyline>
                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
            </svg>
            Receive
        </button>
      @elseif ($document->status == 'Received')
         <button class="release-document px-5 py-2 bg-blue-500 hover:bg-blue-600 dark:bg-blue-600 dark:hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition-all duration-200 flex items-center gap-2"
               data-document-id="{{ $document->id }}">
               <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <polyline points="9 11 12 14 22 4"></polyline>
                  <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
               </svg>
               Release
         </button>
      @endif
      </div>
   </div>
</div>
