<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHosoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('sv_id')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('ma')->nullable();
            $table->string('khoa')->nullable();
            $table->string('lop')->nullable();
            $table->tinyInteger('thutuc_id')->nullable();
//            $table->string('file_dinh_kem')->nullable();
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
        Schema::dropIfExists('hoso');
    }
}
