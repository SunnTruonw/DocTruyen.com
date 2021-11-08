<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDanhMucTruyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('danh_muc_truyens', function (Blueprint $table) {
            $table->id();
            $table->string('tendanhmuc',255);
            $table->string('slug_danhmuc',255);
            $table->text('mota',255);
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
        Schema::dropIfExists('danh_muc_truyens');
    }
}
