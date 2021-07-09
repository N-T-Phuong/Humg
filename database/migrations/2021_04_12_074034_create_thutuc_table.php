<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThutucTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thutuc', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('maTT');
            $table->string('tenTT');
            $table->tinyInteger('danhmuc_id');
            $table->text('mota')->nullable();
            $table->tinyInteger('tg_giai_quyet');
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
        Schema::dropIfExists('thutuc');
    }
}
