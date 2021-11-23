<?php

class Button{
    private $id = null;
    private $type = null;
    private $text = null;

    function __construct($id, $text, $type=null){
        $this->id = $id;
        $this->text = $text;
        $this->type = $type;
    }

    public function setId($value){
        $this->id = $id;
    }

    public function getId($attr=false){
            return ($attr===false) ? $this->id : ' id="'.$this->id.'" name="'.$this->id.'"';
        
    }

    private function getType($attr=false){
        return ($this->type===null) ?  '' : ($attr===false) ? $this->type : ' type="'.$this->type.'"';
    }

    private function setText($value){
        $this->text = $value;
    }

    private function getText(){
        return $this->text;
    }

    public function render(){
        $out = '<button'.$this->getType(true);
        $out .= $this->getId(true).'>';
        $out .= $this->getText();
        $out .= "</button>\r\n";
        return $out;
    }
}