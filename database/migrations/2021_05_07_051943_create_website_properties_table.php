<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsitePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('website_properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->String('web_title')->default('Portfolio');
            $table->String('footer_credit');
            $table->String('logo')->nullable();
            $table->String('icon')->default('favicon.jpg');
            $table->boolean('show_logo')->default(0);
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
        Schema::dropIfExists('website_properties');
    }
}
