<?php

class Button extends libCss implements iWebRenderer{
    
    private $type = null;
    private $text = null;

    function __construct($id, $text, $type=null){
        
        $this->text = $text;
        $this->type = $type;
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

    public function render() : string{
        $out = '<button'.$this->getType(true);
        $out .= $this->getNodeId(true).'>';
        $out .= $this->getText();
        $out .= "</button>\r\n";
        return $out;
    }
}