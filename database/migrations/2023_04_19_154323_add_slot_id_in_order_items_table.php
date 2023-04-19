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
        Schema::table('order_items', function (Blueprint $table) {

            $table->unsignedBigInteger("slot_id")->nullable()->after('camp_session_id');
            $table->foreign("slot_id")->references("id")->on("camp_session_slots");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_items', function (Blueprint $table) {

            $table->dropForeign("order_items_slot_id_foreign");
            $table->dropColumn("slot_id");

        });
    }
};
