<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCriminalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('criminals', function (Blueprint $table) {
            $table->id();
            $table->string('tag_number');
            $table->string('last_name');
            $table->string('other_names');
            $table->string('sex');
            $table->string('phone_number')->nullable();
            $table->string('email')->nullable();
            $table->string('date_of_birth');
            $table->string('lga_of_origin');
            $table->string('state_of_origin');
            $table->string('nationality')->default('Nigerian');
            $table->text('address');
            $table->string('height')->nullable();
            $table->string('complexion')->nullable();
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
        Schema::dropIfExists('criminals');
    }
}
