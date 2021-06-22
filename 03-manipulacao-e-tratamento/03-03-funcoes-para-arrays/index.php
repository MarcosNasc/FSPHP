<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [ // Declara Array indexado
  "A/DC",
  "Nirvana",
  "Alter bridge"
];

$assoc = [ // Declara Array Associativo
  "band_1" => "AC/DC",
  "band_2" => "Nirvana",
  "band_3" => "Alter bridge",
];

array_unshift($index, "", "Pearl Jam"); // Adiciona dois items  no inicio do Array indexado
$assoc = ["band_4" => "Pearl Jam", "band_5" => ""] + $assoc; // Adiciona dois items  no inicio do Array associativo

array_push($index, ""); // Adiciona um item  no final do Array indexado
$assoc = $assoc + ["band_6" => ""]; // Adiciona um item novo no final do Array associativo

array_shift($index); // Remove o primeiro item do Array indexado
array_shift($assoc); /// Remove o primeiro item do Array associativo

array_pop($index); // Remove o ultimo item do Array indexado
array_pop($assoc); // Remove o ultimo item  do Array associativo

array_unshift($index, ""); // Adiciona um novo item  no Array indexado

$index = array_filter($index); // Filtra o Array indexado
$assoc = array_filter($assoc); // Filtra o Array associativo

var_dump(
  $index,
  $assoc
);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$index = array_reverse($index); // Inverte a ordem do Array indexado
$assoc = array_reverse($assoc); // Inverte a ordem do Array associativo

asort($index); // Ordena o Array indexado por valor e mantém os indices
asort($assoc); // Ordena o Array associativo  por valor e mantém os indices

ksort($index);  // Ordena o Array indexado por Key(indice)
krsort($index); // Ordena o Array aassociativo pela key(chaves)

sort($index); // Ordena e reendexa o Array indexado (Asc)
rsort($index); // Ordena e inverte e reendexa o Array indexado (Desc)

var_dump(
  $index,
  $assoc
);


/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
  array_keys($assoc), // Retorna as chaves do Array
  array_values($assoc) // Retorna os valores do Array
]);

if (in_array("AC/DC", $assoc)) { // Verifica se existe um valor/chave dentro do Array
  echo ("<p> Cause I'm back! </p>");
}

$arrToString = implode(", ", $assoc); // Transforma um Array em uma string
echo ("Eu curto {$arrToString} e muitas outras");
echo ("<p> {$arrToString} </p>");

var_dump(explode(", ", $arrToString)); // Transforma a string em um Array


/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
  "nome" => "Marcos",
  "company" => "ServeDigital",
  "mail" => "Marcosnascimento.dev@gmail.com",
];

$template = <<<TPL
<article> 
  <h1>{{nome}}</h1>
  <p>{{company}}<br>
  {{mail}}
  </p>
</article>
TPL;

echo ($template);

echo (str_replace(
  array_keys($profile),
  array_values($profile),
  $template
));

$replaces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";
echo ($replaces);

echo (str_replace(
  explode("&", $replaces),
  array_values($profile),
  $template,
));
