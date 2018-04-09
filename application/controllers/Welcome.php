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
        echo $this->post[]
        $this->showSet(2);
    }

}