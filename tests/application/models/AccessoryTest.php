<?php
declare (strict_types =1);
use PHPUnit\Framework\TestCase;
class TaskTest extends TestCase
  {
    private $CI;
    private $Accessory;
    public function setUp()
    {
        // Load CI instance normally
        $this->CI = &get_instance();
        $this->CI->load->model('accessory');
        $this->Accessory = new Accessory();
        $this->Accessory->accCode = "acc-9";
        $this->Accessory->catCode = "cat-1";
        $this->Accessory->pretty = 60;
        $this->Accessory->cool = 20;
        $this->Accessory->wacky = 40;
    }
    
    function testSetup(){
        $this->assertEquals("acc-9", $this->Accessory->accCode);
        $this->assertEquals("cat-1", $this->Accessory->catCode);
        $this->assertEquals(60, $this->Accessory->pretty);
        $this->assertEquals(20, $this->Accessory->cool);
        $this->assertEquals(40, $this->Accessory->wacky);
    }

    public function testSetAccCode (){
        $expected = "acc-9";
        $this->Accessory->accCode = $expected;
        $this->assertEquals($expected,$this->Accessory->accCode);
    }
    
    public function testSetCatCode (){
        $expected = "cat-1";
        $this->Accessory->catCode = $expected;
        $this->assertEquals($expected,$this->Accessory->catCode);
    }
    
    public function testSetPretty (){
        $expected = 80;
        $this->Accessory->pretty = $expected;
        $this->assertEquals($expected,$this->Accessory->pretty);
    }
    
    public function testSetCool(){
        $expected = 70;
        $this->Accessory->cool = $expected;
        $this->assertEquals($expected,$this->Accessory->cool);
    }
    
    public function testSetPriority(){
        $expected =0;
        $this->Accessory->wacky = $expected;
        $this->assertEquals($expected,$this->Accessory->wacky);
    }
  }