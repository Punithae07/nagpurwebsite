<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private function addSoftDeletesIfTableExists(string $table): void
    {
        if (! Schema::hasTable($table) || Schema::hasColumn($table, 'deleted_at')) {
            return;
        }

        Schema::table($table, function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    private function dropSoftDeletesIfTableExists(string $table): void
    {
        if (! Schema::hasTable($table) || ! Schema::hasColumn($table, 'deleted_at')) {
            return;
        }

        Schema::table($table, function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'users',
            'menuses',
            'sliders',
            'posts',
            'pages',
            'photo_galleries',
            'categories',
            'contact_form',
            'birthday',
            'testimonials',
            'popups',
            'floating_menus',
            'social_icons',
            'activities',
        ];

        foreach ($tables as $table) {
            $this->addSoftDeletesIfTableExists($table);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'users',
            'menuses',
            'sliders',
            'posts',
            'pages',
            'photo_galleries',
            'categories',
            'contact_form',
            'birthday',
            'testimonials',
            'popups',
            'floating_menus',
            'social_icons',
            'activities',
        ];

        foreach ($tables as $table) {
            $this->dropSoftDeletesIfTableExists($table);
        }
    }
};
