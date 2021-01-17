<?php

 $news_dates = $document->find('.date');
 $i = 0;
 foreach($news_dates as $date){
     $pqDate = pq($date);
     $text_date[$i] =  $pqDate->text();
    //  print_r($text_date[$i] . '<br>');
     $i++;
    };
?>