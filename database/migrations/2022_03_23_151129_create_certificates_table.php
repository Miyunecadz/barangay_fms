<?php

use Carbon\Carbon;
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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('or_number');
            $table->date('issued_date')->default(Carbon::createFromFormat('Y-m-d H:i:s', now('Asia/Manila'))->format('Y-m-d'));
            $table->time('issued_time')->default(Carbon::createFromFormat('Y-m-d H:i:s', now('Asia/Manila'))->format('H:i:s'));
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
        Schema::dropIfExists('certificates');
    }
};
