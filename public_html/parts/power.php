<?PHP
$result = mysqli_query($conn, "SELECT * FROM ledlights WHERE l_type='$l_type' and cri='$cri' and cct='$cct'") or die ('Ошибка выполнения запроса.');
$myrow	= mysqli_fetch_array($result);
mysqli_close($conn);


echo "<table name='table1'> 
<tr><th>Модель</th><th>Мощность</th><th>Световой поток</th><th>Эффективность</th><th>CRI</th><th>Светодиоды</th><th>Цена</th><th>Количество</th><th>Сумма</th><th>Заказ</th><th>Изображение</th></tr>";

do 
{
//сортировка по диодам:
if ($myrow['ledbrand']=="Samsung" ) {
	if ($cri=='70' and $cct=='2700') {effsams702k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=='70' and $cct=='3000') {effsams703k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=='70' and $cct>='4000') {effsams704k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=='80' and $cct=='2700') {effsams802k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=='80' and $cct=='3000') {effsams803k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=='80' and $cct>='4000') {effsams804k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
}	

if ($myrow['ledbrand']=="Bridgelux" ) {
	if ($cri=='70' and $cct>='4000') {effbridg704k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=='80' and $cct>='4000') {effbridg804k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
}	

if ($myrow['ledbrand']=="Refond" ) {
	if ($cri=='70' and $cct>='4000') {effref704k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=='80' and $cct>='4000') {effref804k($myrow[min_br],$myrow[max_br],$myrow[qttled],$myrow[eff_opt]);};
}

	$min_eff = round($xxx*$myrow[eff_opt]*$myrow[eff_drv]*$myrow[tk],2); 
	$min_power = round($myrow[min_br]/$min_eff,2);
	$max_eff = round($yyy*$myrow[eff_opt]*$myrow[eff_drv]*$myrow[tk],2);
	$max_power = round($myrow[max_br]/$max_eff,2);
	

	//echo "</br>".$min_eff."-".$min_power." --- ".$max_eff."-".$max_power." </br>мощность = ".$number." </br>кол-во диодов =".$myrow[qttled]." </br>эфф дрв = ".$myrow[eff_drv];
	
if ($min_power<=$number and $max_power>=$number){
	if ($myrow['ledbrand']=="Samsung" ) {
		if ($cri=='70' and $cct=='2700') {$zzz = peffsams702k($number,$myrow[eff_drv],$myrow[qttled]);};
		if ($cri=='70' and $cct=='3000') {$zzz = peffsams703k($number,$myrow[eff_drv],$myrow[qttled]);};
		if ($cri=='70' and $cct>='4000') {$zzz = peffsams704k($number,$myrow[eff_drv],$myrow[qttled]);};
		if ($cri=='80' and $cct=='2700') {$zzz = peffsams802k($number,$myrow[eff_drv],$myrow[qttled]);};
		if ($cri=='80' and $cct=='3000') {$zzz = peffsams803k($number,$myrow[eff_drv],$myrow[qttled]);};
		if ($cri=='80' and $cct>='4000') {$zzz = peffsams804k($number,$myrow[eff_drv],$myrow[qttled]);};
	}	

	if ($myrow['ledbrand']=="Bridgelux" ) {
		if ($cri=='70' and $cct>='4000') {$zzz = peffbridg704k($number,$myrow[eff_drv],$myrow[qttled]);};
		if ($cri=='80' and $cct>='4000') {$zzz = peffbridg804k($number,$myrow[eff_drv],$myrow[qttled]);};
	}	

	if ($myrow['ledbrand']=="Refond" ) {
		if ($cri=='70' and $cct>='4000') {$zzz = peffref704k($number,$myrow[eff_drv],$myrow[qttled]);};
		if ($cri=='80' and $cct>='4000') {$zzz = peffref804k($number,$myrow[eff_drv],$myrow[qttled]);};
	}
	
	
	
	
	$power = $number;
	$brightless = round($zzz*$myrow[qttled]*$myrow[eff_opt]*$myrow[tk],2);
	$eff = round($brightless/$number,2);
	$vis_price = round($myrow['price']*$koeficient1,2);
	$lm_price = round($vis_price/$brightless,2);
	$summa = $vis_price*$qte;

echo "<tr><td><a href=https://masseftech.com/catalog1/street/".$myrow['model']." target='_blank'>".$myrow['model']."-".$myrow['drv']."</td>";
echo "<td>".$power."</td>";
echo "<td>".$brightless."</td>";
echo "<td>".$eff."</td>";
echo "<td>".$cri."</td>";
echo "<td>".$myrow['ledbrand']."</td>";
echo "<td>".$vis_price."</td>";
echo "<td>".$qte."</td>";
echo "<td>".$summa."</td>";

echo "<td><form action='./mail.php' method='post'>
<input type='text' name='model' style ='display:none' value='".$myrow['model']."-".$myrow['drv']."'>
<input type='text' name='qte' style ='display:none' value='$qte'>
<input type='text' name='summa' style ='display:none' value='$summa'>
<input type='submit' value='Заказать'>
</form> 
</td>

<td><img src='parts/images/".$myrow['model'].".png'></td>
</tr>";
++$position;
}	
}
while($myrow=mysqli_fetch_array($result));

echo "</table>";

//Эффективность по потоку

//Samsung
function effsams702k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = -($min_br/$eff_opt/$qttled)**3*7.88944*10**-8+0.0000953491*($min_br/$eff_opt/$qttled)**2-0.127693*($min_br/$eff_opt/$qttled)+206.154 ;
$yyy = -($max_br/$eff_opt/$qttled)**3*7.88944*10**-8+0.0000953491*($max_br/$eff_opt/$qttled)**2-0.127693*($max_br/$eff_opt/$qttled)+206.154 ;
//-ЛМ^3*7,88944*10^-8+0,0000953491*ЛМ^2-ЛМ*0,127693+206,154

}
function effsams703k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = -($min_br/$eff_opt/$qttled)**3*7.89397*10**-8+0.0000976601*($min_br/$eff_opt/$qttled)**2-($min_br/$eff_opt/$qttled)*0.129408+216.102 ;
$yyy = -($max_br/$eff_opt/$qttled)**3*7.89397*10**-8+0.0000976601*($max_br/$eff_opt/$qttled)**2-($max_br/$eff_opt/$qttled)*0.129408+216.102 ;
//-ЛМ^3*7,89397*10^-8+0,0000976601*ЛМ^2-ЛМ*0,129408+216,102
}
function effsams704k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = -7.8555*10**-8*($min_br/$eff_opt/$qttled)**3+0.00010226*($min_br/$eff_opt/$qttled)**2-0.135965*$min_br/$eff_opt/$qttled+237.127;
$yyy = -7.8555*10**-8*($max_br/$eff_opt/$qttled)**3+0.00010226*($max_br/$eff_opt/$qttled)**2-0.135965*$max_br/$eff_opt/$qttled+237.127;
//(-7,8555*10^-8*СТЕПЕНЬ(G96/N96/M96;3)+0,00010226*СТЕПЕНЬ(G96/N96/M96;2)-0,135965*G96/N96/M96+237,127)*N96*E96*Y96
}
function effsams802k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = (-($min_br/$eff_opt/$qttled)**3)*9.65917*10**(-8)+0.000104424*(($min_br/$eff_opt/$qttled)**2)-0.126995*($min_br/$eff_opt/$qttled)+186.44 ;
$yyy = (-($max_br/$eff_opt/$qttled)**3)*9.65917*10**(-8)+0.000104424*(($max_br/$eff_opt/$qttled)**2)-0.126995*($max_br/$eff_opt/$qttled)+186.44 ;
//-ЛМ^3*9,65917*10^-8+0,000104424*ЛМ^2-ЛМ*0,126995+186,44
}
function effsams803k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = -($min_br/$eff_opt/$qttled)**3*1.30721*10**-7+0.000143283*($min_br/$eff_opt/$qttled)**2-($min_br/$eff_opt/$qttled)*0.139402+193.753 ;
$yyy = -($max_br/$eff_opt/$qttled)**3*1.30721*10**-7+0.000143283*($max_br/$eff_opt/$qttled)**2-($max_br/$eff_opt/$qttled)*0.139402+193.753 ;
//-ЛМ^3*1,30721*10^-7+0,000143283*ЛМ^2-ЛМ*0,139402+193,753
}
function effsams804k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = -9.15127*10**(-8)*($min_br/$eff_opt/$qttled)**3+0.00010817*($min_br/$eff_opt/$qttled)**2-0.134274*$min_br/$eff_opt/$qttled+216.594; 
$yyy = -9.15127*10**(-8)*($max_br/$eff_opt/$qttled)**3+0.00010817*($max_br/$eff_opt/$qttled)**2-0.134274*$max_br/$eff_opt/$qttled+216.594; 
//(-9,15127*10^-8*СТЕПЕНЬ(G162/N162/M162;3)+0,00010817*СТЕПЕНЬ(G162/N162/M162;2)-0,134274*G162/N162/M162+216,594)*N162*E162*Y162
}

//bridgelux
function effbridg704k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = ($min_br/$eff_opt/$qttled)**3*2.5261*10**-8-0.0000616559*($min_br/$eff_opt/$qttled)**2-0.0130001*$min_br/$eff_opt/$qttled+198.641;
$yyy = ($max_br/$eff_opt/$qttled)**3*2.5261*10**-8-0.0000616559*($max_br/$eff_opt/$qttled)**2-0.0130001*$max_br/$eff_opt/$qttled+198.641;
//(F118/N118/M118)^3*2,5261*10^-8-0,0000616559*(F118/N118/M118)^2-(F118/N118/M118)*0,0130001+198,641)*N118*E118*Y118
}
function effbridg804k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = ($min_br/$eff_opt/$qttled)**3*2.65069*10**-8-0.0000627129*($min_br/$eff_opt/$qttled)**2-0.0133499*$min_br/$eff_opt/$qttled+178.291;
$yyy = ($max_br/$eff_opt/$qttled)**3*2.65069*10**-8-0.0000627129*($max_br/$eff_opt/$qttled)**2-0.0133499*$max_br/$eff_opt/$qttled+178.291;
// (F184/N184/M184)^3*2,65069*10^-8-0,0000627129*(F184/N184/M184)^2-(F184/N184/M184)*0,0133499+178,291)*N184*E184*Y184
}

//Refond
function effref704k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = -7.46208*10**-8*($min_br/$eff_opt/$qttled)**3+0.0000963901*($min_br/$eff_opt/$qttled)**2-0.130472*$min_br/$eff_opt/$qttled+229.276;
$yyy = -7.46208*10**-8*($max_br/$eff_opt/$qttled)**3+0.0000963901*($max_br/$eff_opt/$qttled)**2-0.130472*$max_br/$eff_opt/$qttled+229.276;
//(-7,46208*10^-8*СТЕПЕНЬ(F140/N140/M140;3)+0,0000963901*СТЕПЕНЬ(F140/N140/M140;2)-0,130472*F140/N140/M140+229,276)*N140*E140*Y140
}
function effref804k($min_br,$max_br,$qttled,$eff_opt) {
global $xxx;
global $yyy;
$xxx = -7.40842*10**-9*($min_br/$eff_opt/$qttled)**3+0.0000299888*($min_br/$eff_opt/$qttled)**2-0.109624*$min_br/$eff_opt/$qttled+192.337;
$yyy = -7.40842*10**-9*($max_br/$eff_opt/$qttled)**3+0.0000299888*($max_br/$eff_opt/$qttled)**2-0.109624*$max_br/$eff_opt/$qttled+192.337;
//(-7,40842*10^-9*СТЕПЕНЬ(F206/N206/M206;3)+0,0000299888*СТЕПЕНЬ(F206/N206/M206;2)-0,109624*F206/N206/M206+192,337)*N206*E206*Y206
}



//Эффективность по мощности
function peffsams702k($number,$eff_drv,$qttled) {
$zzz = (0.69436*($number*$eff_drv/$qttled)**3)-(15.3967*(($number*$eff_drv/$qttled)**2))+197.779*($number*$eff_drv/$qttled)+1.75549 ;
//w ^ 3 * 0.69436 - 15.3967 * w ^ 2 + w * 197.779 + 1.75549
return $zzz;
}
function peffsams703k($number,$eff_drv,$qttled) {
$zzz = (0.51255*($number*$eff_drv/$qttled)**3)-14.7274*(($number*$eff_drv/$qttled)**2)+204.606*($number*$eff_drv/$qttled)+3.05106 ;
//w ^ 3 * 0.51255 - 14.7274 * w ^ 2 + w * 204.606 + 3.05106
return $zzz;
}
function peffsams704k($number,$eff_drv,$qttled) {
$zzz = -0.120013*(($number*$eff_drv/$qttled)**4)+1.77011*(($number*$eff_drv/$qttled)**3)-20.5097*(($number*$eff_drv/$qttled)**2)+($number*$eff_drv/$qttled)*229.028+1.87272 ;
//!!!-0,120013*СТЕПЕНЬ(E61*Y61/W61;4)+1,77011*СТЕПЕНЬ(E61*Y61/W61;3)-20,5097*СТЕПЕНЬ(E61*Y61/W61;2)+229,027*E61*Y61/W61+1,87272
return $zzz;
}
function peffsams802k($number,$eff_drv,$qttled) {
$zzz = 0.743*(($number*$eff_drv/$qttled)**3)-14.8304*(($number*$eff_drv/$qttled)**2)+180.815*($number*$eff_drv/$qttled)+0.954004 ;
//w ^ 3 * 0.743 - 14.8304 * w ^ 2 + w * 180.815 + 0.954004
return $zzz;
}
function peffsams803k($number,$eff_drv,$qttled) {
$zzz = 0.48839*(($number*$eff_drv/$qttled)**3)-13.2556*(($number*$eff_drv/$qttled)**2)+182.819*($number*$eff_drv/$qttled)+2.88942 ;
// w ^ 3 * 0.48839 - 13.2556 * w ^ 2 + w * 182.819 + 2.88942
return $zzz;
}
function peffsams804k($number,$eff_drv,$qttled) {
$zzz = -0.0981174*(($number*$eff_drv/$qttled)**4)+1.50583*(($number*$eff_drv/$qttled)**3)-18.4248*(($number*$eff_drv/$qttled)**2)+209.153*$number*$eff_drv/$qttled+1.71143 ;
//!!!-0,0981174*СТЕПЕНЬ(E60*Y60/W60;4)+1,50583*СТЕПЕНЬ(E60*Y60/W60;3)-18,4248*СТЕПЕНЬ(E60*Y60/W60;2)+209,153*E60*Y60/W60+1,71143
return $zzz;
}

function peffbridg704k($number,$eff_drv,$qttled) {
$zzz = (0.21093*($number*$eff_drv/$qttled)**3)-(9.38977*($number*$eff_drv/$qttled)**2)+203.192*($number*$eff_drv/$qttled)+1.00818 ;
//!!СТЕПЕНЬ(E60*Y60/W60;3)*0,21093-9,38977*СТЕПЕНЬ(E60*Y60/W60;2)+203,192*E60*Y60/W60+1,00818)
return $zzz;
}
function peffbridg804k($number,$eff_drv,$qttled) {
$zzz = 0.171214*(($number*$eff_drv/$qttled)**3)-8.1928*(($number*$eff_drv/$qttled)**2)+182.342*($number*$eff_drv/$qttled)+0.820977 ;
//!!СТЕПЕНЬ(E60*Y60/W60;3)*0,171214-8,1928*СТЕПЕНЬ(E60*Y60/W60;2)+182,342*E60*Y60/W60+0,820977)
return $zzz;
}

function peffref704k($number,$eff_drv,$qttled) {
$zzz = -0.0975896*(($number*$eff_drv/$qttled)**4)+1.53194*(($number*$eff_drv/$qttled)**3)-19.0407*(($number*$eff_drv/$qttled)**2)+221.498*($number*$eff_drv/$qttled)+1.84187 ;
//!!-0,0975896*СТЕПЕНЬ(E60*Y60/W60;4)+1,53194*СТЕПЕНЬ(E60*Y60/W60;3)-19,0407*СТЕПЕНЬ(E60*Y60/W60;2)+221,498*E60*Y60/W60+1,84187
return $zzz;
}
function peffref804k($number,$eff_drv,$qttled) {
$zzz = -0.103613*(($number*$eff_drv/$qttled)**4)+1.90809*(($number*$eff_drv/$qttled)**3)-18.8762*(($number*$eff_drv/$qttled)**2)+190.86*$number*$eff_drv/$qttled+0.30913 ;
//!!-0,103613*СТЕПЕНЬ(E60*Y60/W60;4)+1,90809*СТЕПЕНЬ(E60*Y60/W60;3)-18,8762*СТЕПЕНЬ(E60*Y60/W60;2)+190,86*E60*Y60/W60+0,30913
return $zzz;
}


?>