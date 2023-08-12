<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonasisTable extends Migration
{
    public function up()
    {
        Schema::create('donasis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id');
            $table->string('full_name');
            $table->longText('email');
            $table->decimal('jumlah', 15, 2);
            $table->longText('note')->nullable();
            $table->string('status')->default('pending');
            $table->string('snap_token')->nullable();
            $table->timestamps();
        });
    }
}