<?PHP

include ('dbconn.php');

//*курс валюты 
$languages = simplexml_load_file("http://www.cbr.ru/scripts/XML_daily.asp");
if(isset($_COOKIE["cursvalut"])) { $koeficient1 = $_COOKIE["cursvalut"]; }
else {
//валюты
foreach ($languages->Valute as $lang) {
if ($lang["ID"] == 'R01235') { //тип валюты
$koeficient1 = round(str_replace(',','.',$lang->Value), 4); //ее значение
//$koeficient1a = $lang->Nominal.' '.$lang->Name.' = '.$koeficient1.' руб.'; //запоминаем номинал
SetCookie("cursvalut",$koeficient1,time()+3600*12);} //в куках
}}

$position = 1;
$l_type = $_POST['led_type'];
$ledby = $_POST['ledby'];
$number = $_POST['number'];
$cri = $_POST['cri'];
$cct = $_POST['cct'];
$qte = $_POST['qte'];

$xxx=0;
$yyy=0;
$zzz=0;

$koeficient1 = round(((float)$koeficient1*1.04),2);

//echo "<div style=color:white>Курс $ = ".$koeficient1."</br><div/>";

if ($ledby == "brightnes") {include ('brightnes.php');} 
elseif ($ledby == "power") {include ('power.php');}


 ?>