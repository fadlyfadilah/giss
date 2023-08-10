<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatursTable extends Migration
{
    public function up()
    {
        Schema::create('donaturs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama');
            $table->string('email');
            $table->integer('nohp');
            $table->decimal('jumlah', 15, 2);
            $table->longText('pesan')->nullable();
            $table->timestamps();
        });
    }
}