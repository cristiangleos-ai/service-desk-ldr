<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();

            $table->string('folio')->unique();

            $table->foreignId('requester_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('assigned_to_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->foreignId('area_id')
                ->constrained('areas')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('category_id')
                ->constrained('categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('subcategory_id')
                ->constrained('subcategories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->string('title');
            $table->text('description');

            $table->string('priority', 20)->default('medium');
            $table->string('status', 30)->default('new');

            $table->timestamps();
            $table->softDeletes();

            $table->index('folio');
            $table->index('status');
            $table->index('priority');
            $table->index('requester_id');
            $table->index('assigned_to_id');
            $table->index(['area_id', 'category_id', 'subcategory_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
