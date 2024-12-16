<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary key ID auto-increment
            $table->string('name'); // Nama user
            $table->string('email')->unique(); // Email unik
            $table->timestamp('email_verified_at')->nullable(); // Waktu verifikasi email
            $table->string('password'); // Password yang terenkripsi
            $table->rememberToken(); // Token untuk fitur "remember me"
            $table->timestamps(); // created_at dan updated_at otomatis
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
