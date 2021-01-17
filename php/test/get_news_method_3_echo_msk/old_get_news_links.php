<?php

// include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
// $source_url = 'https://echo.msk.ru/news/';
// $source_link_first_part = 'https://echo.msk.ru';
// $site = file_get_contents($source_url);
// $document = phpQuery::newDocument($site);
// echo $document;

$news_main_block = $document->find('.rel');
$news_blocks = $news_main_block->find('.preview');
$h3 = $news_blocks->find('h3');
$news_links = $h3->find('a');

 $i = 0;                    
 foreach($news_links as $news_link){
    $pqNews_link = pq($news_link);
    $text_links[$i] = $pqNews_link->attr('href');
    $text_link_result[$i] = $source_link_first_part . $text_links[$i];
    $text_title[$i] = $pqNews_link->text();
        // echo $text_title[$i] . '<br>';
        // echo $text_link_result[$i] . '<br>';
    if($i==9){
        return;
    };
    $i++;
 };
   
?>