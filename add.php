<?php 
	require('core/controller/utils.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/jquery-ui.css">
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/functions.js"></script>
</head>
<body>

<div id="main" class="container-fluid">
	 <h3 class="page-header">Adicionar Atividade</h3>
	 <form id="frmatividade">
	 	  <div class="row">
			 <div class="form-group col-md-4">
			   <label for="nome">Nome da Atividade:</label>
			   <input type="text" class="form-control" id="nm_atividade" name="nm_atividade" placeholder="Nome">
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="dtinicio">Data de Início:</label>
			   <input type="text" class="form-control" id="dt_inicio" name="dt_inicio" placeholder="Data de Início">
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="dtfim">Data de Término:</label>
			   <input type="text" class="form-control" id="dt_fim" name="dt_fim" placeholder="Data de Término">
			 </div>
		  </div>		
		  <div class="row">
			 <div class="form-group col-md-6">
			   <label for="status">Status:</label>
			   <select class="form-control" id="id_status" name="id_status">
			   		<option value="">--Selecione--</option>	
			   		<?php foreach($listaStatus as $valor) { ?>
		        		<option value="<?php echo $valor['id_status']; ?>"><?php echo $valor['nm_status'];?></option>
		        	<?php } ?>	
			   </select>
			 </div>
			 
			 <div class="form-group col-md-6">
			   <label for="situacao">Situação:</label>
			   <select class="form-control" id="situacao" name="situacao">
			   		<option value="">--Selecione--</option>	
			   		<option value="0">Desativado</option>
			   		<option value="1">Ativo</option>
			   </select>
			 </div>
			 <div class="form-group col-md-6">
			 	<label for="descricao">Descrição:</label>
			 	<textarea class="form-control" rows="5" id="ds_atividade" name="ds_atividade" maxlength="600" placeholder="Digite a descrição"></textarea>
			 </div>
		</div>	
	  <!-- area de campos do form -->
		  <hr />
		  <div id="actions" class="row">
		    <div class="col-md-12">
		      <button type="button" class="btn btn-primary" id="cadastrar">Salvar</button>
		      <a href="index.php" class="btn btn-default">Cancelar</a>
		    </div>
		  </div>
	</form>
 </div>  <!-- /#main -->

</body>
</html>