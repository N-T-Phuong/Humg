<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrangthaixulyhosoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trangthaixulyhoso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('canbo_id')->nullable();
            $table->Integer('hoso_id')->nullable();
            $table->dateTime('ngay_chuyen_toi')->nullable();
            $table->dateTime('ngay_nhan')->nullable();
            $table->dateTime('ngay_tra')->nullable();
            $table->string('thoi_gian_thuc_hien')->nullable();
            $table->string('ket_qua_xu_ly')->nullable();
            $table->string('trang_thai')->nullable();
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
        Schema::dropIfExists('trangthaixulyhoso');
    }
}
