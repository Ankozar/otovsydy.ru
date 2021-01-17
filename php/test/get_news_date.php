<?php
// include 'get_news_links.php';

$date_blocks = $news_blocks->find('.catItemDateCreated');
// echo $date_blocks;
// $date_blocks_texts = $date_blocks->find('.red');
$i = 0;
foreach($date_blocks as $date_text){
    $pqdatetext = pq($date_text);
    $text_date_wrong[$i] = $pqdatetext->text();
    preg_match("/\d\d.*\d\d\d\d/", $text_date_wrong[$i], $text_date_right);
    $text_date[$i] = $text_date_right[0];
// echo $text_date[$i] . '<br>';
$i++;
};
?>