<?php

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
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('partner_id')->unsigned()->nullable();
            $table->foreign('partner_id')
                ->references('id')
                ->on('partners')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')
                ->references('id')
                ->on('brands')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('image')->nullable();
            $table->text('image_detail')->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('number')->nullable();
            $table->string('deep_link');
            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->decimal('price', 10, 2)->unsigned()->nullable();
            $table->decimal('old_price', 10, 2)->unsigned()->nullable();
            $table->tinyInteger('in_stock')->nullable();
            $table->tinyInteger('is_for_sale')->nullable();
            $table->tinyInteger('stock_status')->nullable();
            $table->integer('sale')->unsigned()->nullable();
            $table->tinyInteger('sex')->nullable();
            $table->string('color')->nullable();
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articles');
    }
}
