<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXulyhosoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xulyhoso', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->Integer('user_id')->nullable();
            $table->integer('hoso_id')->nullable();
            $table->string('tg_thuc')->nullable();
            $table->string('noi_dung_xu_ly')->nullable();
            $table->string('phong_ban_xu_ly')->nullable();
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
        Schema::dropIfExists('xulyhoso');
    }
}
