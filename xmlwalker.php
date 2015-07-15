<?php
while($file = trim(fgets(STDIN))) {
    $dom = new DOMDocument('1.0', 'UTF-8');
    $dom->formatOutput = true;
    $dom->preserveWhiteSpace = true;
    $dom->load($file);
    $xpath = new DOMXPath($dom);
    $nodeList = $xpath->query("//column[@autoIncrement='true']");
    $xmlChanged = false;
    echo $file . ":\n";
    foreach($nodeList as $column) {


        /** @var $column DOMNode */
        echo $column->attributes->getNamedItem('name')->nodeValue . "\n";
        if($xpath->query('id-method-parameter', $column->parentNode)->length > 0) {
            echo ".... has an id-method-parameter\n";
            continue;
        }

        $tableName = $column->parentNode->attributes['name'];
        $sequenceName = $tableName->nodeValue . '_pk_seq';
        $idParamElement = $dom->createElement('id-method-parameter');
        $idParamElement->setAttribute('value', $sequenceName);

        $column->parentNode->appendChild($idParamElement);
        $xmlChanged = true;
    }
    if($xmlChanged === true) {
        $dom->save($file);
    }
}
