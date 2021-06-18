<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("02.06 - Arrays, vetores e pilhas");

/**
 * [ arrays ] https://php.net/manual/pt_BR/language.types.array.php
 */
fullStackPHPClassSession("index array", __LINE__);

$arrayA = array(1, 2, 3);
$arrayA = [0, 1, 2, 3];
var_dump($arrayA);

$arrayIndex = [
  "Brian",
  "Angus",
  "Malcom",
];

$arrayIndex[] = "Cliff";
$arrayIndex[] = "Phill";

var_dump($arrayIndex);


/**
 * [ associative array ] "key" => "value"
 */
fullStackPHPClassSession("associative array", __LINE__);

$arrayAssoc = [
  "vocal" => "Brian",
  "solo_guittar" => "Angus",
  "base_guittar" => "Malcom",
  "bass_guittar" => "Cliff",
];
$arrayAssoc["drums"] = "Phill";
$arrayAssoc["rock_band"] = "AC/DC";

var_dump($arrayAssoc);



/**
 * [ multidimensional array ] "key" => ["key" => "value"]
 */
fullStackPHPClassSession("multidimensional array", __LINE__);

$brian = ["Brian", "Mic"];
$angus = ["name" => "Angus", "instrument" => "Guitar"];
$instruments = [
  $brian,
  $angus
];
var_dump($instruments);

var_dump([
  "Brian" => $brian,
  "Angus" => $angus
]);

/**
 * [ array access ] foreach(array as item) || foreach(array as key => value)
 */
fullStackPHPClassSession("array access", __LINE__);

$acdc = [
  "band" => "AC/DC",
  "vocal" => "Brian",
  "solo_guittar" => "Angus",
  "base_guittar" => "Malcom",
  "bass_guittar" => "Cliff",
  "drums" => "Phill",
  "rock_band" => "AC/DC"
];

echo ("<p> O vocal da banda {$acdc['rock_band']} é {$acdc['vocal']}e junto com {$acdc['solo_guittar']} fazem um ótimo show de rock ");

$pearl = [
  "band" => "Pearl Jam",
  "vocal" => "Eddie",
  "solo_guittar" => "Mike",
  "base_guittar" => "Stone",
  "bass_guittar" => "Jeff",
  "drums" => "Jack",
  "rock_band" => "Pearl Jam"
];

$rockBands = [
  "Ac/Dc" => $acdc,
  "Pearl_jam" => $pearl
];

var_dump($rockBands);
echo ("<p> {$rockBands['Pearl_jam']['vocal']}");

foreach ($acdc as $item) {
  echo ("<p> {$item} </p>");
}

foreach ($pearl as $key => $value) {
  echo ("<p> {$key} => {$value} </p>");
}

foreach ($rockBands as $rockBand) {
  $art = "<article><h1>%s</h1><p>%s<p><p>%s<p> <p>%s<p> <p>%s<p> <p>%s<p>   
   </article>";
  vprintf($art, $rockBand);
}
