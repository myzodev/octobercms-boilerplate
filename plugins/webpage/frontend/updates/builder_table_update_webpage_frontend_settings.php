<?php namespace Webpage\Frontend\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableUpdateWebpageFrontendSettings extends Migration
{
    public function up()
    {
        Schema::table('webpage_frontend_settings', function($table)
        {
            $table->text('contact_information')->nullable();
            $table->text('social_media')->nullable();
        });
    }
    
    public function down()
    {
        Schema::table('webpage_frontend_settings', function($table)
        {
            $table->dropColumn('contact_information');
            $table->dropColumn('social_media');
        });
    }
}
