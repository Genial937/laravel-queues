<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploads', function (Blueprint $table) {
            $table->id();
            $table->string('Age')->nullable();
            $table->string('Attrition')->nullable();
            $table->string('BusinessTravel')->nullable();
            $table->string('Department')->nullable();
            $table->string('DistanceFromHome')->nullable();
            $table->string('Education')->nullable();
            $table->string('EducationField')->nullable();
            $table->string('EmployeeCount')->nullable();
            $table->string('EmployeeNumber')->nullable();
            $table->string('EnvironmentSatisfaction')->nullable();
            $table->string('Gender')->nullable();
            $table->string('HourlyRate')->nullable();
            $table->string('JobInvolvement')->nullable();
            $table->string('JobLevel')->nullable();
            $table->string('JobRole')->nullable();
            $table->string('JobSatisfaction')->nullable();
            $table->string('MaritalStatus')->nullable();
            $table->string('MonthlyIncome')->nullable();
            $table->string('MonthlyRate')->nullable();
            $table->string('NumCompaniesWorked');
            $table->string('Over18')->nullable();
            $table->string('OverTime')->nullable();
            $table->string('PercentSalaryHike')->nullable();
            $table->string('PerformanceRating')->nullable();
            $table->string('RelationshipSatisfaction')->nullable();
            $table->string('StandardHours')->nullable();
            $table->string('StockOptionLevel')->nullable();
            $table->string('TotalWorkingYears')->nullable();
            $table->string('TrainingTimesLastYear')->nullable();
            $table->string('WorkLifeBalance')->nullable();
            $table->string('YearsAtCompany')->nullable();
            $table->string('YearsInCurrentRole')->nullable();
            $table->string('YearsSinceLastPromotion')->nullable();
            $table->string('YearsWithCurrManager')->nullable();
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
        Schema::dropIfExists('uploads');
    }
}
