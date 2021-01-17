<?php
    
    $conn = mysqli_connect('localhost', 'cl275917_admin', 'admin1', 'cl275917_news');

    echo $_POST['sourceNameInDb']  . '<br>';

    if($_POST['source_category'] == 'СМИ'){
        $sources_table = 'sourcesSMI';
        echo 'Выбранная таблица - ' . $sources_table . "<br>";
    } else {$sources_table = 'sources';
        echo 'Выбранная таблица - ' . $sources_table . "<br>";
    };

    $try_query_sintax = "SELECT `sourceNameInDb` FROM `" . $sources_table . "` WHERE `sourceNameInDb` = "
    . "\'" . $_POST['sourceNameInDb'] . "\'";
    $try_query = mysqli_query($conn, $try_query_sintax);
    $try_fetch = mysqli_fetch_array($try_query);
    $try = $try_fetch[0];
    // echo empty($try);

if($try == $_POST['sourceNameInDb']) {
    echo 'Такой ресурс есть' . '<br>';}
    else {
    echo 'нет такого ресурса' . '<br>';

    $new_table = 'CREATE TABLE '
    . ' `' . $_POST['sourceNameInDb'] . '` '
    . '(' 
    . 'id INT(11) UNSIGNED AUTO_INCREMENT KEY,
    this_news_link TEXT(255),
    this_news_title TEXT(255),
    this_news_text TEXT(255),
    this_news_date TEXT(255),
    this_news_img TEXT(255)
    )';

    // echo $new_table . '<br>';

    if(mysqli_query($conn, $new_table)) {
        echo 'Таблица создана' . '<br>';
    } else echo 'таблица ой' . '<br>';
    

    $new_source = "INSERT INTO `" . $sources_table . "`
    (`sourceNameInDb`,
    `source_title`,
    `source_url`,
    `source_link_first_part`,
    `Method_of_parcing`,
    `attrs`,
    `source_category`,
    `source_region`,
    `source_country`)
    VALUES ( "
    . "'" .
    $_POST['sourceNameInDb']
    . "', "
    . "'" .
    $_POST['source_title']
    . "', "
    . "'" .
    $_POST['source_url']
    . "', "
    . "'" .
    $_POST['source_link_first_part']
    . "', "
    . "'" .
    $_POST['Method_of_parcing']
    . "', "
    . "'" .
    $_POST['attrs']
    . "', "
    . "'" .
    $_POST['source_category']
    . "', "
    . "'" .
    $_POST['source_region']
    . "', "
    . "'" .
    $_POST['source_country']
    . "'" .
        ")";

    echo $new_source  . '<br>';

    if(mysqli_query($conn, $new_source)) {
        echo 'Строка создана' . '<br>';
    } else echo 'строка ой' . '<br>';
    };

    mysqli_close($conn);

?>