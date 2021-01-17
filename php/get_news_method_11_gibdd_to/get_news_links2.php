<!DOCTYPE html>
<html>



<?php
include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';

    
$ch = curl_init();
// /news/region?perPage=20&page=1&region=72
curl_setopt($ch, CURLOPT_URL, "https://xn--90adear.xn--p1ai");
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('authority: xn--90adear.xn--p1ai',
':method: GET',
'path: /news/region?perPage=20&page=2&region=72',
':scheme: https',
'accept: */*',
'accept-encoding: gzip, deflate, br',
'accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,it;q=0.6',
'cookie: session=e9c6d2a4a1937d01d7b70f83cd9e81c2; regionCode=72',
'dnt: 1',
'referer: https://xn--90adear.xn--p1ai/r/72/news',
'sec-fetch-dest: empty',
'sec-fetch-mode: cors',
'sec-fetch-site: same-origin',
'user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36',
'x-requested-with: xmlhttprequest'
));

$output = curl_exec($ch);
// $res = json_decode($output);
// var_dump($res);

// curl_close($ch);




// $source_url = 'https://xn--90adear.xn--p1ai/news/region?perPage=20&page=2&region=72';
// // $source_link_first_part = 'https://xn--90adear.xn--p1ai';
// $sourceNameInDb = 'source_umvd_to';

// $opts = array(
//   'http'=>array(
//     'header'=>":authority: xn--90adear.xn--p1ai" . 
//     ":method: GET" . 
//     ":path: /news/region?perPage=20&page=2&region=72" . 
//     ":scheme: https" . 
//     "accept: */*" . 
//     "accept-encoding: gzip, deflate, br" . 
//     "accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,it;q=0.6" . 
//     "cookie: session=e9c6d2a4a1937d01d7b70f83cd9e81c2; regionCode=72" . 
//     "dnt: 1" . 
//     "referer: https://xn--90adear.xn--p1ai/r/72/news" . 
//     "sec-fetch-dest: empty" . 
//     "sec-fetch-mode: cors" . 
//     "sec-fetch-site: same-origin" . 
//     "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36" . 
//     "x-requested-with: xmlhttprequest"  
//   )
// );
// $context = stream_context_create($opts);

// $site = file_get_contents($source_url, false, $context);
// $document = phpQuery::newDocument($site);

// echo $site;

// $scripts = $document->find('script');

    // var_dump($document);



//             $text_link_result = [];
//             $news_tags_arr = [];
//             $text_title = [];
//             $text_date = [];
//             $right_image_links[] = [];

//  $news_main_block = $document->find('.news-widget');
//      echo $news_main_block;
//     $news_blocks = $news_main_block->find('.news-item');
//     // echo $news_blocks;
//     $i = 0;
//         foreach($news_blocks as $block){
//             $pqblock = pq($block);
//             $text_link_result[$i] = $source_link_first_part . $pqblock->find('.sl-item-title')->find('a')->attr('href');
//             // $news_tags_arr[$i] = $pqblock->find('.news__item-tags')->text();
//             $text_title[$i] = $pqblock->find('.sl-item-title')->text();
//             $text_date[$i] = $pqblock->find('.sl-item-date')->text();
//                 if(preg_match('/Сегодня/iu', $text_date[$i])){
//                     $text_date[$i] = date('d-m-Y', time());
//                 };
//             $news_vid_arr = $pqblock->find('.t_vid');
//             $news_img_arr = $pqblock->find('.t_pic');
//                 if($news_img_arr != ''){
//                     $right_image_links[$i] = 'в новости есть фотографии';
//                     // echo empty($news_img_arr) . '<br>';
//                 } elseif($news_vid_arr != '') { 
//                      $right_image_links[$i]= 'в новости есть видео';
//                     // echo $right_image_links[$i] . "" . '<br>';
//                     } else {
//                         $right_image_links[$i]= 'нет медиа-материалов';
//                     };

//                 echo $text_link_result[$i];
//                 echo '<br>';
//                 // echo  $news_tags_arr[$i];
//                 // echo '<br>';
//                 echo $text_title[$i];
//                 echo '<br>';
//                 echo $right_image_links[$i];
//                 echo '<br>';
//                 echo $text_date[$i];
//                 echo '<hr>';
//             if($i == 9){
//                 return;
//             };
//             $i++;
//         };






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
<!--<script  src='/jquery-3.5.1.js'>
 </script>
 <script src='https://xn--90adear.xn--p1ai/news/region?perPage=20&page=1&region=72'>
  </script>
<script src='https://xn--90adear.xn--p1ai/media/apps/js/widgets/news.js'>
  </script>
  <script src='https://xn--90adear.xn--p1ai/modules/owncloud/files/media/js/oc_video_handler.js'>
  </script>
  <script src='https://xn--90adear.xn--p1ai/assets/js/ext.js?201808012357'>
  </script>
  <script src='https://xn--90adear.xn--p1ai/assets/js/libs.js?201808012357'>
  </script>
  <script src='https://xn--90adear.xn--p1ai/media/gibdd/build/vendor/jquery.ui.1.10.4.js'>
  </script>
  <script src='https://xn--90adear.xn--p1ai/media/gibdd/build/vendor/jquery.ui.datepicker-ru.js'>
  </script>
  <script src='https://xn--90adear.xn--p1ai/media/gibdd/build/vendor/jquery.mousewheel.min.js'>
  </script>
 <script src='https://xn--90adear.xn--p1ai/assets/js/app.js?201808012357'>
  </script>
  <script >
//   $.ajax({
//     type : 'GET',
//     url : 'https://xn--90adear.xn--p1ai/news/region?perPage=20&page=1&region=72',
//     // dataType: "html", 
//     success: function(){ 
//         alert('Are you sure you want to save this content?');}
//       });

  </script>-->
  
  
    </html>