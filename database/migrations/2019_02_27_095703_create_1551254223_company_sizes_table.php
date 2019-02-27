<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1551254223CompanySizesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('company_sizes')) {
            Schema::create('company_sizes', function (Blueprint $table) {
                $table->increments('id');
                $table->string('text')->nullable();
                $table->integer('min')->nullable()->unsigned();
                $table->string('max')->nullable();
                
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
        Schema::dropIfExists('company_sizes');
    }
}
