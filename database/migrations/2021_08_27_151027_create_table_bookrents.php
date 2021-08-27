<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableBookrents extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rents', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('bookid');
            $table->foreign('userid')->references('id')->on('users');
            $table->foreign('bookid')->references('id')->on('books');
            $table->string('bookName');
            $table->string('rentName');
            $table->float('rentPrice');
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
        Schema::dropIfExists('rents');
    }
}
