<?php



		include "../modelo/conexao.php ";

$id = $_GET['id']; // Recebendo o valor enviado pelo link

@mysql_query("DELETE FROM setor WHERE id_setor='".$id."'"); // A instrução delete irá apagar todos os dados da id recebida



header("Location: ../visao/ListaGrupo.php")
?>