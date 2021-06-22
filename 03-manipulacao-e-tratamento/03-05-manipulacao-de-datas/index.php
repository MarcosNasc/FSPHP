<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.05 - Manipulação de datas");

/*
 * [ a função date ] setup | output
 * [ date ] https://php.net/manual/pt_BR/function.date.php
 * [ timezones ] https://php.net/manual/pt_BR/timezones.php
 */
fullStackPHPClassSession("a função date", __LINE__);

var_dump([
  date_default_timezone_get(), // Retorna a timezone do servidor
  date(DATE_W3C), // Retorna o formato usado no banco de dados
  date('d/m/Y h:i:s') // Retorna a data/hora no Formato BR
]);

// Declara uma constante com o formato BR
define("DATE_BR", "d/m/Y H:i:s");

// Declara uma constante da timezone
define("DATE_TIMEZONE", "Pacific/Apia");

// Seta a timezone 
date_default_timezone_set(DATE_TIMEZONE);

var_dump([
  date_default_timezone_get(), // Retorna a timezone do servidor
  date(DATE_BR) // Retorna a data no formato BR
]);

// Retorna as proriedades de data
var_dump(getdate());

// Retorna o dia
echo ("Hoje é dia " . getdate()["mday"] . "!");

/**
 * [ string to date ] strtotime | strftime
 */
fullStackPHPClassSession("string to date", __LINE__);


var_dump([
  "strtotime now" => strtotime("now"), // Retorna o tempo em string
  "time" => time(), // Retorna o tempo em string
  "strtotime+10days" => strtotime("+10days"), // Retorna o tempo e soma 10 dias
  "date" => date(DATE_BR), // Retorna a data no formato BR
  "date+10days" => date(DATE_BR, strtotime("+10days")), // Retorna a data e soma 10 dias
  "date-10days" => date(DATE_BR, strtotime("-10days")), // Retorna a data e diminui 10 dias
  "date+1year" => date(DATE_BR, strtotime("+1year")), // Retorna a data e soma 1 ano
]);

// Formato de data 
$format = "%d/%m/%Y %Hh%M minutos";
// Retorna a data formatada
echo ("<p> A data de hoje é " . strftime($format) . "</p>");
// Retorna a data formatada na função
echo (strftime("Hoje é dia %d do %m de %Y as %H horas e %M minutos.</p>"));
