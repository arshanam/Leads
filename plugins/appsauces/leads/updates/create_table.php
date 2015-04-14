<?php namespace Appsauces\Leads\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class CreateTable extends Migration
{

    public function up()
    {
        Schema::create('appsauces_leads_records', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('filename')->nullable();
            $table->string('path')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appsauces_leads_records');
    }

}
