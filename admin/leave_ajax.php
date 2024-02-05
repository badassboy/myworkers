<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM employees_leave");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-advert.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '
				<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#staticBackdrop">Send Email</button>
			  ';



	

	$employee = $result['employee'];
	$leave_type = $result['type'];
	$duration = $result['duration'];
	$starting = $result['starting_date'];
	$ending = $result['ending_date'];
	

	$json[] = array(
		
		"employee" => $employee,
		"leave_type" => $leave_type,
		"duration" => $duration,
		"starting" => $starting,
		"ending" => $ending,
		// "edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







