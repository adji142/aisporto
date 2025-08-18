<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('title');                         // Judul layanan
            $table->string('slug')->unique();               // SEO slug
            $table->string('summary', 160)->nullable();     // Deskripsi singkat (untuk card / meta)
            $table->text('description')->nullable();        // Deskripsi panjang (opsional)
            $table->enum('icon_type', ['emoji', 'icon', 'image'])->default('emoji');
            $table->string('icon')->nullable();             // emoji (🔥) atau nama icon (mis: heroicon-o-code)
            $table->string('icon_image')->nullable();       // path gambar icon
            $table->string('cta_label')->nullable();        // mis: "Pelajari"
            $table->string('cta_url')->nullable();          // link ke detail / kontak
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort')->nullable();    // urutan tampilan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
