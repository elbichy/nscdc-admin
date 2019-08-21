<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRedeploymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redeployments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('fullname');
            $table->unsignedBigInteger('service_number');
            $table->unsignedBigInteger('file_number');
            $table->string('ref_number');
            $table->string('rank');
            $table->string('from');
            $table->string('to');
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
        Schema::dropIfExists('redeployments');
    }
}
