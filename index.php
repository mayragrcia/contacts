<?php
   require_once("logica/dados.php");
   $sql = "select id, nome, apelido from contatos";
   $res = $mysqli->query($sql);
?>
<html lang="pt">
<head>
   <meta charset="utf-8"/>
   <title>Minha Lista de Contatos</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
   <div class="container">
      <h1>Minha Lista de Contatos</h1>
      <table class="table table-striped">
         <thead>
            <th>Nome</th>
            <th>Apelido</th>
            <th>Ações</th>
         </thead>
         <tbody>
            <?php
               while ($row = $res->fetch_assoc()){
                  echo "<tr>";
                  echo "<td>".$row['nome']."</td> ";
                  echo "<td>".$row['apelido']."</td> ";
                  echo "<td><a class='btn btn-danger btn-sm' href=\"detalhes.php?id=".$row['id']."\">Info</a></td>";
                  echo "</tr>";
               }
            ?>
         </tbody>
      </table>
      <div class="text-center">
         <a href="novo_contato.php" class="btn btn-primary">Novo Contato</a>
      </div>
   </div>

</body>
</html>
