<?php
interface iWebRenderer
{
    public function setNodeId( $id );
    public function getNodeId() : string;
    public function setCssClass( $name );
    public function getCssClass() : string;
    public function setCssStyle( $value );
    public function getCssStyle() : string;
    public function render() : string;
}