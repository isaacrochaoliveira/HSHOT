<?php

require_once '../../../db/connect.php';
require_once '../../../db/autenticator.php';
@session_start();

$nome_img = preg_replace('/[ -]+/' , '-' , @$_FILES['imagem_comunidade']['name']);
$caminho = URL . 'imagens/comunidades/';
if (@$_FILES['imagem_comunidade']['name'] == ""){
  $imagem = "sem-foto.jpg";
}else{
    $imagem = $nome_img;
}

$imagem_temp = @$_FILES['imagem']['tmp_name']; 
$ext = pathinfo($imagem, PATHINFO_EXTENSION);   
if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
move_uploaded_file($imagem_temp, $caminho);
}else{
	echo 'Extensão de Imagem não permitida!';
	exit();
}

echo $imagem;