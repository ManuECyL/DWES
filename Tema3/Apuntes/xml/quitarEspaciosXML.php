<?
    $dom = new DOMDocument('1.0');
    $dom -> load('instrumentos.xml', LIBXML_NOBLANKS);
    $dom -> formatOutput = false;
    $dom -> save('a.xml');
?>