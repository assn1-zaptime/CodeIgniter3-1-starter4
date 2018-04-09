<?php
use PHPUnit\Framework\TestCase;

class TaskListTest extends TestCase
  {
    private $CI;
    private $set;
    public function setUp()
    {
      // Load CI instance normally
      $this->CI = &get_instance();
      //$this->CI->load->model('set');
      $this->CI->load->model('accessory');
      $this->set = new Set();
    }
    
    public function testSetSetID (){
        $expected = 3;
        $this->set->setSetID($expected);
        $this->assertEquals($expected,$this->set->setID);
    }
    
     public function testSetAct1AccCode (){
        $expected = "acc-2";
        $this->set->setCat1AccCode($expected);
        //$this->set->cat1AccCode = $expected;
        $this->assertEquals($expected,$this->set->cat1AccCode);
    }
    
    public function testSetAct2AccCode (){
        $expected = "acc-3";
        $this->set->setCat2AccCode($expected);
        //$this->set->cat2AccCode = $expected;
        $this->assertEquals($expected,$this->set->cat2AccCode);
    }
    
    public function testSetAct3AccCode(){
        $expected = "acc-6";
        $this->set->setCat3AccCode($expected);
        //$this->set->cat3AccCode = $expected;
        $this->assertEquals($expected,$this->set->cat3AccCode);
    }
    
    public function testSetAct4AccCode(){
        $expected = "acc-7";
        $this->set->setCat4AccCode($expected);
        //$this->set->cat4AccCode = $expected;
        $this->assertEquals($expected,$this->set->cat4AccCode);
    }
  }