<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTruyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truyens', function (Blueprint $table) {
            $table->id();
            $table->string('tentruyen',255);
            $table->text('mota');
            $table->integer('danhmuc_id');
            $table->string('slug_truyen',255);
            $table->string('hinhanh');
            $table->integer('kichhoat');
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
        Schema::dropIfExists('truyens');
    }
}
