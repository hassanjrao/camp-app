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

            $table->string("address")->nullable()->after('email');
            $table->string("phone")->nullable()->after('address');
            $table->integer("age")->nullable()->after('phone');
            $table->string("parents_name")->nullable()->after('age');
            $table->enum("gender",['male','female','not specified'])->default('not specified')->after('parents_name');

            $table->foreignId('camp_id')->nullable()->constrained()->after('parents_name');


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

            $table->dropColumn([
                "address",
                "phone",
                "age",
                "parents_name",
                "gender"
            ]);

            $table->dropForeign(['camp_id']);
            $table->dropColumn('camp_id');

        });
    }
};
