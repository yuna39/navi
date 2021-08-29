<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNavisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navis', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            // お店の名前
            $table->string('name');
            
            // お店の紹介文
            $table->string('introduction');
            
            // お店の画像
            $table->string('image_shop')->nullable();
            
            // お店のメニュー画像
            $table->string('image_menu')->nullable();
            
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
        Schema::dropIfExists('navis');
    }
}
