<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserPlace extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_places', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('role');
            $table->dateTime('created_at')->useCurrent();
            $table->dateTime('updated_at')->nullable()->useCurrentOnUpdate();

        });

        Schema::table('users_places', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
                $table->foreignId('place_id')->constrained('places')->onDelete('cascade');
            });
        });

        /*Schema::table('users', function(Blueprint $table) {
            $table->dropForeign(['place_id']);
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users_places', function(Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['place_id']);
        });

        Schema::drop('users_places');
    }
}
