<?php

//http://www.forosdelweb.com/f58/donde-entro-configurar-hora-mi-servidor-apache-417788/
//cambiar en php.ini lo siguiente: date.timezone = America/Bogota
//https://www.aprenderaprogramar.com/index.php?option=com_content&view=article&id=857:mostrar-fecha-en-espanol-php-setlocale-strftime-formato-datedefault-timezone-set-ejemplos-cu00831b&catid=70&Itemid=193                               

setlocale(LC_TIME, 'es_CO.UTF-8');//Configura el servidor con la hora que corresponde del país

$dt_Hoy_formato_default = date('Y-m-d');//Tiempo actual con formato por defecto
$dt_Hoy_formato_custom = date('Y-m-d\TH:i:s');//Tiempo actual con formato personalizado. Ejemplo formato MySql que hemos utilizado en proyectos
$dt_Ayer = date('Y-m-d', strtotime('-1 day')); // resta 1 día
$dt_laSemanaPasada = date('Y-m-d', strtotime('-1 week')); // resta 1 semana
$dt_elMesPasado = date('Y-m-d', strtotime('-1 month')); // resta 1 mes
$dt_ElAnioPasado = date('Y-m-d', strtotime('-1 year')); // resta 1 año
//Mostrar fechas
echo $dt_Hoy_formato_default . "---Hoy con formato por defecto<br/>"; //Para imprimir fecha actual
echo $dt_Hoy_formato_custom . "---Hoy con formato personalizado<br/>"; //Para imprimir fecha actual
echo $dt_Ayer . "---Ayer<br/>";
echo $dt_laSemanaPasada . "---Semana Pasada<br/>";
echo $dt_elMesPasado . "---Mes Pasado<br/>";
echo $dt_ElAnioPasado . "---Anio Pasado<br/><br/>";


////////////manipulación de formatos//////////////
$dt_Ayer = date('Y-m-d\TH:i:s', strtotime('-1 day')); // resta 1 día
$dt_laSemanaPasada = date('Y-m-d\TH:i:s', strtotime('-1 week')); // resta 1 semana
$dt_elMesPasado = date('Y-m-d\TH:i:s', strtotime('-1 month')); // resta 1 mes
$dt_ElAnioPasado = date('Y-m-d\TH:i:s', strtotime('-1 year')); // resta 1 año
//Mostrar fechas
echo $dt_Ayer . "---Ayer con formato personalizado<br/>";
echo $dt_laSemanaPasada . "---Semana Pasada con formato por personalizado<br/>";
echo $dt_elMesPasado . "---Mes Pasado con formato personalizado<br/>";
echo $dt_ElAnioPasado . "---Anio Pasado con formato por personalizado<br/><br/>";


// Operaciones entre fechas: http://php.net/manual/es/datetime.diff.php 
//http://programacion.net/articulo/calcular_la_diferencia_entre_dos_fechas_con_php_1566
/////Minutos de diferencia entre dos fechas
/////////DESDE UNA FECHA EN ADELANTE/////////////////////////////////////////////////
$fechaDeReferencia = "2017-12-01 00:00:00";
$date1 = new DateTime($fechaDeReferencia);
$date2 = new DateTime("now");
$diff = $date1->diff($date2);
echo "<pre>";
print_r($diff);
echo "</pre>";

$diferenciaEnDias = $diff->days;
$diferenciaEnDias = floor($diferenciaEnDias); //floor para redondear hacia abajo , ceil() hacia arriba
$diferenciaEnHoras = ($diff->days * 24 + ( $diff->h ));
$diferenciaEnHoras = floor($diferenciaEnHoras); //floor para redondear hacia abajo , ceil() hacia arriba
$diferenciaEnMinutos = ((($diff->days * 24 + ( $diff->h )) * 60) + ( $diff->i ));
$diferenciaEnMinutos = floor($diferenciaEnMinutos); //floor para redondear hacia abajo , ceil() hacia arriba
$diferenciaEnSegundos = ((((($diff->days * 24 + ( $diff->h )) * 60) + ( $diff->i )) * 60) + ( $diff->s ));
$diferenciaEnSegundos = floor($diferenciaEnSegundos); //floor para redondear hacia abajo , ceil() hacia arriba
//si $diferenciaPositiva_Negativa es 1 son minutos hacia atrás desde fecha de referencia $date1
//si $diferenciaPositiva_Negativa es 0 son minutos avanzados desde fecha de referencia $date1 
$diferenciaPositiva_Negativa = ($diff->invert);

echo "<br/>Fecha de Referencia " . $fechaDeReferencia;
echo "<br/>SENTIDO DEL TIEMPO:   " . $diferenciaPositiva_Negativa ;
echo "<br/>Sentido del tiempo, 0 es tiempo YA transcurrido, 1 es tiempo POR transcurrir";
echo "<br/><br/>Días Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnDias . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
echo "Horas Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnHoras . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
echo "Minutos Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnMinutos . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
echo "Segundos Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnSegundos . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
/////////////////////////////////////////////////////////////////////////////////////
/////////DESDE UNA FECHA HACIA ATRÁS/////////////////////////////////////////////////
$fechaDeReferencia = "2017-12-31 23:59:59";
$date1 = new DateTime($fechaDeReferencia);
$date2 = new DateTime("now");
$diff = $date1->diff($date2);
echo "<pre>";
print_r($diff);
echo "</pre>";

$diferenciaEnDias = $diff->days;
$diferenciaEnDias = floor($diferenciaEnDias); //floor para redondear hacia abajo , ceil() hacia arriba
$diferenciaEnHoras = ($diff->days * 24 + ( $diff->h ));
$diferenciaEnHoras = floor($diferenciaEnHoras); //floor para redondear hacia abajo , ceil() hacia arriba
$diferenciaEnMinutos = ((($diff->days * 24 + ( $diff->h )) * 60) + ( $diff->i ));
$diferenciaEnMinutos = floor($diferenciaEnMinutos); //floor para redondear hacia abajo , ceil() hacia arriba
$diferenciaEnSegundos = ((((($diff->days * 24 + ( $diff->h )) * 60) + ( $diff->i )) * 60) + ( $diff->s ));
$diferenciaEnSegundos = floor($diferenciaEnSegundos); //floor para redondear hacia abajo , ceil() hacia arriba
//si $diferenciaPositiva_Negativa es 1 son minutos hacia atrás desde fecha de referencia $date1
//si $diferenciaPositiva_Negativa es 0 son minutos avanzados desde fecha de referencia $date1 
$diferenciaPositiva_Negativa = ($diff->invert);

echo "<br/>Fecha de Referencia " . $fechaDeReferencia;
echo "<br/>SENTIDO DEL TIEMPO:   " . $diferenciaPositiva_Negativa ;
echo "<br/>Sentido del tiempo, 0 es tiempo YA transcurrido, 1 es tiempo POR transcurrir";
echo "<br/><br/>Días Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnDias . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
echo "Horas Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnHoras . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
echo "Minutos Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnMinutos . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
echo "Segundos Completos(as) de diferencia con la fecha de referencia " . $diferenciaEnSegundos . "<br/>"; //floor para redondear hacia abajo , ceil() hacia arriba
/////////////////////////////////////////////////////////////////////////////////////
?>

