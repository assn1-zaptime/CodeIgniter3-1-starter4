<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends Application
{
    function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
       $this->set(1);
    }

    public function set($key)
    {
        $this->showSet($key);
    }

    public function addSet()
    {
        echo "hello from addSet!<br>";


        $a = (array) $this->session->userdata('task');
        $a = array_merge($a, $this->input->post());
        $a = (object) $a;  // convert back to object
        $this->session->set_userdata('task', (object) $a);





        $this->showSet(2);
    }

}