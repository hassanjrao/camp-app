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
        Schema::table('discounts', function (Blueprint $table) {

            $table->renameColumn('start_date', 'start_date_time');
            $table->renameColumn('end_date', 'end_date_time');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('discounts', function (Blueprint $table) {

                $table->renameColumn('start_date_time', 'start_date');
                $table->renameColumn('end_date_time', 'end_date');
        });
    }
};
