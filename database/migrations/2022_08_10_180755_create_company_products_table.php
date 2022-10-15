<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(COMPANY_PRODUCT_TABLE, function (Blueprint $table) {
            $table->id();
            $table->uuid()->index();
            $table->foreignId('company_id')->constrained();
            $table->string('name');
            $table->string('description')->nullable();
            $table->string('tag')->nullable();
            $table->float('price');
            $table->float('base_price');
            $table->softDeletes();
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
        Schema::dropIfExists(COMPANY_PRODUCT_TABLE);
    }
};
