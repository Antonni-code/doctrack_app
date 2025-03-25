{{-- <li class="flex items-center justify-between bg-gray-100 dark:bg-gray-700 p-2 rounded-md">
   <span class="text-gray-700 dark:text-gray-300">{{ $attachment->file_name }}</span>
   <div class="flex items-center gap-2"> --}}
       {{-- <form action="{{ route('attachments.delete', $attachment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this attachment?');">
           @csrf
           @method('DELETE')
           <button type="submit" class="text-red-500 hover:text-red-700">
               <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
               </svg>
           </button>
       </form> --}}
       {{-- <button
         type="button"
         class="text-red-500 hover:text-red-700 open-delete-modal"
         data-id="{{ $attachment->id }}"
         data-name="{{ $attachment->file_name }}"
         data-route="{{ route('attachments.delete', $attachment->id) }}">
         <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
         </svg>
       </button>
       <a href="{{ route('download.attachment', $attachment->id) }}" class="text-gray-600 hover:text-gray-800">
           <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4m-4 4V4" />
           </svg>
       </a>
   </div>
</li> --}}


<li class="group hover:bg-gray-100 dark:hover:bg-gray-700/70 transition-colors duration-150">
   <div class="flex items-center justify-between py-3 px-4">
      <div class="flex items-center space-x-3 min-w-0 flex-1">
         <!-- File icon based on extension -->
         <div class="flex-shrink-0">
            <div class="w-10 h-10 flex items-center justify-center bg-gray-200 dark:bg-gray-600 rounded-lg text-gray-500 dark:text-gray-400">
               <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
               </svg>
            </div>
         </div>

         <!-- File details -->
         <div class="min-w-0 flex-1">
            <p class="text-sm font-medium text-gray-800 dark:text-gray-200 truncate">{{ $attachment->file_name }}</p>
            <p class="text-xs text-gray-500 dark:text-gray-400">
               <!-- Add file size if available -->
               <!-- {{ number_format($attachment->file_size / 1024, 2) }} KB • -->
               Added {{ $attachment->created_at->diffForHumans() }}
            </p>
         </div>
      </div>

      <div class="flex items-center ml-2 space-x-1 opacity-70 group-hover:opacity-100 transition-opacity">
         <!-- Download button -->
         <a href="{{ route('download.attachment', $attachment->id) }}" class="p-2 text-gray-600 dark:text-gray-400 hover:text-blue-600 dark:hover:text-blue-400 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-full transition-colors">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
               <path stroke-linecap="round" stroke-linejoin="round" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
            </svg>
         </a>

         <!-- Delete button -->
         <button
            type="button"
            class="p-2 text-gray-600 dark:text-gray-400 hover:text-red-600 dark:hover:text-red-400 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-full transition-colors open-delete-modal"
            data-id="{{ $attachment->id }}"
            data-name="{{ $attachment->file_name }}"
            data-route="{{ route('attachments.delete', $attachment->id) }}">
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
               <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
         </button>
      </div>
   </div>
</li>
