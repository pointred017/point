<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesContractItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_contract_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('sales_contract_id');
            $table->unsignedInteger('item_unit_id');
            $table->string('item_name');
            $table->unsignedDecimal('price', 65, 30);
            $table->decimal('quantity', 65, 30);
            $table->string('unit');
            $table->decimal('converter', 65, 30);
            $table->unsignedDecimal('discount_percent', 33, 30)->nullable();
            $table->unsignedDecimal('discount_value', 65, 30)->default(0);
            $table->text('notes')->nullable();
            $table->unsignedInteger('allocation_id')->nullable();

            $table->foreign('sales_contract_id')->references('id')->on('sales_contracts')->onDelete('cascade');
            $table->foreign('item_unit_id')->references('id')->on('item_units')->onDelete('restrict');
            $table->foreign('allocation_id')->references('id')->on('allocations')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales_contract_items');
    }
}
