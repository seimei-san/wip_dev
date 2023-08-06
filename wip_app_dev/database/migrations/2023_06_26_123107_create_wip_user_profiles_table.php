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
        Schema::create('wip_user_profiles', function (Blueprint $table) {
            $table->bigIncrements('user_profile_id');
            $table->string('user_id', 20)->index();
            $table->string('employee_id', 20)->nullable(true);
            $table->string('chat_user_id', 20)->index();
            $table->string('chat_sys', 3);
            $table->tinyInteger('chat_interval');
            $table->tinyInteger('chat_limit');
            $table->string('report_interval', 3)->nullable(true);
            $table->string('task_sys', 3)->nullable(true);
            $table->string('task_sys_user_id', 60)->nullable(true);
            $table->string('task_sys_project', 20)->nullable(true);
            $table->string('task_sys_integ', 4)->nullable(true);
            $table->boolean('user_profile_active');
            $table->string('user_note')->nullable(true);
            $table->timestamps();
            $table->unique(['user_id','chat_user_id', 'chat_sys', 'employee_id'], 'user_profile_key');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wip_user_profiles');
    }
};
