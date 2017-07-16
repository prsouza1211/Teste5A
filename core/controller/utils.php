<?php 
	
	require('core/database/Conexaoclass.php');
	require('core/class/Atividade.php');

	$atividade = new Atividade();
	$listaStatus = $atividade->listStatus();
	$listaAtividades = $atividade->listAtividades();

?>	