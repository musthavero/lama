<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id()->unique();
            $table->timestamps();
            $table->string('name')->default('');
            $table->text('description')->default('');
            $table->text('additional_info')->default('');
            $table->smallInteger('type_id')->default(0);
            $table->smallInteger('status_id')->default(0);
            $table->float('price')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
