<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c764ae8e94a0RelationshipsToCampaignTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('campaigns', function(Blueprint $table) {
            if (!Schema::hasColumn('campaigns', 'brand_id')) {
                $table->integer('brand_id')->unsigned()->nullable();
                $table->foreign('brand_id', '30070_5c764ae85a9dc')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::table('campaigns', function(Blueprint $table) {
            
        });
    }
}
