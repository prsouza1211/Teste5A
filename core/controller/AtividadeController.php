<?php 
	
	require('../../core/database/Conexaoclass.php');
	require('../../core/class/Atividade.php');

	$atividade = new Atividade();


	switch($_POST['acao']) {

		case 'cadastrar':{
			$dados = array();
			parse_str($_POST['dados'], $dados);

			$cadastrar = $atividade->insertAtividade($dados);

			if($cadastrar) {
				echo "Registro Inserido com Sucesso!";
			}else{
				echo "Erro ao cadastrar";
			}
			break;
		}

		case 'buscar':{

			$filtros = array();
			$filtros = $_POST['filtros'];

			$listaAtividades = $atividade->listAtividades($filtros);

			echo json_encode($listaAtividades);

			break;
		}

		case 'popular':{

			$id = $_POST['id'];
			$registro = $atividade->getAtividade($id);

			var_dump($registro); exit;

			break;
		}

		case 'atualizar':{
			$dados = array();
			parse_str($_POST['dados'], $dados);

			$atualizar = $atividade->atualizaAtividade($dados); 

			if($atualizar) {
				echo "Registro Atualizado com Sucesso!";
			}else{
				echo "Erro ao atualizar.";
			}
			break;
		}

	}
	