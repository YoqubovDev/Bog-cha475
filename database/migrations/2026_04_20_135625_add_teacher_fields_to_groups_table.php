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
        Schema::table('groups', function (Blueprint $table) {
            if (!Schema::hasColumn('groups', 'direction')) {
                $table->string('direction')->nullable()->after('language');
            }
            if (!Schema::hasColumn('groups', 'teacher_id')) {
                $table->unsignedBigInteger('teacher_id')->nullable()->after('result_percentage');
            }
            if (!Schema::hasColumn('groups', 'assistant_id')) {
                $table->unsignedBigInteger('assistant_id')->nullable()->after('teacher_id');
            }
            
            // Add foreign keys if they don't exist
            try {
                $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('set null');
            } catch (\Exception $e) {
                // Foreign key might already exist
            }
            try {
                $table->foreign('assistant_id')->references('id')->on('teachers')->onDelete('set null');
            } catch (\Exception $e) {
                // Foreign key might already exist
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('groups', function (Blueprint $table) {
            if (Schema::hasColumn('groups', 'teacher_id')) {
                try {
                    $table->dropForeignKey(['teacher_id']);
                } catch (\Exception $e) {
                    // FK might not exist
                }
            }
            if (Schema::hasColumn('groups', 'assistant_id')) {
                try {
                    $table->dropForeignKey(['assistant_id']);
                } catch (\Exception $e) {
                    // FK might not exist
                }
            }
            $table->dropColumn(['direction', 'teacher_id', 'assistant_id']);
        });
    }
};
