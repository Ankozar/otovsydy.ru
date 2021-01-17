<?php
include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';
$source_url = 'https://dito.admtyumen.ru/OIGV/dit/news/news.htm';
$source_link_first_part = 'https://dito.admtyumen.ru/';
$sourceNameInDb = 'source_dep_inf';
$site = file_get_contents($source_url);
$document = phpQuery::newDocument($site);

$a = $document->find('a');

$res1=[];
$count1 = 0;
$res1;
foreach($a as $thisa){
    if(pq($thisa)->text()){
        $res = pq($thisa)->parent()->siblings();
        $res1 = pq($thisa);
        $count = count($res);
        // array_push($res1, $res);
    };
    if($count > $count1){
        $count1 = $count;
        $news_main_block = $res1->parent()->attr('class');
        preg_match('/\w+\S*\b/', $news_main_block, $preg_res);
        $news_main_block = '.' . $preg_res[0];
        $news_blocks = $res1->attr('class');
        preg_match('/\w+\S*\b/', $news_blocks, $preg_res2);
        $news_blocks = '.' . $preg_res2[0];
    };
    // print_r($res);
    // echo '<hr>';
};
echo $count1;
echo '<hr>';
echo $news_main_block;
echo '<hr>';
echo $news_blocks;






// $res = [];
// $i=0;
// foreach($a as $thisa){
//     $res = pq($thisa)->parent()->parent()->attr('class');
//     if($res){
//     $result[$i] = $res;
//     };
//     // echo $result;
//     // print_r($result);
//     // echo '<hr>';
//     $i++;
// };
// print_r(array_unique($result));



?>