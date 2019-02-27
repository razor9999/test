<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5c7643e51881aRelationshipsToBrandCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('brand_categories', function(Blueprint $table) {
            if (!Schema::hasColumn('brand_categories', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '30075_5c7643e498172')->references('id')->on('categories')->onDelete('cascade');
                }
                if (!Schema::hasColumn('brand_categories', 'brand_id')) {
                $table->integer('brand_id')->unsigned()->nullable();
                $table->foreign('brand_id', '30075_5c7643e49cfc2')->references('id')->on('brands')->onDelete('cascade');
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
        Schema::table('brand_categories', function(Blueprint $table) {
            
        });
    }
}
