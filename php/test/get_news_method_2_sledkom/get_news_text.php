<?php


$i=0;
foreach($text_link_result as $link){
$link = file_get_contents($text_link_result[$i]);
$document_text = phpQuery::newDocument($link);
$news_aticle = $document_text->find('.c-detail');
$news_text[$i] = $news_aticle->find('p')->text();
// echo $news_text[$i] . '<hr>';
$i++;
};

?>