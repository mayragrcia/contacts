<?php
   $id = $_GET['id'];
   if (!isset($id)){
      die("parâmetro incorreto");
   }

   require_once("logica/dados.php");
   $sql_contato = "select nome, apelido from contatos where id = $id";
   $res_contato = $mysqli->query($sql_contato);
   if (!$contato = $res_contato->fetch_assoc()){
      die("contato não encontrado");
   }
?>

<html lang="pt">
<head>
   <meta charset="utf-8"/>
   <title>Minha Lista de Contatos</title>
</head>
<body>
   <h1>Nova Informação</h1>
   <h2><?=$contato['nome']?></h2>
   <form action="logica/processa_nova_informacao.php" method="post">
      <input type="hidden" name="id_contato" value="<?=$id?>"/>
      <label for="inputTipo">Tipo:</label><br/>
      <select name="tipo" id="inputTipo">
         <option value="Telefone">Telefone</option>
         <option value="E-mail">E-mail</option>
         <option value="Aniversário">Aniversário</option>
         <option value="Endereço">Endereço</option>
      </select>
      <br/>
      <label for="inputValor">Valor:</label><br/>
      <input type="text" name="valor" id="inputValor" /><br/>
      <br/>
      <input type="submit" value="Confirmar" />
      <input type="button" value="Voltar" />
   </form>
</body>
</html>
