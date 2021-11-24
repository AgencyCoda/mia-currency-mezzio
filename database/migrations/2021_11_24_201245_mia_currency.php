<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MiaCurrency extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mia_currency', function (Blueprint $table) {
            $table->id();

            $table->string('title');
    $table->string('code');
    $table->string('symbol');
    $table->decimal('val_usd', $presision = 12, $scale = 2);
    $table->text('photo');
    

            

            

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mia_currency');
    }
}