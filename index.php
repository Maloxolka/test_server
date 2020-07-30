<?php
require_once 'DBMethods.php';

$dbmethods = new DBMethods();

$data = json_decode(file_get_contents("test.json"));

$operation = $_GET["operation"];
if($operation == "insert") {
	echo $dbmethods->insert($data->name, $data->value);
} else if($operation == "update") {
	echo $dbmethods->update($data->id, $data->value);
} else if($operation == "get") {
	echo $dbmethods->get($data->id);
} else {
	echo "Invalid operation";
}
?>