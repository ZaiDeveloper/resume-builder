<?php

use App\Enums\Experience\{ExperienceCurrentlyWorking, ExperienceEmploymentType};
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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedSmallInteger('employment_type')->default(ExperienceEmploymentType::FullTime);
            $table->string('company_name');
            $table->string('location');
            $table->unsignedSmallInteger('currently_working')->default(ExperienceCurrentlyWorking::No);
            $table->string('start_month');
            $table->string('start_year');
            $table->string('end_month')->nullable();
            $table->string('end_year')->nullable();
            $table->longtext('description');
            $table->integer('sort')->nullable();
            $table->foreignId('resume_id')->constrained("resumes")->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('experiences');
    }
};
