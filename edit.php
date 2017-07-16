<?php 
	require('core/controller/utils.php');

	$id = $_REQUEST['id']; 
	$registro = $atividade->getAtividade($id);

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
	 <h3 class="page-header">Editar Dados da Atividade</h3>
	 <form id="frmeditar">
	 	  <input type="hidden" name="id_atividade" id="id_atividade" value="<?php echo $id; ?>" />
	 	  <div class="row">
			 <div class="form-group col-md-4">
			   <label for="nome">Nome da Atividade:</label>
			   <input type="text" class="form-control" id="nm_atividade" name="nm_atividade" placeholder="Nome" value="<?php echo $registro[0]['nm_atividade']; ?> ">
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="dtinicio">Data de Início:</label>
			   <input type="text" class="form-control" id="dt_inicio" name="dt_inicio" placeholder="Data de Início" value="<?php echo $registro[0]['dt_inicio']; ?>" >
			 </div>
			 
			 <div class="form-group col-md-4">
			   <label for="dtfim">Data de Término:</label>
			   <input type="text" class="form-control" id="dt_fim" name="dt_fim" placeholder="Data de Término" value="<?php echo $registro[0]['dt_fim']; ?>">
			 </div>
		  </div>		
		  <div class="row">
			 <div class="form-group col-md-6">
			   <label for="status">Status:</label>
			   <select class="form-control" id="id_status" name="id_status">
			   		<option value="">--Selecione--</option>	
			   		<?php foreach($listaStatus as $valor) {  
			   				$sel = ($valor['id_status'] == $registro[0]['id_status'])?'selected="selected"':'';
			   		?>
		        		<option value="<?php echo $valor['id_status']; ?>" <?php echo $sel; ?>><?php echo $valor['nm_status'];?></option>
		        	<?php } ?>	
			   </select>
			 </div>
			 
			 <div class="form-group col-md-6">
			   <label for="situacao">Situação:</label>
			   <select class="form-control" id="situacao" name="situacao">
			   		<option value="">--Selecione--</option>	
			   		<option <?php if ($registro[0]['situacao'] == 0 ) echo 'selected' ; ?> value="0">Desativado</option>
			   		<option <?php if ($registro[0]['situacao'] == 1) echo 'selected' ; ?> value="1">Ativo</option>
			   </select>
			 </div>
			 <div class="form-group col-md-6">
			 	<label for="descricao">Descrição:</label>
			 	<textarea class="form-control" rows="5" id="ds_atividade" name="ds_atividade" maxlength="600" placeholder="Digite a descrição"><?php echo $registro[0]['ds_atividade']; ?></textarea>
			 </div>
		</div>	
	  <!-- area de campos do form -->
		  <hr />
		  <div id="actions" class="row">
		    <div class="col-md-12">
		      <button type="button" class="btn btn-primary" id="atualizar">Atualizar</button>
		      <a href="index.php" class="btn btn-default">Cancelar</a>
		    </div>
		  </div>
	</form>
 </div>  <!-- /#main -->

</body>
</html>