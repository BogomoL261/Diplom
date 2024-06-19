<!doctype html>

<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Конфигуратор - подбор светильников</title>
  <link rel="stylesheet" href="styles.css" type="text/css">
  <link rel="stylesheet" href="icons/css/font-awesome.min.css">
  <meta name="description" content="">
  <meta name="keywords" content="Конфигуратор">
  <meta name="author" content="Massef Technologies LLC">

  
  
	<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="js/AJAX.js"></script>
</head>

<body>


<!-- Шапка -->

<?php
        require_once('Header.php');
        ?>


<!-- Липкое меню -->

<script>
      window.addEventListener('scroll',(e)=>{
        const nav = document.querySelector('.header');
        if(window.pageYOffset>0){
          nav.classList.add("header-scroll");
        }else{
          nav.classList.remove("header-scroll");
        }
      });
    </script>


<!-- Контент -->

<div class = "wrapper">

<div class = "content">
	

	<!-- Слайдер -->

<div class="diy-slideshow">
  <figure class="show">
    <img src="images/Внутреннее-освещение.jpg" width="100%" /><figcaption>Новая презентация <a href="files/Внутреннее-освещение.pdf"><u>посмотреть</a>.</figcaption> 
  </figure>
  <figure>
    <img src="images/Дорожное-освещение.jpg" width="100%" /><figcaption>Новая презентация <a href="files/Дорожное-освещение.pdf"><u>посмотреть</a>.</figcaption> 
  </figure>
  <figure>
    <img src="images/Школьное-освещение.jpg" width="100%" /><figcaption>Новая презентация <a href="files/Школьное-освещение.pdf"><u>посмотреть</a>.</figcaption> 
  </figure>
  
  <span class="prev">&laquo;</span>
  <span class="next">&raquo;</span>
</div>

<script>
var counter = 0, 
    $items = $('.diy-slideshow figure'), 
    numItems = $items.length; 


var showCurrent = function(){
    var itemToShow = Math.abs(counter%numItems);// uses remainder (aka modulo) operator to get the actual index of the element to show  
   
  $items.removeClass('show'); 
  $items.eq(itemToShow).addClass('show');    
};


$('.next').on('click', function(){
    counter++;
    showCurrent(); 
});
$('.prev').on('click', function(){
    counter--;
    showCurrent(); 
});

if('ontouchstart' in window){
  $('.diy-slideshow').swipe({
    swipeLeft:function() {
      counter++;
      showCurrent(); 
    },
    swipeRight:function() {
      counter--;
      showCurrent(); 
    }
  });
}
</script>


<!-- Префутер -->

<?php
        require_once('Prefooter.php');
        ?>


<!-- Футер -->

<?php
        require_once('Footer.php');
        ?>

</body>
</html>