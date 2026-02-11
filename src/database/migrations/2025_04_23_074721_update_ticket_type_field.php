<?php
// Migración para actualizar el campo 'type' a string
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTicketTypeField extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->string('type')->change();  // Cambiar el tipo de 'enum' a 'string'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->enum('type', ['bug', 'improvement', 'request'])->change();
        });
    }
}
