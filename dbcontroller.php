<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "locacaocarros";
	private $conn;

	function __construct() {
		$this->conn = $this->connectDB();
	}

	function connectDB() {
		$conn = mysqli_connect($this->host, $this->user, $this->password, $this->database);

		// Verifica se houve erro de conexão
		if (mysqli_connect_errno()) {
			die("Erro na conexão com o banco de dados: " . mysqli_connect_error());
		}

		return $conn;
	}

	function runQuery($query) {
		$result = mysqli_query($this->conn, $query);

		if (!$result) {
			die("Erro na consulta SQL: " . mysqli_error($this->conn));
		}

		$resultset = [];
		while ($row = mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}

		return $resultset;
	}

	function numRows($query) {
		$result = mysqli_query($this->conn, $query);

		if (!$result) {
			die("Erro na consulta SQL (numRows): " . mysqli_error($this->conn));
		}

		return mysqli_num_rows($result);
	}

	function executeQuery($query) {
		$result = mysqli_query($this->conn, $query);

		if (!$result) {
			die("Erro ao executar query: " . mysqli_error($this->conn));
		}

		return $result;
	}
}
?>
