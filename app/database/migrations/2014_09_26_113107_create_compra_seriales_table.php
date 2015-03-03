<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCompraSerialesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('compra_seriales', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('detalle_compra_id')->unsigned();
			$table->text('series');
			$table->timestamps();

			$table->foreign('detalle_compra_id')->references('id')->on('detalle_compras')->onDelete('cascade')->onUpdate('cascade');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('compra_seriales');
	}

}
