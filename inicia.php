<?php
/** Constantes com as informações para acesso ao banco MYSQL */
define('DB_HOST', 'localhost');
define('DB_NAME', 'ua10');
define('DB_USER', 'root');
define('DB_PASS', '');
/**Habilita as mensagens de erro */
ini_set('display_errors', true);
error_reporting(E_ALL);
/**Inclui  o arquivo de funções*/
require_once 'funcoes.php';
?>