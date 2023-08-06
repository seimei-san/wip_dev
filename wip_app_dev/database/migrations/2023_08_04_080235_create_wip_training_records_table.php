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
        Schema::create('wip_training_records', function (Blueprint $table) {
            $table->bigIncrements('training_record_id');
            $table->string('user_id', 20)->index();
            $table->smallInteger('training_id')->index();
            $table->mediumInteger('training_material_id')->index();
            $table->string('doc_id', 32);
            $table->datetime('target_dattime');
            $table->tinyInteger('question_no');
            $table->string('answer_type', 6);
            $table->tinyInteger('answer');
            $table->tinyInteger('result');
            $table->string('ref_link', 200);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wip_training_records');
    }
};
