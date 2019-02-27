<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c76439d1788dRelationshipsToBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brands', function(Blueprint $table) {
            if (!Schema::hasColumn('brands', 'company_size_id')) {
                $table->integer('company_size_id')->unsigned()->nullable();
                $table->foreign('company_size_id', '30074_5c76439c8e5c0')->references('id')->on('company_sizes')->onDelete('cascade');
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
        Schema::table('brands', function(Blueprint $table) {
            
        });
    }
}
