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
      Schema::table('users', function (Blueprint $table) {
         // Add the `office_id` column
         $table->unsignedBigInteger('office_id')->nullable()->after('role');

         // Add the foreign key constraint
         $table->foreign('office_id')->references('id')->on('offices')->onDelete('cascade');
      });
   }

   /**
    * Reverse the migrations.
    */
   public function down(): void
   {
      Schema::table('users', function (Blueprint $table) {
         // Drop the foreign key and column
         $table->dropForeign(['office_id']);
         $table->dropColumn('office_id');
      });
   }
};
