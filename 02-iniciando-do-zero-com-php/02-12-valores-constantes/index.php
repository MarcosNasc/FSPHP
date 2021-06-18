<?php

use source\myClass;

require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.12 - Constantes e constantes mágicas");

/*
 * [ constantes ] https://php.net/manual/pt_BR/language.constants.php
 */
fullStackPHPClassSession("constantes", __LINE__);

define("COURSE", "Full stack PHP ");
const AUTHOR = "Robson";

$formation = true;
if ($formation) {
  define("COURSE_TYPE", "Formação");
} else {
  define("COURSE_TYPE", "Curso");
}

echo "<p>", COURSE_TYPE, " ", COURSE, " de ", AUTHOR, "</p>";
echo ("<p>" . COURSE_TYPE . " " . COURSE . " de " . AUTHOR . "</p>");

class Config
{
  const user = "root";
  const host = "localhost";
}
echo (Config::user);
echo (Config::host);


/*
 * [ constantes mágicas ] https://php.net/manual/pt_BR/language.constants.predefined.php
 */
fullStackPHPClassSession("constantes mágicas", __LINE__);
var_dump(get_defined_constants(true)["user"]);

var_dump([
  __LINE__,
  __FILE__,
  __DIR__,

]);

function fullstackphp()
{
  return __FUNCTION__;
}

var_dump(fullstackphp());

trait MyTrait
{
  public $traitName = __TRAIT__;
}

class FSPHP
{
  use MyTrait;
  public $className = __CLASS__;
}

var_dump(new FSPHP);

require(__DIR__ . "/myClass.php");
var_dump(new myClass);
var_dump(MyClass::class);
