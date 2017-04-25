<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCompanyDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_company_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_detail_id');
            $table->string('company_name');
            $table->string('company_email',255)->nullable();
            $table->string('company_tel_no');
            $table->binary('comp_image')->nullable();
            $table->string('file_type')->nullable();
            $table->timestamps();

            $table->foreign('user_detail_id')->references('id')->on('user_details');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_company_details');
    }
}