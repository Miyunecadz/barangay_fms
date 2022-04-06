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
        Schema::create('cedulas', function (Blueprint $table) {
            $table->id();
            $table->string('community_tax_certificate');
            $table->date('date_issue')->default(now()->format('Y-m-d'));
            $table->string('complete_name');
            $table->string('address');
            $table->string('sex');
            $table->string('citizenship');
            $table->date('date_of_birth');
            $table->string('place_of_birth');
            $table->string('civil_status');
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
        Schema::dropIfExists('cedulas');
    }
};
