<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends Application
{

    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $this->data['pagebody'] = 'catalogue'; //
        $this->render();
    }

}
