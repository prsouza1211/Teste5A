<?php

  class Atividade
   {
      
      private $conn; 
      
      public function __construct($id = null)
      {
        
        $this->conn = new Conexao;
        $this->conn->conecta();
        $this->conn->selecionaBanco();
        
       }

       public function listAtividades($filtros = '') {

			$filtro = '';

			if(isset($filtros['status']) && $filtros['status'] != '') {
				$filtro .= ' AND a.id_status = ' . $filtros['status'];
			}

			if(isset($filtros['situacao']) && $filtros['situacao'] != '') {
				$filtro .= ' AND a.situacao = ' . $filtros['situacao'];
			}


			$sql = "SELECT 
						a.id_atividade,
						a.nm_atividade, 
					    DATE_FORMAT(a.dt_inicio, '%d/%m/%Y') AS dt_inicio, 
					    DATE_FORMAT(a.dt_fim, '%d/%m/%Y') AS dt_fim, 
					    s.nm_status, 
					    a.id_status,
					    CASE WHEN a.situacao = 1 
					    	THEN 'ATIVO' 
					        ELSE 'INATIVO' 
					    END as situacao 
					FROM 
						tb_atividade a 
					INNER JOIN tb_status s ON 
						a.id_status = s.id_status 
					WHERE 
						1=1
						{$filtro}
					ORDER BY 
						a.nm_atividade, a.id_status";
       		
       		$this->conn->setQuery($sql);
          	$query = $this->conn->getQuery();
          	return $this->conn->fetch($query);

       }
      
      public function listStatus()
	  {
		  $sql = "SELECT id_status,nm_status FROM tb_status";
		 
          
          $this->conn->setQuery($sql);
          $query = $this->conn->getQuery();
          return $this->conn->fetch($query);
	  }

	  public function insertAtividade($dados) {
	  		
	  		$data_inicio = date_create_from_format('d-m-Y', $dados['dt_inicio']);
	  		$data_inicio_ins = date('Y-m-d', $data_inicio->getTimestamp());

	  		$data_final = date_create_from_format('d-m-Y', $dados['dt_fim']);
	  		$data_final_ins = date('Y-m-d', $data_final->getTimestamp());

	  		$query = "INSERT INTO tb_atividade
		  					(id_status
		  					,nm_atividade
		  					,ds_atividade
		  					,dt_inicio
		  					,dt_fim
		  					,situacao)
		  			   VALUES(
		  			   		  '".$dados['id_status']."'
		  			   		  ,'".$dados['nm_atividade']."'
		  			   		  ,'".$dados['ds_atividade']."'
		  			   		  ,'".$data_inicio_ins."'
		  			   		  ,'".$data_final_ins."'
		  			   		  ,'".$dados['situacao']."')
		  			   ";

			$this->conn->setQuery($query);
            $result = $this->conn->getQuery();

            if($result) {
            	return 1;
            }else{
            	return 0;
            }
	  }

	  function atualizaAtividade($dados) {

	  		$sets = '';

	  		foreach($dados as $chave => $valor){
				if($chave != 'id_atividade'){
					
					$sets .= $chave . ' = "' . $valor . '",';
				}
			}

	  		$query = 'UPDATE tb_atividade SET '. trim($sets,',') .'
							WHERE id_atividade = '.$dados['id_atividade'].'
						';

			$this->conn->setQuery($query);
            $result = $this->conn->getQuery();

            if($result) {
            	return 1;
            }else{
            	return 0;
            }


	  }

	  function getAtividade($id) {

	  		$query = 'SELECT * FROM tb_atividade WHERE id_atividade = ' . $id; 

	  		$this->conn->setQuery($query);
          	$query = $this->conn->getQuery();
          	return $this->conn->fetch($query);
	  }
   }
   
  
   
   
   
   
   
   
   
   
  
   
   
?>
 

