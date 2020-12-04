<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->bigInteger ('company_id')->unsigned();
            $table->timestamps();
        });

        Schema::table('people', function (Blueprint $table) {
            $table->foreign('company_id')
                    ->references('id')
                    ->on('companies')
                    ->onDelete('cascade');
                    //to set null < onDelete('set null'); > and ('company_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
