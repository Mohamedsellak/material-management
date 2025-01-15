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
        Schema::create('reclamations', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("description");
            $table->enum("status",["en attente", "en cours", "resolue"])->default("en attente");
            $table->string("commentaire")->nullable();
            $table->foreignId("local_id")->constrained("locals");
            $table->foreignId("user_id")->constrained("users");
            $table->foreignId('command_line_id')->nullable()->constrained('command_lines')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reclamations');
    }
};
