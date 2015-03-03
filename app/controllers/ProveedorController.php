<?php

class ProveedorController extends BaseController {

    public function search()
    {
        return Autocomplete::get('proveedores', array('id', 'nombre', 'contacto','direccion'),'direccion');
    }

    public function help()
    {
    	$data = Proveedor::find(Input::get('id'));

    	return View::make('proveedor.help', compact('data'));
    }
    public function index()
    {
        return View::make('proveedor.index');
    }
}
 