<li class="flex items-center justify-between bg-gray-100 dark:bg-gray-700 p-2 rounded-md">
   <span class="text-gray-700 dark:text-gray-300">{{ $attachment->file_name }}</span>
   <div class="flex items-center gap-2">
       <form action="{{ route('attachments.delete', $attachment->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this attachment?');">
           @csrf
           @method('DELETE')
           <button type="submit" class="text-red-500 hover:text-red-700">
               <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                   <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
               </svg>
           </button>
       </form>
       <a href="{{ route('download.attachment', $attachment->id) }}" class="text-gray-600 hover:text-gray-800">
           <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
               <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v12m0 0l-4-4m4 4l4-4m-4 4V4" />
           </svg>
       </a>
   </div>
</li>
