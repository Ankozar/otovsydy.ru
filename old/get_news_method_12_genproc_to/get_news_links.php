<?php

// include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
// $source_url = 'https://epp.genproc.gov.ru/web/proc_72/mass-media/news';
// $source_link_first_part = 'https://epp.genproc.gov.ru';
// $sourceNameInDb = 'source_genproc_to';
$site = file_get_contents($source_url);
$document = phpQuery::newDocument($site);
// echo $document;

            $text_link_result = [];
            $news_tags_arr = [];
            $text_title = [];
            $text_date = [];
            $right_image_links[] = [];

 $news_main_block = $document->find('.feeds-list__list_body');
    $news_blocks = $news_main_block->find('.feeds-list__list_item');
    $i = 0;
        foreach($news_blocks as $block){
            $pqblock = pq($block);
            $text_link_result[$i] = $pqblock->find('a')->attr('href');
            // $news_tags_arr[$i] = $pqblock->find('.news__item-tags')->text();
            $text_title[$i] = $pqblock->find('a')->text();
            $text_date[$i] = date('d-m-Y', time());
            $news_images_arr[$i] = $pqblock->find('img')->attr('src');
                if($news_images_arr[$i] == ""){
                    $right_image_links[$i]= 'картинки нет';
                    // echo $right_image_links[$i] . '<br>';
                } else { 
                    $right_image_links[$i] = 'в новости есть медиа';
                    // echo $right_image_links[$i] . "" . '<br>';
                    };

                echo $text_link_result[$i];
                echo '<br>';
                // echo  $news_tags_arr[$i];
                // echo '<br>';
                echo $text_title[$i];
                echo '<br>';
                echo $right_image_links[$i];
                echo '<br>';
                echo $text_date[$i];
                echo '<hr>';
            if($i == 9){
                return;
            };
            $i++;
        };






//  $i = 0;
//  foreach($news_blocks as $block){
//     $pqblock = pq($block);
//     $links = $pqblock->find('a');
//     $titles = $links->text();
//     $j = 0;
//     foreach($links as $link){
//         $pqlink = pq($link);
//         $text_title = $pqlink->text();
//         $match = preg_match('/\S.*\S/', $text_title);
//         if($match){
//             $text_title_arr[$j] = $text_title;
//             if(strlen($text_title_arr[$j]) > strlen($text_title_arr[0])){
//                 $text_title_arr[0] = $text_title_arr[$j];
//             };
//             $j++;
//         };
        
//     };
//     $text_title[$i] = $text_title_arr[0];
//     echo $text_title[$i];
//     echo '<br>';
//     $i++;
// // if($text_title_wrong[$i] =  $links->text()){
// //         $j = 0;
// //         foreach($links as $link){
// //             $pqlink = pq($link);
// //             $first_links[$j] = $pqlink->attr('href');
// //             $j++;
// //         };
// //     // echo $first_links[0] . "<br>";

// //     $news_links[$i] = $first_links[0];
// //     $text_link_result[$i] = $source_link_first_part . $first_links[0];
// //     echo $text_link_result[$i] . "<br>";

// //     // $h3_blocks[$i] = $pqblock->find('a');
    
// //     preg_match("/\w.*\w\D/u", $text_title_wrong[$i], $text_title_arr);
// //     $text_title[$i] = $text_title_arr[0];
// //     echo $text_title[$i] . $i . '<br>';
// //     $i++;
// //     };
// if($i == 9){
//     return;
// };
//  };



    ?>