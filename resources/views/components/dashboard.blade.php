{{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
   <!-- Document Status Overview -->
   <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
       <h2 class="text-lg font-semibold text-center">Document Status Overview</h2>
       <div class="relative h-[300px] w-full flex justify-center items-center">
           <canvas id="documentStatusChart"></canvas>
       </div>
   </div>

   <!-- Documents Processed Per Office -->
   <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
       <h2 class="text-lg font-semibold text-center">Documents Processed Per Office</h2>
       <div class="relative h-[300px] w-full flex justify-center items-center">
           <canvas id="documentsPerOfficeChart"></canvas>
       </div>
   </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
   <!-- Documents Per Month -->
   <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
       <h2 class="text-lg font-semibold text-center">Documents Per Month</h2>
       <div class="relative h-[300px] w-full flex justify-center items-center">
           <canvas id="documentsPerMonthChart"></canvas>
       </div>
   </div>

   <!-- Average Processing Time -->
   <div class="bg-white p-4 rounded-lg shadow flex flex-col items-center">
       <h2 class="text-lg font-semibold text-center">Average Processing Time</h2>
       <div class="relative h-[300px] w-full flex justify-center items-center">
           <canvas id="avgProcessingTimeChart"></canvas>
       </div>
   </div>
</div> --}}


{{-- <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
   <!-- Document Status Overview -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Document Status Overview</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="documentStatusChart"></canvas>
       </div>
   </div>

   <!-- Documents Processed Per Office -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Documents Processed Per Office</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="documentsPerOfficeChart"></canvas>
       </div>
   </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
   <!-- Documents Per Month -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Documents Per Month</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="documentsPerMonthChart"></canvas>
       </div>
   </div>

   <!-- Average Processing Time -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Average Processing Time</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="avgProcessingTimeChart"></canvas>
       </div>
   </div>
</div> --}}


<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
   <!-- Document Status Overview -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Document Status Overview</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="documentStatusChart"></canvas>
       </div>
   </div>

   <!-- Documents Processed Per Office -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Documents Processed Per Office</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="documentsPerOfficeChart"></canvas>
       </div>
   </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
   <!-- Documents Per Month -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Documents Per Month</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="documentsPerMonthChart"></canvas>
       </div>
   </div>

   <!-- Average Processing Time -->
   <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
       <h2 class="text-lg font-semibold text-gray-800 mb-4">Average Processing Time</h2>
       <div class="relative h-[300px] w-full">
           <canvas id="avgProcessingTimeChart"></canvas>
       </div>
   </div>
</div>

<!-- User Activity Logs Table -->
{{-- <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 mt-6">
   <div class="flex justify-between items-center mb-6">
      <h2 class="text-lg font-semibold text-gray-800">User Activity Logs</h2>
      <div class="inline-flex items-center text-sm text-gray-500">
         <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
         </svg>
         <span>Auto-refreshing</span>
      </div>
      <!-- Print Button -->
      <button type="button" id="printButton" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
         Print Logs
      </button>
   </div>
   <div class="overflow-x-auto rounded-lg" id="userActivityTable">
      <table class="w-full">
         <thead>
            <tr>
               <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
               <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
               <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
            </tr>
         </thead>
         <tbody id="activityLogs" class="divide-y divide-gray-100">
            <!-- Logs will be loaded here via AJAX -->
         </tbody>
      </table>
   </div>
</div> --}}

<!-- User Activity Logs Table -->
<div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300 mt-6">
<div class="flex justify-between items-center mb-6">
   <h2 class="text-lg font-semibold text-gray-800">User Activity Logs</h2>
   <div class="inline-flex items-center text-sm text-gray-500">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
      </svg>
      <span>Auto-refreshing</span>
   </div>
</div>

<!-- Quill Editor for Notes -->
<div class="mb-4">
   <h3 class="text-sm font-semibold text-gray-700 mb-2">Add Notes Before Printing:</h3>

   <!-- Toolbar -->
   <div id="toolbar-container">
      <span class="ql-formats">
         <select class="ql-font"></select>
         <select class="ql-size"></select>
      </span>
      <span class="ql-formats">
         <button class="ql-bold"></button>
         <button class="ql-italic"></button>
         <button class="ql-underline"></button>
         <button class="ql-strike"></button>
      </span>
      <span class="ql-formats">
         <select class="ql-color"></select>
         <select class="ql-background"></select>
      </span>
      <span class="ql-formats">
         <button class="ql-script" value="sub"></button>
         <button class="ql-script" value="super"></button>
      </span>
      <span class="ql-formats">
         <button class="ql-header" value="1"></button>
         <button class="ql-header" value="2"></button>
         <button class="ql-blockquote"></button>
         <button class="ql-code-block"></button>
      </span>
      <span class="ql-formats">
         <button class="ql-list" value="ordered"></button>
         <button class="ql-list" value="bullet"></button>
         <button class="ql-indent" value="-1"></button>
         <button class="ql-indent" value="+1"></button>
      </span>
      <span class="ql-formats">
         <button class="ql-direction" value="rtl"></button>
         <select class="ql-align"></select>
      </span>
      <span class="ql-formats">
         <button class="ql-link"></button>
         <button class="ql-image"></button>
         <button class="ql-video"></button>
         <button class="ql-formula"></button>
      </span>
      <span class="ql-formats">
         <button class="ql-clean"></button>
      </span>
   </div>

   <!-- Quill Editor -->
   <div id="editor-container" class="border rounded-md p-3 min-h-[150px] bg-white"></div>
</div>

<!-- Print Button -->
<button type="button" id="printButton" class="px-4 py-2 bg-blue-600 text-white rounded-md shadow hover:bg-blue-700 transition">
   Print Logs
</button>

<!-- Activity Logs Table -->
<div class="overflow-x-auto rounded-lg mt-4" id="userActivityTable">
   <table class="w-full">
      <thead>
         <tr>
            <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">User</th>
            <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            <th class="px-4 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Timestamp</th>
         </tr>
      </thead>
      <tbody id="activityLogs" class="divide-y divide-gray-100">
         <!-- Logs will be loaded here via AJAX -->
      </tbody>
   </table>
</div>



@vite(['resources/js/dashboard.js'])
<link href="/styles.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"
/>
<script src="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />
