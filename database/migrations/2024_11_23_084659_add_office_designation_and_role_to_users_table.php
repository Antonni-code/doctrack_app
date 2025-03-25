<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Import DB facade for queries

return new class extends Migration
{
   /**
    * Run the migrations.
    */
   public function up(): void
   {
      Schema::table('users', function (Blueprint $table) {
         $table->string('designation')->nullable();
         $table->string('role')->default('staff'); // Default role is staff
      });

      // Ensure the first 3 users are assigned the admin role
      DB::table('users')
         ->orderBy('id', 'asc')
         ->take(3)
         ->update(['role' => 'admin']);
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::table('users', function (Blueprint $table) {
         $table->dropColumn(['designation', 'role']);
      });
   }
};
