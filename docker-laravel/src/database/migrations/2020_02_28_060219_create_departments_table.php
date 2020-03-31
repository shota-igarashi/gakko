<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('department_gakubu')->nullable();
            $table->string('department_gakka')->nullable();
            $table->string('department_title')->nullable();
            $table->string('department_cover')->nullable();
            $table->string('department_intro')->nullable();
            $table->string('department_text')->nullable();
            $table->string('department_ob')->nullable();
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
        Schema::dropIfExists('departments');
    }
}
