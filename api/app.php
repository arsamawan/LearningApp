<?php
require_once 'headers.php';

$conn = new mysqli('localhost', 'root', '', 'sob');



	if($_SERVER['REQUEST_METHOD'] === 'GET') {
        if(isset($_GET['id'])) {
            $id = $conn-> real_escape_string($_GET['id']);
            $sql = $conn->query("SELECT * FROM studentss WHERE id = '$id'");
            $data = $sql->fetch_assoc();
        } else {
            $data = array();
            $sql = $conn->query("SELECT * FROM studentss");
            while ($d = $sql->fetch_assoc()) {
                $data[] = $d;
            }
        }

		exit(json_encode($data)); //return json data
	}



/*if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$data = json_decode(file_get_contents("php://input"));
	$sql = $conn->query("INSERT INTO studentss (name, address, phone) VALUES ('".$data->name."','".$data->address."','".$data->phone."')");

	if($sql) {
		$data->id   = $conn-> insert_id;
		exit(json_encode($data));
	} else {
	exit (json_encode(array('status' => 'error')));
	}
}*/
/*if($_SERVER['REQUEST_METHOD'] === 'PUT') {
	
	if(isset($_GET['id'])) { 
	$id = $conn->real_escape_string($_GET['id']);
	$data = json_decode(file_get_contents("php://input"));
	$sql = $conn->query("UPDATE studentss SET name = '".$data->name."', address = '".$data->address."', phone = '".$data->phone."' WHERE id = '$id'");
	if($sql) { 
	exit(json_encode(array('status' => 'success')));
	} else { 
		exit(json_encode(array('status' => 'error')));
	}
	}
}*/
/*if($_SERVER['REQUEST_METHOD'] === 'DELETE') {

	if(isset($_GET['id'])) { 
	$id = $conn->real_escape_string($_GET['id']);
	$sql = $conn->query("DELETE FROM studentss WHERE id = '$id'");
	
	if($sql) { 
	exit(json_encode(array('status' => 'success')));
	
	} else { 
	exit(json_encode(array('status' => 'error')));
	}
	
	
	}

}*/

