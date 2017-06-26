<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('picture');
            $table->string('picture_dimensions');
            $table->string('picture_url');
            $table->string('picture_path');
            $table->integer('member_id')->unsigned();
            $table->integer('challenge_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('member_challenge');
    }
}
