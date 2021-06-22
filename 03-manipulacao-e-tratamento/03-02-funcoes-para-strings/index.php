<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.02 - Funções para strings");

/*
 * [ strings e multibyte ] https://php.net/manual/en/ref.mbstring.php
 */
fullStackPHPClassSession("strings e multibyte", __LINE__);
$string = "O último show do AC/DC foi incrível ";
var_dump([
  "string" => $string,
  "strlen" => strlen($string), // Retorna o tamanho da string
  "mb_strlen" => mb_strlen($string), // Retorna o tamanho da string sem espaços em branco
  "substr" => substr($string, 14), // Retorna parte da string de acordo com a posição passada
  "mb_substr" => mb_substr($string, 14) // Retorna parte da string sem espaços em branco
]);

/**
 * [ conversão de caixa ] https://php.net/manual/en/function.mb-convert-case.php
 */
fullStackPHPClassSession("conversão de caixa", __LINE__);

$mbString = $string;
var_dump([
  "strtoupper" => strtoupper($mbString), // Converte a string em letras maiusculas (exceto acentos)
  "mb_strtoupper" => mb_strtoupper($mbString), // Converte toda a string em letras maiusculas
  "strtolower" => strtolower($mbString), // Converte a string em letras minusculas (exceto acentos)
  "mb_strtolower" => mb_strtolower($mbString), // Converte toda a string em letras minusculas
  "mb_convert_case UPPER" => mb_convert_case($mbString, MB_CASE_UPPER), // Converte toda a string em letras maiusculas
  "mb_convert_case LOWER" => mb_convert_case($mbString, MB_CASE_LOWER), // Converte toda a string em letras minusculas 
  "mb_convert_case TITLE" => mb_convert_case($mbString, MB_CASE_TITLE), // Converte toda a string em  titulo(capitalize)
]);


/**
 * [ substituição ] multibyte and replace
 */
fullStackPHPClassSession("substituição", __LINE__);

$mbReplace = $mbString . " Fui, iria novamente, e foi épico!";
var_dump([
  "mb_strlen" => mb_strlen($mbReplace), // Retorna o tamanho da string 
  "mb_strpos" => mb_strpos($mbReplace, ", "), // Retorna a posição do ponteiro na string 
  "mb_strrpos" => mb_strrpos($mbReplace, ", "), // Retorna a ultima posição do ponteiro na string
  "mb_substr" => mb_substr($mbReplace, 40 + 2, 14), // Retorna uma substring a partir da posição e do tamanho
  "mb_strstr" => mb_strstr($mbReplace, ", ", true), // Retorna a string a partir da occorrencia do ponteiro
  "mb_strrchr" => mb_strrchr($mbReplace, ", ", true), // Retorna a string a partir da ultima occorrencia do ponteiro
]);

$mbStrReplace = $string;
echo ("<p> {$mbStrReplace} </p>");
echo ("<p> " . str_replace('AC/DC', 'Nirvana', $mbStrReplace) . "</p>"); // Susbstitui a palavra "AC/DC" por Nirvana na string 
echo ("<p> " . str_replace(["AC/DC", "incrível"], ["Nirvana", "Épico"], $mbStrReplace) . "</p>");

// Delimita um template de string (Heredoc)
$article = <<<ROCK
  <article> 
    <h3>event</h3>
    <p>desk</p>
  </article>
ROCK;

$articleData = [
  "event" => "Rock in Rio",
  "desk" => $mbReplace,
];

echo (str_replace(array_keys($articleData), array_values($articleData), $article));


/**
 * [ parse string ] parse_str | mb_parse_str
 */
fullStackPHPClassSession("parse string", __LINE__);

$endPoint = "name=Marcos&email=marcosnascimento@gmail.com";
mb_parse_str($endPoint, $parseEnPoint); // Converte a string em um array 
var_dump([
  $endPoint,
  $parseEnPoint
]);
