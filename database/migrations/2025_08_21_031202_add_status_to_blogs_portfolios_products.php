<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->enum('status', ['draft', 'published', 'archive'])
                ->default('draft')
                ->after('slug');
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->enum('status', ['draft', 'published', 'archive'])
                ->default('draft')
                ->after('slug');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('status');
        });

        Schema::table('portfolios', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
