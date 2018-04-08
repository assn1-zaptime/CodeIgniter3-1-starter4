<?php
class Set extends Memory_Model {

    var $setID;
    var $cat1AccCode;
    var $cat2AccCode;
    var $cat3AccCode;
    var $cat4AccCode;
    
    public function setSetID($value){
        if(empty($value)){
            throw InvalidArgumentException("The SetID could not be empty");
        }
        $this->setID = $value;
        return $this;
    }
    
    public function setCat1AccCode($value){
        
        if(empty($value)){
            throw InvalidArgumentException("The attribute 1 could not be empty");
        }
        if(!preg_match("acc-[0-9]*", $value)){
            throw InvalidArgumentException("The accCode should looks like acc-__");
        }
        $this->cat1AccCode = $value;
        return $this;
    }
    
    public function setCat2AccCode($value){
        
        if(empty($value)){
            throw InvalidArgumentException("The attribute 2 could not be empty");
        }
        if(!preg_match("acc-[0-9]*", $value)){
            throw InvalidArgumentException("The accCode should looks like acc-__");
        }
        $this->cat2AccCode = $value;
        return $this;
    }
    
    public function setCat3AccCode($value){
        
        if(empty($value)){
            throw InvalidArgumentException("The attribute 3 could not be empty");
        }
        if(!preg_match("acc-[0-9]*", $value)){
            throw InvalidArgumentException("The accCode should looks like acc-__");
        }
        $this->cat3AccCode = $value;
        return $this;
    }
    
    public function setCat4AccCode($value){
        
        if(empty($value)){
            throw InvalidArgumentException("The attribute 4 could not be empty");
        }
        if(!preg_match("acc-[0-9]*", $value)){
            throw InvalidArgumentException("The accCode should looks like acc-__");
        }
        $this->cat4AccCode = $value;
        return $this;
    }
}

?>