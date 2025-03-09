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
      Schema::create('user_activities', function (Blueprint $table) {
         $table->id();
         // $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Link to users table

         // Link to users table
         $table->unsignedBigInteger('user_id');
         $table->unsignedBigInteger('document_id')->nullable(); // Associated document

         $table->string('action'); // e.g., "Uploaded a document"

         // Foreign keys
         $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
         $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');


         $table->timestamps();
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('user_activities');
   }
};
