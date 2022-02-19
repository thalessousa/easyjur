<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHintsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hints', function (Blueprint $table) {
            $table->id();
            $table->longText('description');
            $table->enum('type',['car','truck','motorcycle']);
            $table->string('brand');
            $table->string('model');
            $table->string('version')->nullable();
            $table->unsignedInteger('admin_user_id');
            $table->foreign('admin_user_id')->references('id')->on('admin_users');
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
        Schema::dropIfExists('hints');
    }
}
