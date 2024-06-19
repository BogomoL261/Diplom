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
	
<div class="company-content">
 	<p>Massef Technologies — промышленная компания нового типа, основанная на принципах Индустрии 4.0, специализирующаяся на проектировании, производстве, поставках первоклассной электротехнической и светотехнической продукции, а также металлоизделий под брендом Massef.</p>
	<p>Трансформация традиционной корпорации в сетевую компанию, формирование модели распределенного производства, развитие цифровой платформы - вывели на высокий уровень наши возможности по адаптации и индивидуализации выпускаемой продукции.</p>
	<p>Профессиональная команда, состоящая из опытных специалистов, имеющих опыт работы в таких компаниях, как Bosch, Bridgelux, GS Nanotech и РОСАТОМ, внедряя лучшие инженерные решения, создает качественные и безопасные светотехнические системы, соответствующие современным нормам и требованиям.</p>
	<p style = "margin-bottom: 15%">Активная инновационная политика, конвергенция технологий авиационной, автомобильной, ИТ- и электротехнической отраслей, промышленная кооперация с ведущими мировыми и российскими производителями комплектующих, поддерживая постоянное увеличение эффективности и функциональности, позволяют выпускать надежную продукцию с длительным жизненным циклом.</p></div>


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