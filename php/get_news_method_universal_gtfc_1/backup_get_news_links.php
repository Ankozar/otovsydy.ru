<?php

// include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
// $source_url = 'https://72.mchs.gov.ru/deyatelnost/press-centr/novosti';
// $source_link_first_part = 'https://72.mchs.gov.ru';
// $sourceNameInDb = 'source_umchs_to';
// $attrs = '.articles_news-feed,.articles-item,a,href,.articles-item__title,img,src';
// $attrs_arr = preg_split('/,/', $attrs);
// print_r($attrs_arr);
$site = file_get_contents($source_url);
$document = phpQuery::newDocument($site);
// echo $document;

            $text_link_result = [];
            $news_tags_arr = [];
            $text_title = [];
            $text_date = [];
            $right_image_links[] = [];

 $news_main_block = $document->find($attrs_arr[0]);
    $news_blocks = $news_main_block->find($attrs_arr[1]);

    $i = 0;
        foreach($news_blocks as $block){
            $pqblock = pq($block);
            $$text_link_result[$i] = $pqblock->find($attrs_arr[2])->attr($attrs_arr[3]);
            if(!preg_match('/http/', $text_link_result[$i])){
            $text_link_result[$i] = $source_link_first_part . $text_link_result[$i];
            };
            // $news_tags_arr[$i] = $pqblock->find('.news__item-tags')->text();
            $text_title[$i] = $pqblock->find($attrs_arr[4])->text();
            $text_date[$i] = date('d-m-Y', time());
            if($attrs_arr[6] == 'style'){
                $image_link_wrong = $pqblock->find($attrs_arr[5])->attr($attrs_arr[6]);
                preg_match('/\(.*\w/', $image_link_wrong, $image_link_wrong2);
                preg_match('/\w.*\w/', $image_link_wrong2[0], $image_link_wrong3);
                $news_images_arr = $image_link_wrong3[0];
            }else {
                $news_images_arr = $pqblock->find($attrs_arr[5])->attr($attrs_arr[6]);
            };
                if($news_images_arr == ""){
                    $right_image_links[$i]= 'картинки нет';
                    // echo $right_image_links[$i] . '<br>';
                } else { 
                    $right_image_links[$i] = $source_link_first_part . $news_images_arr;
                    // echo $right_image_links[$i] . "" . '<br>';
                    };
                            if(preg_match('/svg/', $right_image_links[$i])){
                            $right_image_links[$i] = 'в новости есть медиа';
                        };

                // echo $text_link_result[$i];
                // echo '<br>';
                // // echo  $news_tags_arr[$i];
                // // echo '<br>';
                // echo $text_title[$i];
                // echo '<br>';
                // echo $right_image_links[$i];
                // echo '<br>';
                // echo $text_date[$i];
                // echo '<hr>';
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