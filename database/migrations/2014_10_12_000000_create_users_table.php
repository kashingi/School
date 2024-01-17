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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('last_name');
            $table->string('admission_number');
            $table->string('mobile_number');
            $table->string('relationship');
            $table->string('gender');
            $table->string('height');
            $table->string('weight');
            $table->string('experince');
            $table->string('religion');
            $table->string('occupation');
            $table->string('status');
            $table->string('profile_pic');
            $table->string('address');
            $table->string('marital');
            $table->tinyInteger('class_id');
            $table->tinyInteger('blood_group');
            $table->string('date_of_birth');
            $table->string('admision_date');
            $table->string('email')->unique();
            $table->smallInteger('created_by')->default(1);
            $table->timestamp('email_verified_at')->nullable();
            $table->smallInteger('user_type')->default(3);
            $table->string('is_delete')->default(0);

            $table->string('password');
            
            $table->rememberToken();
            $table->timestamps();
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
