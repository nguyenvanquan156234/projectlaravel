<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_products', function (Blueprint $table) {
            $table->id('prod_id');
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_price');
            $table->string('prod_img');
            $table->string('prod_baohanh');
            $table->string('prod_phukien');
            $table->string('prod_tinhtrang');
            $table->string('prod_khuyenmai');
            $table->tinyInteger('prod_trangthai');
            $table->text('prod_mieuta');
            $table->tinyInteger('prod_dacbiet');
            $table->unsignedBigInteger('cate');
            $table->foreign('cate')->references('id')->on('vp_categories')->cascadeOnDelete();
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
        Schema::dropIfExists('vp_products');
    }
};
