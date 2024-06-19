<?PHP
$result = mysqli_query($conn, "SELECT * FROM ledlights WHERE l_type='$l_type' and cri='$cri' and cct='$cct' and min_br<'$number' and max_br>'$number'") or die ('Ошибка выполнения запроса.');
$myrow	= mysqli_fetch_array($result);
mysqli_close($conn);


echo "<table name='table1'> 
<tr><th>Модель</th><th>Мощность</th><th>Световой поток</th><th>Эффективность</th><th>CRI</th><th>Светодиоды</th><th>Цена</th><th>Количество</th><th>Сумма</th><th>Заказ</th><th>Изображение</th></tr>";

do 
{
//сортировка по диодам:
if ($myrow['ledbrand']=="Samsung" ) {
	if ($cri=="70" and $cct=='2700') {$xxx = effsams702k($number,$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=="70" and $cct=='3000') {$xxx = effsams703k($number,$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=="70" and $cct>='4000') {$xxx = effsams704k($number,$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=="80" and $cct=='2700') {$xxx = effsams802k($number,$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=="80" and $cct=='3000') {$xxx = effsams803k($number,$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=="80" and $cct>='4000') {$xxx = effsams804k($number,$myrow[qttled],$myrow[eff_opt]);};
}	

if ($myrow['ledbrand']=="Bridgelux" ) {
	if ($cri=="70" and $cct>='4000') {$xxx = effbridg704k($number,$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=="80" and $cct>='4000') {$xxx = effbridg804k($number,$myrow[qttled],$myrow[eff_opt]);};
}	

if ($myrow['ledbrand']=="Refond" ) {
	if ($cri=="70" and $cct>='4000') {$xxx = effref704k($number,$myrow[qttled],$myrow[eff_opt]);};
	if ($cri=="80" and $cct>='4000') {$xxx = effref804k($number,$myrow[qttled],$myrow[eff_opt]);};
}


	$eff = round($xxx*$myrow[eff_opt]*$myrow[eff_drv]*$myrow[tk],2); 
	$power = round($number/$eff,1);
	$brightless = $number;
	$vis_price = round($myrow['price']*$koeficient1,2); 
	$lm_price = round($vis_price/$number,2);
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
while($myrow=mysqli_fetch_array($result));

echo "</table>";



//Эффективность по потоку

//Samsung
function effsams702k($number,$qttled,$eff_opt) {
$xxx = -($number/$eff_opt/$qttled)**3*7.88944*10**-8+0.0000953491*($number/$eff_opt/$qttled)**2-0.127693*($number/$eff_opt/$qttled)+206.154 ;
//-ЛМ^3*7,88944*10^-8+0,0000953491*ЛМ^2-ЛМ*0,127693+206,154
return $xxx;
}
function effsams703k($number,$qttled,$eff_opt) {
$xxx = -($number/$eff_opt/$qttled)**3*7.89397*10**-8+0.0000976601*($number/$eff_opt/$qttled)**2-($number/$eff_opt/$qttled)*0.129408+216.102 ;
//-ЛМ^3*7,89397*10^-8+0,0000976601*ЛМ^2-ЛМ*0,129408+216,102
return $xxx;
}
function effsams704k($number,$qttled,$eff_opt) {
$xxx = -7.8555*10**-8*($number/$eff_opt/$qttled)**3+0.00010226*($number/$eff_opt/$qttled)**2-0.135965*$number/$eff_opt/$qttled+237.127 ;//(-7,8555*10^-8*СТЕПЕНЬ(G96/N96/M96;3)+0,00010226*СТЕПЕНЬ(G96/N96/M96;2)-0,135965*G96/N96/M96+237,127)*N96*E96*Y96
return $xxx;
}
function effsams802k($number,$qttled,$eff_opt) {
$xxx = -($number/$eff_opt/$qttled)**3*9.65917*10**-8+0.000104424*($number/$eff_opt/$qttled)**2-0.126995*($number/$eff_opt/$qttled)+186.44 ;
//-ЛМ^3*9,65917*10^-8+0,000104424*ЛМ^2-ЛМ*0,126995+186,44
return $xxx;
}
function effsams803k($number,$qttled,$eff_opt) {
$xxx = -($number/$eff_opt/$qttled)**3*1.30721*10**-7+0.000143283*($number/$eff_opt/$qttled)**2-($number/$eff_opt/$qttled)*0.139402+193.753 ;
//-ЛМ^3*1,30721*10^-7+0,000143283*ЛМ^2-ЛМ*0,139402+193,753
return $xxx;
}
function effsams804k($number,$qttled,$eff_opt) {
$xxx = -9.15127*10**-8*($number/$eff_opt/$qttled)**3+0.00010817*($number/$eff_opt/$qttled)**2-0.134274*$number/$eff_opt/$qttled+216.594 ; 
//(-9,15127*10^-8*СТЕПЕНЬ(G162/N162/M162;3)+0,00010817*СТЕПЕНЬ(G162/N162/M162;2)-0,134274*G162/N162/M162+216,594)*N162*E162*Y162
return $xxx;
}

//bridgelux
function effbridg704k($number,$qttled,$eff_opt) {
$xxx = ($number/$eff_opt/$qttled)**3*2.5261*10**-8-0.0000616559*($number/$eff_opt/$qttled)**2-0.0130001*$number/$eff_opt/$qttled+198.641 ;
//(F118/N118/M118)^3*2,5261*10^-8-0,0000616559*(F118/N118/M118)^2-(F118/N118/M118)*0,0130001+198,641)*N118*E118*Y118
return $xxx;
}
function effbridg804k($number,$qttled,$eff_opt) {
$xxx = ($number/$eff_opt/$qttled)**3*2.65069*10**-8-0.0000627129*($number/$eff_opt/$qttled)**2-0.0133499*$number/$eff_opt/$qttled+178.291 ;
// (F184/N184/M184)^3*2,65069*10^-8-0,0000627129*(F184/N184/M184)^2-(F184/N184/M184)*0,0133499+178,291)*N184*E184*Y184
return $xxx;
}

//Refond
function effref704k($number,$qttled,$eff_opt) {
$xxx = -7.46208*10**-8*($number/$eff_opt/$qttled)**3+0.0000963901*($number/$eff_opt/$qttled)**2-0.130472*$number/$eff_opt/$qttled+229.276 ;
//(-7,46208*10^-8*СТЕПЕНЬ(F140/N140/M140;3)+0,0000963901*СТЕПЕНЬ(F140/N140/M140;2)-0,130472*F140/N140/M140+229,276)*N140*E140*Y140
return $xxx;
}
function effref804k($number,$qttled,$eff_opt) {
$xxx = -7.40842*10**-9*($number/$eff_opt/$qttled)**3+0.0000299888*($number/$eff_opt/$qttled)**2-0.109624*$number/$eff_opt/$qttled+192.337 ;
//(-7,40842*10^-9*СТЕПЕНЬ(F206/N206/M206;3)+0,0000299888*СТЕПЕНЬ(F206/N206/M206;2)-0,109624*F206/N206/M206+192,337)*N206*E206*Y206
return $xxx;
}
?>