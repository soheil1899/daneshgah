<?php

use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_groups', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });



        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->boolean('image')->default(false);
            $table->string('url')->unique();
            $table->text('description')->nullable();
            $table->text('minitext')->nullable();
            $table->boolean('publish')->default(false);
            $table->boolean('important')->default(false);
            $table->bigInteger('article_group_id')->unsigned();
            $table->timestamps();

        });







    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('keywords');
        Schema::dropIfExists('article_contents');
        Schema::dropIfExists('article_types');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('article_groups');
    }
}
