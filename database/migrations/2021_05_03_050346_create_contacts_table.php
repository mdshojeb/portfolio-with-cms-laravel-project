<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('address');
            $table->String('phone');
            $table->String('email');
            $table->text('description');
            $table->String('bg_image')->default('contact-bg.jpg');
            $table->String('facebook')->nullable();
            $table->String('twetter')->nullable();
            $table->String('linkedin')->nullable();
            $table->String('pinterest')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
