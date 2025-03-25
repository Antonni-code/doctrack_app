// document.getElementById('document-form').addEventListener('submit', function (event) {
//    event.preventDefault(); // Prevent default submission for demonstration

//    const sendBtn = document.getElementById('send-btn');
//    const sendText = document.getElementById('send-text');
//    const sendSpinner = document.getElementById('send-spinner');

//    // Disable button and show spinner
//    sendBtn.disabled = true;
//    sendText.textContent = 'Sending...';
//    sendSpinner.classList.remove('hidden');
//    sendBtn.classList.remove('bg-blue-700', 'hover:bg-primary-800');
//    sendBtn.classList.add('bg-gray-500', 'cursor-not-allowed');

//    // Simulate form submission
//    setTimeout(() => {
//        // Replace this condition with your actual validation logic
//        const isSuccessful = Math.random() > 0.5; // Randomize for demo

//        if (isSuccessful) {
//            // Success state
//            sendBtn.classList.remove('bg-gray-500');
//            sendBtn.classList.add('bg-green-700', 'hover:bg-green-800');
//            sendText.textContent = 'Sent Successfully!';
//        } else {
//            // Failure state
//            sendBtn.classList.remove('bg-gray-500');
//            sendBtn.classList.add('bg-red-700', 'hover:bg-red-800');
//            sendText.textContent = 'Failed to Send';
//        }

//        // Reset button after a delay
//        setTimeout(() => {
//            sendBtn.disabled = false;
//            sendText.textContent = 'Send';
//            sendSpinner.classList.add('hidden');
//            sendBtn.classList.remove(
//                'bg-green-700',
//                'hover:bg-green-800',
//                'bg-red-700',
//                'hover:bg-red-800'
//            );
//            sendBtn.classList.add('bg-blue-700', 'hover:bg-primary-800');
//        }, 2000);
//    }, 2000);
// });
