<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKampanyesTable extends Migration
{
    public function up()
    {
        Schema::create('kampanyes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_kampanye');
            $table->string('slug');
            $table->decimal('total', 15, 2);
            $table->string('image')->nullable();
            $table->longText('deskripsi')->nullable();
            $table->string('lokasi');
            $table->timestamps();
        });
    }
}