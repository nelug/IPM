<?php

class ProductoController extends Controller {

	public function create()
    {
    	if (Input::has('_token'))
        {
            $producto = new Producto;

            if ($producto->_create())
            {
                return 'success';
            }
            else
            {
                return $producto->errors();
            }
    	}

        return View::make('producto.create');
    }


    public function edit()
    {
    	if (Input::has('_token'))
        {
	    	$producto = Producto::find(Input::get('id'));

			if ( $producto->_update() )
			{
		        return 'success';
			}
			else
			{
			    return $producto->errors();
			}
    	}
    	

        $producto = Producto::find(Input::get('id'));

        $message = "Producto actualizado";

        $marcas = DB::table('marcas')->orderBy('nombre', 'asc')->lists('nombre','id');

        $categorias = DB::table('categorias')->orderBy('nombre', 'asc')->lists('nombre','id');

        return View::make('producto.edit', compact('producto', 'message', 'marcas', 'categorias'));
    }


    public function delete()
    {
    	$delete = Producto::destroy(Input::get('id'));

    	if ($delete)
    	{
    		return 'success';
    	}

    	return 'error';
    }

    public function compra()
    {
        $query = Producto::where('codigo', '=',Input::get('codigo'))->get();

        foreach ($query as $key => $val) 
        {
            return array('descripcion'=>$val->descripcion.' --P Costo: '.$val->p_costo.' --P Publico: '.$val->p_publico.' --Existencia: '.$val->existencia,'id'=>$val->id);
        }
        
        return array('descripcion'=>'' ,'id'=>'');
      
    }
}
