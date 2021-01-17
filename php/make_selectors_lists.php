<?php
include 'phpQuery-onefile.php';

$conn = new mysqli('localhost', 'cl275917_admin', 'admin1', 'cl275917_news');

// $categories_query_sintax = 'SELECT `source_category` FROM `sources`';

// $categories_query = mysqli_query($conn, $categories_query_sintax);

$countries_query_sintax = 'SELECT `source_country` FROM `sources`';
$countries_query = mysqli_query($conn, $countries_query_sintax);
    $i = 0;
    while($country_fetched = mysqli_fetch_assoc($countries_query)) {
        $country_arr[$i] = $country_fetched['source_country'];
        $i++;
    };
        $countries_list = array_unique($country_arr);
        sort($countries_list);
        // $country_json = json_encode($countries_list);
        // print_r($countries_list);
        // echo '<br>';
        //         $fp = fopen('selectors/countries.json', 'w');
        //         fwrite($fp, $country_json);
        //         fclose($fp);


$regions_query_sintax = 'SELECT `source_region` FROM `sources`';
$regions_query = mysqli_query($conn, $regions_query_sintax);
    $i = 0;
    while($region_fetched = mysqli_fetch_assoc($regions_query)) {
        $region_arr[$i] = $region_fetched['source_region'];
        $i++;
    };
        $region_list = array_unique($region_arr);
        sort($region_list);
        // $region_json = json_encode($region_list);
        // print_r($region_list) . '<br>';
        // echo '<br>';
        //     $fp = fopen('selectors/regions.json', 'w');
        //     fwrite($fp, $region_json);
        //     fclose($fp);


// $i = 0;
// while($categories_fetched = mysqli_fetch_assoc($categories_query)) {
// $category_arr[$i] = $categories_fetched['source_category'];
// $i++;
// };

// $category_list = array_unique($category_arr);
// print_r($category_list) . '<br>';
// echo '<br>';

foreach($countries_list as $country) {
    foreach($region_list as $region)
    {
        $categories_selection = 
        "SELECT `source_category`
        FROM `sources`
        WHERE
        `source_region` = "
        . "'"
        . $region
        . "' AND `source_country` = "
        . "'"
        . $country
        . "'";

        echo $categories_selection . "<br>";
        
        $categories_selection_que = mysqli_query($conn, $categories_selection);

        $i = 0;
        while($categories_selection_fetched = mysqli_fetch_assoc($categories_selection_que)) {
            $categories_arr[$i] = $categories_selection_fetched['source_category'];
            $i++;
        };

        $category_list = array_unique($categories_arr);
        sort($category_list);

            foreach($category_list as $cat){
                echo $cat . "<br>";
            };

        $category_json = json_encode($category_list);

            if(!mkdir("selectors/" . $country)){
                echo "есть такая директория";
            };
                $fp = fopen("selectors/" . $country . "/" . $region . ".json", "w");
                fwrite($fp, $category_json);
                fclose($fp);
        
    };
};



// $category_json = json_encode($category_list);

// echo $country_json . '<br>' . $region_json . '<br>' . $category_json;

// $fp = fopen('countries.json', 'w');
// fwrite($fp, $country_json);
// fclose($fp);


// $fp = fopen('categories.json', 'w');
// fwrite($fp, $category_json);
// fclose($fp);

// echo '<br>';



$conn->close();
 ?>