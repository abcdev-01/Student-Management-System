<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('first_name')->after('id')->nullable();
            $table->string('last_name')->after('first_name')->nullable();
        });

        // Migrate existing data: split full_name into first/last
        DB::table('students')->get()->each(function ($student) {
            if (!empty($student->full_name)) {
                $parts = explode(' ', trim($student->full_name), 2);
                DB::table('students')->where('id', $student->id)->update([
                    'first_name' => $parts[0] ?? '',
                    'last_name' => $parts[1] ?? '',
                ]);
            }
        });

        // Drop the old column
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn('full_name');
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->string('full_name')->nullable()->after('id');
        });

        DB::table('students')->get()->each(function ($student) {
            DB::table('students')->where('id', $student->id)->update([
                'full_name' => trim(($student->first_name ?? '') . ' ' . ($student->last_name ?? '')),
            ]);
        });

        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['first_name', 'last_name']);
        });
    }
};