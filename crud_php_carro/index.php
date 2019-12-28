<!DOCTYPE html>
<html lang="PT-br">

<head>
	<meta charset="utf-8">
	<meta name="author" content="Sahil Kumar">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>SafetyCar CRUD</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>
</head>

<body>
	<nav class="navbar navbar-expand-md bg-dark navbar-dark">
		<!-- Brand -->
		<a class="navbar-brand" href="#"><i class="fas fa-car"></i>&nbsp; SafetyCar</a>

		<!-- Toggler/collapsibe Button -->
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
			<span class="navbar-toggler-icon"></span>
		</button>

		<!-- Navbar links -->
		<div class="collapse navbar-collapse" id="collapsibleNavbar">
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">
					<a class="nav-link" href="#">Início</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">CRUD</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Sobre</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#">Contato</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="text-center text-danger font-weight-normal my-3">CRUD - Aplicação Usada: PHP-PDO, MySQL, Ajax e Bootstrap 4</h4>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-6">
				<h4 class="mt-2 text-primary">Todos os veículos no banco de dados!</h4>
			</div>
			<div class="col-lg-6">
				<button type="button" class="btn btn-primary m-1 float-right" data-toggle="modal" data-target="#addModal"><i class="far fa-plus-square"></i>&nbsp; Add Veículo</button>
			</div>
		</div>
		<hr class="my-1">
		<div class="row">
			<div class="col-lg-12">
				<div class="table-responsive" id="mostrarVeiculo">
					
				</div>
			</div>
		</div>
	</div>

	<!-- The Modal - Adicionar novo veículo -->
	<div class="modal fade" id="addModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Adicionar Veículo</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body px-4">
					<form action="" method="post" id="form-data">
						<div class="form-group">
							<input type="text" name="marca" class="form-control" placeholder="Marca" required>
						</div>
						<div class="form-group">
							<input type="text" name="modelo" class="form-control" placeholder="Modelo" required>
						</div>
						<div class="form-group">
							<input type="year" maxlength="4" name="ano" class="form-control" placeholder="Ano" required>
						</div>
						<div class="form-group">
							<input type="text" name="categoria" class="form-control" placeholder="Categoria" required>
						</div>
						<div class="form-group">
							<input type="submit" name="insert" id="insert" value="Adicionar novo" class="btn btn-primary btn-block">
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- The Modal - Editar veículo -->
	<div class="modal fade" id="editModal">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">

				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Editar Veículo</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>

				<!-- Modal body -->
				<div class="modal-body px-4">
					<form action="" method="post" id="edit-form-data">
						<input type="hidden" name="id" id="id">
						<div class="form-group">
							<input type="text" name="marca" class="form-control" id="marca" required>
						</div>
						<div class="form-group">
							<input type="text" name="modelo" class="form-control" id="modelo" required>
						</div>
						<div class="form-group">
							<input type="year" maxlength="4" name="ano" class="form-control" id="ano" required>
						</div>
						<div class="form-group">
							<input type="text" name="categoria" class="form-control" id="categoria" required>
						</div>
						<div class="form-group">
							<input type="submit" name="update" id="update" value="Atualizar Veículo" class="btn btn-primary btn-block">
						</div>

					</form>
				</div>

			</div>
		</div>
	</div>

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<!--Get your code at fontawesome.com-->
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<!--método para obter tabelas de dados (DataTables.net)-->
	<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>
	<!--Alerta POP-UP responsivo e personalizável (https://sweetalert2.github.io)-->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
	<script type="text/javascript">
		$(document).ready(function(){

			mostrarTodosVeiculos();

			function mostrarTodosVeiculos(){
				$.ajax({
					url: "action.php",
					type: "POST",
					data: {action:"view"},
					success:function(response){
						//console.log(response);
						$("#mostrarVeiculo").html(response);
						$("table").DataTable({
							order: [0, 'desc']
						});
					}
				});
			}

			// insert ajax request
			$("#insert").click(function(e){
				if($("#form-data")[0].checkValidity()){
					e.preventDefault();
					$.ajax({
						url: "action.php",
						type: "POST",
						data: $("#form-data").serialize()+"&action=insert",
						success:function(response){
							Swal.fire(
  								'Parabéns!',
					  			'Veículo adicionado com sucesso!',
					  			'success'
							)
							$("#addModal").modal('hide');
							$("#form-data")[0].reset();
							mostrarTodosVeiculos();
						}
					});
				}
			});

			// editar veículo
			$("body").on("click", ".editBtn", function(e){
				e.preventDefault();
				edit_id = $(this).attr('id');
				$.ajax({
					url: "action.php",
					type: "POST",
					data:{edit_id:edit_id},
					success:function(response){
						data = JSON.parse(response);
						$("#id").val(data.id);
						$("#marca").val(data.bd_marca);
						$("#modelo").val(data.bd_modelo);
						$("#ano").val(data.bd_ano);
						$("#categoria").val(data.bd_categoria);
					}
				});
			});

			// update ajax request
			$("#update").click(function(e){
				if($("#edit-form-data")[0].checkValidity()){
					e.preventDefault();
					$.ajax({
						url: "action.php",
						type: "POST",
						data: $("#edit-form-data").serialize()+"&action=update",
						success:function(response){
							//console.log(response);
							Swal.fire(
  								'Parabéns!',
					  			'Veículo atualizado com sucesso!',
					  			'success'
							)
							$("#editModal").modal('hide');
							$("#edit-form-data")[0].reset();
							mostrarTodosVeiculos();
						}
					});
				}
			});

			//Excluir ajax request
			$("body").on("click", ".delBtn", function(e){
				e.preventDefault();
				var tr = $(this).closest('tr');
				del_id = $(this).attr('id');
				Swal.fire({
				  title: 'Você tem certeza?',
				  text: "Você não poderá reverter isso!",
				  icon: 'warning',
				  showCancelButton: true,
				  confirmButtonColor: '#3085d6',
				  cancelButtonColor: '#d33',
				  cancelButtonText: 'Cancelar',
				  confirmButtonText: 'Sim, excluir!'
				}).then((result) => {
				  if (result.value) {
				  	$.ajax({
				  		url:"action.php",
				  		type: "POST",
				  		data:{del_id:del_id},
				  		success:function(response){
				  			console.log(response);
				  				tr.css('background-color', '#ff6666');
				  				Swal.fire(
				  					'Excluído!',
				  					'Veículo excluído com sucesso!',
				  					'success'
				  				)
				  				mostrarTodosVeiculos();
				  		}
				  	});
				  }
				});
			});	

			//mostrar detalhes do veículo
			$("body").on("click", ".infoBtn", function(e){
				e.preventDefault();
				info_id = $(this).attr('id');
				$.ajax({
					url:"action.php",
					type:"POST",
					data:{info_id:info_id},
					success:function(response){
						//console.log(response);
						data = JSON.parse(response);
						Swal.fire({
							title:'<strong>Info Veículo : ID('+data.id+')</strong>',
							icon: 'info',
							html: '<b>Marca : </b>'+data.bd_marca+'<br><b>Modelo : </b>'+data.bd_modelo+'<br><b>Ano : </b>'+data.bd_ano+'<br><b>Categoria : </b>'+data.bd_categoria,
						})
					}
				});
			});
		});
	</script>
</body>
</html>