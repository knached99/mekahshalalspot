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
        Schema::create('deals_section', function(Blueprint $table){

            $table->uuid('deal_id')->primary();
            $table->string('deal_title');
            $table->string('deal_content');
            $table->string('deal_price');
            $table->string('deal_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
