<?php

// include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
$source_url_this=$source_link_first_part;
// $attrs = 'url,title,date,image';
// $attrs_arr = preg_split('/,/', $attrs);
// echo $attrs_arr;
$site = file_get_contents($source_url_this);
$json = json_decode($site);

$i=0;
foreach($json->posts as $post){
    $text_link_result[$i] = $post->url;
    $text_title[$i] = $post->title;
    $text_date[$i] = $post->date;
    $right_image_links[$i] = $post->img;
    // echo $text_link_result[$i];
    // echo '<br>';
    // echo $text_title[$i];
    // echo '<br>';
    // echo $text_date[$i];
    // echo '<br>';
    // echo $right_image_links[$i];
    // echo '<br>';
    if($i == 5){
        return;
    };
$i++;
};
?>