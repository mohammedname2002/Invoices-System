<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


     public function up()
     {
         Schema::table('users', function (Blueprint $table) {
             // Add new columns or modify existing ones
             $table->string('new_column')->nullable();
         });
     }

     public function down()
     {
         Schema::table('users', function (Blueprint $table) {
             // Reverse the changes if necessary
             $table->dropColumn('new_column');
         });
     }

};