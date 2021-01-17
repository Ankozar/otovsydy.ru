<?php
// include 'phpQuery-onefile.php';


// $frompost = $_POST['adress'];
 $site = file_get_contents($source_url);
 $document = phpQuery::newDocument($site);
// echo  $document;
?>