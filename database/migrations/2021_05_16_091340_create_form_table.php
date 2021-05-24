<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('form', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('id_hoso')->nullable();
//            $table->string('khoa')->nullable();
//            $table->string('bo_mon')->nullable();
//            $table->string('lop')->nullable();
            $table->text('ly_do')->nullable();
            $table->date('tu_ngay')->nullable();
            $table->date('den_ngay')->nullable();
            $table->string('hoc_ky')->nullable();
            $table->string('lophp')->nullable();
            $table->text('dia_diem')->nullable();
            $table->text('dia_diem_moi')->nullable();
            $table->text('do_an')->nullable();
            $table->string('file_dinh_kem')->nullable();
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
        Schema::dropIfExists('form');
    }
}
