<?php
// require 'C:\xampp\htdocs\News\php\phpQuery-onefile.php';
// $source_url = 'https://tyumen.sledcom.ru/news';
// require 'C:\xampp\htdocs\News\php\get_DOMall.php';

$list = $document->find('.bl-item-title');
 $news_links = $list->find('a');
 $i = 0;                    
 foreach($news_links as $news_link){
     $pqNews_link = pq($news_link);
     $text_links[$i] = $pqNews_link->attr('href');
     $text_link_result[$i] = $source_link_first_part . $text_links[$i];
    //  echo $text_links[$i] . '<br>';
    //  echo $text_link_result[0] . '<br>';
     $i++;
 };
   
?>