<?php

use App\Enums\ModuleFormat;
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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('manufacturer_id')->constrained('manufacturers')->cascadeOnDelete();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('hp_width');
            $table->integer('depth_mm');
            $table->integer('power_12v')->default(0);
            $table->integer('power_minus12v')->default(0);
            $table->integer('power_5v')->default(0);
            $table->boolean('is_discontinued')->default(false);
            $table->decimal('price', 8, 2)->nullable();
            $table->string('image_path')->nullable();
            $table->boolean('is_diy')->default(false);
            $table->enum('format', array_column(ModuleFormat::cases(), 'value'))
                ->default(ModuleFormat::THREE_U->value);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
