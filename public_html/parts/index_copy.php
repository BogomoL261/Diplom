<!doctype html>

<html lang="ru">
<head>
  <meta charset="utf-8">
  <title>Конфигуратор - подбор светильников</title>
  <meta name="description" content="">
  <meta name="keywords" content="Конфигуратор">
  <meta name="author" content="Massef Technologies LLC">
  <link rel="stylesheet" href="css/styles.css">
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
  
	<script type="text/javascript" src="js/jquery-1.5.2.js" ></script>
	<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
	<script type="text/javascript" src="js/AJAX.js"></script>
</head>

<body>
  
<div id="wriper">

	<div id="header">
		<a class="logolink" href="https://masseftech.com/">
			<img src="https://masseftech.com/wp-content/uploads/2020/12/logo-final-e1607360823266.png" alt="Massef Technologies" style="max-width: 160px;">	
		</a>
	</div>

<div id="content">
	<div>
	
		
		<form id="form_1" method="post">
			<div id='input_col'>
			<p>Тип светильника</p>
			<select id="led_type" name="led_type">
			<option value='street'>Уличные</option>
			<option value='prrom'>Промышленные</option>
			<option value='spot'>Прожекторные</option>
			<!--<option value='office'>Коммерческие</option>-->
   			</select>
			
			<p> Подбор светильников по</br>
			<input id="ledby" name="ledby" type="radio" value="brightnes" checked>Световому потоку</br>
			<input id="ledby" name="ledby" type="radio" value="power">Мощности</br>
			<input id="number" type="number" name="number" step="1" placeholder="Введте значение"></p>
		
			<p><select id="cri" name="cri">
			<option value='70'>CRI >70</option>
			<option value='80'>CRI >80</option>
			</select></p>
			
			<p><select id="cct" name="cct">
			<option value='2700'>2700 K</option>
			<option value='3000'>3000 K</option>
			<option value='4000'>4000 K</option>
			<option value='5000'>5000 K</option>
			</select></p>
			<!--<input type="button" id="submit" value="Рассчет">-->
			</div>
			
			<div id='input_col'>
			<p>Класс светильника</p>
			<select id="led_class" name="led_class">
			<option value='standart'>Оригинал</option>
			<option value='eco'>Эконом</option>
			</select>
			
			<p>Кронштейн</p>
			<select id="led_class" name="led_class">
			<option value='orig3060'>Оригинал 30-60мм</option>
			<option value='eco4049'>Эконом 40-49мм</option>
			</select>
			
			<p>УЗИП</p>
			<select id="uzip" name="uzip">
			<option value='uzip_n'>Нет</option>
			<option value='uzip_y'>Да</option>
			</select>
			
			<p><input id="qte" type="number" name="qte" step="1" placeholder="Введте количество"></p>
			</div>
			
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
			
			
			
			<div style="clear: both;"></div>
			
		</form>
	
	</div>

	<div id="table1"></div>
	
</div>
</div>

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


</body>
</html>