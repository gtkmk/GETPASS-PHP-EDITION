<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TabelaHistoric extends Migration
{
    public function up()
    {
        Schema::create('historic', function (Blueprint $table) {
            $table->id();
            $table->string('old_username');
            $table->string('old_password');
            $table->date('change_date');
            $table->unsignedBigInteger('crendentials_id');
            $table->foreign('crendentials_id')->references('id')->on('crendentials')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('historic');
    }
}
