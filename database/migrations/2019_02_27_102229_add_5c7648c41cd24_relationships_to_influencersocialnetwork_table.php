<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7648c41cd24RelationshipsToInfluencerSocialNetworkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('influencer_social_networks', function(Blueprint $table) {
            if (!Schema::hasColumn('influencer_social_networks', 'influencer_id')) {
                $table->integer('influencer_id')->unsigned()->nullable();
                $table->foreign('influencer_id', '30104_5c7648c39a636')->references('id')->on('influencers')->onDelete('cascade');
                }
                if (!Schema::hasColumn('influencer_social_networks', 'social_network_id')) {
                $table->integer('social_network_id')->unsigned()->nullable();
                $table->foreign('social_network_id', '30104_5c7648c3a0075')->references('id')->on('social_networks')->onDelete('cascade');
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
        Schema::table('influencer_social_networks', function(Blueprint $table) {
            
        });
    }
}
