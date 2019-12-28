<?php  

	require_once 'db.php';
	$db = new Database();

	if(isset($_POST['action']) && $_POST['action'] == "view"){
		$output = '';
		$data = $db->read();
		if($db->totalVeiculo()>0){
			$output .= '<table class="table table-striped table-sm table-bordered">
						<thead>
							<tr class="text-center">
								<th>ID</th>
								<th>Marca</th>
								<th>Modelo</th>
								<th>Ano</th>
								<th>Categoria</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>';
			foreach ($data as $row) {
				$output .= '<tr class="text-center text-secondary">
								<td>'.$row['id'].'</td>
								<td>'.$row['bd_marca'].'</td>
								<td>'.$row['bd_modelo'].'</td>
								<td>'.$row['bd_ano'].'</td>
								<td>'.$row['bd_categoria'].'</td>
								<td>
									<a href="#" title="Ver Detalhes" class="text-success infoBtn" id="'.$row['id'].'"><i class="fas fa-info-circle fa-lg"></i></a>&nbsp;&nbsp;

									<a href="#" title="Editar" class="text-primary editBtn" data-toggle="modal" data-target="#editModal" id="'.$row['id'].'"><i class="fas fa-edit fa-lg"></i></a>&nbsp;&nbsp;
									
									<a href="#" title="Excluir" class="text-danger delBtn" id="'.$row['id'].'"><i class="fas fa-trash-alt fa-lg"></i></a>
								</td>
							</tr>';
			}
			$output .= '</tbody>
						</table>';
			echo $output;
		}
		else{
			echo '<h3 class="text-center text-secondary mt-5">:( Nenhum usuário presente no banco de dados!</h3>';
		}
	}

	if (isset($_POST['action']) && $_POST['action'] == "insert") {
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$ano = $_POST['ano'];
		$categoria = $_POST['categoria'];

		$db->insert($marca, $modelo, $ano, $categoria);
	}

	if (isset($_POST['edit_id'])) {
		$id = $_POST['edit_id'];

		$row = $db->getVeiculoPorId($id);
		echo json_encode($row);
	}

	if (isset($_POST['action']) && $_POST['action'] == "update") {
		$id = $_POST['id'];
		$marca = $_POST['marca'];
		$modelo = $_POST['modelo'];
		$ano = $_POST['ano'];
		$categoria = $_POST['categoria']; 

		$db->update($id, $marca, $modelo, $ano, $categoria);
	}

	if(isset($_POST['del_id'])){
		$id = $_POST['del_id'];

		$db->delete($id);
	}

	if (isset($_POST['info_id'])) {
		$id = $_POST['info_id'];

		$row = $db->getVeiculoPorId($id);
		echo json_encode($row);
	}

?>