document.querySelector('form').addEventListener('submit', function(event) {
   event.preventDefault();

   let documentCode = document.querySelector('#track').value;

   fetch("{{ route('tracking.search') }}?document_code=" + documentCode)
   .then(response => response.json())
   .then(data => {
       if (data.message) {
           alert(data.message);
       } else {
           console.log(data);
           // Populate your UI with the tracking data
       }
   })
   .catch(error => console.error('Error:', error));
});
