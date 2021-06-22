<?php
// session_start();
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.12 - Cookies e sessões");

/*
 * [ cookies ] http://php.net/manual/pt_BR/features.cookies.php
 */
fullStackPHPClassSession("cookies", __LINE__);

// Cria cookie com tempo atual mais sessenta segundos
// setcookie("fsphp", "cookie", time() + 60);
// Destroi cookie
// setcookie("fsphp", time() - 60);

$cookie = filter_input_array(INPUT_COOKIE, FILTER_SANITIZE_STRIPPED);

// var_dump(
//   $_COOKIE,
//   $cookie
// );

$time = time() + 60;

// Declara um Array com as informações do cookie
$user =  [
  "user" => "root",
  "passwd" => "12345",
  "expire" => $time
];

// Cria um coookie
setcookie("fslogin", http_build_query($user), $time, "/", "localhost", false);

// Filtro Input Cookie e aplica filtro sanitize_stripped
$login = filter_input(INPUT_COOKIE, "fslogin", FILTER_SANITIZE_STRIPPED);

// Verifica se os dados foram validados pelo filtro
if ($login) {
  var_dump($login);
  parse_str($login, $user);
  var_dump($user);
};



/*
 * [ sessões ] http://php.net/manual/pt_BR/ref.session.php
 */
fullStackPHPClassSession("sessões", __LINE__);

// Muda o diretorio da sessão
session_save_path(__DIR__ . "/ses");
// Cria uma sessão de 24 horas
session_start([
  "cookie_lifetime" => (60 * 60 * 24)
]);

// Debug Array com as informações da sessão
var_dump(
  [
    "id" => session_id(),
    "name" => session_name(),
    "status" => session_status(),
    "savePath" => session_save_path(),
    "cookie" => session_get_cookie_params(),
  ]
);

// Cria uma sessão de um Objeto
$_SESSION['login'] = (object) $user;
$_SESSION['user'] = $user;
// Destroi a sessão
unset($_SESSION['user']);

// Destroi todas as sessões
session_destroy();
var_dump($_SESSION);
