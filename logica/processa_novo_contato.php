<?php
   $nome = $_POST['nome'];//validações de segurança
   $apelido = $_POST['apelido'];//validações de segurança
   if (!isset($nome) || !isset($apelido)){
      die("Requisição inválida");
   }

   require_once("dados.php");

   if (!($stmt = $mysqli->prepare("insert into contatos (nome, apelido) values (?,?)"))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
   }

   $stmt->bind_param("ss", $nome, $apelido);
   if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
   } else {
      header("location: ../index.php");
   }
?>
