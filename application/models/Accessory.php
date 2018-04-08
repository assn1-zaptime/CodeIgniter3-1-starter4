<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Accessory extends Entity {
    var $accCode;
    var $catCode;
    var $accName;
    var $pretty;
    var $cool;
    var $wacky;
    
    public function setAccCode($value){
        if(empty($value)){
            throw InvalidArgumentException("The AccCode could not be empty");
        }
        if(!preg_match("acc-[0-9]*", $value)){
            throw InvalidArgumentException("The accCode should looks like acc-__");
        }
        $this->accCode = $value;
        return $this;
    }
    
    public function setCatCode($value){
        if(empty($value)){
            throw InvalidArgumentException("The CatCode could not be empty");
        }
        if(!preg_match("cat-[0-9]*", $value)){
            throw InvalidArgumentException("The accCode should looks like cat-__");
        }
        $this->catCode = $value;
        return $this;
    }
    
    public function setAccName($value){
        if(empty($value)){
            throw InvalidArgumentException("The accName could not be empty");
        }
        $this->accName = $value;
        return $this;
    }
    
    public function setPretty ($value){
        if (empty($value)){
            throw new InvalidArgumentException('Pretty must have a value');
        }
        if ($value > 100){
            throw new Exception('A value of attribute cannot bigger than 100');
        }
        if ($value < 0){
            throw new Exception('A value of attribute must bigger than 0');
        }
        $this->pretty = $value;
        return $this;
    }
    
    public function setCool($value){
        if (empty($value)){
            throw new InvalidArgumentException('Cool must have a value');
        }
        if ($value > 100){
            throw new Exception('A value of attribute cannot bigger than 100');
        }
        if ($value < 0){
            throw new Exception('A value of attribute must bigger than 0');
        }
        $this->cool = $value;
        return $this;
    }
    
    public function setWacky($value){
        if (empty($value)){
            throw new InvalidArgumentException('Wacky must have a value');
        }
        if ($value > 100){
            throw new Exception('A value of attribute cannot bigger than 100');
        }
        if ($value < 0){
            throw new Exception('A value of attribute must bigger than 0');
        }
        $this->wacky = $value;
        return $this;
    }
}

