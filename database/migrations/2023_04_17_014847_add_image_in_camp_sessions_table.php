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
        Schema::table('camp_sessions', function (Blueprint $table) {

            $table->string('image')->nullable()->after('camp_id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camp_sessions', function (Blueprint $table) {

            $table->dropColumn('image');
        });
    }
};
