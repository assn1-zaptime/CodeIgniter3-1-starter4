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
     *  index() should return a description of the scenario
    */
    
    public function index()
    {
            $description = array('Scenario' => 'Face Creator');
            echo json_encoder($description);
    }
     
     
    /**
     * should return the designated accessory, or all of them if none is specifically requested
     */
    public function catalog($key)
    {
        if($key == null) {
            $record = $this->accessories->all();
            header("Content-type: application/json");
            echo json_encode($record, JSON_PRETTY_PRINT);
        } else {
            $record = $this->accessories->get($key);
            header("Content-type: application/json");
            echo json_encode($record, JSON_PRETTY_PRINT);
        }
        
    }

    /**
     * category($key) should return the designated category, or all of them if none is specifically requested
     * @param type $key
     */
    public function category($key)
    {
        
        if($key == null) {
            $record = $this->category->all();
            header("Content-type: application/json");
            echo json_encode($record, JSON_PRETTY_PRINT);
        } else {
            $record = $this->category->get($key);
            header("Content-type: application/json");
            echo json_encode($record, JSON_PRETTY_PRINT);
        }
    }
    
    /**
     * bundle($key) should return the designated category, or all of them if none is specifically requested
     * @param type $key
     */
    public function bundle($key)
    {
        if($key == null) {
            $record = $this->sets->all();
            header("Content-type: application/json");
            echo json_encode($record, JSON_PRETTY_PRINT);
        } else {
            $record = $this->sets->get($key);
            header("Content-type: application/json");
            echo json_encode($record, JSON_PRETTY_PRINT);
        }
    }
}

