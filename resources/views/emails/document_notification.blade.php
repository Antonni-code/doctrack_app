<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #f9f9f9;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 20px 0;
            background-color: #007bff;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h2>New Document Notification</h2>
        <p>Hello, {{ $details['recipient_name'] }},</p>

        <p>You have been sent a new document. Below are the details:</p>
        <ul>
            <li><strong>Document Code:</strong> {{ $details['document_code'] }}</li>
            <li><strong>Subject:</strong> {{ $details['subject'] }}</li>
            <li><strong>Priority:</strong> {{ $details['priority'] }}</li>
            <li><strong>Deadline:</strong> {{ $details['deadline_date'] ?? 'None' }}</li>
        </ul>

        <p>Please click the button below to view the document:</p>
        <a href="{{ url('/documents/' . $details['document_id']) }}" class="btn">View Document</a>

        <p>Thank you for using our application!</p>
    </div>
</body>
</html>
