<?php

class CategoriaController extends \BaseController {

    public function search()
    {
        return Search::categorias();
    }
}
