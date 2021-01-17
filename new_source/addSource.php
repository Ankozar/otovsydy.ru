<DOCTYPE HTML>
<html>
<body>
    <form action='' method='post' class='inputSource'>
        <span>Адрес ленты новостей сайта</span>
        <br>
        <input type='text'  name='source_url_start'>
        <br>
        <br>
        <input type='submit'>
        <br>

        <?php
        include '/var/www/cl275917/data/www/otovsydy.ru/php/phpQuery-onefile.php';

        $site = file_get_contents($_POST['source_url_start']);
        $document = phpQuery::newDocument($site);
        // echo $document;

        $source_url_start = $_POST['source_url_start'];
        preg_match('/http.?:\/\/.*\//U', $source_url_start, $source_link_first_part_start_1);
        preg_match('/.*\w/', $source_link_first_part_start_1[0], $source_link_first_part_start);
        // echo $source_link_first_part_start[0];
        
            $site2 = file_get_contents($source_link_first_part_start[0]);
            $document2 = phpQuery::newDocument($site2);
            $title_block = $document2->find('head');
            $title = $title_block->find('title');
            // echo $title_block . '<hr>';
            $pqtitle = pq($title);
            $source_title_start = $pqtitle->html();
            // echo $source_title_start . '<br>';

            

            preg_match('/www/', $source_link_first_part_start[0], $nameindbwww);
                if($nameindbwww[0]){
                    echo 'www' . "<br>";
                    preg_match('/\..*\./', $source_link_first_part_start[0], $nameindb11);
                    echo $nameindb11[0] . "<br>";
                    preg_match('/\b.*\b/', $nameindb11[0], $nameindb1);
                    echo $nameindb1[0];
                } else {
                        preg_match('/\/(\d|\w).*\./', $source_link_first_part_start[0], $nameindb11);
                        preg_match('/(\d|\w).*(\d|\w)/', $nameindb11[0], $nameindb1);
                };
           
            $nameindb = $nameindb1[0];
            preg_match('/\b.*\b/', $nameindb, $nameindb2);
            $sourceNameInDb_start = 'source_' . $nameindb2[0] . '';
        ?>
    </form>
<hr>
<br>
    <form action='new_table.php' method='post' class='inputSource'>
        <span>Значения для внесения в базу:</span>
        <br>
            <br>
            <span>Адрес ленты новостей сайта</span>
            <br>
                <?php echo "<input type='text' name='source_url' value='" . $source_url_start . "'>" ?>
            <br>
            <span>Первая часть адреса:</span>
            <br>
                <?php echo "<input type='text' name='source_link_first_part' value='" . $source_link_first_part_start[0] . "'>" ?>
            <br>
            <span>Название</span>
            <br>
                <?php echo "<input type='text' name='source_title' value='" . $source_title_start . "'>" ?>
            <br>
            <span>Имя в БД</span>
            <br>
                <?php echo "<input type='text' name='sourceNameInDb' value='" . $sourceNameInDb_start . "'>" ?>
            <br>
            <span>Метод парсинга</span>
            <br>
                <?php echo "<input type='text' name='Method_of_parcing' placeholder='папка/robot_writer.php'
                    value='get_news_method_universal_gtfc_1/robot_writer.php'>" ?>
            <br>
            <span>Атрибуты парсинга</span>
            <br>
                <?php echo "<input type='text' name='attrs'>" ?>
            <br>
            <span>Категория</span>
            <br>
                <input type='text' name='source_category'>
            <br>
            <span>Страна</span>
            <br>
                <input type='text' name='source_country' value='Россия'>
            <br>
            <span>Регион</span>
            <br>
                <input type='text' name='source_region' value='Тюменская область'>
            <br>	
            <br>
            <input type='submit'>
    </form>
    
</body>
</html>