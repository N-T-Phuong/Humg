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
            $table->tinyInteger('user_id')->nullable();
            $table->string('hoso_code')->nullable();
            $table->string('phone')->nullable();
//            $table->string('ngay_hen_tra')->nullable();
            $table->string('dia_chi')->nullable();
            $table->tinyInteger('thutuc_id')->nullable();
            $table->string('trang_thai')->default('Chờ tiếp nhận');
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
