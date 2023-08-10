<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDonatursTable extends Migration
{
    public function up()
    {
        Schema::table('donaturs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_8852737')->references('id')->on('users');
            $table->unsignedBigInteger('kampanye_id')->nullable();
            $table->foreign('kampanye_id', 'kampanye_fk_8852743')->references('id')->on('kampanyes');
        });
    }
}