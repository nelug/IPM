<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVentaSerialesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('venta_seriales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('detalle_venta_id')->unsigned();
			$table->text('series');
			$table->timestamps();

			$table->foreign('detalle_venta_id')->references('id')->on('detalle_ventas')->onDelete('cascade')->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('venta_seriales');
	}

}
