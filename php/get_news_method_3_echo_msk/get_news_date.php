<?php
// include 'get_news_links.php';

$date_blocks = $document->find('.time_title');
$date_blocks_texts = $date_blocks->find('.red');
$i = 0;
foreach($date_blocks_texts as $date_text){
    $pqdatetext = pq($date_text);
    $text_date[$i] = $pqdatetext->text();
// echo $text_date[$i] . '<br>';
$i++;
};
?>