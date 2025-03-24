<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      // Modify the ENUM column to include 'Received'
      DB::statement("ALTER TABLE documents MODIFY COLUMN status ENUM('Pending', 'Received', 'Released') NOT NULL DEFAULT 'Pending'");
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      // Revert back to the previous ENUM values
      DB::statement("ALTER TABLE documents MODIFY COLUMN status ENUM('Pending', 'Released') NOT NULL DEFAULT 'Pending'");
   }
};
