<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('plan_name');
            $table->unsignedInteger('plan_price');
            $table->json('meal_types');
            $table->json('delivery_days');
            $table->text('allergies')->nullable();
            $table->enum('status', ['active', 'paused', 'cancelled'])->default('active');
            $table->date('paused_from')->nullable();
            $table->date('paused_to')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
