<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GmailController extends Controller
{
   // protected $client;
   // protected $credentialsPath;

   // public function __construct()
   // {
   //    $this->client = new Client();
   //    $this->client->setAuthConfig(storage_path('app/credential.json'));
   //    $this->client->addScope(Gmail::GMAIL_READONLY);
   //    $this->client->setRedirectUri(env('GOOGLE_REDIRECT_URI'));
   //    $this->client->setAccessType('offline');
   //    $this->client->setPrompt('select_account consent');
   // }

   // Redirect to Google's OAuth page
   // public function redirectToGoogle()
   // {
   //    return redirect()->away($this->client->createAuthUrl());
   // }

   // Handle OAuth callback and save token
   // public function handleGoogleCallback(Request $request)
   // {
   //    $this->client->authenticate($request->get('code'));
   //    $token = $this->client->getAccessToken();
   //    Storage::put('gmail_token.json', json_encode($token));
   //    return redirect()->route('gmail');
   // }

   // Fetch Emails from Gmail API
   // public function gmail()
   // {
   //    if (!Storage::exists('gmail_token.json')) {
   //       return redirect()->route('gmail.Auth');
   //    }

   //    $token = json_decode(Storage::get('gmail_token.json'), true);
   //    $this->client->setAccessToken($token);

   //    if ($this->client->isAccessTokenExpired()) {
   //       $this->client->fetchAccessTokenWithRefreshToken($this->client->getRefreshToken());
   //       Storage::put('gmail_token.json', json_encode($this->client->getAccessToken()));
   //    }

   //    $gmail = new Gmail($this->client);
   //    $messages = $gmail->users_messages->listUsersMessages('me', ['maxResults' => 10]);

   //    $emailData = [];
   //    foreach ($messages->getMessages() as $message) {
   //       $msg = $gmail->users_messages->get('me', $message->getId());
   //       $payload = $msg->getPayload();
   //       $headers = collect($payload->getHeaders());

   //       $emailData[] = [
   //          'id' => $msg->getId(),
   //          'subject' => optional($headers->where('name', 'Subject')->first())->getValue(),
   //          'from' => optional($headers->where('name', 'From')->first())->getValue(),
   //          'snippet' => $msg->getSnippet(),
   //       ];
   //    }

   //    return view('gmail', compact('emailData'));
   // }

   // public function gmail()
   // {
   //    return view('gmail');
   // }
}
