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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id'); // Foreign key column
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade'); // Define foreign key
            $table->string('name'); // Invoice item name
            $table->float('price', 10, 2); // Price before VAT
            $table->integer('quantity'); 
            $table->dateTime('date_of_create'); // Date and time of creation
            $table->float('vat', 5, 2)->default(0); // VAT percentage
            $table->timestamps();

                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};