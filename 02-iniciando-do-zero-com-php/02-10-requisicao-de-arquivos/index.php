<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.10 - Requisição de arquivos");

/*
 * [ include ] https://php.net/manual/pt_BR/function.include.php
 * [ include_once ] https://php.net/manual/pt_BR/function.include-once.php
 */
fullStackPHPClassSession("include, include_once", __LINE__);

// include("file.php");
// echo ("<p> Continue </p>");

include("header.php");

$profile = new stdClass();
$profile->name = "Marcos";
$profile->company = "ServeDigital";
$profile->email = "marcos.nascimento@serveloja.com.br";

include(__DIR__ . "/profile.php");

include("header.php");
$profile = new stdClass();
$profile->name = "Gabriel";
$profile->company = "PGE";
$profile->email = "gabriel.f.rezende@outlook.com.br";

include_once(__DIR__ . "/profile.php");


/*
 * [ require ] https://php.net/manual/pt_BR/function.require.php
 * [ require_once ] https://php.net/manual/pt_BR/function.require-once.php
 */
fullStackPHPClassSession("require, require_once", __LINE__);

// require("file.php");
// echo ("<p> continue </p>");

require(__DIR__ . "/config.php");

echo (COURSE);

require_once(__DIR__ . "/config.php");
