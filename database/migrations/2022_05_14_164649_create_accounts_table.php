<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
   
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->integer('account_id');
            $table->integer('balance')->default(0);
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
