<?php
 $news_img_links = $document->find('.image-holder');
 $i = 0;                    
foreach($news_img_links as $news_image_link){
    $pqNews_image_link = pq($news_image_link);
    $wrong_image_links[$i] = $pqNews_image_link->attr('style');
    $right_image_link[$i] = stristr($wrong_image_links[$i], 'images/');
    $right_image_link2[$i] = substr($right_image_link[$i], 0, strlen($right_image_link[$i])-1);
    $right_image_links[$i] = $source_link_first_part . $right_image_link2[$i];
    // echo $right_image_links[$i]  . '<br>';
    $i++;
 };
?>