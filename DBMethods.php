<?php
class DBMethods
{
	private $host = '127.0.0.1';
	private $user = 'mysql';
	private $db = 'test_db';
	private $pass = '8547';
	private $conn;

	public function __construct() {

		$this->conn = new PDO("mysql:dbname=" . $this->db . "; host=" . $this->host, $this->user, $this->pass);
		$this->conn->query("SET NAMES 'utf-8'");
		$this->conn->query("SET CHARACTER SET 'utf8'");

    }

	public function insert($id, $name, $value) {
		$sql = 'INSERT INTO `test` SET id = :id, name = :name, value = :value';
		
		$query = $this->conn->prepare($sql);
		$query->execute(array(
			':id' => $id,
			':name' => $name,
			':value' => $value
		));
		$report = "Item has been added with id = " . $id;
		return $report;
	}
	
	public function update($id, $value) {
		$sql = 'UPDATE `test` SET value = :value WHERE id = :id';
		
		$query = $this->conn->prepare($sql);
		$query->execute(array(
			':id' => $id,
			':value' => $value
		));
		$report = "Item has been updated with id = " . $id;
		return $report;
	}
	
	public function get($id) {
		$sql = 'SELECT * FROM `test` WHERE id = :id';
		
		$query = $this->conn->prepare($sql);
		$query->execute(array(
			':id' => $id
		));
		$data = $query->fetchObject();
		$report = "id = " . $data->id . ", name = " . $data->name . ", value = " . $data->value;
		return $report;
}	
?>
