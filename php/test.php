<html>
<button class='button'>Скрыть</button>
<iframe src="https://depkult.admtyumen.ru/OIGV/culture/news.htm" frameborder="0" class='frame' style='
  margin: auto;
  width: 768px;
  height: 480px;'></iframe>

<script src='jquery-3.5.1.js'></script>
<script src="jq-cookie.js" ></script>

<script>
$('.button').click(function (){
  $('.frame').contents().find('.main').css('display'. 'none');
  console.log($('.frame').contents());
  });
  
</script>

<?php




?>

</html>