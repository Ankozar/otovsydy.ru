<?php


$main_list = $document->find('.b-list');
 $news_img_links = $main_list->find('img');
 $i = 0;                    
foreach($news_img_links as $news_image_link){
    $pqNews_image_link = pq($news_image_link);
    $wrong_image_links[$i] = $pqNews_image_link->attr('src');
    // echo $wrong_image_links[$i]  . '<br>';
    // $right_image_link = stristr($wrong_image_links[$i], 'images/');
    $right_image_links[$i] = 'https://tyumen.sledcom.ru/'. $wrong_image_links[$i];
    // echo $right_image_links[$i]  . '<br>';
    $i++;
 };
?>