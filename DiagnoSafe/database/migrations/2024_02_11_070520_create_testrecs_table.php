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
        Schema::create('testrecs', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->id();
            $table->timestamps();
            $table->string('predictor_used');
            $table->json('test_data');
            $table->unsignedInteger('prediction');
        }
    );
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('testrecs');
    }
};
