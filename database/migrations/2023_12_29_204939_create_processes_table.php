<?php

use App\Models\Judge;
use App\Models\Lawyer;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('protocol')->unique();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('location')->nullable();

            $table->enum('type', ['civil', 'criminal', 'labor', 'family', 'tributary', 'consumer', 'administrative', 'environmental', 'intellectual_property', 'digital', 'other'])->default('civil');
            $table->enum('status', ['open', 'processing', 'closed'])->default('open');

            $table->foreignIdFor(Judge::class)->nullable();
            $table->foreignIdFor(Lawyer::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
