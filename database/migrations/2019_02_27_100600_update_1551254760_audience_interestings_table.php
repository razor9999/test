<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1551254760AudienceInterestingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('audience_interestings', function (Blueprint $table) {
            if(Schema::hasColumn('audience_interestings', 'weight')) {
                $table->dropColumn('weight');
            }
            
        });
Schema::table('audience_interestings', function (Blueprint $table) {
            
if (!Schema::hasColumn('audience_interestings', 'weight')) {
                $table->double('weight', 15, 2)->nullable();
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
        Schema::table('audience_interestings', function (Blueprint $table) {
            $table->dropColumn('weight');
            
        });
Schema::table('audience_interestings', function (Blueprint $table) {
                        $table->integer('weight')->nullable();
                
        });

    }
}
