{{-- <div class="container mx-auto p-4">
   <h2 class="text-xl font-bold mb-4">Gmail Inbox</h2>

   <a href="{{ route('gmail.auth') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Login with Google</a>

   @if(isset($emailData))
       <table class="w-full mt-4 border">
           <thead>
               <tr class="bg-gray-200">
                   <th class="border px-4 py-2">From</th>
                   <th class="border px-4 py-2">Subject</th>
                   <th class="border px-4 py-2">Snippet</th>
               </tr>
           </thead>
           <tbody>
               @foreach($emailData as $email)
               <tr>
                   <td class="border px-4 py-2">{{ $email['from'] }}</td>
                   <td class="border px-4 py-2">{{ $email['subject'] }}</td>
                   <td class="border px-4 py-2">{{ $email['snippet'] }}</td>
               </tr>
               @endforeach
           </tbody>
       </table>
   @endif
</div> --}}
