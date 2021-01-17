<?php

$main_block = $document->find('.b-list');
 $news_dates = $main_block->find('.bl-item-date');
 $i = 0;
 foreach($news_dates as $date){
     $pqDate = pq($date);
     $text_date[$i] =  $pqDate->html();
    //  echo $text_date[$i] . '<br>';
     $i++;
    };
?>