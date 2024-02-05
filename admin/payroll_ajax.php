<?php

include("../database.php");
$db = DB();

$json = array();

$stmt = $db->prepare("SELECT * FROM payroll");
$stmt->execute();
while($result = $stmt->fetch(PDO::FETCH_ASSOC)){

	$id = $result['id'];
	
	$trash = '<a href="delete-advert.php?trash='.$id.'">
				<i class="fa fa-trash" aria-hidden="true"></i>
			  </a>';
	$edit = '<a href="edit-latest.php?edit='.$id.'">
				<i class="fa fa-pencil" aria-hidden="true"></i>
			  </a>';

	$email_icon = '
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Send Email
</button>
		

	';



	

	$employee = $result['employee'];
	$overtime = $result['overtime'];
	$bonus = $result['bonus'];
	$deduction = $result['deduction'];
	// $gender = $result['gender'];
	// $email_icon = $email_icon;
	

	$json[] = array(
		
		"employee" => $employee,
		"overtime" => $overtime,
		"bonus" => $bonus,
		"deduction" => $deduction,
		// "gender" => $gender,
		// "email_icon" => $email_icon,
		"edit" => $edit,
		"delete" => $trash
		
	);
		
}

// Echoinh array in json format
echo json_encode($json);

?>







