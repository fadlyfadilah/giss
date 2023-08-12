<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDonasisTable extends Migration
{
    public function up()
    {
        Schema::table('donasis', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8862623')->references('id')->on('users');
            $table->unsignedBigInteger('kampanye_id')->nullable();
            $table->foreign('kampanye_id', 'kampanye_fk_8862628')->references('id')->on('kampanyes');
        });
    }
}