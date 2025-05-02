<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('domains', function (Blueprint $table) {
        $table->id();
        $table->string('domain_name')->unique();
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Domain sahibinin id-si
        $table->boolean('is_active')->default(1); // Aktivlik statusu
        $table->timestamps(); 
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('domains');
    }
};
