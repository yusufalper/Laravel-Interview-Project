<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyWebSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_web_sites', function (Blueprint $table) {
            $table->id();
            $table->longText('site_content')->nullable();
            $table->bigInteger ('company_id')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('company_web_sites', function (Blueprint $table) {
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
        Schema::dropIfExists('company_web_sites');
    }
}
