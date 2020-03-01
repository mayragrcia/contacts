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
   $sql_informacao = "select id, tipo, valor from informacoes where contatos_id = $id";
   $res_informacao = $mysqli->query($sql_informacao);
?>

<html lang="pt">
<head>
   <meta charset="utf-8"/>
   <title>Minha Lista de Contatos</title>
</head>
<body>
   <h1>Minha Lista de Contatos</h1>
   <h2><?=$contato['nome']?></h2>
   <h4><?=$contato['apelido']?></h4>
   <table border="1">
      <thead>
         <th>Tipo</th>
         <th>Valor</th>
      </thead>
      <tbody>
<?php while ($row = $res_informacao->fetch_assoc()){ ?>
         <tr>
         <td><?=$row['tipo']?></td>
         <td><?=$row['valor']?></td>
         </tr>
<?php } ?>

      </tbody>
   </table>
<a href="nova_informacao.php?id=<?=$id?>">Nova Informação</a>

</body>
</html>
