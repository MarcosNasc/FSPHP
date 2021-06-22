,
0<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.08 - Gestão de diretórios");

/*
 * [ verificar, criar e abrir ] file_exists | is_dir | mkdir  | scandir
 */
fullStackPHPClassSession("verificar, criar e abrir", __LINE__);

// Declara variavel com o caminho do diretorio
$folder = __DIR__ . "/uploads";

// Verifica se o diretorio existe ou se existe e é um diretorio
if (!file_exists($folder) || !is_dir($folder)) {
  // Cria um diretorio
  mkdir($folder, 0755);
} else {
  // Ler o diretorio
  var_dump(scandir($folder));
}

/*
 * [ copiar e renomear ] copy | rename
 */
fullStackPHPClassSession("copiar e renomear", __LINE__);

// Declara uma variavel com o caminho do diretorio
$file = __DIR__ . "/file.txt";
var_dump(
  // Retorna informações sobre o diretorio
  pathinfo($file),
  // ler o diretorio
  scandir($folder),
  scandir(__DIR__)
);

// Verfifica se o arquivo existe e se é um arquivo
if (!file_exists($file) || !is_file($file)) {
  // Cria um arquivo para a leitura e escrita
  fopen($file, "w");
} else {
  //var_dump(filemtime($file), filemtime(__DIR__ . "/uploads/file.txt"));
  // Copia o arquivo para outro diretorio
  // copy($file, $folder . "/" . basename($file));
  // Renomeia o arquivo 
  // rename(__DIR__ . "/uploads/file.txt", __DIR__ ."/uploads/" . time() . "." . pathinfo($file)["extension"]);
  // Move o arquivo de diretorio
  rename($file, __DIR__ . "/uploads/" . time() . "." . pathinfo($file)["extension"]);
}

/*
 * [ remover e deletar ] unlink | rmdir
 */
fullStackPHPClassSession("remover e deletar", __LINE__);

// Cria um novo diretorio
// mkdir("remove",0755);

// Declara o caminho do diretorio
$dirRemove = __DIR__ . "/remove";
// Retorna a diferença do Array dirRemove
$dirFiles = array_diff(scandir($dirRemove), ['.', '..']);
// Retorna a quantidade de itens do Array dirFiles
$dirCount = count($dirFiles);

// Debug
var_dump($dirFiles, $dirCount);

// Verifica se os itens do Array é maior ou igual a 1
if ($dirCount >= 1) {
  // ler todos os dados do Array
  foreach (scandir($dirRemove) as $fileItem) {
    // Muda o caminho
    $fileItem = __DIR__ . "/remove/{$fileItem}";
    // Verifica se arquivo existe e exclui
    if (file_exists($fileItem) && is_file($fileItem)) {
      unlink($fileItem);
    }
  }
} else {
  // Excluir o diretorio
  rmdir($dirRemove);
}
