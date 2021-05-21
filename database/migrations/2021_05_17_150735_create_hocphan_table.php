<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHocphanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hocphan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('form_id')->nullable();
            $table->string('mahp')->nullable();
            $table->string('tenhp')->nullable();
            $table->string('nhomhp')->nullable();
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
        Schema::dropIfExists('hocphan');
    }
}
