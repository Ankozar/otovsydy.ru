<?php
// include 'get_news_links.php';
$i = 0; 
//блок с новостями уже найден в файле со ссылками
foreach($news_blocks as $block){
        $pqblock = pq($block);
        $img_block = $pqblock->find('img');
        $wrong_image_link = $img_block->attr('src');
        $right_image_link[$i] = $source_link_first_part . $wrong_image_link;
            if($img_block == ""){
                $right_image_links[$i]= 'картинки нет';
                // echo $right_image_links[$i] . '<br>';
            } else { 
                $right_image_links[$i] = $right_image_link[$i];
                // echo $right_image_links[$i] . "" . '<br>';
                };
        if($i==9){
            return;
        };
    $i++;
 };

?>