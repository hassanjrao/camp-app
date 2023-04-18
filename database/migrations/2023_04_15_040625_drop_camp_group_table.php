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
        Schema::dropIfExists('camp_groups');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('camp_groups', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->integer('min_age');
            $table->integer('max_age');
            $table->boolean('no_max_age')->default(false);

            $table->timestamps();
        });
    }
};
