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
        if (!Schema::hasTable('menu_items')) {
            Schema::create('menu_items', function (Blueprint $table) {
                $table->uuid('itemID')->primary();
                $table->uuid('menu_section_id');
                $table->string('name');
                $table->decimal('price', 8, 2);
                $table->string('image_path');
                $table->timestamps();
        
                $table->foreign('menu_section_id')->references('menu_section_id')->on('menu_sections')->onDelete('cascade');
            });
        }
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
