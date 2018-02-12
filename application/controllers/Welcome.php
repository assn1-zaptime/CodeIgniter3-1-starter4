<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{

    private $all_sets = null;
	private $all_acc = null;
    function __construct()
    {
        parent::__construct();
        $this->load->model('Sets');
		$this->all_sets = $this->Sets->all();
		
		$this->load->model('Accessories');
        $this->all_acc = $this->Sets->all();
    }

	public function index()
	{
		$this->data['pagebody'] = 'homepage';
        $this->data['pagetitle'] = 'Zapteam';
		$this->data['sets'] = $this->all_sets;
		$this->data['acc'] = $this->all_acc;

		$this->render();
	}

}
