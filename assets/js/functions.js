$(document).ready(function() {

	
	$(function() {
    	$("#dt_inicio").datepicker({dateFormat: 'dd-mm-yy'});
		$("#dt_fim").datepicker({dateFormat: 'dd-mm-yy'});
	});

	

	$('#pesquisar').click(function(event) {
		var status   = $("#status").val();
		var situacao = $("#situacao").val();
		var acao = 'buscar';
		
		var filtros = {};
    	filtros['status'] = status;
    	filtros['situacao'] = situacao;

    	$('#atividades').empty();

    	$.ajax({
		    type: "POST",
		    url: "core/controller/AtividadeController.php",
		    data: {filtros: filtros, acao: acao},
		    dataType: 'json',
		    success: function(dados){
		      	var table = '';
		      	for(var i=0;dados.length>i;i++){
		      		regs = dados[i];

		      		if(regs.id_status == 4) {
		      			classe = "danger";
		      		}else{
		      			classe = "";
		      		}	

		      		table = '<tr class='+classe+' id='+dados[i].id_atividade+'>';
		      		table += '<td>'+dados[i].nm_atividade+'</td>';
		      		table += '<td>'+dados[i].dt_inicio+'</td>';
		      		table += '<td>'+dados[i].dt_fim+'</td>';
		      		table += '<td>'+dados[i].nm_status+'</td>';
		      		table += '<td>'+dados[i].situacao+'</td>';
		      		table += '<td class="actions">';
		      		if(regs.id_status == 4) {
		      			table += '</td></tr>';
		      		}else{
		      			table += '<a class="btn btn-warning btn-xs" href="edit.php">Editar</a></td></tr>'
		      		}

		      		$('#atividades').append(table);
		      	}
		    }
		 });
});

	$('#cadastrar').click(function(event) {
		var nome = $("#nm_atividade").val();
		var dtinicio = $("#dt_inicio").val();
		var dtfim = $("#dt_fim").val();
		var status = $("#id_status").val();
		var situacao = $("#situacao").val();
		var descricao = $("#ds_atividade").val();

		var dados = $("#frmatividade").serialize();
		var acao = 'cadastrar';

		if(nome == '') {
			alert('Preencha o campo nome');
			$("#nm_atividade").focus();
			return false;
		}

		if(dtinicio == '') {
			alert("Digite uma data de inicio para a atividade.");
			$("#dt_inicio").focus();
			return false;
		}

		if(dtfim == '' && status == 4) {
			alert("Digite uma data de termino para a atividade.");
			$("#dt_fim").focus();
			return false;
		}

		if(descricao == '') {
			alert('Digite uma descricao para a atividade.');
			$("#ds_atividade").focus();
			return false;
		}
		
		$.post("core/controller/AtividadeController.php", {dados: dados, acao: acao},
			function(data){
				alert(data);
				window.location.replace("index.php");	
			});
		
	});


	$('.editar').click(function(event) {
		var id = $(this).closest('tr').attr('id');
		var acao = 'popular';

		$("#main").load('edit.php?id='+id);
		//
	});

	$('#atualizar').click(function(event) {
		var nome = $("#nm_atividade").val();
		var dtinicio = $("#dt_inicio").val();
		var dtfim = $("#dt_fim").val();
		var status = $("#id_status").val();
		var situacao = $("#situacao").val();
		var descricao = $("#ds_atividade").val();

		var dados = $("#frmeditar").serialize();
		var acao = 'atualizar';

		if(nome == '') {
			alert('Preencha o campo nome');
			$("#nm_atividade").focus();
			return false;
		}

		if(dtinicio == '') {
			alert("Digite uma data de inicio para a atividade.");
			$("#dt_inicio").focus();
			return false;
		}

		if(dtfim == '' && status == 4) {
			alert("Digite uma data de termino para a atividade.");
			$("#dt_fim").focus();
			return false;
		}

		if(descricao == '') {
			alert('Digite uma descricao para a atividade.');
			$("#ds_atividade").focus();
			return false;
		}
		
		$.post("core/controller/AtividadeController.php", {dados: dados, acao: acao},
			function(data){
				alert(data); 
				window.location.replace("index.php");	
			});
		
	});


});	