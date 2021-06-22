<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.07 - Manipulação de arquivos");

/*
 * [ verificação de arquivos ] file_exists | is_file | is_dir
 */
fullStackPHPClassSession("verificação", __LINE__);

// Declara variável com o caminho do arquivo
$file = __DIR__ . "/file.txt";

// Verifica se arquivo existe e se é um arquivo
if (file_exists($file) && is_file($file)) {
  echo ("<p> O arquivo existe </p>");
} else {
  echo ("<p>  não existe </p>");
}

/*
 * [ leitura e gravação ] fopen | fwrite | fclose | file
 */
fullStackPHPClassSession("leitura e gravação", __LINE__);

// Verifica se arquivo não existe ou não é um arquivo
if (!(file_exists($file)) || !(is_file($file))) {
  // Cria um arquivo de leitura e escrita 
  $fileOpen = fopen($file, "w");
  // Escreve dentro do arquivo criado
  fwrite($fileOpen, "Linha 01" . PHP_EOL);
  fwrite($fileOpen, "Linha 02" . PHP_EOL);
  fwrite($fileOpen, "Linha 03" . PHP_EOL);
  fwrite($fileOpen, "Lorem Ipsum is simply dummy text of the printing and typesetting industry. " . PHP_EOL);
  // Fecha o arquivo após a leitura e escrita 
  fclose($fileOpen);
} else {
  var_dump(
    // Retorna todos os dados do arquivo
    file($file),
    // Retorna as informações de path do arquivo
    pathinfo($file)
  );
}

echo ("<p>" . file($file)[3] . "</p>");

// Abre o arquivo somente para a leitura 
$open = fopen($file, "r");
// ler todas as linhas de dentro do arquivo
while (!(feof($open))) {
  echo ("<p>" . fgets($open) . " </p>");
}
// Fecha o arquivo depois de ler 
fclose($open);


/*
 * [ get, put content ] file_get_contents | file_put_contents
 */
fullStackPHPClassSession("get, put content", __LINE__);

// Declara uma variavel com o caminho do arquivo
$getContents = __DIR__ . "/teste.txt";

// Verifica se o arquivo existe e se é um arquivo
if (file_exists($getContents) && is_file($getContents)) {
  // Retorna todos os dados do arquivo
  echo (file_get_contents($getContents));
} else {
  $data = "<h1>Marcos</h1>";
  // Cria um novo arquivo e escreve nele 
  file_put_contents($getContents, $data);
  // Retorna  todos os dados do arquivo
  echo file_get_contents($getContents);
}

// Verifica se o arquivo existe e se é um arquivo
if (file_exists(__DIR__ . "/teste.txt") && is_file(__DIR__ . "/teste.txt")) {
  // Deleta arquivo
  unlink($getContents); // Deleta arquivo
}
