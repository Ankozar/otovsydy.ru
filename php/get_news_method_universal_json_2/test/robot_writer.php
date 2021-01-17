<?php

include 'get_news_links.php';

$values = '';
// массив параметров для записис в БД (формирование блока новости)
for ($i = 0; $i < count($text_link_result); $i++){
    $values_arr[$i] = '('
    . '\'' . $text_link_result[$i] . '\'' . ', '
    . '\'' . $text_title[$i] . '\'' . ', '
    . '\'' .  $text_date[$i] . '\'' . ', '
    . '\'' . $right_image_links[$i] . '\''
    . ')';
    // echo $values_arr[$i] . '<br>';
};


$conn = mysqli_connect('localhost', 'cl275917_admin', 'admin1', 'cl275917_news');

// для каждой найденной новости (по количеству ссылок на новость)
for ($i = count($values_arr)-1; $i >= 0; $i--){
    
    // проверяем, есть ли такие новости в базе
    $check_record = "SELECT `this_news_link`
    FROM `$sourceNameInDb`
    WHERE `this_news_link` = '$text_link_result[$i]'";

    $check = mysqli_query($conn, $check_record);
    $count = mysqli_num_rows($check);

if ($count > 0) {
    echo 'true' . '<br>';

// если новости нет, делаем запись
} else {
    echo 'false' . '<br>';
    $sql_insert = 'INSERT INTO ' . "`" . $sourceNameInDb . "`" . '
    (`this_news_link`,
    `this_news_title`,
    `this_news_date`,
    `this_news_img`) 
    VALUES ' . $values_arr[$i];
    echo $sql_insert . '<br>';
    
        if (mysqli_query($conn, $sql_insert)) {
            echo "New record created successfully" . '<br>';
        } else {
            echo "Error: " . "<br>" . mysqli_error($conn) . '<br>';
        };
    };

};

if (mysqli_close($conn)){
    echo 'БД закрыта роботом';
} else {echo 'БД уже закрыта';};

?>