<div class="prefooter">


<!-- Кнопки табов -->

<div class = "tab">
  	<button class = "tablinks" onclick = "preftab(event, 'Prez')" id="defaultOpen">Презентации</button>
  	<button class = "tablinks" onclick = "preftab(event, 'Proj')">Проектирование</button>
  	<button class = "tablinks" onclick = "preftab(event, 'Doc')">Аккаунт</button>
	<button class = "tablinks" onclick = "preftab(event, 'Sprav')" id="defaultOpen">Справочник</button>
  	<button class = "tablinks" onclick = "preftab(event, 'Map')">Карта сайта</button>
 	 <button class = "tablinks" onclick = "preftab(event, 'Cont')">Контакты</button>
</div>
	

<!-- Контент табов -->

<div id="Prez" class = "tabcontent">
  	<div class="prezent-pref"><a href="files/Школьное-освещение.pdf">
	<img src="images/Школьное-освещение.jpg" style = "width: 100%; height: 100%;">	
	</a></div>
	<div class="prezent-pref"><a href="files/Дорожное-освещение.pdf">
	<img src="images/Дорожное-освещение.jpg" style = "width: 100%; height: 100%;">	
	</a></div>
	<div class="prezent-pref"><a href="files/Внутреннее-освещение.pdf">
	<img src="images/Внутреннее-освещение.jpg" style = "width:  100%; height: 100%;">	
	</a></div>
</div>

<div id="Proj" class = "tabcontent">
  	<a href = "avtoriz.php" style = "color: rgb(190, 190, 190)">Конфигуратор</a><br>
</div>

<div id="Doc" class = "tabcontent">
  	<p style = "color: rgb(190, 190, 190)">Регистрация</p>
	<?php
        require_once('register.php');
        ?>
	<a href="logout.php" style = "color: rgb(190, 190, 190);">Выйти из аккаунта</a>
</div>

<div id="Sprav" class = "tabcontent blockw">
  <p>Раздел в разработке</p>
</div>

<div id="Map" class = "tabcontent blockw">
  <p>Раздел в разработке</p> 
</div>

<div id="Cont" class = "tabcontent">
  	<div class = "contact"><a href = "https://yandex.ru/maps/39/rostov-na-donu/house/radiatorny_pereulok_6/Z0AYcA9pTEUGQFptfX52c3plYg==/?from=api-maps&ll=39.689636%2C47.272248&mode=search&origin=jsapi_2_1_79&sctx=ZAAAAAgBEAAaKAoSCbdfPlkx2ENAEfaZsz7lokdAEhIJuyakNQadcD8RI4YdxqS%2FZz8iBgABAgMEBSgKOABAi80GSAFqAnJ1nQHNzEw9oAEAqAEAvQGpfdBjwgEG4vXwmI0G6gEA8gEA%2BAEAggINTWFzc2VmIHRlY2hub4oCAJICAJoCDGRlc2t0b3AtbWFwcw%3D%3D&sll=39.689636%2C47.272248&sspn=0.002445%2C0.001669&text=Massef%20techno&um=constructor%3A1e25b76fd9a39cae7e9c8206429710d773d9b11511b752f793a1e3b9347bda8f&z=18.73" class = "hrefw">Адрес: 344060, Ростов-на-Дону, Радиаторный 6, Литер А</a></div><br>
	<div class = "contact"><a href = "tel:+78633116090" class = "hrefw">Телефон: 8 (863) 311 60 90</a></div><br>
	<div class = "contact"><a href = "mailto:site@masseftech.com" class = "hrefw">Email: site@masseftech.com</a></div><br>
	<div class = "contact"><a href = "files/Карточка-ООО-Массеф-Технолоджиc.pdf" class = "hrefw">Карточка компании</a></div>
</div>


<!-- Переключение табов -->

<script>
function preftab(evt, PrefTabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(PrefTabName).style.display = "block";
    evt.currentTarget.className += " active";
}

document.getElementById("defaultOpen").click();
</script>

<div class = "prefooter-cont">


<!-- Иконки контактов  -->

<div class = "icons-in-pref2"> <a href = "tel:+78633116090" <div class = "icons-in-pref">
<span class = "menu_icon_text">Позвонить</span>
<i class="fa fa-phone icon-f" aria-hidden="true"></i>
</a></div>

<div class = "icons-in-pref2"> <a href = "mailto:site@masseftech.com" <div class = icons-in-pref>
<span class = "menu_icon_text">Написать</span>
<i class="fa fa-envelope-o icon-f" aria-hidden="true"></i>
</a></div>

<div class = "icons-in-pref2"><a href = "https://t.me/masseftech/" <div class = "icons-in-pref">
<span class = "menu_icon_text">Telegram</span>
<i class="fa fa-paper-plane icon-f" aria-hidden="true"></i>
</a></div>

<div class = "icons-in-pref2">
<a href = "#!" <div class = "icons-in-pref">
<span class = "menu_icon_text">Whatsapp</span>
<i class="fa fa-whatsapp icon-f" aria-hidden="true"></i>
</a></div>

</div>

</div>