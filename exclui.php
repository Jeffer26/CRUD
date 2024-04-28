<?php
require_once 'inicia.php';
/**Armazena o código do livro a ser excluido */
$cod_livro = isset($_GET['cod_livro']) ? $_GET['cod_livro'] : null;
/**Verifica se o código do livro existe na tabela */
if (empty($cod_livro)){
  echo "o código do livro para a exclusão não foi definido";
  exit;
}
/**Faz a exclusão do registro da tabela livros */
$PDO = conecta_bd();
$sql = "DELETE FROM livros WHERE cod_livro = :cod_livro";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':cod_livro', $cod_livro, PDO::PARAM_INT);
if ($stmt->execute()){
  header('Location: index.php');
} else{
  echo "Ocorreu um erro ao excluir o livro";
  print_r($stmt->errorInfo());
}
?>