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
      Schema::create('document_recipients', function (Blueprint $table) {
         $table->id();
         $table->unsignedBigInteger('document_id');
         $table->unsignedBigInteger('recipient_id');
         $table->timestamps();

         // Foreign key references
         $table->foreign('document_id')->references('id')->on('documents')->onDelete('cascade');
         $table->foreign('recipient_id')->references('id')->on('users')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('document_recipients');
   }
};
