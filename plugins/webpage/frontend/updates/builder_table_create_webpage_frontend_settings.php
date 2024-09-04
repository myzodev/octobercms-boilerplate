<?php namespace Webpage\Frontend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateWebpageFrontendSettings extends Migration
{
    public function up()
    {
        Schema::create('webpage_frontend_settings', function($table)
        {
            $table->increments('id')->unsigned();
            $table->string('logo', 255)->nullable();
            $table->string('favicon', 255)->nullable();
            $table->text('menu')->nullable();
            $table->integer('site_id')->nullable();
            $table->integer('site_root_id')->nullable();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('webpage_frontend_settings');
    }
}
