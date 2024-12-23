<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                    <li class="inline-flex items-center lg:text-5xl sm:text-xl">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                            </svg>
                            <h2 class="font-semibold lg:text-xl sm:text-md text-gray-800 dark:text-gray-200 leading-tight">
                                {{ __('Dashboards') }}
                            </h2>
                        </a>
                    </li>
                    <li aria-current="page">
                        <div class="flex items-center lg:text-5xl sm:text-xl">
                            <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                            </svg>

                            <svg class="w-3 h-3 text-gray-500 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M9 2.221V7H4.221a2 2 0 0 1 .365-.5L8.5 2.586A2 2 0 0 1 9 2.22ZM11 2v5a2 2 0 0 1-2 2H4v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V4a2 2 0 0 0-2-2h-7ZM8 16a1 1 0 0 1 1-1h6a1 1 0 1 1 0 2H9a1 1 0 0 1-1-1Zm1-5a1 1 0 1 0 0 2h6a1 1 0 1 0 0-2H9Z" clip-rule="evenodd"/>
                            </svg>


                            <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Incoming files</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <button data-ripple-light="true" data-modal-target="extralarge-modal" data-modal-toggle="extralarge-modal" class="order-last relative inline-flex items-center justify-center p-0.5 mb-2 me-2 overflow-hidden text-sm font-medium text-gray-900 rounded-lg group bg-gradient-to-br from-cyan-500 to-blue-500 group-hover:from-cyan-500 group-hover:to-blue-500 hover:text-white dark:text-white focus:ring-4 focus:outline-none focus:ring-cyan-200 dark:focus:ring-cyan-800 sm:w-auto" type="button">
                <span class="relative lg:px-5 lg:py-3 sm:px-6 sm:py-3 md:px-5 md:py-3 transition-all ease-in duration-75 bg-white dark:bg-gray-900 rounded-md group-hover:bg-opacity-0">
                Compose
                <i class="fa fa-plus ml-2"></i>
                </span>
            </button>

            <!-- Extra Large Modal -->
            <div id="extralarge-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative w-full max-w-4xl max-h-full">
                    <!-- Modal content -->
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        <!-- Modal header -->
                        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
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
                                    <div class="flex items-center">
                                        <span class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Document code : </span>
                                        <span class="ms-2 mb-4 flex text-center items-center text-red-500 dark:text-red-600" disabled>
                                            123-1111-44444
                                        </span>
                                    </div>
                                    <form action="#">
                                        <div class="grid gap-4 grid-cols-2">
                                            <!-- Sender -->
                                             <div class="w-full">
                                                <label for="sender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sender</label>
                                                <!-- Select sender -->
                                                <select id="sender" multiple="" data-hs-select='{
                                                   "hasSearch": true,
                                                   "isSearchDirectMatch": false,
                                                   "searchPlaceholder": "Search...",
                                                   "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                                   "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                                   "placeholder": "Select multiple options...",
                                                   "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                                   "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 ps-3 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                                   "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                                   "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                                   "optionTemplate": "<div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 \" data-title></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                                                   "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                                }' class="block">
                                                   <option value="">Choose</option>
                                                   @foreach ($users as $user)
                                                      <option value="{{ $user->id }}" data-hs-select-option='{
                                                            "icon": "<img class=\"shrink-0 size-5 rounded-full\" src=\"{{ $user->profile_photo_url }}\" alt=\"{{ $user->name }}\" />"}'>
                                                            {{ $user->name }}
                                                      </option>
                                                   @endforeach
                                                </select>
                                                <!-- End Select -->
                                             </div>

                                           <!-- Recipient -->
                                             <div class="w-full">
                                                <label for="recipient" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Recipient</label>
                                                <!-- Select -->
                                                <select id="recipient" multiple="" data-hs-select='{
                                                   "hasSearch": true,
                                                   "isSearchDirectMatch": false,
                                                   "searchPlaceholder": "Search...",
                                                   "searchClasses": "block w-full text-sm border-gray-200 rounded-lg focus:border-blue-500 focus:ring-blue-500 before:absolute before:inset-0 before:z-[1] dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 py-2 px-3",
                                                   "searchWrapperClasses": "bg-white p-2 -mx-1 sticky top-0 dark:bg-neutral-900",
                                                   "placeholder": "Select multiple options...",
                                                   "toggleTag": "<button type=\"button\" aria-expanded=\"false\"></button>",
                                                   "toggleClasses": "hs-select-disabled:pointer-events-none hs-select-disabled:opacity-50 relative py-2.5 ps-3 pe-9 flex gap-x-2 text-nowrap w-full cursor-pointer bg-white border border-gray-200 rounded-lg text-start text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-neutral-600",
                                                   "dropdownClasses": "mt-2 z-50 w-full max-h-72 p-1 space-y-0.5 bg-white border border-gray-200 rounded-lg overflow-hidden overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500 dark:bg-neutral-900 dark:border-neutral-700",
                                                   "optionClasses": "py-2 px-4 w-full text-sm text-gray-800 cursor-pointer hover:bg-gray-100 rounded-lg focus:outline-none focus:bg-gray-100 dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:text-neutral-200 dark:focus:bg-neutral-800",
                                                   "optionTemplate": "<div class=\"flex items-center\"><div class=\"me-2\" data-icon></div><div><div class=\"hs-selected:font-semibold text-sm text-gray-800 \" data-title></div></div><div class=\"ms-auto\"><span class=\"hidden hs-selected:block\"><svg class=\"shrink-0 size-4 text-blue-600\" xmlns=\"http://www.w3.org/2000/svg\" width=\"16\" height=\"16\" fill=\"currentColor\" viewBox=\"0 0 16 16\"><path d=\"M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z\"/></svg></span></div></div>",
                                                   "extraMarkup": "<div class=\"absolute top-1/2 end-3 -translate-y-1/2\"><svg class=\"shrink-0 size-3.5 text-gray-500 \" xmlns=\"http://www.w3.org/2000/svg\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" stroke-linecap=\"round\" stroke-linejoin=\"round\"><path d=\"m7 15 5 5 5-5\"/><path d=\"m7 9 5-5 5 5\"/></svg></div>"
                                                }' class="block">
                                                   <option value="">Choose</option>
                                                   @foreach ($users as $user)
                                                      <option value="{{ $user->id }}" data-hs-select-option='{
                                                            "icon": "<img class=\"shrink-0 size-5 rounded-full\" src=\"{{ $user->profile_photo_url }}\" alt=\"{{ $user->name }}\" />"}'>
                                                            {{ $user->name }}
                                                      </option>
                                                   @endforeach
                                                </select>
                                                <!-- End Select -->
                                             </div>

                                             <!-- Subject -->
                                            <div class="sm:col-span-2">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Subject</label>
                                                <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                            </div>
                                            <!-- Description -->
                                            <div class="sm:col-span-2">
                                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <textarea id="description" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Your description here"></textarea>
                                            </div>
                                            <!-- Prioritization -->
                                            <div class="w-full">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Prioritization</label>
                                                <select id="category" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="">Select priority</option>
                                                    <option value="Urgent">Urgent</option>
                                                    <option value="Usual">Usual</option>
                                                </select>
                                            </div>
                                            <!-- Date of letter -->
                                            <div class="w-full">
                                                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date of letter</label>
                                                <div class="relative max-w-xlg">
                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                        <svg class="w-4 h-4 text-gray-700 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                        </svg>
                                                    </div>
                                                    <input datepicker-buttons datepicker-autoselect-today datepicker datepicker-autohide datepicker-orientation="top right" id="date-letter" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                                </div>
                                            </div>
                                            <!-- Classification -->
                                            <div class="w-full">
                                                <label for="classification" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Classification</label>
                                                <select id="classification" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                   <option selected="">Select classification</option>
                                                   @foreach ($classifications as $classification)
                                                      <option value="{{ $classification->name }}">{{ $classification->name }}</option>
                                                   @endforeach
                                                </select>
                                            </div>
                                            <!-- Sub-Classification -->
                                            <div class="w-full">
                                                <label for="sub-class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sub-classification</label>
                                                <select id="sub-class" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                   <option selected="">Select sub-classification</option>
                                                </select>
                                            </div>
                                            <!-- Action -->
                                            <div class="w-full">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Action</label>
                                                <select id="category" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
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
                                                <label for="deadline" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deadline date</label>
                                                <div class="relative max-w-xlg">
                                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                        <svg class="w-4 h-4 text-white0 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                        </svg>
                                                    </div>
                                                    <input datepicker-buttons datepicker datepicker-autoselect-today datepicker-autohide datepicker-orientation="top right" id="deadline-date" type="text" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select deadline">
                                                </div>
                                            </div>
                                            <!-- Delivery type -->
                                            <div class="w-full">
                                                <label for="category" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Delivery type</label>
                                                <select id="category" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                                    <option selected="">Select delivery</option>
                                                    <option value="Hand-Over">Hand-Over</option>
                                                    <option value="Through DMS">Through DMS</option>
                                                    <option value="Combination">Combination</option>
                                                </select>
                                            </div>
                                            <!-- Reference -->
                                            <div class="w-full">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reference</label>
                                                <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                            </div>
                                            <div class="flex mt-4 col-span-2">
                                                <span class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add attachment</span>
                                            </div>
                                            <!-- Description -->
                                            <div class="w-full">
                                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                                <input type="text" name="name" id="name" class="bg-white border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Type product name" required="">
                                            </div>
                                            <!-- Attachments -->
                                            <div class="w-full">
                                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="multiple_files">Upload file(s)</label>
                                                <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="multiple_files" type="file" multiple>
                                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">.</p>
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
        </div>

    </x-slot>

    <div class="py-4">
        <div class=" mx-auto sm:px-6 lg:px-2">
            <x-welcome />
        </div>
    </div>
</x-app-layout>
<script>
   // Handle change event for classification
   document.getElementById('classification').addEventListener('change', function() {
       const classification = this.value;

       if (classification) {
           // Filter sub-classifications based on the selected classification
           const subClassifications = @json($classifications);

           // Find the sub-classifications for the selected classification
           const filteredSubClasses = subClassifications.filter(sub => sub.name === classification);

           // Populate the sub-classification dropdown
           const subClassSelect = document.getElementById('sub-class');
           subClassSelect.innerHTML = '<option selected="">Select sub-classification</option>'; // Reset options

           filteredSubClasses.forEach(sub => {
               const option = document.createElement('option');
               option.value = sub.sub_class;
               option.textContent = sub.sub_class;
               subClassSelect.appendChild(option);
           });
       }
   });
</script>
