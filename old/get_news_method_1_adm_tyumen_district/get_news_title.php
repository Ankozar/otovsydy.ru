<?php
// include '/php/phpQuery-onefile.php';
// $source_url = 'https://dito.admtyumen.ru/OIGV/dit/news/news.htm';
// require '/php/get_DOMall.php';


 $news_titles_parent = $document->find('.news-item');
 $news_titles = $document->find('.title');
 $i = 0;
 foreach($news_titles as $news_title){
     $pqNews_title = pq($news_title);
     $text_title[$i] = $pqNews_title->text();
    //  echo $text_title[$i] . '<br>';
     $i++;
 };
?>