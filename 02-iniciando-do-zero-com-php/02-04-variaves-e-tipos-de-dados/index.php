<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.04 - Variáveis e tipos de dados");

/**
 * [tipos de dados] https://php.net/manual/pt_BR/language.types.php
 * [ variáveis ] https://php.net/manual/pt_BR/language.variables.php
 */
fullStackPHPClassSession("variáveis", __LINE__);

$userFirstName =  "Marcos";
$userLastName = "Nascimento";
echo "<h3> {$userFirstName} {$userLastName} </h3>";

$user_first_name = $userFirstName;
$user_last_name = $userLastName;
echo "<h3> {$user_first_name} {$user_last_name}";

$userAge = 20;
echo "<p> {$userFirstName} {$userLastName} <span class='tag'> tem $userAge </span> </p> ";

$userEmail = "<p>marcosnascimento.dev@gmail.com</p>";
echo $userEmail;

//Variável de variável
$company = "upinside";
$$company = "Treinamentos";
echo "<h3> {$company} {$upinside} </h3>";

//Referenciar a Variável
$calcA = 10;
$calcB = 20;
$calcB = &$calcA;
$calcB = 50;

var_dump([
  "a" => $calcA,
  "b" => $calcB
]);

/**
 * [ tipo boleano ] true | false
 */
fullStackPHPClassSession("tipo boleano", __LINE__);

$true = true;
$false = false;

var_dump($true, $false);

$bestAge = ($userAge > 50);
var_dump($bestAge);

$a = 0;
$b =  0.0;
$c = "";
$d = [];
$e = null;

var_dump($a, $b, $c, $d, $e);

if ($a || $b || $c || $d || $e) {
  var_dump(true);
} else {
  var_dump(false);
}

/**
 * [ tipo callback ] call | closure
 */
fullStackPHPClassSession("tipo callback", __LINE__);

$code = "<article><h1> Use Call Function </h1></article>";
$codeClear = call_user_func("strip_tags", $code);
var_dump($code, $codeClear);

$codeMore = function ($code) {
  var_dump($code);
};
$codeMore("#boraProgramar!");




/**
 * [ outros tipos ] string | array | objeto | numérico | null
 */
fullStackPHPClassSession("outros tipos", __LINE__);

$string = "texto";
$array = [1, 2, 3];
$object = new stdClass();
$object->hello = $string;
$null = null;
$int = 1;
$float = 1.232323;

var_dump([
  $string,
  $array,
  $object,
  $null,
  $int,
  $float,
]);
