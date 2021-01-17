<?php
// include 'phpQuery-onefile.php';

//////////////////////////////////////
//Получаем количество показываемых новостей для каждого источника
//////////////////////////////////////
$count = $_POST['count'];
//////////////////////////////////////
//Формируем переменную доступа к базе
//////////////////////////////////////
$conn = new mysqli('localhost', 'cl275917_admin', 'admin1', 'cl275917_news');
//////////////////////////////////////
//Формируем переменную запроса списка источников
//////////////////////////////////////
$select_sources = "SELECT `sourceNameInDb`, `source_title`, `source_url`
FROM `sources`
WHERE
`source_category`= '"
. $_POST['category']
. "'
AND
`source_region`= '"
. $_POST['region'] 
. "'
AND
`source_country` = '"
. $_POST['country']
. "'";
//////////////////////////////////////
//Делаем запрос списка источников
//////////////////////////////////////
$select_sources_query = mysqli_query($conn, $select_sources) or die(mysqli_error($conn));
//////////////////////////////////////
//Разбираем результат запроса на массивы
//////////////////////////////////////
$i=0;
foreach ($select_sources_query as $row) {
   $sources_array[$i] = $row['sourceNameInDb'];
   $sources_titles_array[$i] = $row['source_title'];
   $source_url[$i] = $row['source_url'];
   $i++;
};
//////////////////////////////////////
//Дальше треш и Содом. Делаем выборку новостей, формируем узлы DOM. Как упростить?
//////////////////////////////////////
$j=0;
$news_block = [];
foreach ($sources_array as $next_source) {
 $select_news = "SELECT `this_news_link`, `this_news_title`, `this_news_text`, `this_news_date`, `this_news_img`
 FROM " . "`" . $next_source . "`" .
 "ORDER BY Id Desc
 LIMIT " . $count;
 $select_news_query = mysqli_query($conn,$select_news);
 $source_name = $sources_titles_array[$j];
 $news_block_source_name[$j] = '<div class=\'block_news block' . $j . '\'><h4 class=\'news_source source' . $j . '\'>' . '<a href="' . $source_url[$j] . '"class="source_url"> Источник: ' . $source_name . '</a><div class=\'hide hide' . $j . '\'>скрыть/показать</div>';
// $news_block_source_name[$j] = $source_name;
//  echo $news_block_source_name;
 $i = 0;
  
    $news_arr = [];
    while ($row = mysqli_fetch_assoc($select_news_query)){

     if($row['this_news_img'] == 'картинки нет'){
         $news_block_image = '<div class=\'news_image_div image_div'
     . $i
     . '\'>в новости нет медиа-материалов</div>';
     } elseif($row['this_news_img'] == 'в новости есть медиа') {
         $news_block_image = '<div class=\'news_image_div image_div'
     . $i
     . '\'>есть медиа-материалы</div>';
     }else {
         $news_block_image = '<div class=\'news_image_div image_div'
     . $i
     . '\'> <img class=\'news_image image'
     . $i
     .'\' src=\''
     . $row['this_news_img']
     . '\'></div>';
     };
     
     $news_block_start = '<a class=\'piece_of_news pon'
     . $i
     . '\' href=\''
     . $row['this_news_link'] 
     . '\'>';
     
     $news_block_h3 =  '<p class=\'news_title title'
     .$i
     . '\'>' . $row['this_news_title'] . '</p>';
     
     $news_block_p = '<p class=\'news_full_text full_text'
     . $i
     .'\'>'
     . $row['this_news_text']
     . '</p>';
     
     $news_block_date = '<p class=\'news_date date'
     .$i
     . '\'>'
     . $row['this_news_date']
     . '</p>';

     $news_block_end = '</a>';
    
    $news =
     $news_block_start 
     . $news_block_h3
     . $news_block_image
     . $news_block_date
     . $news_block_end;
     array_push($news_arr, [$news]);
     
        
  
     $i++;
 };
    if($count>2){
        array_push($news_block, [$news_block_source_name[$j], $news_arr]);
        }else {array_push($news_block, [$news_arr]);
    };
    
$j++;

};

$e = json_encode($news_block);
  echo $e;
// $d = json_decode($e);
//   print_r($d);


$conn->close();
?>