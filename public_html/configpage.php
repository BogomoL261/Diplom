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

<div class="wrapper">

<div class="content">
	<div class = "calculations">
	
		
		<form id="form_1" method="post">
			<div id='input_col'>
			<p>Тип
			<select id="led_type" name="led_type">
			<option value='street'>Уличные</option>
			<option value='prrom'>Промышленные</option>
			<option value='spot'>Прожекторные</option>
			<!--<option value='office'>Коммерческие</option>-->
   			</select></p>
			
			<p><select id="ledby" name="ledby">
			<option value="brightnes">Световой поток</option>
			<option value="power">Мощность</option>
			<input id="number" type="number" onkeypress="return event.charCode >= 48" min="1" name="number" step="1" placeholder="Введите значение"></p>
		
			<p>Индекс цветопередачи (CRI)<select id="cri" name="cri">
			<option value='70'> 70 </option>
			<option value='80'> 80 </option>
			<option value='80'> 90 </option>
			</select></p>
			

			<p>Цветовая температура (CCT)<select id="cct" name="cct">
			<option value='2700'>2700 K</option>
			<option value='3000'>3000 K</option>
			<option value='4000'>4000 K</option>
			<option value='5000'>5000 K</option>
			</select></p>
			<!--<input type="button" id="submit" value="Расчет">-->
			</div>
			
			<div id='input_col'>
			<p>Класс
			<select id="led_class1" name="led_class">
			<option value='standart'>Стандарт</option>
			<option value='eco'>Эконом</option>
			<option value='prem'>Премиум</option>
			</select></p>
			
			<p>Кронштейн
			<select id="led_class2" name="led_class">
			<option value='Консоль'>Консоль</option>
			</select>
			<select id="led_class2.1" name="led_class">
			<option value=>Мини</option>
			<option value=>Стандарт</option>
			<option value=>Усиленный</option>
			</select>
			</p>
			
			<p>УЗИП
			<select id="uzip" name="uzip">
			<option value='uzip_y'>Да</option>
			<option value='uzip_n'>Нет</option>
			</select></p>
			
			<p>Количество<input id="qte" type="number" onkeypress="return event.charCode >= 48" min="1" name="qte" step="1" placeholder="Введите значение"></p>
			</div>

<!--СКРИПТ СБРОСА ЗНАЧЕНИЙ-->

<?php
    if( isset( $_POST['ResetConf'] ) )
    {
    }
?>
    <input type = "submit" id = "ResetConf" name = "ResetConf" value = "Сбросить"/>


			<!--
			<div id='input_col'>
			<p>Категория партнера</p>
			<select id="partner" name="partner">
			<option value='pokupatel'>Покупатель</option>
			<option value='agent'>Агент</option>
			<option value='integrator'>Интегратор</option>
			<option value='treder'>Трейдер</option>
			<option value='diler'>Дилер</option>
			<option value='distibuter'>Дистрибьютор</option>
			</select>
			
			<p>Предоплата</p>
			<select id="pay" name="pay">
			<option value='pay_y'>Да</option>
			<option value='pay_n'>Нет</option>
			</select>
			
			<p>Проектная скидка</p>
			<select id="proj_sale" name="proj_sale">
			<option value='proj_no'>Нет</option>
			<option value='proj_reg'>Регистрация</option>
			<option value='proj_prot'>Защита</option>
			</select>
			
			
			</div>
			-->
			
			
			<div style="clear: both;"></div>
			
		</form>
	
	</div>

	<div id="table1"></div>
	
</div>
</div>


<!-- Курс валют + расчёт -->

<script>
$('form').find('select, input').change(function(){ 
   $.ajax({ 
         type: "POST",
         url: "parts/math.php",
         data: $('#form_1').serialize(),
         success: function(response) {
            $('#table1').html(response);
         }
   })
});

</script>


<!-- Сообщение о запросе -->

<div id="messagebox">
	<p>Запрос успешно отправлен!</p>
</div>


<!-- Футер -->

<?php
        require_once('Footer.php');
        ?>

</body>
</html>