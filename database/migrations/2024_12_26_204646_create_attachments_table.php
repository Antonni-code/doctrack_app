<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::create('attachments', function (Blueprint $table) {
         $table->id(); // Auto-incrementing primary key
         $table->unsignedBigInteger('document_id'); // Foreign key to documents table
         $table->string('file_path', 2048); // Path to the uploaded file
         $table->string('file_name'); // Original file name
         $table->string('file_type', 100)->nullable(); // MIME type of the file (optional)
         $table->timestamps(); // Timestamps for created_at and updated_at

         // Foreign key constraint
         $table->foreign('document_id')
            ->references('id')->on('documents')
            ->onDelete('cascade'); // Delete attachments if the associated document is deleted
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('attachments');
   }
};
