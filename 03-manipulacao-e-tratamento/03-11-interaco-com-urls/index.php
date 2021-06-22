<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.11 - Interação com URLs");

/*
 * [ argumentos ] ?[&[&][&]]
 */
fullStackPHPClassSession("argumentos", __LINE__);

echo ("<h1> <a href=\"index.php\"> clear </a> </h1>");
echo ("<p> <a href=\"index.php?arg1=true&arg2=true\"> argumentos </a> </p>");

// Declara Array associativo
$data = [
  "name" => "Marcos",
  "company" => "ServeDigital",
  "mail" => "marcosnascimento.dev@gmail.com",
];

// Transforma Array associativo query HTTP
$arguments = http_build_query($data);
echo ("<p> <a href=\"index.php?{$arguments}\"> args by array </a> </p>");


var_dump($_GET);

// Transforma Array em Objeto
$object = (object) $data;

// Debug Objeto
// Transforma Array em query HTTP
var_dump(
  $object,
  http_build_query($object)
);


/*
 * [ segurança ] get | strip | filters | validation
 * [ filter list ] https://php.net/manual/en/filter.filters.php
 */
fullStackPHPClassSession("segurança", __LINE__);

// Declara Array associativo e transforma em query HTTP
$dataFilter = http_build_query([
  "name" => "Marcos",
  "company" => "ServeDigital",
  "mail" => "marcosnascimento.dev@gmail.com",
  "site" => "Servedigital.com.br",
  "script" => "<script> alert(\"JS\") </script>",
]);

echo ("<p> <a href=\"index.php?{$dataFilter}\"> data filter</a> </p>");

// Filtro Input GET de Array com Sanitize_stripped (limpar tags html e scripts)
$dataUrl = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRIPPED);

// Verifica se os dados da requisição foram validados pelo filtro
if ($dataUrl) {
  if (in_array("", $dataUrl)) {
    echo ("<p class=\"trigger warning\"> Faltam dados!  </p>");
  } elseif (empty($dataUrl["mail"])) {
    echo ("<p class=\"trigger warning\"> Falta email!  </p>");
  } elseif (!filter_var($dataUrl["mail"], FILTER_VALIDATE_EMAIL)) {
    echo ("<p class=\"trigger warning\"> email invalido!  </p>");
  } else {
    echo ("<p class=\"trigger accept\"> Sucesso!  </p>");
  }
} else {
  var_dump(false);
}

// Debug
var_dump($dataUrl);

// Transforma Array em query HTTP
$dataFilter = http_build_query([
  "name" => "Marcos",
  "company" => "ServeDigital",
  "mail" => "marcosnascimento.dev@gmail.com",
  "site" => "https://Servedigital.com.br",
  "script" => "<?php alert(\"JS\") ?>",
]);

// Transforma Query HTTP em Array
parse_str($dataFilter, $arrDataFilter);
var_dump($arrDataFilter);

// Filtros
$dataPreFilter = [
  "name" => FILTER_SANITIZE_STRING,
  "company" => FILTER_SANITIZE_STRING,
  "mail" => FILTER_VALIDATE_EMAIL,
  "site" => FILTER_VALIDATE_URL,
  "script" => FILTER_SANITIZE_STRING,
];

var_dump(filter_var_array($arrDataFilter, $dataPreFilter));
