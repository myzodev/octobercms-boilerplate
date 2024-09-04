<?php namespace Bk\Images\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateBkImagesIndex extends Migration
{
    public function up()
    {
        Schema::create('webpage_images_index', function($table) {
            $table->increments('id')->unsigned();
            $table->string('remote_url')->nullable();
            $table->string('thumb_url')->nullable();
            $table->string('webp_url')->nullable();
            $table->integer('width')->nullable();
            $table->integer('height')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('local_file')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('webpage_images_index');
    }
}
