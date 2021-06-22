<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.10 - Upload de arquivos");

/*
 * [ upload ] sizes | move uploaded | url validation
 * [ upload errors ] http://php.net/manual/pt_BR/features.file-upload.errors.php
 */
fullStackPHPClassSession("upload", __LINE__);

// Declara variavel com caminho do diretorio
$folder = __DIR__ . "/uploads";

// Verifica se o diretorio não existe ou se não é um diretorio
if (!(file_exists($folder)) || (!(is_dir($folder)))) {
  // Cria diretorio
  mkdir($folder, 0755);
}

var_dump([
  "filesize" => ini_get("upload_max_filesize"), // Retorna o tamanho máximo de um arquivo enviado.
  "postsize" => ini_get("post_max_size") // Retorna o tamanho máximo dos dados postados
]);

var_dump(
  [
    filetype(__DIR__ . "/index.php"), // Retorna o tipo do arquivo.
    mime_content_type(__DIR__ . "/index.php") // Retorna o tipo MIME de um arquivo
  ]
);

// Filtro de input GET com validação booleana
$getPost = filter_input(INPUT_GET, "post", FILTER_VALIDATE_BOOLEAN);

// Verifica se a variável Global _Files não está vazia
if ($_FILES && !empty($_FILES['file']['name'])) {
  $fileUpload = $_FILES["file"];
  var_dump($fileUpload);

  $allowedTypes = [
    "image/jpg",
    "image/jpeg",
    "image/png",
    "application/pdf",

  ];
  // Declara uma nova variável com o tempo atual e concatena com a extensão do arquivo
  $newFileName = time() . mb_strstr($fileUpload['name'], ".");
  // Verifica se o tipo do arquivo é permitido
  if (in_array($fileUpload["type"], $allowedTypes)) {
      // Move o arquivo da pasta temporario para a pasta uploads
    if (move_uploaded_file($fileUpload["tmp_name"], __DIR__ . "/uploads/{$newFileName}")) {
      echo ("<p class='trigger accept'> Arquivo enviado com sucesso! </p>");
    } else {
      echo ("<p class='trigger error'> Erro inesperado! </p>");
    }
  } else {
    echo ("<p class='trigger error'> Tipo, de arquivo não é permitido! </p>");
  }
} elseif ($getPost) {
  echo ("<p class='trigger warning'> Whooops, parece que o arquivo é muito grande! </p>");
} else {
  if ($_FILES) {
    echo ("<p class='trigger warning'> Selecione um arquivo antes de enviar </p>");
  }
}
// Importa o arquivo
include(__DIR__ . "/form.php");
// Debug
var_dump(scandir(__DIR__ . "/uploads"));
