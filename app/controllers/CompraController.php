<?php

class CompraController extends \BaseController {

	public function create()
	{
		if (Input::has('_token'))
		{

			$compra = new Compra;

			if (!$compra->_create())
			{
				return $compra->errors();
			}

			$id = DB::getPdo()->lastInsertId();

			return Response::json(array('success'=> true,'compra_id' => $id));

		}

		return View::make('compras.create');
	}

	public function detalle()
	{
		if (Input::has('_token'))
		{
			$query = new DetalleCompra;

			if (!$query->_create())
			{
				return $query->errors();
			}

			$href = 'admin/compras/delete_detail';

			$id = Input::get('compra_id');

			return Response::json(array('success' => true, 
				'table' => Table::masterDetail('compras' , $id , $href),
				'total'=>$this->TotalDetalle($id)));
		}

		return View::make('compras.detalle');
	}

	public function delete_detail()
	{
		$delete = DetalleCompra::destroy(Input::get('id'));

		if ($delete)
		{
			return Response::json(array('success' => true, 'msg' => 'Detalle eliminado' ), 200);
		}

		return Response::json(array('success' => false, 'msg' => 'Huvo un error al tratar de eliminar' ));
	}

	public function TotalDetalle($id)
	{
		$query = DB::table('detalle_compras')->select(DB::raw('sum(cantidad*precio) as total'));

		$query = $query->where('compra_id',array($id))->get();

		foreach ($query as $key => $val) 
		{
			return $val->total;
		}

	}

}
