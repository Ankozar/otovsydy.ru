<?php

//include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
//$source_url = 'http://www.rubinhc.ru/news';
//$source_link_first_part = 'http://www.rubinhc.ru';
//$sourceNameInDb = 'source_rubinhc_to';
//$attrs = '.news-list,a,a,href,.title,.image,style';
//$attrs_arr = preg_split('/,/', $attrs);
// $method=get_news_method_universal_gtfc_1/robot_writer.php
//print_r($attrs_arr);
//echo '<br>';
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

    ////////////
    // разбираем на части блоки с новостями
    ////////////
    $i = 0;
        foreach($news_blocks as $block){
            $pqblock = pq($block);
            ////////////
            // находим блок со ссылкой на новость
            ////////////
                if($attrs_arr[1] == 'a'){
                    $text_link_result[$i] = $pqblock->attr($attrs_arr[3]);
                }else{
                    $text_link_result[$i] = $pqblock->find($attrs_arr[2])->attr($attrs_arr[3]);
                };
                    if(!preg_match('/http/', $text_link_result[$i])){
                        $text_link_result[$i] = $source_link_first_part . $text_link_result[$i];
                    };
                // $news_tags_arr[$i] = $pqblock->find('.news__item-tags')->text();
            ////////////
            // находим заголовок
            ////////////
                $text_title[$i] = $pqblock->find($attrs_arr[4])->text();
            ////////////
            // пишем дату, когда найдена новость
            ////////////
                $text_date[$i] = date('d-m-Y', time());
            ////////////
            // находим картинки
            ////////////
                // если ссылка на картинку в атрибуте "style", до выдираем оттуда ссылку регулярками
                if($attrs_arr[6] == 'style'){
                    $image_link_wrong = $pqblock->find($attrs_arr[5])->attr($attrs_arr[6]);
                    preg_match('/\(.*\w/', $image_link_wrong, $image_link_wrong2);
                    preg_match('/\w.*\w/', $image_link_wrong2[0], $image_link_wrong3);
                        // если первая часть ссылки без слеша на конце, то доюавляем к началу адреса картинки слеш
                        if(preg_match('/\w\//', $source_link_first_part)){
                            $news_images_arr = $image_link_wrong3[0];
                        } else {
                            $news_images_arr = '/' . $image_link_wrong3[0];
                        };

                }else {
                    $news_images_arr = $pqblock->find($attrs_arr[5])->attr($attrs_arr[6]);
                };
                    //если ссылку не находим, то...
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
            //проверяем не больше десяти новостей за раз
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