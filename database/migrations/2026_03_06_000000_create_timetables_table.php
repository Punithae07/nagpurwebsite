<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('timetables', function (Blueprint $table) {
            $table->id();
            $table->string('type')->index(); // image or calendar
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('class_name')->nullable();
            $table->string('section')->nullable();
            $table->string('academic_year')->nullable();
            $table->string('image_path')->nullable(); // for image type
            $table->dateTime('start_at')->nullable(); // for calendar type
            $table->dateTime('end_at')->nullable();   // for calendar type
            $table->boolean('is_published')->default(true)->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timetables');
    }
};

