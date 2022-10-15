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
        Schema::create(COMPANY_TABLE, function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->string('name');
            $table->string('domain')->index();
            $table->string('image_url');
            $table->string('custom_data')->nullable();
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
        Schema::dropIfExists(COMPANY_TABLE);
    }
};
