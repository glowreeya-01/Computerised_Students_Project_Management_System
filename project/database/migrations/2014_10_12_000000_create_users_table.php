<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            

            $table->increments('id');

            $table->unsignedBigInteger('user_id')->default(1);

            // $table->foreign('user_id')->references('id')->on('users');

            $table->string('firstname');

            $table->string('lastname');

            $table->string('email');

            $table->string('reg_no');

            $table->integer('status')->default(1);

            $table->boolean('isAdmin')->default(0);

            $table->integer('role');

            $table->string('password');


            $table->timestamp('created_at')->nullable();

            $table->timestamp('updated_at')->nullable();


            $table->unique(['email']);
            $table->unique(['reg_no']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
