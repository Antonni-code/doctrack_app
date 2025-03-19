<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
         {{-- <div id="toast-container" class="space-y-3 fixed top-5 right-5 z-[999]"></div> --}}
         <x-toast/>
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

            <!-- Compose Button and  Compose Modal Form-->
            <x-composemodal :loggedInUser="$loggedInUser" :users="$users" :classifications="$classifications"/>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-welcome :incomingDocuments="$incomingDocuments"
            :classifications="$classifications"
            :loggedInUser="$loggedInUser"
            :users="$users"
            :documentCode="$documentCode"
            :activeUsers="$activeUsers"
            :excludedUsers="$excludedUsers" :countIncoming="$countIncoming" :countOutgoing="$countOutgoing"
            :countPending="$countPending"
            :totalPages="$totalPages" :page="$page" :perPage="$perPage" :totalItems="$totalItems"/> --}}
            <x-incoming
            :incomingDocuments="$incomingDocuments"
            :users="$users"
            :classifications="$classifications"
            :documentCode="$documentCode"
            :loggedInUser="$loggedInUser"
            :activeUsers="$activeUsers"
            :excludedUsers="$excludedUsers"
            :countIncoming="$countIncoming"
            :countOutgoing="$countOutgoing"
            :countPending="$countPending"
            :totalItems="$totalItems"
            :usualCount="$usualCount"
            :urgentCount="$urgentCount" />
        </div>
    </div>
</x-app-layout>

<script>
   // Handle change event for classification
   // document.getElementById('classification').addEventListener('change', function() {
   //     const classification = this.value;

   //     if (classification) {
   //         // Grouped sub-classifications data from Laravel
   //         const subClassifications = @json($classifications);

   //         // Check if selected classification exists in the grouped data
   //         const filteredSubClasses = subClassifications[classification] || [];

   //         // Populate the sub-classification dropdown
   //         const subClassSelect = document.getElementById('sub_classification');
   //         subClassSelect.innerHTML = '<option selected="">Select sub-classification</option>'; // Reset options

   //         filteredSubClasses.forEach(sub => {
   //             const option = document.createElement('option');
   //             option.value = sub.sub_class;
   //             option.textContent = sub.sub_class;
   //             subClassSelect.appendChild(option);
   //         });
   //     }
   // });
   $(document).ready(function () {
        // Initialize Select2 for the sub-classification dropdown
        $('#sub_classification').select2({
            placeholder: 'Select sub-classification',
            allowClear: true,
            width: '100%',
            ajax: {
                url: '/dashboard/sub-classifications', // Adjust the endpoint to match your backend route
                dataType: 'json',
                delay: 250, // Delay for better UX
                data: function (params) {
                    return {
                        classification: $('#classification').val(), // Pass the selected classification
                        search: params.term, // User's search term
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.map(function (item) {
                            return {
                                id: item,
                                text: item,
                            };
                        }),
                    };
                },
                cache: true,
            },
        });

        // Clear sub-classification dropdown when classification changes
        $('#classification').on('change', function () {
            $('#sub_classification').val(null).trigger('change'); // Clear selection
        });
   });
</script>
@vite(['resources/js/crud-docs.js', 'resources/js/filter-tabs.js', 'resources/js/spinner.js'])
