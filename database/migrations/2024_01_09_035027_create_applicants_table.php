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
        Schema::create('applicants', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('first_name',30)->nullable();
            $table->string('last_name',30)->nullable();
            $table->string('middle_name',30)->nullable();
            $table->string('mobile',10)->nullable();
            $table->string('email',70)->nullable();
            $table->string('father_name',60)->nullable();
            $table->string('mother_name',60)->nullable();
            $table->string('category',3)->nullable();
            $table->string('gender','6')->nullable();
            $table->string('class_name',10)->nullable();
            $table->date('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('state',30)->nullable();
            $table->string('passport',80)->nullable();
            $table->string('nationality',10)->nullable();
            $table->string('community',25)->nullable();
            $table->foreignId('religion_id')->constrained('religions');
            $table->string('is_catholic','3')->default('No');
            $table->string('balang',30)->nullable();
            $table->foreignId('admission_user_id')->constrained('admission_users');
            $table->string('address_proof',80)->nullable();
            $table->string('birth_certificate',80)->nullable();
            $table->string('caste_certificate',80)->nullable();
            $table->string('baptism_certificate',80)->nullable();
            $table->string('language',200)->nullable();
            $table->string('father_occupation',40)->nullable();
            $table->string('mother_occupation',40)->nullable();
            $table->string('father_phone',10)->nullable();
            $table->string('mother_phone',10)->nullable();
            $table->string('corresponding_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('father_designation',20)->nullable();
            $table->string('mother_designation',20)->nullable();
            $table->string('guardian_name',50)->nullable();
            $table->string('guardian_address',200)->nullable();
            $table->string('guardian_phone',10)->nullable();
            $table->string('father_id',80)->nullable();
            $table->string('mother_id',80)->nullable();
            $table->integer('boys')->default(0);
            $table->integer('girls')->default(0);
            $table->integer('total_members')->default(1);
            $table->string('family_pic',80)->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
