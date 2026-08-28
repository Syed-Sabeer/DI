<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        foreach (['visitors', 'contact_submissions'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                if (! Schema::hasColumn($tableName, 'state')) $table->string('state', 150)->nullable()->index();
                if (! Schema::hasColumn($tableName, 'city')) $table->string('city', 150)->nullable()->index();
                if (! Schema::hasColumn($tableName, 'area')) $table->string('area', 190)->nullable()->index();
            });
        }
    }

    public function down(): void
    {
        foreach (['visitors', 'contact_submissions'] as $tableName) {
            Schema::table($tableName, function (Blueprint $table) use ($tableName) {
                foreach (['state', 'city', 'area'] as $column) {
                    if (Schema::hasColumn($tableName, $column)) {
                        $table->dropIndex([$column]);
                        $table->dropColumn($column);
                    }
                }
            });
        }
    }
};
