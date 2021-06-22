<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.04 - Manipulação de objetos");

/*
 * [ manipulação ] http://php.net/manual/pt_BR/language.types.object.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

// Declara um Array associativo
$arrProfile = [
  "name" => "Marcos",
  "company" => "Gama",
  "mail" => "marcosnascimento.dev@gmail.com",
];

$objProfile = (object)$arrProfile; // Transforma o Array em um Objeto
var_dump($arrProfile, $objProfile);

// Acessa os dados do Array 
echo ("<p> {$arrProfile['name']} trabalha na {$arrProfile['company']}  </p>");
// Acessa os dados do Objeto
echo ("<p> {$objProfile->name} travalha na {$objProfile->company}");

$ceo = $objProfile;
// Remove o atributo company
unset($ceo->company);
var_dump($ceo);

// Declara um  objeto dinamico com a classe StdClass
$company = new StdClass();
$company->company = "Gama";
$company->ceo = $ceo;
/// Declara um subObjeto
$company->manager = new StdClass();
$company->manager->name = "Rezende";
$company->manager->mail = "rezende@gmail.com";

var_dump($company);


/**
 * [ análise ] class | objetcs | instances
 */
fullStackPHPClassSession("análise", __LINE__);

// Declara um Objeto da classe DateTime
$date = new DateTime();

var_dump([
  "Class" => get_class($date), // Retorna a classe do Objeto
  "Methods" => get_class_methods($date), // Retorna os métodos da Classe
  "vars" => get_object_vars($date), // Retorna os atributos da Classe
  "parent" => get_parent_class($date), // Retorna se a Classe tem herança
  "subclass" => is_subclass_of($date, "DateTime") // Retorna se a classe é uma subClasse
]);

// Declara um novo objeto da classe PDOexception
$exception = new PDOException();

var_dump([
  "Class" => get_class($exception),
  "Methods" => get_class_methods($exception),
  "vars" => get_object_vars($exception),
  "parent" => get_parent_class($exception),
  "subclass" => is_subclass_of($exception, "Exception")
]);
