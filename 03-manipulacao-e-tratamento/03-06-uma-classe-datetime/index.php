<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.06 - Uma classe DateTime");

/*
 * [ DateTime ] http://php.net/manual/en/class.datetime.php
 */
fullStackPHPClassSession("A classe DateTime", __LINE__);

// Declara uma constante com no formato BR
define("DATE_BR", "d/m/Y H:i:s");

// Declara um novo Objeto da Classe DateTime com a data/hora atual do servidor
$dateNow = new DateTime();
// Declara um novo Objeto da Classe  Datetime com data/hora definido
$dateBirth = new DateTime("2000-08-13");
// Formata uma data com  o método estatico da Classe DateTime
$dateStatic = DateTime::createFromFormat("d/m/Y", "13/08/2021");

var_dump(
  $dateNow, // Retorna a data atual
  $dateBirth, // Retorna a data de nascimento
  $dateStatic // Retorna a data de nascimento formatada
);

var_dump([
  $dateNow->format(DATE_BR), // Retorna a data atual do servidor formatada
  $dateNow->format("d"), // Retorna  o dia
]);

// Retorna uma string de data
echo ("<p> Hoje é dia {$dateNow->format("d")} do {$dateNow->format("m")} de  {$dateNow->format("Y")}");

// Declara um novo Objeto da Classe DateTimeZone
$newDateTimeZone = new DateTimeZone("Pacific/Apia");
// Declara um novo Objeto da classe DateTime
$newDateTime = new DateTime("now", $newDateTimeZone);

var_dump([
  $newDateTimeZone, // Retorna a timezone
  $newDateTime,// Retorna a data da timezone
  $dateNow   // Retorna a data atual
]);


/*
 * [ DateInterval ] http://php.net/manual/en/class.dateinterval.php
 * [ interval_spec ] http://php.net/manual/en/dateinterval.construct.php
 */
fullStackPHPClassSession("A classe DateInterval", __LINE__);

// Declara um novo objeto da Classe DateInterval
$dateInterval = new DateInterval("P10Y2MT10M");
// Retorna o intervalo criado
var_dump($dateInterval);

// Declara um novo objeto da classe Datetime com o tempo atual
$dateTime = new DateTime("now");
// Adiciona a $dateTime o intervalo de $dateInterval
$dateTime->add($dateInterval);
// Subtrai a $dateTime o intervalo de $dateInterval
$dateTime->sub($dateInterval);

// Retorna $dateTime
var_dump($dateTime);

// Declara um novo Objeto da Classe DateTime com dia e mês definido
$birth = new DateTime(date("Y" . "-08-13"));
// Declara um um novo Objeto da classe DateTime com o tempo atual do servidor
$dateNow = new DateTime("now");
// Calcula a diferença entre $dateNow e $birth
$dif = $dateNow->diff($birth);

var_dump([
  $birth,
  $dif
]);

// Verifica se o  aniversário já passou
if ($dif->invert) {
  echo (" Seu anivesário foi a {$dif->days} dias atrás");
} else {
  echo ("Faltam {$dif->days} para o seu aniversário");
}

// Declara um novo objeto da classe DateTime com a hora atual do servidor
$dateResources = new DateTime("now");
var_dump([
  $dateResources->format(DATE_BR), // Retorna a data no formato BR
  $dateResources->sub(DateInterval::createFromDateString("10days"))->format(DATE_BR), // Retorna a data formatada e subtrai 10 dias
  $dateResources->add(DateInterval::createFromDateString("20days"))->format(DATE_BR),   // Retorna a data formatada e soma  20 dias
]);


/**
 * [ DatePeriod ] http://php.net/manual/pt_BR/class.dateperiod.php
 */
fullStackPHPClassSession("A classe DatePeriod", __LINE__);

// Declara um novo Objeto da Classe DateTime com a data/hora atual
$start = new DateTime("now");
// Declara um novo Objeto da Classe DateInterval com o periodo de 1 mês
$interval = new DateInterval("P1M");
// Declara um novo Obejto da Classe com a data final do periodo
$end = new DateTime("2022-01-01");
// Declara um novo Objeto da classe DatePeriodo passando o periodo
$period = new DatePeriod($start, $interval, $end);

var_dump(
  [
    // Retorna a data inicial formatada
    $start->format(DATE_BR),
    // Retorna o intervalo 
    $interval,
    // Retorna a data final formatada
    $end->format(DATE_BR),
  ],
  // Retorno o periodo
  $period,
  //  Retorna os métodos da Classe DatePeriod
  get_class_methods($period)
);

// Retorna o periodo de assinatura
echo ("<h1> Sua assinatura: </h1>");
foreach ($period as $recurrences) {
  echo ("<p> O proximo vencimento {$recurrences->format(DATE_BR)} </p>");
}
