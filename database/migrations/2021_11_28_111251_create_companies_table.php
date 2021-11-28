<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('year');
            $table->string('industry_aggregation_NZSIOC', 30);
            $table->string('industry_code_NZSIOC', 30 );
            $table->string('industry_name_NZSIOC', 100);
            $table->string('units', 50);
            $table->string('variable_code', 10);
            $table->string('variable_name', 150);
            $table->string('variable_category', 50);
            $table->decimal('value', 10, 4, true);
            $table->string('industry_code_ANZSIC06', 200);
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
        Schema::dropIfExists('companies');
    }
}
