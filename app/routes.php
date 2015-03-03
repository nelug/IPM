<?php

User::observe(new \NEkman\ModelLogger\Observer\Logger);
Producto::observe(new \NEkman\ModelLogger\Observer\Logger);

Route::get('/', 'HomeController@index');
Route::get('logIn', 'HomeController@login');
Route::get('logout', 'HomeController@logout');
Route::post('index', 'HomeController@validate');

Route::group(array('prefix' => 'user'), function()
{
    Route::group(array('prefix' => 'cliente'), function()
    {
        Route::get('buscar', 'ClienteController@search');
        Route::get('create', 'ClienteController@create');
        Route::post('create', 'ClienteController@create');
        Route::post('edit', 'ClienteController@edit');
    });

    Route::group(array('prefix' => 'soporte'), function()
    {
        Route::get('create', 'SoporteController@create');
        Route::post('create', 'SoporteController@create');
        Route::post('delete_detail', 'SoporteController@delete_detail');
    });

    Route::group(array('prefix' => 'gastos'), function()
    {
        Route::get('create', 'GastoController@create');
        Route::post('create', 'GastoController@create');
        Route::post('delete_detail', 'GastoController@delete_detail');
    });

     

    Route::get('ventas/create', 'VentasController@create');
    Route::get('profile', 'UserController@edit_profile');
    Route::post('new', 'UserController@create_new');
    Route::post('profile', 'UserController@edit_profile');
    Route::get('datatables', 'DatatablesController@index');
    Route::get('datatables/users', 'DatatablesController@users');
    Route::get('datatables/proveedores', 'DatatablesController@proveedores');
    //Route::post('gasto', 'GastoController@create');
    Route::get('buscar_marca', 'MarcaController@search');
    Route::get('buscar_categoria', 'CategoriaController@search');
    Route::get('buscar_proveedor', 'ProveedorController@search');

    Route::group(array('prefix' => 'proveedor'), function()
    {
        Route::get('index', 'ProveedorController@index');
        Route::get('create', 'ProveedorController@create');
        Route::get('help', 'ProveedorController@help');
        Route::post('edit', 'ProveedorController@edit');
        Route::post('create', 'ProveedorController@create');
        Route::post('delete', 'ProveedorController@delete');
    });

});

Route::group(array('prefix' => 'admin'), function()
{
    Route::get('inventario_dt', 'InventarioController@inventario_dt');


    Route::group(array('prefix' => 'productos'), function()
    {
        Route::post('edit', 'ProductoController@edit');
        Route::post('delete', 'ProductoController@delete');
        Route::get('create', 'ProductoController@create');
        Route::post('create', 'ProductoController@create');
        Route::post('compra', 'ProductoController@compra');

    });

    Route::group(array('prefix' => 'compras'), function()
    {
        Route::get('create', 'CompraController@create');
        Route::post('create', 'CompraController@create');
        Route::post('delete', 'CompraController@delete');
        Route::get('detalle', 'CompraController@detalle');
        Route::post('detalle', 'CompraController@detalle');
        Route::post('delete_detail', 'CompraController@delete_detail');
    });

});

Route::group(array('prefix' => 'owner'), function()
{
    Route::get('users', 'UserController@index');

    Route::group(array('prefix' => 'logs'), function()
    {
        Route::get('productos', 'LogsController@productos');
        Route::get('productos_serverside', 'LogsController@productos_serverside');
        Route::get('usuarios', 'LogsController@usuarios');
        Route::get('usuarios_serverside', 'LogsController@usuarios_serverside');
    });

    Route::group(array('prefix' => 'user'), function()
    {
        Route::get('create', 'UserController@create');
        Route::post('create', 'UserController@create');
        Route::post('edit', 'UserController@edit');
        Route::post('remove_role', 'UserController@remove_role');
        Route::post('add_role', 'UserController@add_role');
        Route::post('delete', 'UserController@delete');
    });

    Route::group(array('prefix' => 'user'), function()
    {
        Route::get('roles', 'RolesController@index');
        Route::get('roles/search', 'RolesController@search');
        Route::post('roles/edit', 'RolesController@edit');
    });

    Route::group(array('prefix' => 'chart'), function()
    {
        Route::get('gastos', 'ChartController@gastos');
        Route::get('soporte', 'ChartController@soporte');
        Route::get('ventas', 'ChartController@ventas');
    });

});

Route::get('test', function()
{

             

});



Route::get('init', function()
{
    $metodo_pago = new MetodoPago;
    $metodo_pago->descripcion = 'Efectivo';
    $metodo_pago->save();

    $tienda = new Tienda;
    $tienda->nombre = 'Click';
    $tienda->direccion = 'Chiquimula';
    $tienda->telefono = '79421383';
    $tienda->status = 1;
    $tienda->save();

    $tienda = new Tienda;
    $tienda->nombre = 'Bodega';
    $tienda->direccion = 'Chiquimula';
    $tienda->telefono = '78787878';
    $tienda->status = 1;
    $tienda->save();
});

Route::get('init2', function()
{

    $user = new User;
    $user->tienda_id = 1;
    $user->username = 'hsosan1';
    $user->nombre = 'Gilder';
    $user->apellido = 'Hernandez';
    $user->email = 'hsosan1@hotmail.com';
    $user->password = '003210';
    $user->status = 1;
    $user->save();

    $user = new User;
    $user->tienda_id = 1;
    $user->username = 'admin';
    $user->nombre = 'admin';
    $user->apellido = 'admin';
    $user->email = 'admin@hotmail.com';
    $user->password = '123456';
    $user->status = 1;
    $user->save();

    $user = new User;
    $user->tienda_id = 1;
    $user->username = 'usuario';
    $user->nombre = 'usuario';
    $user->apellido = 'usuario';
    $user->email = 'usuario@hotmail.com';
    $user->password = '123456';
    $user->status = 1;
    $user->save();

    $owner = new Role;
    $owner->name = 'Owner';
    $owner->save();

    $admin = new Role;
    $admin->name = 'admin';
    $admin->save();

    $usuario = new Role();
    $usuario->name = 'User';
    $usuario->save();


    $user = User::where('username','=','hsosan1')->first();
    $user->attachRole( $owner );

    $user = User::where('username','=','admin')->first();
    $user->attachRole( $admin );

    $user = User::where('username','=','usuario')->first();
    $user->attachRole( $usuario );


    $manageProductos = new Permission;
    $manageProductos->name = 'manage_productos';
    $manageProductos->display_name = 'Manage productos';
    $manageProductos->save();

    $manageUsers = new Permission;
    $manageUsers->name = 'manage_users';
    $manageUsers->display_name = 'Manage Users';
    $manageUsers->save();

    $owner->perms()->sync(array($manageProductos->id,$manageUsers->id));
    $admin->perms()->sync(array($manageProductos->id));

    return 'Success!';
});

Route::get('dbseed', 'LoadDataController@index');
