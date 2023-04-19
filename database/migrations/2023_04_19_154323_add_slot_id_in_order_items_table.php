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

            $table->unsignedBigInteger("camp_session_slot_id")->nullable()->after('camp_session_id');
            $table->foreign("camp_session_slot_id")->references("id")->on("camp_session_slots");

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

            $table->dropForeign("order_items_camp_session_slot_id_foreign");
            $table->dropColumn("camp_session_slot_id");

        });
    }
};
