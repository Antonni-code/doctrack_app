@props(['offices'])
<div>
   <!-- Add Office Button -->
   <div class="flex justify-end mb-4">
      <!-- Add Office Button -->
   </div>

   <!-- Offices Table -->
   <x-officepagetable :offices="$offices"/>



    <!-- Modal -->
    <x-addofficemodal/>

    <x-editofficemodal/>

    <x-deleteofficemodal/>
</div>
<script>
   window.deleteOfficeRoute = "{{ route('offices.delete', ['id' => ':id']) }}";
   // window.updateOfficeRoute = "{{ route('offices.update', ['id' => ':id']) }}";
</script>

@vite(['resources/js/crud-offices.js', 'resources/js/search-office.js'])
