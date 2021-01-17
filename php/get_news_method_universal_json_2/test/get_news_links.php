<?php

include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
$source_link_first_part = 'https://feeds.tildacdn.com/api/getfeed/?feeduid=969806014754&recid=194311620&c=1608183107503&size=4&slice=1&sort%5Bdate%5D=desc&filters%5Bdate%5D=&getparts=true';
$source_url_this= $source_link_first_part;
$attrs = 'url,title,date,image';
$attrs_arr = preg_split('/,/', $attrs);
echo $attrs_arr[0];
echo '<br>';
echo $attrs_arr[1];
echo '<br>';
echo $attrs_arr[2];
echo '<br>';
echo $attrs_arr[3];
echo '<br>';
$site = file_get_contents($source_url_this);
$json = json_decode($site);

$i=0;
foreach($json->posts as $post){
    $text_link_result[$i] = $post->$attrs_arr[0];
    $text_title[$i] = $post->$attrs_arr[1];
    $text_date[$i] = date('d-m-Y', time());
    $right_image_links[$i] = $post->$attrs_arr[3];
    echo $text_link_result[$i];
    echo '<br>';
    echo $text_title[$i];
    echo '<br>';
    echo $text_date[$i];
    echo '<br>';
    echo $right_image_links[$i];
    echo '<br>';
$i++;
};
?>