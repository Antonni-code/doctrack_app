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
      Schema::create('offices', function (Blueprint $table) {
         $table->id();  // Primary key
         $table->string('name');  // Name of the office (e.g., "Head Office")
         $table->string('location')->nullable();  // Location of the office
         $table->string('code')->nullable();  // Additional details
         $table->timestamps();  // Created at and Updated at
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::dropIfExists('offices');
   }
};
