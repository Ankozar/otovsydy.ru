

<?php

//include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
//$source_url = 'http://www.tyumen-city.ru/';
//$source_link_first_part = 'http://www.tyumen-city.ru';
//$sourceNameInDb = 'source_tyumen-city_adm_to';
//$attrs = '.gray,a,a,href,p,img,src';
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
$link_blocks = $news_main_block->find($attrs_arr[1]);
$title_blocks = $news_main_block->find($attrs_arr[4]);

////////////
// разбираем на части блоки с частями новостей
////////////
$i = 0;
foreach($link_blocks as $block){
    $pqblock = pq($block);
    $img_block = $pqblock->find($attrs_arr[5])->attr($attrs_arr[6]);

    if($img_block != ''){
        $text_link_result[$i] = $pqblock->attr($attrs_arr[3]);
        $right_image_links[$i] = $source_link_first_part . $img_block;
        $text_date[$i] = date('d-m-Y', time());
        echo $text_link_result[$i];
        echo '<br>';
        echo $right_image_links[$i];
        echo '<br>';
        echo $text_date[$i];
        echo '<br>';
        echo '<hr>';
        $i++;
    };

};

$i = 0;
foreach($title_blocks as $block){
    $pqblock = pq($block);
    $title = $pqblock->find('strong')->text();
    if($title != '') {
        $text_title[$i] = $title;
        echo $text_title[$i];
        echo '<br>';
        echo '<hr>';
        $i++;
    };

};



?>
