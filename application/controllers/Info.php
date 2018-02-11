<?php

/* 
 * This is a "RESTish" service controller, returning model data in JSON format.
 */

class Info extends CI_Controller
{
    // constructor
    function __construct()
    {
            parent::__construct();
    }

    /**
     *  Normal entry point ... should never get here
     */
    public function index()
    {
            redirect('/');
    }

    public function accessories()
    {
        $record = $this->accessories->all();
        header("Content-type: application/json");
        echo json_encode($record, JSON_PRETTY_PRINT);
    }

    public function categories()
    {
        $record = $this->categories->all();
        header("Content-type: application/json");
        echo json_encode($record, JSON_PRETTY_PRINT);
    }
    
    public function sets()
    {
        $record = $this->sets->all();
        header("Content-type: application/json");
        echo json_encode($record, JSON_PRETTY_PRINT);
    }
}

