<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGakkoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gakkos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('school_name');
            $table->string('school_category')->nullable();
            $table->string('area')->nullable();
            $table->string('area_detail')->nullable();
            $table->string('logo')->nullable();
            $table->string('url')->nullable();
            $table->string('contact')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('line')->nullable();
            $table->biginteger('admin_id')->unsigned(); // 登録者ID
            $table->foreign('admin_id')
                  ->references('id')
                  ->on('admins') // 紐付け
                  ->onDelete('cascade');  //ユーザーが削除されたら紐付くpostsも削除
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gakko');
    }
}
