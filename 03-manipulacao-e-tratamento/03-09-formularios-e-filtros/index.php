<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.09 - Formuários e filtros");

/*
 * [ request ] $_REQUEST
 * https://php.net/manual/pt_BR/book.filter.php
 */
fullStackPHPClassSession("request", __LINE__);

// Declara uma nova Istancia da Classe dinamica
$form = new stdClass();
// Atributo name do Objeto
$form->name = "";
// Atributo mail do Objeto
$form->mail = "";

// Variável global de Requisições HTTP
var_dump($_REQUEST);

// Requisição do tipo GET
$form->method = "get";
// Requisição do tipo POST
$form->method = "post";
// Importando arquivo 
include(__DIR__ . "/form.php");

/*
 * [ post ] $_POST | INPUT_POST | filter_input | filter_var
 */
fullStackPHPClassSession("post", __LINE__);

// Variável global de Requisições POST
var_dump($_POST);

// Filtro de input POST
$post = filter_input(INPUT_POST, "name", FILTER_DEFAULT);
// Filtro de Array POST
$postArray = filter_input_array(INPUT_POST, FILTER_DEFAULT);

// Retorna os dados filtrados
var_dump([
  $post,
  $postArray
]);

// Verifica se o Array é nulo
if ($postArray) {
  // Verifica se os dados dentro do Array são ""
  if (in_array("", $postArray)) {
    // Mensagem de erro
    echo ("<p class='trigger warning'> Preencha todos os campos </p> ");
    // Verifica se o input email não está validado pelo filtro
  } elseif (!filter_var($postArray['mail'], FILTER_VALIDATE_EMAIL)) {
    // Mensagem de erro
    echo ("<p class='trigger warning'> E-MAIL inválido </p> ");
  } else {
    // Limpa os dados para prevevir de atacks 
    $saveStrip = array_map("strip_tags", $postArray);
    // Limpa os espaços em brancos
    $save = array_map("trim", $saveStrip);
    // Retorna os dados com tratamento
    var_dump($save);
    // Mensagem de suceso
    echo ("<p class='trigger accept'>Cadastro com sucesso! </p> ");
  }
}


/*
 * [ get ] $_GET | INPUT_GET | filter_input | filter_var
 */
fullStackPHPClassSession("get", __LINE__);

// Variável global de Requisições GET
var_dump($_GET);

// Filtro de input GET
$get = filter_input(INPUT_GET, "mail", FILTER_DEFAULT);
// Filtro de Array GET
$getArray = filter_input_array(INPUT_GET, FILTER_DEFAULT);

// Retorna os dados filtrados
var_dump($get, $getArray);

// Requisição de tipo GET
$form->method = "get";
// Importa arquivo 
include(__DIR__ . "/form.php");


/*
 * [ filters ] list | id | var[_array] | input[_array]
 * http://php.net/manual/pt_BR/filter.constants.php
 */
fullStackPHPClassSession("filters", __LINE__);


var_dump(
  // Retorna lista de Filtros e Sanitizes
  filter_list(),
  [
    // Retorna o id do filtro
    filter_id("validate_email"),
    FILTER_VALIDATE_EMAIL,
    filter_id("string"),
    FILTER_SANITIZE_STRING
  ]
);

// Filtro para Array
$filterForm = [
  "name" => FILTER_SANITIZE_STRIPPED,
  "mail" => FILTER_VALIDATE_EMAIL,
];

// Filtrando dados do Array
$getForm = filter_input_array(INPUT_GET, $filterForm);

// Retorna Array após tratamento
var_dump($getForm);

$email = "marcosnascimento.dev@gmail.com";

// Filtrando  dados dos variáveis 
var_dump([
  filter_var($email, FILTER_VALIDATE_EMAIL),
  filter_var_array($getForm, $filterForm),
]);
