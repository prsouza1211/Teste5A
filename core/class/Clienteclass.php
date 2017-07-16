<?php

   class Cliente
   {
      public $id;
      public $nome;
      public $email;
	  public $telefone;
      private $conn; 
      
      //Método auxiliar ao construtor, retornando um array de dados. 
      private function getProduto($id) 
      { 
        $id = intval($id);
          
        $filtros = array(
                            "id_cliente"  => $id
                          );
                          
        $lista = $this->listarClientes($filtros);
        
        $regs = count($lista);
        
        if($regs == 1)
      {
          foreach($lista as $reg)
          {
            $this->id = $reg["id"];
            $this->nome = $reg["nome"];
			$this->email = $reg["email"];
            $this->telefone = $reg["telefone"];
         }
        }
        
        
      }
      
      public function __construct($id = null)
      {
        
        $this->conn = new Conexao;
        $this->conn->conecta();
        $this->conn->selecionaBanco();
        
        if (isset($id) && is_numeric($id)) 
        {
          $this->getProduto($id);
        }
        
        
      }
      
      //Atributos da Classe
      public function setId($id)
      {
        $this->id = $id;
      }
       
      public function setNome($nome)
      {
        $this->nome = $nome;                                              
      }
      
      public function setEmail($email)
      {
        $this->email = $email;  
      }
	  
	  public function setTelefone($telefone)
      {
        $this->telefone = $telefone;  
      }
      
      
      public function getId()
      {
        return $this->id;
      }
      
      public function getNome()
      {
        return $this->nome;
      }
      
      public function getEmail()
      {
        return $this->email;
      }
	  
	  public function getTelefone()
      {
        return $this->telefone;
      }
      
      
      //Métodos da Classe
      public function Inserir()
      {
         try
         {
            if(empty($this->nome))
            {
                throw new Exception('Dados inexistentes, erro ao tentar inserir o registro');
            }else{
               $sql = "INSERT INTO cliente(nome,email,telefone) VALUES('".$this->nome."','".$this->email."','".$this->telefone."')";
              // echo $sql;
                
                $this->conn->setQuery($sql);
                $this->conn->getQuery();
                
                if(mysql_affected_rows() == 1){
                  return true;
                }else{
                  return false;
                }
            }
         }catch(Exception $e){ 
            echo $e->getMessage(); 
        } 
      }
      
      public function Excluir($id)
      {
          
          $id = intval($id);
          
          $filtros = array(
                            "id_cliente"  => $id
                          );
                          
          $lista = $this->listarClientes($filtros);
          
          $regs = count($lista);                
          
          try
          {
            if($regs < 1)
            {
               throw new Exception('Registro não encontrado, impossível excluir.');
            }else{
              $sql = "DELETE FROM cliente WHERE id = $id";
              
              $this->conn->setQuery($sql);
              $this->conn->getQuery();
              
              return true;
              
            }
          }catch(Exception $e){ 
            echo $e->getMessage(); 
        }
      }
	  
	  public function Atualizar($id)
	  {
		$sql = "UPDATE cliente SET nome = '".$this->nome."', \n";
		$sql.= "	email = '".$this->email."', \n";
		$sql.= "	telefone = '".$this->telefone."' \n";
		$sql.= "WHERE id = $id";

		$this->conn->setQuery($sql);
		$this->conn->getQuery();
	  }
      
      public function listarProdutos($filtros = null)
      {
         $sql = "SELECT id,nome,email,telefone FROM cliente";
		  if(isset($filtros["id_produto"]) && $filtros["id_produto"] != 0)
          {
            $sql.= "  WHERE id = ".$filtros["id_cliente"]." \n";
          }
          
          $this->conn->setQuery($sql);
          $query = $this->conn->getQuery();
          return $this->conn->fetch($query);
      }
	  
	  public function listAll()
	  {
		$sql = "SELECT id,nome,email,telefone FROM cliente";
		 
          
          $this->conn->setQuery($sql);
          $query = $this->conn->getQuery();
          return $this->conn->fetch($query);
	  }
   }
   
  
   
   
   
   
   
   
   
   
  
   
   
?>
 

