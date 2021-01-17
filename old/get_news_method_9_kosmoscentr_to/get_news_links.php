<?php

// include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
$source_link_first_part='https://feeds.tildacdn.com/api/getfeed/?feeduid=108839550993&recid=177273926&c=1610367124265&size=&slice=1&sort%5Bdate%5D=desc&filters%5Bdate%5D=&getparts=true';
$source_url_this=$source_link_first_part;
$site = file_get_contents($source_url_this);
$json = json_decode($site);
// var_dump($json);

$i=0;
foreach($json->posts as $post){
    $text_link_result[$i] = $post->url;
    $text_title[$i] = $post->title;
    $text_date[$i] = $post->date;
    $right_image_links[$i] = $post->image;
    echo $text_link_result[$i];
    echo '<br>';
    echo $text_title[$i];
    echo '<br>';
    echo $text_date[$i];
    echo '<br>';
    echo $right_image_links[$i];
    echo '<br>';
    $i++;
    if($i == 5){
        return;
    };
};
?>