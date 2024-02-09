<?php  
ini_set('display_errors', 1);
error_reporting(E_ALL);

require("database.php");

class Business{

	function testInput($data)
	{

		$data = trim($data);

        $data = stripslashes($data);

        $data = htmlspecialchars($data);

        return $data;
	}

	public function registerAdmin($email,$username,$password,$password2)
	{



		$dbh = DB();

		$validated_email = filter_var($email,FILTER_SANITIZE_EMAIL);
		

		if (strlen($password)<6) {
			echo '<div class="alert alert-danger" role="alert">Password too short</div>';
		}else if ($password != $password2) {
			echo '<div class="alert alert-danger" role="alert">Password does not match</div>';
		}elseif(!$validated_email){
			echo '<div class="alert alert-danger" role="alert">Invalid Email</div>';

		}

		else{
			$verified = "No";
			$hashed = password_hash($password,PASSWORD_BCRYPT);
			$stmt = $dbh->prepare("INSERT INTO admin(email,username,password,verified) VALUES(?,?,?,?)");
			$stmt->execute([$validated_email,$username,$hashed,$verified]);
			$inserted = $stmt->rowCount();
			if ($inserted>0) {
				return true;
			}else {
				return $dbh->errorInfo();
			}
		}
}

	
	
		

public function loginAdmin($username,$password)
{
		$dbh = DB();
		echo gettype($dbh);
		$stmt = $dbh->prepare("SELECT * FROM admin WHERE username = ?");

		$stmt->execute([$username]);
		$data = $stmt->fetch(PDO::FETCH_ASSOC);

		$count = $stmt->rowCount();
		if ($count == 1) {
			
			if (password_verify($password, $data['password'])) {
				return $data;
			}else{
				return false;
			}
			
		}else{
			return false;
		}
	}

	public function sendEmail($email)
	{
		$dbh = DB();

			// validate email
			
				try{

					// checking if user email already exist in the  system
					$stmt = $dbh->prepare("SELECT * FROM admin  WHERE email = ?");
					$stmt->execute([$email]);
					while ($data = $stmt->fetch(PDO::FETCH_ASSOC)) {
						$id = $data['id'];


						// Send email to user with the token in a link they can click on
							$to = $email;
							
							$subject = "Account Activation";
							
						// $msg = "Hi there, click on below link to reset your password<br> <a href=\"new_password.php?token=" . $token . "\">link</a>";

		$msg = "Click <a href='www.xsoftgh.com/booking/admin/activate.php?id=$id'>here</a> to activate your account";
									
							   

		  
		   	$headers[] = 'MIME-Version: 1.0';
		   	$headers[] = 'Content-type: text/html; charset=iso-8859-1';

		   
		   $email_sent = mail($to, $subject, $msg, implode("\r\n", $headers));
		   if ($email_sent) {
		   		return true;
		   }else {
		   	return false;
		   }
	


			}
		}catch(ErrorException $ex){
			echo "Message: ".$ex->getMessage();
		}
	}

	public function confirmEmail($id)
	{
		$dbh = DB();
		$stmt = $db->prepare("SELECT * FROM admin WHERE id = ?");
		$stmt->execute([$id]);
		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		if ($user) {

			if ($user['verified'] == "No") {
				$stmt = $dbh->prepare("UPDATE admin SET verified = 'yes' WHERE id=?");
				$stmt->execute([$id]);
				$data = $stmt->rowCount();
				if ($data>0) {
					return true;
				}else {
					return false;
				}
			}
			
		}else {
			echo "user account does not exist";
		}
		
	}


	public function registerEmployee($firstName,$lastName,$country,$mobile,$residence,$address,$city,
		$region,$gender,$emp_status,$department,$email,$file_name)
	{
		$dbs = DB();

		$dir = "adverts/images/";
		$file_name = $_FILES['photo']['name'];
		$file_size = $_FILES['photo']['size'];
		$file_type = $_FILES['photo']['type'];
		$file_tmp = $_FILES['photo']['tmp_name'];

		$test_file = $dir.basename($_FILES["photo"]["name"]);
		$file_ext = pathinfo($test_file, PATHINFO_EXTENSION);

		$extensions= array("jpeg","jpg","png","gif");

		if(in_array($file_ext,$extensions) === false){
		$errors[]="extension not allowed, please choose a JPEG or PNG file.";
		}

		// check if image already exist
		if (file_exists($file_name)) {
			$errors[]="file already exist";
		}

		// check for 2mb file
		if($file_size > 4097152) {
		$errors[]='File size must be exactly 2MB';
		}


	
		



		if (empty($errors)==true) {

			move_uploaded_file($file_tmp, "adverts/images/".$file_name);

$stmt = $dbs->prepare("INSERT INTO employees(firstName,lastName,country,mobile,residence,address,city,region,gender,emp_status,department,email,picture) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)");

$stmt->execute(array($firstName,$lastName,$country,$mobile,$residence,$address,$city,
		$region,$gender,$emp_status,$department,$email,$dir.$file_name));

$inserted = $stmt->rowCount();
if($inserted>0){
	return true;
}else {
	return false;
}


			
		}

		
	}

	public function getAllEmployees()
	{
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM employees");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function displayAdvert()
	{
		$db = DB();
		$stmt = $db->prepare("SELECT * FROM advert");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
		
	}

	// employee leave
	public function employeeLeave($employee,$leave_type,$duration,$starting,$ending,$note)
	{

		$db=DB();
		
			// insert data after all validation is passed
	$stmt =$db->prepare("INSERT INTO employees_leave(employee,type,duration,
		starting_date,ending_date,note) VALUES(?,?,?,?,?,?)");
	$stmt->execute([$employee,$leave_type,$duration,$starting,$ending,$note]);
	$inserted = $stmt->rowCount();
	if ($inserted>0) {
		return true;
	}else{
		return false;
	}

}

// display all leave details
	public function DisplayEmployeeLeave(){
		$db= DB();
		$stmt=$db->prepare("SELECT * FROM employees_leave");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}



	public function allContact(){
		$db= DB();
		$stmt=$db->prepare("SELECT * FROM contact");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function addNote($note,$id)
	{
		$db=DB();
		$stmt=$db->prepare("UPDATE contact SET note=? WHERE id=?");
		$stmt->execute([$note,$id]);
		$updated = $stmt->rowCount();
		if ($updated>0) {
			return true;
		}else {
			return false;
		}

	}

	


	public function Attendance($employee,$working_date,$time_out,$time_in)
	{
		$db=DB();
		
		
	$stmt =$db->prepare("INSERT INTO attendance(employee,working_date,time_in,time_out)VALUES(?,?,?,?)");
	$stmt->execute([$employee,$working_date,$time_in,$time_out]);
	$inserted = $stmt->rowCount();
		if ($inserted>0) {
			return true;
		}else {
			return false;
		}
		
	}

	public function displayAttendance()
	{

		$db= DB();
		$stmt=$db->prepare("SELECT * FROM attendance");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;

	}

	public function emailEmployees($to,$subject,$msg)
	{
		$db = DB();
		$send_email = mail($to, $subject, $msg);
		if ($send_email) {
			return true;
		}else {
			return false;
		}

	}


	public function payroll($employee,$overtime,$bonus,$deduction)
	{
		$db = DB();
		$stmt = $db->prepare("INSERT INTO  payroll(employee,overtime,bonus,deduction)
			VALUES(?,?,?,?)");
		$stmt->execute([$employee,$overtime,$bonus,$deduction]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}
	}

	public function jobdescription(array $jobArray){

		$title = $jobArray["title"];
		$level = $jobArray["level"];
		$job_type = $jobArray["job_type"];
		$salary = $jobArray["salary"];
		$duties = $jobArray["duties"];
		$note = $jobArray["note"];

		$db = DB();
		$stmt = $db->prepare("INSERT INTO  job_description(title,level,job_type,
			salary,duties,note) VALUES(?,?,?,?,?,?)");
		$stmt->execute([$title,$level,$job_type,$salary,$duties,$note]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}


		


	}
		

		



	public function getInvoice()
	{
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM invoice");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function editInvoice($id,$firstName,$lastName,$phone,$email,$invoice_date,$travel_country,$travel_purpose,$next_of_kin,$deposit,$balance,$note){
		
	}

	public function getEmail(){
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM admin");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function getCustomerEmail(){
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM contact");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}

	public function invoiceEmail(){
		$db=DB();
		$stmt=$db->prepare("SELECT * FROM invoice");
		$stmt->execute();
		$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}


	public function updateInfo($email,$info)
	{
		$db = DB();
		if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
			echo '<div class="alert alert-danger" role="alert">Invalid Email</div>';
			
		}else {
			$stmt = $db->prepare("UPDATE admin SET email = ? WHERE username =?");
			$stmt->execute([$email,$info]);
			$data = $stmt->rowCount();
			if ($data>0) {
				return true;
			}else {
				return false;
			}
		}

		
	}

	public function updatePassword($new_password, $cpwd,$info)
	{
		$db = DB();
		if (strlen($new_password)<6) {
			echo '<div class="alert alert-danger" role="alert">Password too short</div>';
			
		}elseif($new_password != $cpwd){
			echo '<div class="alert alert-danger" role="alert">Password does not match</div>';

		}else {

			$hashed = password_hash($new_password,PASSWORD_BCRYPT);

			$stmt = $db->prepare("UPDATE admin SET password = ? WHERE username =?");
		$stmt->execute([$hashed,$info]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

		}
	}

	public function deleteAccount($info){
		$db = DB();
		$stmt = $db->prepare("DELETE FROM admin WHERE username = ?");
		$stmt->execute([$info]);
		$data = $stmt->rowCount();
		if ($data>0) {
			return true;
		}else {
			return false;
		}

	}

		












}








?>