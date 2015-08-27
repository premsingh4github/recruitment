<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEducationInformationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::dropIfExists('educationinformation');
		Schema::create('educationinformation',function(Blueprint $table){
			$table->increments('id');
			$table->integer('pid');
			$table->string('degree')->nullable;
			$table->string('school')->nullable();
			$table->string('board')->nullable();
			$table->string('ulocation')->nullable();
			$table->string('study_field')->nullable();
			$table->string('major')->nullable();
			$table->string('grade')->nullable();
            $table->string('gyear')->nullable();			
			$table->string('resume_certificate')->nullable();
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
		Schema::drop('educationinformation');
	}

}
