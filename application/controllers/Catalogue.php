<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Catalogue extends Application
{
    
    function __construct()
    {
        parent::__construct();
       
    }
//edit
    public function index()
    {
        $cat = ""; $acc = "";
        $this->load->model('Categories');
        $this->load->model('Accessories');
        $cat = $this->Categories->all();
        $acc = $this->Accessories->all();
        $this->data['pagetitle'] = 'Catalogue';
        $content = "";            
        
        foreach($cat as $c) {
                $content .= "<h1>".strtoupper($c->catName)."</h1>";
                foreach($acc as $a) {
                    if (strcmp($a->catCode,$c->catCode)==0) {
                $content .= "<div class='w3-container col-sm-5' style=' display: inline-block;'>
                    <div class='w3-card-3' style='width:350px'>
                        <div class='w3-container'>
                            <img src='img/$a->accName.png' alt='Avatar' class='w3-left w3-margin-right' style='width:200px'>
            <p><br><br>Code: $a->accCode
                <br>Name: $a->accName
                <br>Pretty: $a->att1
                <br>Cool: $a->att2
                <br>Wacky: $a->att3
            </p>
            <button>Edit</button>
            </div>
            </div>
            </div>"; }}
            
        }
        $this->data['content'] = $content;
        $this->data['pagetitle'] = 'CHECK OUT OUR ACCESSORIES';
        $this->data['pagebody'] = 'catalogue';
        $this->render(); 
    }
}