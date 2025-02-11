<div class="text-center">
   <p class="uppercase lg:text-5xl sm:text-xl font-bold tracking-widest mb-2 dark:text-white">track document</p>

   <div class="w-full max-w-5xl mx-auto grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-2">
      <form method="GET" action="{{ route('searchLog', ['documentCode' => request('documentCode')]) }}">
         {{-- @csrf --}}
         <label for="track" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Track</label>
         <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
               <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                     <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
               </svg>
            </div>
            <input type="track" id="track" name="track" value="{{ session('documentCode') }}" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Document code" required />
            <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Track</button>
         </div>
      </form>
   </div>
</div>

{{-- Error Message --}}
@if (session('error'))
<p class="text-red-500 text-center mt-4">{{ session('error') }}</p>
@endif

{{-- Track here (Only Show If Document Exists) --}}
@if ($document)
   <div class="w-full max-w-5xl mx-auto bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 p-6 lg:p-2">
      <div class="relative flex flex-col w-full h-full text-gray-700 bg-white border dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 shadow-md rounded-xl">
         <div class="relative mx-4 mt-4 overflow-hidden text-gray-700 bg-white dark:border-gray-600 dark:bg-gray-700 dark:text-gray-50 rounded-none">
            <div class="flex items-center gap-8 mb-2">
                  <div class="flex content-center items-center self-center">
                     <div>
                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                           <path fill-rule="evenodd" d="M3 4a1 1 0 0 0-.822 1.57L6.632 12l-4.454 6.43A1 1 0 0 0 3 20h13.153a1 1 0 0 0 .822-.43l4.847-7a1 1 0 0 0 0-1.14l-4.847-7a1 1 0 0 0-.822-.43H3Z" clip-rule="evenodd"/>
                        </svg>
                     </div>

                     <h5
                     class="block font-sans text-xl antialiased font-semibold leading-snug tracking-normal text-blue-gray-900 dark:text-blue-gray-50">
                     RESULT
                     </h5>
                  </div>
            </div>
         </div>
         {{-- <div class="p-6 px-0 overflow-scroll">

         </div> --}}
         {{-- <div class="flex items-center justify-center p-4 border-t border-blue-gray-50">
            <ol class="relative border-s border-gray-200 dark:border-gray-700">
               <li class="mb-10 ms-6">
                  <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                      <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                      </svg>
                  </span>
                  <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">SENDER: {{ $sender->name }}</h3>
                  <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                      RECIPIENTS:
                      @foreach($recipients as $recipient)
                        {{ $recipient->recipient->name }}@if(!$loop->last), @endif
                     @endforeach
                  </h3>
                  <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                      Subject: {{ $document->subject }}<br />
                      Created on: {{ $document->created_at->format('F d, Y') }}
                  </time>
               </li>
               <li class="mb-10 ms-6">
                  <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                     <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                     </svg>
                  </span>
                  <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">PENDING</h3>
                  <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on December 7th, 2021</time>
                  <p class="text-base font-normal text-gray-500 dark:text-gray-400">All of the pages and components are first designed in Figma and we keep a parity between the two versions even as we update the project.</p>
               </li>
               <li class="ms-6">
                  <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                     <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                     </svg>
                  </span>
                  <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">RECIEVED</h3>
                  <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on December 2nd, 2021</time>
                  <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements built on top of Tailwind CSS.</p>
               </li>
               <li class="ms-6">
                  <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                     <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                     </svg>
                  </span>
                  <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">RELEASED</h3>
                  <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">Released on December 2nd, 2021</time>
                  <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements built on top of Tailwind CSS.</p>
               </li>
            </ol>
         </div> --}}
         <div class="flex items-center justify-center p-4 border-t border-blue-gray-50">
            <ol class="relative border-s border-gray-200 dark:border-gray-700">
                <!-- Document Created -->
                <li class="mb-10 ms-6">
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                        SENDER: {{ $sender->name }}
                    </h3>
                    <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                        RECIPIENTS:
                        @foreach($recipients as $recipient)
                            {{ $recipient->recipient->name }}@if(!$loop->last), @endif
                        @endforeach
                    </h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        Subject: {{ $document->subject }}<br />
                        Created on: {{ $document->created_at->format('F d, Y') }}
                    </time>
                </li>

                <!-- Pending Status (Only if not released yet) -->
                @if($document->status === 'Pending')
                <li class="mb-10 ms-6">
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-yellow-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-yellow-900">
                        <svg class="w-2.5 h-2.5 text-yellow-800 dark:text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a8 8 0 1 0 8 8 8 8 0 0 0-8-8Zm0 14a6 6 0 1 1 6-6 6 6 0 0 1-6 6Z"/>
                        </svg>
                    </span>
                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">PENDING</h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        Document is still pending
                    </time>
                </li>
                @endif

                <!-- Received & Released (Only if Released) -->
                @if($document->status === 'Released')
                <li class="mb-10 ms-6">
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-green-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-green-900">
                        <svg class="w-2.5 h-2.5 text-green-800 dark:text-green-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">RECEIVED</h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        Received on: {{ $document->updated_at->format('F d, Y') }}
                    </time>
                </li>
                <li class="ms-6">
                    <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </span>
                    <h3 class="mb-1 text-lg font-semibold text-gray-900 dark:text-white">RELEASED</h3>
                    <time class="block mb-2 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">
                        Released on: {{ $document->updated_at->format('F d, Y') }}
                    </time>
                </li>
                @endif
            </ol>
         </div>

      </div>
   </div>
@endif
