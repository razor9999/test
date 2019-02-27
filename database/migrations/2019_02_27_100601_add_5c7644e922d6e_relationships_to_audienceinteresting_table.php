<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7644e922d6eRelationshipsToAudienceInterestingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audience_interestings', function(Blueprint $table) {
            if (!Schema::hasColumn('audience_interestings', 'audience_id')) {
                $table->integer('audience_id')->unsigned()->nullable();
                $table->foreign('audience_id', '30077_5c7644806bf44')->references('id')->on('audiences')->onDelete('cascade');
                }
                if (!Schema::hasColumn('audience_interestings', 'interesting_id')) {
                $table->integer('interesting_id')->unsigned()->nullable();
                $table->foreign('interesting_id', '30077_5c76448072e49')->references('id')->on('interestings')->onDelete('cascade');
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
        Schema::table('audience_interestings', function(Blueprint $table) {
            
        });
    }
}
