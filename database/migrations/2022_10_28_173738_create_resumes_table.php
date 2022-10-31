<?php

use App\Enums\Resume\ResumeStatus;
use App\Enums\Resume\ResumeTemplate;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resumes', function (Blueprint $table) {
            $table->id();
            $table->string('unique_link')->unique();
            $table->string('title');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('avatar')->nullable();
            $table->unsignedSmallInteger('template')->default(ResumeTemplate::Basic);
            $table->unsignedSmallInteger('status')->default(ResumeStatus::Unpublish);
            $table->foreignId('user_id')->constrained("users")->cascadeOnUpdate()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resumes');
    }
};
