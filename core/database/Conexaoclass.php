<?php

  class Conexao{
    
    private $host="localhost";
    private $user="root";
    private $pass="";
    private $dbname="teste";
    private $query;
    private $res;
    
    public function conecta(){
      $conn = mysql_connect($this->host,$this->user,$this->pass);
      return $conn;
    }
    
    public function selecionaBanco(){
      $db = mysql_select_db($this->dbname,$this->conecta());
      return true;
    }
    
    public function setQuery($query){
      $this->query = $query;
    }
    
    public function getQuery()
    {
      $qry = mysql_query($this->query) or die (mysql_error($this->conecta()));
      return $qry;
    }
    
    public function getRegs(){
      return mysql_num_rows($this->getQuery());
    }
    
    public function fetch($query)
    {
      $query = $this->getQuery();
      
      $rows = array();
   
       while($row = mysql_fetch_assoc($query)) {
    			$rows[] = $row;
    		}
    		
    		return $rows;
    
    }
}
    
  

?>
