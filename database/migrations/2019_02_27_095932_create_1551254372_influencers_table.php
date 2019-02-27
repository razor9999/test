<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1551254372InfluencersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('influencers')) {
            Schema::create('influencers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('email');
                $table->string('nick_name')->nullable();
                $table->string('phone')->nullable();
                $table->integer('interactive')->nullable();
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('influencers');
    }
}
