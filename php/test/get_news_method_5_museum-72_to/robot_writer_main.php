<?php
include 'phpQuery-onefile.php';

$conn = mysqli_connect('localhost', 'cl275917_admin', 'admin1', 'cl275917_news');

//получаем теущий источник из базы
$source_choice = "SELECT
`sourceNameInDb`,
`source_url`,
`source_link_first_part`,
`Method_of_parcing`,
`id`,
`current`
FROM `sources`
WHERE `current` = '1'";

        $source_params = mysqli_query($conn, $source_choice) or die(mysqli_error($conn));
        $fetch = mysqli_fetch_assoc($source_params);

        $sourceNameInDb = $fetch["sourceNameInDb"];
        $source_url = $fetch["source_url"];
        $source_link_first_part = $fetch['source_link_first_part'];
        $Method_of_parcing = $fetch['Method_of_parcing'];
        $id = $fetch['id'];
        $current = $fetch['current'];

        echo $sourceNameInDb 
        . '<br>' . 
        '$source_url = ' . $source_url
        . '<br>' .
        '$source_link_first_part = ' . $source_link_first_part
        . '<br>' .
        '$Method_of_parcing = ' . $Method_of_parcing
        . '<br>' .
        '$id = ' . $id
        . '<br>' .
        '$current = ' . $current
        . '<br>';

//получаем DOM текущего источника
    $site = file_get_contents($source_url);
    $document = phpQuery::newDocument($site);
// echo $document;



//делаем current текущего источника равным 0
    $current_change = "UPDATE 
    `sources`
    SET
    `current` = '0'
    WHERE
    `id` = " . "'" . $id . "'";

    // echo '<br>' . $current_change . '<br>';

    mysqli_query($conn, $current_change) or die(mysqli_error($conn));

//проверяем, есть ли следующий источник
    $whoIsNext = "SELECT
    `id`
    FROM `sources`
    WHERE
    `id` = "
    . "'" . ++$id . "'";

    // echo $whoIsNext . '<br>';

    $whoIsNext_query = mysqli_query($conn, $whoIsNext) or die(mysqli_error($conn));
    $thisIsNext = mysqli_fetch_assoc($whoIsNext_query);
    $next_id = $thisIsNext['id'];
    $type = gettype($next_id);

    // echo empty($next_id) . '<br>';


        if(empty($next_id)){
            echo 'последнее значение' . '<br>';
            $next_current = "UPDATE 
            `sources`
            SET
            `current` = '1' 
            WHERE
            `id` = '1'";
        } else 
            $next_current = "UPDATE 
            `sources`
            SET
            `current` = '1' 
            WHERE
            `id` = " . "'" . $id . "'";

        // echo '<br>' . $next_current;

//меняем текущий источник
mysqli_query($conn, $next_current) or die(mysqli_error($conn));

mysqli_close($conn);

include $Method_of_parcing;
?>