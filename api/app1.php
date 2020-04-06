<?php
require_once 'headers1.php';
$conn1 = new mysqli('localhost', 'root', '', 'sob');



	if($_SERVER['REQUEST_METHOD'] === 'GET') {
		if(isset($_GET['skill_id'])) {
		$skill_id = $conn1-> real_escape_string($_GET['skill_id']);
		$sql1 = $conn1->query("SELECT * FROM skills WHERE fields = '$skill_id'");
		$data1 = $sql1->fetch_assoc();
		} else {
			$data1 = array();
			$sql = $conn1->query("SELECT * FROM skills");
			while ($d = $sql->fetch_assoc()) {
			$data1[] = $d;
			}
		}
		exit(json_encode($data1)); //return json data

	
}
if($_SERVER['REQUEST_METHOD'] === 'POST') {

	$data1 = json_decode(file_get_contents("php://input"));
	$sql1 = $conn1->query("INSERT INTO skills (fields,description) VALUES ('".$data1->fields."','".$data1->description."')");
	
	if($sql1) {
		$data1->skill_id  = $conn1-> insert_id;
		exit(json_encode($data1));
	} else { 
	exit (json_encode(array('status' => 'error')));
	}
}
if($_SERVER['REQUEST_METHOD'] === 'PUT') {
	
	if(isset($_GET['skill_id'])) {
	$skill_id = $conn1->real_escape_string($_GET['skill_id']);
	$data1 = json_decode(file_get_contents("php://input"));
	$sql1 = $conn1->query("UPDATE skills SET fields = '".$data1->fields."', description = '".$data1->description."' WHERE skill_id = '$skill_id'");
	if($sql1) {
	exit(json_encode(array('status' => 'success')));
	} else { 
		exit(json_encode(array('status' => 'error')));
	}
	}
}
if($_SERVER['REQUEST_METHOD'] === 'DELETE') {

    if (isset($_GET['skill_id'])) {
        $skill_id = $conn1->real_escape_string($_GET['skill_id']);
        $sql1 = $conn1->query("DELETE FROM skills WHERE skill_id= '$skill_id'");

        if ($sql1) {
            exit(json_encode(array('status' => 'success')));

        } else {
            exit(json_encode(array('status' => 'error')));
        }


    }
}
