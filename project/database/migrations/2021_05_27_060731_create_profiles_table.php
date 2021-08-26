<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('user_id')->unsigned();

            $table->string('department')->default('Not set')->nullable();

            $table->string('gender')->default('Not set')->nullable();

            $table->string('phone')->default('Not set')->nullable();

            $table->string('image')->nullable();

            $table->dateTime('DoB')->nullable();

            $table->string('qualification')->default('Not set')->nullable();

            $table->string('experience')->default('Not set')->nullable();

            $table->text('address')->default('Not set')->nullable();

            $table->string('city')->default('Not set')->nullable();

            $table->string('state')->default('Not set')->nullable();

            $table->string('zipcode')->default('Not set')->nullable();

            $table->string('country')->default('Not set')->nullable();

            $table->string('topic')->default('Not set')->nullable();

            $table->text('bio')->default('about me')->nullable();

            $table->timestamp('updated_at')->nullable();

            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
