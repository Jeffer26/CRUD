<?php
require_once 'inicia.php';
$PDO = conecta_bd();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tela principal</title>
  <link rel="stylesheet" href="index.css">
</head>
<body>
  <h1>Cadastro de livros</h1>
  <p><a href="cadastro.html">Adicionar livro</a></p>
  <h2 >Lista de livros cadastrados</h2>
  <?php
  $stmt_count = $PDO->prepare("SELECT COUNT(*) As total FROM livros");
  $stmt_count->execute();
  $stmt = $PDO->prepare("SELECT cod_livro,titulo_livro,cod_isbn,autor_livro,nome_editora,qtd_paginas
  FROM livros ORDER BY titulo_livro");
  $stmt->execute();
  $total = $stmt_count->fetchColumn();
  if ($total > 0) : ?>
  <table border="1">
    <thead>
      <tr>
        <th>Título</th>
        <th>ISBN</th>
        <th>Autor</th>
        <th>Editora</th>
        <th>Qtd. Páginas</th>
        <th>Opções para o livro</th>
      </tr>
    </thead>  
    <tbody>
      <?php while ($resultado = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
          <td><?php echo $resultado['titulo_livro']?></td>
          <td><?php echo $resultado['cod_isbn'    ]?></td>
          <td><?php echo $resultado['autor_livro' ]?></td>
          <td><?php echo $resultado['nome_editora']?></td>
          <td><?php echo $resultado['qtd_paginas' ]?></td>

          <td>
            <a href="altera.php?cod_livro=<?php echo
            $resultado['cod_livro']?>">Alterar</a>
            <a href="exclui.php?cod_livro=<?php echo
            $resultado['cod_livro']?>" onclick="return confirm('Tem certeza de que deseja excluir o registro?');">Excluir</a>
            </td>
      </tr>
      <?php endwhile; ?>
    </tbody>
  </table>
  <p>Total de livros cadastrados: <?php echo $total ?></p>
  <?php else:?>
    <p>Não há livro cadastrado</p>
    <?php endif; ?>

  
</body>
</html>
