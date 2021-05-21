<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuytrinhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quytrinh', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('maQT');
            $table->string('tenQT');
            $table->integer('id_thutuc')->nullable();
//            $table->string('bieu_mau')->nullable();
            $table->string('trang_thai');
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
        Schema::dropIfExists('quytrinh');
    }
}
