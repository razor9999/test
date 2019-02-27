<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1551254276CampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('campaigns')) {
            Schema::create('campaigns', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('brief')->nullable();
                $table->integer('status')->nullable()->unsigned();
                $table->datetime('start')->nullable();
                $table->datetime('end')->nullable();
                $table->decimal('budget', 15, 2)->nullable();
                $table->string('requirement')->nullable();
                
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
        Schema::dropIfExists('campaigns');
    }
}
