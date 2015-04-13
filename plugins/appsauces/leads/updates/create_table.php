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
            $table->string('location')->nullable();
            $table->string('extension', 10)->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('duration')->nullable();
            $table->string('direction')->nullable();
            $table->text('phone')->nullable();
            $table->string('dialplan')->nullable();
            $table->boolean('is_active')->default(1);
            $table->timestamp('uploaded_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appsauces_leads_records');
    }

}
