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
        $this->load->model('Accessories');
        $this->all_sets = $this->Sets->all();
        $this->all_acc = $this->Accessories->all();
    }

	public function index()
	{
		$this->data['pagebody'] = 'homepage';
        $this->data['pagetitle'] = 'Zapteam';
        $this->setData = array();


        $this->setData['set1'] = array('img1' => 'blue', 'img2' => 'smallnose', 'img3' => 'smiling', 'img4' => 'long',);
//        $this->setData['set2'] = array('img1' => 'fierce', 'img2' => 'bignose', 'img3' => 'tongue', 'img4' => 'spiky',);

        $this->data['sets'] = $this->setData;



		$this->render();
	}

}
