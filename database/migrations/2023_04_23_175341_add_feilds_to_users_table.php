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
        Schema::table('users', function (Blueprint $table) {

            $table->string("emergency_contact_name")->nullable()->after("phone");
            $table->string("emergency_contact_phone")->nullable()->after("emergency_contact_name");

            $table->string("parents_email")->nullable()->after("parents_name")->unique();
            $table->string("parents_phone")->nullable()->after("parents_email");


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn("emergency_contact_name");
            $table->dropColumn("emergency_contact_phone");

            $table->dropColumn("parents_email");
            $table->dropColumn("parents_phone");

        });
    }
};
