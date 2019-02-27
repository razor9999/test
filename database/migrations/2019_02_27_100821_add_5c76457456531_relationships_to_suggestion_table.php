<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c76457456531RelationshipsToSuggestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('suggestions', function(Blueprint $table) {
            if (!Schema::hasColumn('suggestions', 'influencer_id')) {
                $table->integer('influencer_id')->unsigned()->nullable();
                $table->foreign('influencer_id', '30083_5c764573bfacd')->references('id')->on('influencers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('suggestions', 'campaign_id')) {
                $table->integer('campaign_id')->unsigned()->nullable();
                $table->foreign('campaign_id', '30083_5c764573c5484')->references('id')->on('campaigns')->onDelete('cascade');
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
        Schema::table('suggestions', function(Blueprint $table) {
            
        });
    }
}
