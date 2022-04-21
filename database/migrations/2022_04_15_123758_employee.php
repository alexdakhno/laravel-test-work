<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    protected $tableName = 'employees';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table){
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->bigInteger('company_id')->unsigned();
            $table->string('email');
            $table->string('phone', 13);

            $table->index('company_id');
            $table->foreign('company_id')->on('companies')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
};
