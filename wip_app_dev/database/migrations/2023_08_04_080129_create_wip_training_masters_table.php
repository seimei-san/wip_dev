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
        Schema::create('wip_training_masters', function (Blueprint $table) {
            $table->smallIncrements('training_id');
            $table->string('category', 126);
            $table->string('subject');
            $table->string('title');
            $table->tinyInteger('no_of_cycle');
            $table->tinyInteger('interval_days');
            $table->time('timing');
            $table->date('start_date');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wip_training_masters');
    }
};
