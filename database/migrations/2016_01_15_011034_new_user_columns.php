<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class NewUserColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('title');
            $table->string('bio');
            $table->string('link');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('linkedin');
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
            $table->dropColumn(['title', 'bio', 'link', 'twitter', 'facebook', 'linkedin']);
        });
    }
}
