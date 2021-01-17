
<?php
// include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';

$source_url_this = 'https://xn--90adear.xn--p1ai/news/region?perPage=20&page=1&region=72';
// $source_link_first_part = 'https://xn--90adear.xn--p1ai';
// $sourceNameInDb = 'source_gibdd_to';

$opts = array(
  'http'=>array(
    'method' => "GET",
    'header'=> "authority: xn--90adear.xn--p1ai\r\n" . 
    "method: GET\r\n" . 
    // "path: /news/region?perPage=20&page=2&region=72\r\n" . 
    "scheme: https\r\n" . 
    "accept: */*\r\n" . 
    "accept-language: ru-RU,ru;q=0.9,en-US;q=0.8,en;q=0.7,it;q=0.6\r\n" . 
    "cookie: session=e9c6d2a4a1937d01d7b70f83cd9e81c2; regionCode=72\r\n" . 
    "dnt: 1\r\n" . 
    "referer: https://xn--90adear.xn--p1ai/r/72/news\r\n" . 
    "sec-fetch-dest: empty\r\n" . 
    "sec-fetch-mode: cors\r\n" . 
    "sec-fetch-site: same-origin\r\n" . 
    "user-agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36\r\n" . 
    "x-requested-with: xmlhttprequest\r\n"  
  )
);

$context = stream_context_create($opts);

$site = file_get_contents($source_url_this, false, $context);
// $document = phpQuery::newDocument($site);

// echo $site;

$json = json_decode($site);
// var_dump($json);

 $i=0;
foreach($json->data as $post){
    $text_link_result[$i] = 'https://xn--90adear.xn--p1ai/r/72/news/item/' . $post->id;
    $text_title[$i] = $post->title;
    $text_date[$i] = date('d-m-Y', time());
    $right_image_links[$i] = $post->image;
    // echo $text_link_result[$i];
    // echo '<br>';
    // echo $text_title[$i];
    // echo '<br>';
    // echo $text_date[$i];
    // echo '<br>';
    // echo $right_image_links[$i];
    // echo '<br>';
$i++;
};



    ?>
