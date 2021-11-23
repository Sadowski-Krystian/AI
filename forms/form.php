<?php
class form{
    private $id = null;
    private $action = null;
    private $method = null;
    private $files = false;
    private $controls = [];

    function __construct($action, $method, $files=false){
        $this->action = $action;
        $this->method = $method;
        $this->files = $files;
    }

    public function setId($value){
        $this->id = $value;
    }

    public function getId($attr=false){
        if($this->id !== null){
            return ($attr===false) ? $this->id : ' id="'.$this->id.'"';
        }else{
            return '';
        }
    }

    private function setAction($url){
        $this->action = $url;
    }


    private function getAction(){
        return $this->action;
    }

    private function setMethod($value){
        $mthds = ['GET', 'POST'];
        $this->method = (!in_array(strtoupper($value), $mthds)) ? $mthds[1] : $value;
    }

    private function getMethod(){
        return $this->method;
    }

    public function addControls($item){
        $this->controls[] = $item;
    }

    public function renderControls(){
        $out = '';
        if(count($this->controls)>0){
            foreach($this->controls as $index=>$ctrl){
                $out .= is_string($ctrl) ? $ctrl : $ctrl->render();
            }
        }
        return $out;
    }


    public function display() : String{
        $out = '<form';
        $out.= $this->getId(true);
        $out.= ' action="'.$this->getAction().'"';
        $out.= ' method="'.$this->getMethod().'">';
        $out.= 'FORM: '.$this->renderControls();
        $out.= "</form>\n\r";
        return $out;
        
    }
}
?>