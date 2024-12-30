<button
   data-ripple-light="true"
   data-modal-target="extralarge-modal"
   data-modal-toggle="extralarge-modal"
   data-logged-in-user="{{ $loggedInUser->id }}"
   id="compose-button"
   class="flex items-center gap-3 rounded-lg bg-gray-900 py-2 px-4 border border-transparent text-center text-sm text-white transition-all shadow-sm hover:shadow-lg focus:bg-slate-700 focus:shadow-none active:bg-slate-700 hover:bg-slate-700 active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" type="button">
   <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-mail-plus w-4 h-4"><path d="M22 13V6a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2v12c0 1.1.9 2 2 2h8"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/><path d="M19 16v6"/><path d="M16 19h6"/>
   </svg>

   Compose File
</button>

<!-- Extra Large Modal -->
<div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full bg-opacity-60 backdrop-blur-sm">
   <div class="relative w-full max-w-4xl max-h-full backdrop-blur-sm">
       <!-- Modal content -->
       <div class="relative bg-white rounded-lg shadow dark:bg-gray-700 ">
           <!-- Modal header -->
           <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 ">
               <h3 class="text-xl font-medium text-gray-900 dark:text-white">
                   Compose new file
               </h3>
               <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="extralarge-modal">
                   <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                       <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                   </svg>
                   <span class="sr-only">Close modal</span>
               </button>
           </div>
           <!-- Modal body -->
           <div class="p-4 md:p-5 space-y-4">
               <section class="bg-white dark:bg-gray-700">
                   <div class="py-8 px-4 mx-auto max-w-4xl lg:py-2">
                       <form id="document-form" action="#" method="POST"  enctype="multipart/form-data">
                          @csrf
                           <div class="grid gap-4 grid-cols-2">
                             <div class="flex items-center sm:col-span-2">
                                <span class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Document code : </span>
                                <span id="document-code" class="ms-2 mb-4 flex text-center items-center text-red-500 dark:text-red-600" disabled>
                                   <!-- Document code will be displayed here -->
                                </span>
                                <input type="hidden" id="hidden-document-code-input" name="document_code" />
                            </div>
                             <!-- Sender -->
                             <div class="w-full">
                                <label for="sender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sender</label>
                                <div class="flex items-center space-x-3">
                                   <img src="{{ $loggedInUser->profile_photo_url }}" alt="{{ $loggedInUser->name }}" class="w-10 h-10 rounded-full">

                                   <!-- Display the sender's name in a readonly input -->
                                   <input type="text" id="sender_name"
                                         value="{{ $loggedInUser->name }}"
                                         class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                         readonly />

                                   <!-- Hidden input for sender_id (value will be the logged-in user's ID) -->
                                   <input type="hidden" id="sender_id" name="sender_id" value="{{ $loggedInUser->id }}" />
                                </div>
                             </div>



                              <!-- Recipient -->
                             <div class="w-full">
                                   <label for="recipient" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recipient</label>
                                   <!-- Select -->
                                   <select id="recipient" name="recipient[]" multiple="" data-hs-select='{
                                         "placeholder": "Select multiple options...",
                                         "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                         "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-3 ps-4 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                         "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                         "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                         "optionTemplate": "<div class=\"flex justify-between items-center w-full\"><span data-title></span><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-3.5 text-blue-600 dark:text-blue-500\" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><polyline points=\"20 6 9 17 4 12\"/></svg></span></div>",
                                         "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 dark:text-neutral-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                   }' class="block">
                                      <option value="">Choose</option>
                                      @foreach ($users as $user)
                                         <option value="{{ $user->id }}">
                                         {{ $user->name }}
                                         </option>
                                      @endforeach
                                   </select>
                                   <!-- End Select -->
                             </div>

                                <!-- Subject -->
                             <div class="sm:col-span-2">
                                <label for="subject" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                                <input type="text" name="subject" id="subject" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                             </div>

                              <!-- Description of document -->
                              <div class="sm:col-span-2">
                                <label for="brief_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="brief_description" name="brief_description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                              </div>

                              <!-- Prioritization -->
                              <div class="w-full">
                                <label for="priority" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prioritization</label>
                                <select id="priority" name="priority" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                      <option selected="">Select priority</option>
                                      <option value="Urgent">Urgent</option>
                                      <option value="Usual">Usual</option>
                                </select>
                              </div>

                               <!-- Date of letter -->
                               <div class="w-full">
                                   <label for="letter_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of letter</label>
                                   <div class="relative max-w-xlg">
                                       <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                           <svg class="w-4 h-4 text-gray-700 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                           </svg>
                                       </div>
                                       <input datepicker-buttons datepicker-autoselect-today datepicker datepicker-autohide datepicker-orientation="bottom right" id="letter_date" name="letter_date" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                   </div>
                               </div>

                               <!-- Classification -->
                                <div class="w-full">
                                   <label for="classification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Classification</label>
                                   <select id="classification" name="classification" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                      <option selected="">Select classification</option>
                                      @foreach ($classifications as $classification => $subClasses)
                                         <option value="{{ $classification }}">{{ $classification }}</option>
                                      @endforeach
                                   </select>
                                </div>

                                <!-- Sub-Classification -->
                                <div class="w-full">
                                   <label for="sub_classification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub-classification</label>
                                   <select id="sub_classification" name="sub_classification" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                      <option selected="">Select sub-classification</option>
                                   </select>
                                </div>

                               <!-- Action -->
                               <div class="w-full">
                                   <label for="action" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
                                   <select id="action" name="action" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                       <option selected="">Select action</option>
                                       <option value="For Submission of Documents">For Submission of Documents</option>
                                       <option value="For Approvals/Signature">For Approvals/Signature</option>
                                       <option value="For Monitoring">For Monitoring</option>
                                       <option value="For Comment/Justification">For Comment/Justification</option>
                                       <option value="For Consolidation">For Consolidation</option>
                                       <option value="For Confirmation">For Confirmation</option>
                                       <option value="For Printing">For Printing</option>
                                       <option value="For Dissemination">For Dissemination</option>
                                       <option value="For other actions">For Other Appopriate actions, Please Specify</option>
                                   </select>
                               </div>

                               <!-- Deadline date -->
                               <div class="w-full">
                                   <label for="deadline_date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline date</label>
                                   <div class="relative max-w-xlg">
                                       <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                           <svg class="w-4 h-4 text-white0 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                           <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                           </svg>
                                       </div>
                                       <input datepicker-buttons datepicker datepicker-autoselect-today datepicker-autohide datepicker-orientation="right" id="deadline_date" name="deadline_date" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select deadline">
                                   </div>
                               </div>

                               <!-- Delivery type -->
                               <div class="w-full">
                                   <label for="delivery_type" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Delivery type</label>
                                   <select id="delivery_type" name="delivery_type" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                       <option selected="">Select delivery</option>
                                       <option value="Hand-Over">Hand-Over</option>
                                       <option value="Through DMS">Through DMS</option>
                                       <option value="Combination">Combination</option>
                                   </select>
                               </div>

                               <!-- Reference -->
                               <div class="w-full">
                                   <label for="reference" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reference</label>
                                   <input type="text" name="reference" id="reference" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                               </div>

                               <div class="flex mt-4 col-span-2">
                                   <span class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add attachment</span>
                               </div>

                               <!-- Description of attach files -->
                               <div class="w-full">
                                   <label for="detailed_description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                   <input type="text" name="detailed_description" id="detailed_description" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                               </div>

                               <!-- Attachments -->
                               <div class="w-full">
                                   <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file">Upload multiple files</label>
                                   <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file-input" name="file[]" type="file" multiple>

                                   <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">WORD, PDF, EXCEL.</p>
                               </div>
                             </div>
                           <!-- button -->
                           <div class="flex justify-end items-center">
                               <button type="submit" class="flex px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-primary-200 dark:focus:ring-primary-900 hover:bg-primary-800 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                   Send
                                   <div class="ml-2">
                                       <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4 ">
                                           <path d="M3.478 2.404a.75.75 0 0 0-.926.941l2.432 7.905H13.5a.75.75 0 0 1 0 1.5H4.984l-2.432 7.905a.75.75 0 0 0 .926.94 60.519 60.519 0 0 0 18.445-8.986.75.75 0 0 0 0-1.218A60.517 60.517 0 0 0 3.478 2.404Z" />
                                       </svg>
                                   </div>
                               </button>
                           </div>
                       </form>
                   </div>
               </section>
           </div>
       </div>
   </div>
</div>
