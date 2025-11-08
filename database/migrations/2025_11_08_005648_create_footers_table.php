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
        Schema::create('footers', function (Blueprint $table) {
            $table->id();
           
            

            // Basic Info
            $table->string('footer_phone_no')->nullable();
            $table->text('footer_description')->nullable();
            $table->text('footer_address')->nullable();
            $table->string('footer_email')->nullable();
            $table->string('footer_text')->nullable();

            // Social Links (JSON for multiple)
            // $table->json('footer_social_links')->nullable();
            // example: {"facebook":"...","twitter":"...","linkedin":"..."}

            // Social Link
            $table->string('footer_social_facebook')->nullable();
            $table->string('footer_social_twitter')->nullable();

            // Copy Right Section
            $table->string('footer_copyright')->nullable();
          

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('footers');
    }
};
