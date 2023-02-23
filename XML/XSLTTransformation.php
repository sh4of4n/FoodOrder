<!--Author: Lim Shao Fan-->
<?php

class XSLTTransformation {
  
  public function __construct($xmlfilename, $xslfilename) {
    $xml = new DOMDocument();
    $xml->load($xmlfilename);
    
    $xsl = new DOMDocument();
    $xsl->load($xslfilename);
    
    $proc = new XSLTProcessor();
    $proc->importStylesheet($xsl);
    
    echo $proc->transformToXml($xml);
  }
}

$member = new XSLTTransformation("./XML/member.xml", "./XML/member.xsl");
?>

