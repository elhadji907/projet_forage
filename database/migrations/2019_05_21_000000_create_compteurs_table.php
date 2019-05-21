<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompteursTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'compteurs';

    /**
     * Run the migrations.
     * @table compteurs
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('uuid', 36);
            $table->string('numero_serie', 200)->nullable();
            $table->softDeletes();
            $table->nullableTimestamps();
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
}
