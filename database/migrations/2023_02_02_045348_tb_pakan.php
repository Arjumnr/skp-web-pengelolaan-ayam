<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pakan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('keluar_ke')->nullable();
            $table->integer('jumlah');
            $table->enum('status', ['masuk', 'keluar','terpakai']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
