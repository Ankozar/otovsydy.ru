<?php

// include 'get_news_links.php';
$i=0;
foreach($text_link_result as $text_link){
$link = file_get_contents($text_link);
$document_text = phpQuery::newDocument($link);
$news_aticle = $document_text->find('.content-text');
$news_text[$i] = $news_aticle->text();
// echo $news_text[$i] . '<hr>';
$i++;
};

?>