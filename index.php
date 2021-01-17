<!DOCTYPE html>
<html >
<head>
    <meta charset="utf-8">
    <meta lang='ru'>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title style="display: none">Отовсюду.ру</title>
    <link rel="stylesheet"
    href="cssindex.css">
    <base target="_blank">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">
</head>
<body>
    <header id="header" >
        <!--<img class='logo1' src='img/сайт-лого-1.png'>-->
        <img class='logo2' src='img/лого текст.png'>
        <!-- Weather informer by meteoservice.ru -->
            <a id="ms-informer-link-0fbdbce81588f42b146be00ea5ca52da" class="ms-informer-link" href="https://www.meteoservice.ru/weather/overview/tyumen">Погода в Тюмени</a>
            <script class="ms-informer-script" src="https://www.meteoservice.ru/informer/script/0fbdbce81588f42b146be00ea5ca52da"></script>
        <!-- End -->
        <img class='menu_butt' src='img/меню.png'>
    </header>
    <div id="asideLeft">AsideLeft</div>
    <main id="main">
        <form id="block_sources_list" method='post'>
            <div class='News_category category_country'>Страна</div>
            <div class='News_category category_district'>Регион</div>
            <div class='News_category category_category'>Категория</div>
            <div class='News_category category_count'>Новостей из источника</div>
            <?php 
                $dir_list = opendir("php/selectors");
                if(!$_COOKIE['country']){
                    $_COOKIE['country'] = "Россия";
                };
                $i=0;
                while($file = readdir($dir_list)){
                    if($file != '.' && $file != '..'){
                        $country_list[$i] = $file;
                        $i++;
                    };
                };
                echo "<select class='selector country' name='country'>"; 
                    foreach($country_list as $country){
                        if($country == $_COOKIE['country']){
                            echo "<option  class='option' selected>" . $country . "</option>";
                        } else {echo "<option class='option'>" . $country . "</option>";
                        };
                    };
                echo "</select>";
            ?>
            <?php
                $dir_region_list = opendir("php/selectors/". $_COOKIE['country'] . "/");
                if(!$_COOKIE['region']){
                    $_COOKIE['region'] = "Тюменская область";
                };
                echo "<select class='selector region' name='region'>";
                $i=0;
                while($file_region = readdir($dir_region_list)){
                    if($file_region != '.' && $file_region != '..'){
                        $region_split = preg_split('/\./', $file_region);
                        $region_list[$i] = $region_split[0];
                        foreach($region_list as $region){
                        if($region == $_COOKIE['region']){
                            echo "<option  class='option' selected>" . $_COOKIE['region'] . "</option>";
                        } else {
                                echo "<option  class='option'>" . $region . "</option>";
                            };
                        };
                    };
                    $i++;
                };
                echo "</select>";
                
            ?>
            <?php 
                $json = file_get_contents("php/selectors/". $_COOKIE['country'] . "/" . $_COOKIE['region'] . ".json");
                $categories_arr = json_decode($json);
                if(!$_COOKIE['category']){
                    $_COOKIE['category'] = $categories_arr[0];
                };
                echo "<select class='selector category' name='category'>"; 
                    foreach($categories_arr as $category){
                        if($category == $_COOKIE['category']){
                            echo "<option  class='option' selected>" . $_COOKIE['category'] . "</option>";
                        } else {echo "<option class='option'>" . $category . "</option>";};
                    };
                echo "</select>";
            ?>
            <?php
                echo "<select
                    class='selector count'
                    name='count'
                    id='count'>";
                if(!$_COOKIE['count']){
                    $_COOKIE['count'] = 3;
                    };
                for($i=1; $i<=10; $i++){
                    if($_COOKIE['count'] == $i){
                        echo "<option class='option' selected>" . $i . "</option>";
                    }else {
                        echo "<option class='option'>" . $i . "</option>";
                    };
                };
            ?>
            <input type="submit" name='send_selectors' class='send_selectors' value='Показать'>
            <input type="button" name='close' class='close' value='Закрыть'>
        </form>
        
    </main>
    <aside id="AsideRight">
            <div class='reportDiv'>
                <p class='reportText'>Добавить сайт, 
                оставить отзыв или
                сообщить об ошибке</p>
                <input type='button' class='reportButt' value='Сообщить'>
                
            </div>
    </aside>
    <div class='formWrapper'>
                    <div class='formBack'>
                        <form class='reportForm' method='POST'>
                            <h3>Помогите проекту стать лучше</h3>
                            <p>Ваше имя</p>
                            <input type='text' max='20' name='userName' class='userName'>
                            <p>Адрес вашей электронной почты для обратной связи</p>
                            <input type='email' name='userMail' class='userMail'>
                            <p>Здесь вы можете оставить адрес ресурса, который хотите видеть в проекте, сообщить об ошибке или дать совет по развитию проекта</p>
                            <input type='text' max='500' name='userMessage' class='userMessage'>
                            <input type='hidden' name='g-recaptcha' class='g-recaptcha'>
                            <input type='submit' class='reportButton'>
                            <input type="button" name='closeReport' class='closeReport' value='Закрыть'>
                            <div class="text-danger" id="recaptchaError"></div>
                        </form>
                    </div>
    </div>
    <h3 class='thnks'>Спасибо, сообщение отправлено!</h3>
    <!--<footer id="footer">footer</footer>-->
</body>
<script src="jquery-3.5.1.js" ></script>
<script src="jq-cookie.js" ></script>
<script src="js.js" ></script>
<script src='https://www.google.com/recaptcha/api.js?render=6LeQWSkaAAAAAIOIcHW87SkfPkATUsU9qrRQS08O'></script>



</html>