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
            $table->string('email')->nullable();
            $table->string('dia_chi')->nullable();
            $table->string('maSV')->nullable();
            $table->string('khoa')->nullable();
            $table->string('lop')->nullable();
            $table->tinyInteger('thutuc_id')->nullable();
            $table->string('trang_thai')->default('chờ tiếp nhận');
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
