document.addEventListener('DOMContentLoaded', () => {
   const searchInput = document.querySelector('.peer');
   const rows = document.querySelectorAll('tbody tr');
   const tabs = document.querySelectorAll('nav ul li');

   let activeFilter = 'all';

   // Tab filtering logic
   tabs.forEach(tab => {
       tab.addEventListener('click', () => {
           activeFilter = tab.getAttribute('data-value');

           // Remove the active styling from all tabs
           tabs.forEach(t => {
               const activeDiv = t.querySelector('.absolute'); // Find the active div
               if (activeDiv) {
                   activeDiv.remove(); // Remove the active styling
               }
           });

           // Add active styling to the clicked tab
           const activeDiv = document.createElement('div');
           activeDiv.className = 'absolute inset-0 z-10 h-full bg-white rounded-md shadow';
           tab.appendChild(activeDiv); // Append the active div to the clicked tab

           // Filter rows based on the active tab
           filterRows();
       });
   });

   // Search filtering logic
   searchInput.addEventListener('input', filterRows);

   // Combined filter function
   function filterRows() {
       const query = searchInput.value.toLowerCase().trim();

       rows.forEach(row => {
           const rowStatus = row.getAttribute('data-status');
           const rowText = Array.from(row.cells).map(cell => cell.textContent.toLowerCase()).join(' ');

           const matchesSearch = query === '' || rowText.includes(query);
           const matchesFilter = activeFilter === 'all' || rowStatus === activeFilter;

           row.style.display = matchesSearch && matchesFilter ? '' : 'none';
       });
   }
});
