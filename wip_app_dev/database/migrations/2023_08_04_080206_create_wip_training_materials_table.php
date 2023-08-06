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
        Schema::create('wip_training_materials', function (Blueprint $table) {
            $table->mediumIncrements('training_material_id');
            $table->smallInteger('training_id')->index();
            $table->string('doc_id', 32);
            $table->tinyInteger('question_no');
            $table->string('answer_type', 6);
            $table->tinyInteger('answer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wip_training_materials');
    }
};
