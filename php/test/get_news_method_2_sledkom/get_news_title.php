<?php
// require 'C:\xampp\htdocs\News\php\phpQuery-onefile.php';
// $source_url = 'https://tyumen.sledcom.ru/news';
// require 'C:\xampp\htdocs\News\php\get_DOMall.php';

 $news_titles = $document->find('.bl-item-title');
 $i = 0;
 foreach($news_titles as $news_title){
     $pqNews_title = pq($news_title);
     $text_title[$i] = $pqNews_title->text();
    //  echo $text_title[$i] . '<br>';
     $i++;
 };
?>