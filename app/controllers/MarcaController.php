<?php

class MarcaController extends BaseController {

    public function search()
    {
        return Search::marcas();
    } 
}
