<?php
abstract class libCss{
    protected $id = null;
    protected $cssClass = [];
    protected $cssStyle = null;
    protected $baseKey = 'base';
    protected $dataset = [];
    protected $cssHead = [];
    protected $cssLink = [];


    public function setNodeId($value){
        $this->id = $id;
    }

    public function getNodeId($attr=false) : string{
            return ($attr===false) ? $this->id : ' id="'.$this->id.'" name="'.$this->id.'"';
        
    }

    public function setCssClass( $name, $key=null){
        $items = (is_string($name) ) ? array($name) : $name;
        $key===null ? $key=$this->baseKey : null;
        $c = count($items);
        return $items;
    }

    public function getCssClass( $key=null, $wAttrb=true ) : string{
            $key===null ? $key = $this->baseKey : null;
            return $this->cssClass; #( array_key_exists($key, $this->cssClass) && strlen($this->cssClass[$key]))

    }
}