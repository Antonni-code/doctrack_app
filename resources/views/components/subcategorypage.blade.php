@props(['categories'])
<div>
   <!-- Add Office Button -->
   <div class="flex justify-end mb-4">
      <!-- Add Office Button -->
   </div>

   <x-subcategorytable :categories="$categories"/>



    <!-- Modal -->
    <x-addcategorymodal/>

    <x-editcategorymodal/>

    <x-deletecategorymodal/>
</div>
@vite('resources/js/crud-class.js')
