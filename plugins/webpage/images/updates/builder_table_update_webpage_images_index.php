<?php namespace Bk\Images\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateBkImagesIndex extends Migration
{
    public function up()
    {
        Schema::table('webpage_images_index', function($table) {
            $table->renameColumn('webp_url', 'ext');
        });
    }

    public function down()
    {
        Schema::table('webpage_images_index', function($table) {
            $table->renameColumn('ext', 'webp_url');
        });
    }
}
