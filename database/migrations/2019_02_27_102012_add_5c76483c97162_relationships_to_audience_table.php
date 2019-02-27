<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c76483c97162RelationshipsToAudienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audiences', function(Blueprint $table) {
            if (!Schema::hasColumn('audiences', 'social_network_id')) {
                $table->integer('social_network_id')->unsigned()->nullable();
                $table->foreign('social_network_id', '30072_5c76483c161b2')->references('id')->on('social_networks')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('audiences', function(Blueprint $table) {
            
        });
    }
}
