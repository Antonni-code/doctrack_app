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
      Schema::create('notification', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('document_id'); // Reference to the document
         $table->unsignedBigInteger('recipient_id'); // From document_recipients table
         $table->string('message'); // Notification message
         $table->timestamp('read_at')->nullable(); // Mark when read
         $table->timestamps();

         // Foreign key constraints
         $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
         $table->foreign('recipient_id')->references('recipient_id')->on('document_recipients')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('notifications');
   }
};
