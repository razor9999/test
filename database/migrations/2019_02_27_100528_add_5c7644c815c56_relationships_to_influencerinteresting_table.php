<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7644c815c56RelationshipsToInfluencerInterestingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('influencer_interestings', function(Blueprint $table) {
            if (!Schema::hasColumn('influencer_interestings', 'influencer_id')) {
                $table->integer('influencer_id')->unsigned()->nullable();
                $table->foreign('influencer_id', '30078_5c7644c76f30f')->references('id')->on('influencers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('influencer_interestings', 'interesting_id')) {
                $table->integer('interesting_id')->unsigned()->nullable();
                $table->foreign('interesting_id', '30078_5c7644c77928d')->references('id')->on('interestings')->onDelete('cascade');
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
        Schema::table('influencer_interestings', function(Blueprint $table) {
            
        });
    }
}
