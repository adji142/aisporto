<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->string('contact_phone')->nullable()->after('sub_headline');
            $table->string('contact_email')->nullable()->after('contact_phone');
            $table->text('contact_address')->nullable()->after('contact_email');
            $table->string('contact_hours')->nullable()->after('contact_address');
            $table->text('map_embed')->nullable()->after('contact_hours');
        });
    }

    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {
            $table->dropColumn([
                'contact_phone',
                'contact_email',
                'contact_address',
                'contact_hours',
                'map_embed',
            ]);
        });
    }
};
