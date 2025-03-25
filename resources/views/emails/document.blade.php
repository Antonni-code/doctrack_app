{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Document Notification</title>
  <style>
    body {
      font-family: 'Roboto', 'Arial', sans-serif;
      background-color: #f5f5f5;
      color: #333333;
      margin: 0;
      padding: 30px;
      line-height: 1.5;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background: #ffffff;
      border-radius: 4px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .header {
      background: #1a3b5d;
      padding: 20px 30px;
      border-radius: 4px 4px 0 0;
    }

    .header-title {
      font-size: 20px;
      font-weight: 500;
      color: #ffffff;
      margin: 0;
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .content {
      padding: 30px;
      text-align: left;
    }

    .greeting {
      font-size: 16px;
      margin-bottom: 20px;
      color: #333333;
    }

    .document-details {
      background-color: #f9f9f9;
      border-left: 3px solid #1a3b5d;
      padding: 20px;
      margin: 20px 0;
    }

    .info-list {
      list-style-type: none;
      padding: 0;
      margin: 0;
    }

    .info-item {
      margin-bottom: 12px;
      font-size: 15px;
      display: flex;
    }

    .info-item:last-child {
      margin-bottom: 0;
    }

    .info-label {
      font-weight: 600;
      color: #555555;
      width: 140px;
    }

    .info-value {
      color: #333333;
      flex: 1;
    }

    .priority-tag {
      display: inline-block;
      padding: 4px 8px;
      border-radius: 2px;
      font-size: 12px;
      font-weight: 500;
      text-transform: uppercase;
    }

    .priority-tag.high {
      background-color: #f8d7da;
      color: #721c24;
    }

    .priority-tag.medium {
      background-color: #fff3cd;
      color: #856404;
    }

    .priority-tag.low {
      background-color: #d4edda;
      color: #155724;
    }

    .button-container {
      margin-top: 25px;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      background: #1a3b5d;
      color: #ffff;
      font-size: 14px;
      font-weight: 500;
      text-decoration: none;
      border-radius: 3px;
      transition: background 0.2s ease;
    }

    .button:hover {
      background: #12283e;
    }

    .footer {
      padding: 15px 30px;
      font-size: 12px;
      color: #666666;
      text-align: center;
      border-top: 1px solid #e0e0e0;
      background-color: #f5f5f5;
      border-radius: 0 0 4px 4px;
    }

    @media (max-width: 600px) {
      body {
        padding: 15px;
      }

      .content {
        padding: 20px;
      }

      .info-item {
        flex-direction: column;
      }

      .info-label {
        margin-bottom: 4px;
        width: auto;
      }
    }
  </style>
</head>
<body>
  <div class="container">
   <div class="header-banner">
      <h1 class="header-title">
        <span class="header-icon">📄</span> New Document Notification
      </h1>
    </div>

    <div class="content">
      <p class="greeting">Hello, <strong>{{ $document->recipient_name }}</strong>,</p>
      <p>You have received a new document that requires your attention.</p>

      <div class="document-details">
        <ul class="info-list">
          <li class="info-item">
            <span class="info-label">Document Code:</span>
            <span class="info-value">{{ $document->document_code }}</span>
          </li>
          <li class="info-item">
            <span class="info-label">Subject:</span>
            <span class="info-value">{{ $document->subject }}</span>
          </li>
          <li class="info-item">
            <span class="info-label">Priority:</span>
            <span class="info-value">
              <span class="priority-tag {{ strtolower($document->priority) }}">
                {{ strtoupper($document->priority) }}
              </span>
            </span>
          </li>
        </ul>
      </div>

      <div class="button-container">
        <a href="{{ Auth::check() ? url('/dashboard/incoming') : url('/documents/' . $document->id) }}" class="button">
          View Document
        </a>
      </div>
    </div>

    <div class="footer">
      This is an automated notification from the Document Management System.
    </div>
  </div>
</body>
</html>
 --}}
 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>New Document Notification</title>
   <style>
     @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap');

     body {
       font-family: 'Poppins', 'Roboto', sans-serif;
       background-color: #f0f4f8;
       color: #334155;
       margin: 0;
       padding: 30px;
       line-height: 1.6;
     }

     .container {
       max-width: 600px;
       margin: 0 auto;
       background: #ffffff;
       border-radius: 8px;
       box-shadow: 0 4px 16px rgba(0, 0, 0, 0.08);
       overflow: hidden;
     }

     .header-banner {
       background: linear-gradient(135deg, #2c3e50, #1a3b5d);
       padding: 24px 30px;
       position: relative;
     }

     .header-banner::after {
       content: '';
       position: absolute;
       bottom: 0;
       left: 0;
       right: 0;
       height: 4px;
       background: linear-gradient(90deg, #3498db, #2980b9);
     }

     .header-title {
       font-size: 22px;
       font-weight: 600;
       color: #ffffff;
       margin: 0;
       display: flex;
       align-items: center;
       gap: 12px;
     }

     .header-icon {
       display: inline-flex;
       align-items: center;
       justify-content: center;
     }

     .content {
       padding: 30px;
       text-align: left;
     }

     .greeting {
       font-size: 17px;
       margin-bottom: 20px;
       color: #1e293b;
       font-weight: 500;
     }

     .document-details {
       background-color: #f8fafc;
       border-radius: 6px;
       padding: 22px;
       margin: 20px 0;
       border-left: 4px solid #2c3e50;
       box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
     }

     .document-details-title {
       font-size: 15px;
       font-weight: 600;
       color: #334155;
       margin-top: 0;
       margin-bottom: 15px;
       display: flex;
       align-items: center;
       gap: 8px;
     }

     .icon {
       display: inline-flex;
       align-items: center;
       justify-content: center;
       width: 24px;
       height: 24px;
       color: #475569;
     }

     .info-list {
       list-style-type: none;
       padding: 0;
       margin: 0;
     }

     .info-item {
       margin-bottom: 15px;
       font-size: 15px;
       display: flex;
       align-items: flex-start;
     }

     .info-item:last-child {
       margin-bottom: 0;
     }

     .info-icon {
       margin-right: 12px;
       color: #3498db;
       flex-shrink: 0;
     }

     .info-label {
       font-weight: 600;
       color: #475569;
       width: 120px;
       flex-shrink: 0;
     }

     .info-value {
       color: #1e293b;
       flex: 1;
     }

     .priority-tag {
       display: inline-block;
       padding: 5px 10px;
       border-radius: 4px;
       font-size: 12px;
       font-weight: 600;
       text-transform: uppercase;
       letter-spacing: 0.5px;
     }

     .priority-tag.high {
       background-color: #fee2e2;
       color: #b91c1c;
     }

     .priority-tag.medium {
       background-color: #fff7cd;
       color: #854d0e;
     }

     .priority-tag.low {
       background-color: #d1fae5;
       color: #065f46;
     }

     .button-container {
       margin-top: 28px;
     }

     .button {
       display: inline-block;
       padding: 12px 24px;
       background: #3498db;
       color: white;
       font-size: 15px;
       font-weight: 500;
       text-decoration: none;
       border-radius: 6px;
       transition: all 0.3s ease;
       box-shadow: 0 2px 5px rgba(52, 152, 219, 0.3);
       display: inline-flex;
       align-items: center;
       gap: 8px;
     }

     .button:hover {
       background: #2980b9;
       transform: translateY(-2px);
       box-shadow: 0 4px 8px rgba(52, 152, 219, 0.4);
     }

     .button-icon {
       font-size: 18px;
     }

     .footer {
       padding: 20px 30px;
       font-size: 13px;
       color: #64748b;
       text-align: center;
       border-top: 1px solid #e2e8f0;
       background-color: #f8fafc;
     }

     @media (max-width: 600px) {
       body {
         padding: 15px;
       }

       .content {
         padding: 20px;
       }

       .info-item {
         flex-direction: column;
       }

       .info-label {
         margin-bottom: 4px;
         width: auto;
       }
     }
   </style>
 </head>
 <body>
   <div class="container">
     <div class="header-banner">
       <h1 class="header-title">
         <span class="header-icon">
           <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
             <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
             <polyline points="14 2 14 8 20 8"></polyline>
             <line x1="16" y1="13" x2="8" y2="13"></line>
             <line x1="16" y1="17" x2="8" y2="17"></line>
             <polyline points="10 9 9 9 8 9"></polyline>
           </svg>
         </span>
         New Document Notification
       </h1>
     </div>

     <div class="content">
       <p class="greeting">Hello, <strong>{{ $document->recipient_name }}</strong>,</p>
       <p>You have received a new document that requires your attention.</p>

       <div class="document-details">
         <h3 class="document-details-title">
           <svg class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
             <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
             <polyline points="14 2 14 8 20 8"></polyline>
             <line x1="16" y1="13" x2="8" y2="13"></line>
             <line x1="16" y1="17" x2="8" y2="17"></line>
             <polyline points="10 9 9 9 8 9"></polyline>
           </svg>
           Document Details
         </h3>
         <ul class="info-list">
           <li class="info-item">
             <svg class="info-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
               <line x1="16" y1="2" x2="16" y2="6"></line>
               <line x1="8" y1="2" x2="8" y2="6"></line>
               <line x1="3" y1="10" x2="21" y2="10"></line>
             </svg>
             <span class="info-label">Document Code:</span>
             <span class="info-value">{{ $document->document_code }}</span>
           </li>
           <li class="info-item">
             <svg class="info-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
               <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
             </svg>
             <span class="info-label">Subject:</span>
             <span class="info-value">{{ $document->subject }}</span>
           </li>
           <li class="info-item">
             <svg class="info-icon" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
               <path d="M13 2L3 14h9l-1 8 10-12h-9l1-8z"></path>
             </svg>
             <span class="info-label">Priority:</span>
             <span class="info-value">
               <span class="priority-tag {{ strtolower($document->priority) }}">
                 {{ strtoupper($document->priority) }}
               </span>
             </span>
           </li>
         </ul>
       </div>

       <div class="button-container">
         <a href="{{ Auth::check() ? url('/dashboard/incoming') : url('/documents/' . $document->id) }}" class="button">
           <svg class="button-icon" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
             <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
             <circle cx="12" cy="12" r="3"></circle>
           </svg>
           View Document
         </a>
       </div>
     </div>

     <div class="footer">
       This is an automated notification from the Document Management System.
     </div>
   </div>
 </body>
 </html>
