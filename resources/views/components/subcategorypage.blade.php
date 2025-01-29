@props(['categories', 'totalPages', 'page', 'perPage', 'totalItems'])
<div>
   <!-- Add Office Button -->
   <div class="flex justify-end mb-4">
      <!-- Add Office Button -->
   </div>

   <x-subcategorytable :categories="$categories" :totalPages="$totalPages" :page="$page" :perPage="$perPage" :totalItems="$totalItems"/>


    <!-- Modal -->
    <x-addcategorymodal/>

    <x-editcategorymodal :categories="$categories"/>

    <x-deletecategorymodal/>
</div>
<script>
   // window.updateClassRoute = "{{ route('class.update', ['id' => ':id']) }}";
   window.deleteClassRoute = "{{ route('class.delete', ['id' => ':id']) }}";
</script>
@vite(['resources/js/crud-class.js', 'resources/js/search-subcategory.js']) <!-- or your respective JS file -->
