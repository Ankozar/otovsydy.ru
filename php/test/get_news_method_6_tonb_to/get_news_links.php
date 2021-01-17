<?php

// include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
// $source_url = 'http://www.tonb.ru/activities_and_events/news.php';
// $source_link_first_part = 'http://www.tonb.ru';
// $sourceNameInDb = 'source_tonb_to';
// $site = file_get_contents($source_url);
// $document = phpQuery::newDocument($site);
// echo $document;

 $news_main_block = $document->find('.news-list');
 $news_blocks = $news_main_block->find('tr');

 $i = 0;
 foreach($news_blocks as $block){
    $pqblock = pq($block);
    $links = $pqblock->find('a');
if($text_title_wrong[$i] =  $links->text()){
        $j = 0;
        foreach($links as $link){
            $pqlink = pq($link);
            $first_links[$j] = $pqlink->attr('href');
            $j++;
        };
    // echo $first_links[0] . "<br>";

    $news_links[$i] = $first_links[0];
    $text_link_result[$i] = $source_link_first_part . $first_links[0];
    echo $text_link_result[$i] . "<br>";

    // $h3_blocks[$i] = $pqblock->find('a');
    
    preg_match("/\w.*\w\D/u", $text_title_wrong[$i], $text_title_arr);
    $text_title[$i] = $text_title_arr[0];
    echo $text_title[$i] . $i . '<br>';
    $i++;
    };
if($i == 9){
    return;
};
 };



    ?>