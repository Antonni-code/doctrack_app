<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class FileUploadController extends Controller
{
   // public function upload(Request $request)
   // {
   //    $receiver = new FileReceiver('file', $request, HandlerFactory::classFromRequest($request));

   //    if ($receiver->isUploaded()) {
   //       $save = $receiver->receive();

   //       if ($save->isFinished()) {
   //          $file = $save->getFile();
   //          $fileName = $file->getClientOriginalName();
   //          $filePath = storage_path('app/uploads/' . $fileName);

   //          // Move the file to the desired location
   //          $file->move(storage_path('app/uploads'), $fileName);

   //          return response()->json(['message' => 'Upload complete', 'path' => $filePath]);
   //       }

   //       return response()->json(['message' => 'Chunk uploaded']);
   //    }

   //    return response()->json(['message' => 'Upload failed'], 400);
   // }
}
