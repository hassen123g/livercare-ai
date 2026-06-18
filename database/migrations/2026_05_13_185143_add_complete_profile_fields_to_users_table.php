<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('patient')->after('email'); // patient, doctor, admin
            $table->string('first_name')->nullable()->after('name');
            $table->string('last_name')->nullable()->after('first_name');
            $table->string('country')->nullable()->after('role');
            $table->date('date_of_birth')->nullable()->after('country');
            $table->enum('gender', ['male', 'female'])->nullable()->after('date_of_birth');
            $table->string('city')->nullable()->after('gender');
            $table->string('phone_code')->nullable()->after('city');
            $table->string('phone')->nullable()->after('phone_code');
            $table->string('address')->nullable()->after('phone');
            $table->text('bio')->nullable()->after('address');
            $table->string('medical_license_number')->nullable()->after('bio');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role', 'first_name', 'last_name', 'country', 'date_of_birth',
                'gender', 'city', 'phone_code', 'phone', 'address', 'bio',
                'medical_license_number',
            ]);
        });
    }
};
