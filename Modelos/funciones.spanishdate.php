<?php 
 //Devuelve un string con fecha en español
function SpanishDate(){

   date_default_timezone_set ('America/El_Salvador');

   $day =  date("N");
   $dayMonth = date("j");
   $month = date("n");
   $year = date("Y");
   
   $spanishDays = [
      "1" => "Lunes",
      "2" => "Martes",
      "3" => "Miercoles",
      "4" => "Jueves",
      "5" => "Viernes",
      "6" => "Sabado",
      "7" => "Domingo",
   ];

   $spanishMonths = [
      "1" => "Enero",
      "2" => "Febrero",
      "3" => "Marzo",
      "4" => "Abril",
      "5" => "Mayo",
      "6" => "Junio",
      "7" => "Julio",
      "8" => "Agosto",
      "9" => "Septiembre",
      "10" => "Octubre",
      "11" => "Noviembre",
      "12" => "Diciembre",
   ];

   return "{$spanishDays[$day]} $dayMonth de {$spanishMonths[$month]} del año $year";

}