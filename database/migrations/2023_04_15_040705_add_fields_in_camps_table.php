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
        Schema::table('camps', function (Blueprint $table) {

            $table->integer('min_age')->after('id')->default(0);
            $table->integer('max_age')->after('min_age')->nullable();
            $table->boolean('no_max_age')->default(false)->after('max_age');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('camps', function (Blueprint $table) {

            $table->dropColumn('min_age');
            $table->dropColumn('max_age');
            $table->dropColumn('no_max_age');

        });
    }
};
