@props(['outgoingDocuments'])
<div class="bg-opacity-25 grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8 lg:p-2">
   <x-outgoingtable :outgoingDocuments="$outgoingDocuments"/>

   <!-- Delete modal-->
   <x-deletedocumentmodal/>

</div>
<script>
   window.deleteDocumentRoute = "{{ route('documents.delete', ['id' => ':id']) }}";
   // window.updateOfficeRoute = "{{ route('offices.update', ['id' => ':id']) }}";
</script>

@vite(['resources/js/filter-tabs.js', 'resources/js/crud-docs.js'])
