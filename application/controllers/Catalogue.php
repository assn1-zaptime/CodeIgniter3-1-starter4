<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends Application
{
    private $all_cat = null;
    private $all_acc = null;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Categories');
        $this->load->model('Accessories');
        $this->all_cat = $this->Categories->all();
        $this->all_acc = $this->Accessories->all();
    }

    public function index()
    {
        $this->data['pagetitle'] = 'Catalogue';
        $this->data['acc'] = $this->all_acc;
        $this->data['cat'] = $this->all_cat;
        

        $this->data['pagebody'] = 'catalogue'; //
        $this->render();
    }

}
