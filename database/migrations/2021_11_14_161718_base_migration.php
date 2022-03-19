<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaseMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Table users
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('surname');
            $table->string('email');
            $table->string('phone');
            $table->string('password')->nullable();
            $table->enum('role', ['student', 'tutor', 'admin']);
            $table->timestamps();
        });

        /**
         * Table users
         */
        Schema::create('skills', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name');
            $table->string('level');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('announcements', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->string('description');
            $table->decimal('price');
            $table->string('duration');
            $table->json('schedule')->nullable();
            $table->timestamps();
        });

        Schema::create('users_skills', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
        });

        Schema::create('users_announcements', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->timestamps();
        });


        /*
        |--------------------------------------------------------------------------
        | Foreign keys
        |--------------------------------------------------------------------------
        */

        /**
         * Foreign keys clients_places
         */
        Schema::table('users_skills', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            });
            $table->after('user_id', function ($table) {
                $table->foreignId('skill_id')->constrained('skills')->onDelete('cascade');
            });
        });

        Schema::table('users_announcements', function (Blueprint $table) {
            $table->after('id', function ($table) {
                $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            });
            $table->after('user_id', function ($table) {
                $table->foreignId('announcement_id')->constrained('announcements')->onDelete('cascade');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_skills');
        Schema::dropIfExists('users_announcements');
        Schema::dropIfExists('users');
        Schema::dropIfExists('skills');
        Schema::dropIfExists('announcements');
    }
}
