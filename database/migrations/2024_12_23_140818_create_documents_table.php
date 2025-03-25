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
      Schema::create('documents', function (Blueprint $table) {
         $table->id(); // Auto-incrementing primary key
         $table->string('document_code')->unique(); // Unique document code
         // Sender user (foreign key)
         $table->unsignedBigInteger('sender_id');
         $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
         // Classification of the document
         $table->string('classification');
         // Sub-classification (nullable)
         $table->string('sub_classification');
         // Subject of the document
         $table->string('subject');
         // Action to be taken (string type instead of enum)
         $table->string('action');
         // Deadline date for the document (nullable)
         $table->date('deadline_date');
         // Delivery type (string type instead of enum)
         $table->string('delivery_type');
         // Reference number or note (nullable)
         $table->string('reference')->nullable();
         // Brief description of the document (nullable)
         $table->string('brief_description')->nullable();
         // Detailed description of the document (nullable)
         $table->text('detailed_description')->nullable();
         // Priority level of the document (string type instead of enum)
         $table->string('priority');
         // Date of the letter (nullable)
         $table->date('letter_date');
         // Path to the file (nullable, with a max length of 2048 characters)
         $table->string('file_path', 2048)->nullable();
         // Timestamps for created_at and updated_at
         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('documents');
   }
};
