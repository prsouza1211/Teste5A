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
	 <header class="text-center">
	 	<h3>Registro de Atividades</h3>
	 </header>
	 <div class="row">
 		<div class="col-md-3">
        	<h4>Lista de Atividades</h4>
    	</div>
 
	    <div class="col-md-9">
	       <div class="input-group h4">
		        <label for="status">Status:</label>
		        <select id="status" name="status">
		        	<option value="">--Selecione--</option>
		        	<?php foreach($listaStatus as $valor) { ?>
		        		<option value="<?php echo $valor['id_status']; ?>"><?php echo $valor['nm_status'];?></option>
		        	<?php } ?>	
		        </select> &nbsp;
		        <label for="situacao">Situação:</label>
		        <select id="situacao" name="situacao">
		        	<option value="">--Selecione--</option>
		        	<option value="1">Ativo</option>
		        	<option value="0">Inativo</option>
		        </select> &nbsp;
		        <button type="button" class="btn btn-primary btn-sm" id="pesquisar">Search</button>
		    </div>
	    </div>
 
	 </div> <!-- /#top -->
 
     <hr />
     <div id="list" class="row">
     	<div class="table-responsive col-md-12">
	        <table class="table table-striped" cellspacing="0" cellpadding="0">
	            <thead>
	                <tr>
	                    <th>Nome</th>
	                    <th>Data de Início</th>
	                    <th>Data de Término</th>
	                    <th>Status</th>
	                    <th>Situação</th>
	                    <th class="actions">Ações</th>
	                 </tr>
	            </thead>
	            <tbody id="atividades">
	 				<?php foreach($listaAtividades as $valor) { 

	 					if($valor['id_status'] == 4) {
	 						$class = "danger";
	 					}else{
	 						$class = "";
	 					}
	 				?>

		                <tr class="<?php echo $class;?>" id="<?php echo $valor['id_atividade'];?>">
		                    <td><?php echo $valor['nm_atividade']; ?></td>
		                    <td><?php echo $valor['dt_inicio']; ?></td>
		                    <td><?php echo $valor['dt_fim']; ?></td>
		                    <td><?php echo utf8_encode($valor['nm_status']); ?></td>
		                    <td><?php echo $valor['situacao']; ?></td>
		                    <td class="actions">
		                        <?php if($valor['id_status'] != 4) { ?>
		                        	<button type="button" class="btn btn-warning btn-xs editar"> Editar</button>
		                        <?php } ?>	
		                    </td>
		                </tr>
	 				<?php } ?>
	            </tbody>
	         </table>
 
     	</div>
     </div> <!-- /#list -->
 
     <div id="bottom" class="row">
     	<div class="col-md-2">
	        <a href="add.php" class="btn btn-primary pull-right h2">Incluir Nova Atividade</a>
	    </div>
     </div> <!-- /#bottom -->
 </div>  <!-- /#main -->

</body>
</html>