<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->foreignId('project_id')->nullable()->after('admin_id')
                ->constrained('projects')->onDelete('set null');
            $table->foreignId('created_by_admin_id')->nullable()->after('project_id')
                ->constrained('admins')->onDelete('set null');
            $table->boolean('is_admin_ticket')->default(false)->after('created_by_admin_id');
            $table->foreignId('user_id')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['project_id']);
            $table->dropColumn('project_id');
            $table->dropForeign(['created_by_admin_id']);
            $table->dropColumn('created_by_admin_id');
            $table->dropColumn('is_admin_ticket');
            $table->foreignId('user_id')->nullable(false)->change();
        });
    }
};
