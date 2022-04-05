<?php
function gen(){
$xmlFile = 'lesson30.xml';
$xslFile = 'lessonmod.xsl';

$xml = new DOMDocument();
$xml->load( $xmlFile );
$xsl = new DOMDocument();
$xsl->load( $xslFile );
// przetwarzanie styli wyglądu
$proc = new XSLTProcessor();
$proc->importStyleSheet( $xsl );	// wpierw zaimportuj styl transformacji
$info = $proc->transformToXml( $xml );	// następnie dokonaj transformacji
return $info;	
}
echo gen();