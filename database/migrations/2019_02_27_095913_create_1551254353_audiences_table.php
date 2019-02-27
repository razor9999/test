<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1551254353AudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('audiences')) {
            Schema::create('audiences', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->nullable();
                $table->string('gender')->nullable();
                $table->string('location')->nullable();
                $table->integer('from_age')->nullable();
                $table->integer('to_age')->nullable();
                $table->string('competence')->nullable();
                
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
        Schema::dropIfExists('audiences');
    }
}
