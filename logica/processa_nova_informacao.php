<?php
   $id_contato = $_POST['id_contato'];//validações de segurança
   $tipo = $_POST['tipo'];//validações de segurança
   $valor = $_POST['valor'];//validações de segurança
   echo($id_contato);
   echo($tipo);
   echo($valor);
   if (!isset($id_contato) || !isset($tipo) || !isset($valor)){
      die("Requisição inválida");
   }

   require_once("dados.php");

   if (!($stmt = $mysqli->prepare("insert into informacoes (tipo, valor, contatos_id) values (?,?,?)"))) {
     echo "Prepare failed: (" . $mysqli->errno . ") " . $mysqli->error;
   }

   $stmt->bind_param("ssi", $tipo, $valor, $id_contato);
   if (!$stmt->execute()) {
      echo "Execute failed: (" . $stmt->errno . ") " . $stmt->error;
   } else {
      header("location: ../detalhes.php?id=".$id_contato);
   }
?>
