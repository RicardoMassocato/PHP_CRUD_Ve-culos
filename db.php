<?php 
	
	class Database{
		private $dsn = "mysql:host=localhost;dbname=php_crud";
		private $user = "root";
		private $pass = "";
		public $conn;

		public function __construct(){
			try {
				$this->conn = new PDO($this->dsn,$this->user,$this->pass);
				//echo 'Conectado com Sucesso!';
			} catch (PDOException $e) {
				echo $e->getMessage();
			}
		}

		public function insert($marca, $modelo, $ano, $categoria){
			$sql = "INSERT INTO veiculo (bd_marca, bd_modelo, bd_ano, bd_categoria) VALUES (:marca, :modelo, :ano, :categoria)";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['marca'=>$marca,'modelo'=>$modelo,'ano'=>$ano,'categoria'=>$categoria]);

			return true;
		}

		public function read(){
			$data = array();
			$sql = "SELECT * FROM veiculo";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$data[] = $row;
			}
			return $data;
		}

		public function getVeiculoPorId($id){
			$sql = "SELECT * FROM veiculo WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			return $result;
		}		

		public function update($id, $marca, $modelo, $ano, $categoria){
			$sql = "UPDATE veiculo SET bd_marca = :marca, bd_modelo = :modelo, bd_ano = :ano, bd_categoria = :categoria WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['marca'=>$marca,'modelo'=>$modelo,'ano'=>$ano,'categoria'=>$categoria,'id'=>$id]);

			return true;
		}

		public function delete($id){
			$sql = "DELETE FROM veiculo WHERE id = :id";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute(['id'=>$id]);
			return true;
		}

		public function totalVeiculo(){
			$sql = "SELECT * FROM veiculo";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			$t_rows = $stmt->rowCount();
			return $t_rows;
		}
	}
?>