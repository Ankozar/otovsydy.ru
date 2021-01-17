<?php
// include 'phpQuery-onefile.php';
// $site = file_get_contents('https://depkult.admtyumen.ru/OIGV/culture/news/news.htm');
// $document = phpQuery::newDocument($site);
// echo $document;
// echo $site;

 $news_block = $document->find('.news');
 $news_links = $news_block->find('a');
 $i = 0;                    
 foreach($news_links as $news_link){
     $pqNews_link = pq($news_link);
     $text_link[$i] = $pqNews_link->attr('href');
    //  echo $text_link[$i] . '<hr>';
     $i++;
 };
     $j = 0;
     for ($i = 0; $i < count($text_link); $i++){
         if(preg_match('#.*@egNews#', $text_link[$i])){
             $text_link_New[$j] = $text_link[$i];
             $text_link_result[$j] = $source_link_first_part . $text_link_New[$j];
            //  echo $text_link_result[$j] . '<br>';
             $j++;
         };
     
     };
    //  print_r($text_link_result);

    ?>