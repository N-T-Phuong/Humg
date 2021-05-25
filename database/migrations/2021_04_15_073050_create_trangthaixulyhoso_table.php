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
            $table->Integer('user_id')->nullable();
            $table->string('hoso_code')->nullable();
            $table->dateTime('ngay_chuyen_toi')->nullable();
            $table->dateTime('ngay_tiep_nhan')->nullable();
            $table->dateTime('ngay_tra')->nullable();
            // $table->string('thoi_gian_thuc_hien')->nullable();
            $table->string('noi_dung_xu_ly')->nullable();
            $table->string('trang_thai')->nullable();
            $table->string('phong_ban_tiep_nhan')->nullable();
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
