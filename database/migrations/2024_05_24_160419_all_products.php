<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('extras',function(Blueprint $blueprint){
            $blueprint->id();
            $blueprint->text('name')->unique();
            $blueprint->integer('price');
        });

        Schema::create('variants',function(Blueprint $blueprint){
            $blueprint->id();
            $blueprint->text('title');
            $blueprint->text('hide_name')->nullable();
        });

        Schema::create('products',function(Blueprint $blueprint){
            $blueprint->id();
            $blueprint->text('name')->unique();
            $blueprint->integer('price');
            $blueprint->boolean('available')->default(true);
            $blueprint->text('image')->nullable();
            $blueprint->unsignedBigInteger('category_id');
            $blueprint->unsignedBigInteger('variant_id');
            $blueprint->foreign('category_id')->references('id')->on('categories');
            $blueprint->foreign('variant_id')->references('id')->on('variants');
        });

        Schema::create('variant_options',function(Blueprint $blueprint){
            $blueprint->id();
            $blueprint->text('name');
            $blueprint->integer('price');
            $blueprint->unsignedBigInteger('variant_id');
            $blueprint->foreign('variant_id')->references('id')->on('variants');
        });

        Schema::create('variant_option_extras',function(Blueprint $blueprint){
            $blueprint->id();
            $blueprint->integer('price');
            $blueprint->unsignedBigInteger('variant_option_id');
            $blueprint->unsignedBigInteger('extra_id');
            $blueprint->foreign('variant_option_id')->references('id')->on('variant_options');
            $blueprint->foreign('extra_id')->references('id')->on('extras');
        });

        Schema::create('extra_products',function(Blueprint $blueprint){
            $blueprint->unsignedBigInteger('product_id');
            $blueprint->unsignedBigInteger('extra_id');
           $blueprint->foreign('product_id')->references('id')->on('products');
           $blueprint->foreign('extra_id')->references('id')->on('extras');
        });

        Schema::create('menus',function(Blueprint $blueprint){
           $blueprint->id();
           $blueprint->text('name');
           $blueprint->text('description');
           $blueprint->text('image')->nullable();
           $blueprint->boolean('available')->default(true);
           $blueprint->integer('price');
        });

        Schema::create('items',function(Blueprint $blueprint){
            $blueprint->id();
            $blueprint->text('name');
            $blueprint->text('description');
         });

        Schema::create('item_product',function(Blueprint $blueprint){
            $blueprint->unsignedBigInteger('product_id');
            $blueprint->unsignedBigInteger('item_id');

             $blueprint->foreign('item_id')->references('id')->on('items');
             $blueprint->foreign('product_id')->references('id')->on('products');
        });

        Schema::create('item_menu',function(Blueprint $blueprint){
            $blueprint->unsignedBigInteger('menu_id');
            $blueprint->unsignedBigInteger('item_id');

            $blueprint->foreign('item_id')->references('id')->on('items');
            $blueprint->foreign('menu_id')->references('id')->on('menus');
       });

       Schema::create('carts',function(Blueprint $blueprint){
        $blueprint->id();
        $blueprint->text('comment');
        $blueprint->integer('sub_total');
        $blueprint->integer('total');
        $blueprint->unsignedBigInteger('place_id');

        $blueprint->foreign('place_id')->references('id')->on('places');
        $blueprint->integer('cartable_id');
        $blueprint->string('cartable_type');
        $blueprint->enum('type',['ONSITE','TAKEAWAY']);
     });

     Schema::create('cart_menus',function(Blueprint $blueprint){
        $blueprint->id();
        $blueprint->text('comment');
        $blueprint->integer('price');
        $blueprint->unsignedBigInteger('menu_id');
        $blueprint->unsignedBigInteger('cart_id');

        $blueprint->foreign('menu_id')->references('id')->on('menus');
        $blueprint->foreign('cart_id')->references('id')->on('carts');
     });

     Schema::create('cart_menu_items',function(Blueprint $blueprint){
        $blueprint->id();
        $blueprint->unsignedBigInteger('cart_menu_id');
        $blueprint->unsignedBigInteger('item_id');

        $blueprint->foreign('cart_menu_id')->references('id')->on('cart_menus');
        $blueprint->foreign('item_id')->references('id')->on('items');
     });

     Schema::create('cart_products',function(Blueprint $blueprint){
        $blueprint->id();
        $blueprint->integer('price');
        $blueprint->unsignedBigInteger('product_id');
        $blueprint->unsignedBigInteger('cart_id');

        $blueprint->foreign('product_id')->references('id')->on('products');
        $blueprint->foreign('cart_id')->references('id')->on('carts');
     });

     Schema::create('cart_product_variants',function(Blueprint $blueprint){
        $blueprint->id();
        $blueprint->integer('price');
        $blueprint->unsignedBigInteger('cart_product_id');
        $blueprint->unsignedBigInteger('variant_id');

        $blueprint->foreign('cart_product_id')->references('id')->on('cart_products');
        $blueprint->foreign('variant_id')->references('id')->on('variants');
     });

     Schema::create('cart_product_extras',function(Blueprint $blueprint){
        $blueprint->id();
        $blueprint->integer('price');
        $blueprint->unsignedBigInteger('extra_id');
        $blueprint->unsignedBigInteger('cart_product_id');

        $blueprint->foreign('extra_id')->references('id')->on('extras');
        $blueprint->foreign('cart_product_id')->references('id')->on('cart_products');
     });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::drop('extras');
        Schema::drop('variants');
        Schema::drop('products');
        Schema::drop('variant_options');
        Schema::drop('variant_option_extras');
        Schema::drop('extra_products');
        Schema::drop('menus');
        Schema::drop('items');
        Schema::drop('item_product');
        Schema::drop('item_menu');
        Schema::drop('carts');
        Schema::drop('cart_menus');
        Schema::drop('cart_menu_items');
        Schema::drop('cart_products');
        Schema::drop('cart_product_variants');
        Schema::drop('cart_product_extras');

    }
};
