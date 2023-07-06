<?php
session_start();
if(isset($_POST['addevent'])){
    require_once("../configuration/eventconfiguration.php");
    $ev = new eventconfig();
    $ev->seteventname($_POST['eventname']);
    $ev->seteventphoto($_FILES['eventphoto']['name']);
    // Check if file field is empty
		if (!empty($_FILES['eventphoto']['name'])) {
			$errors = array();
			$file_name = $_FILES['eventphoto']['name'];
			$file_size = $_FILES['eventphoto']['size'];
			$file_tmp = $_FILES['eventphoto']['tmp_name'];
			$file_type = $_FILES['eventphoto']['type'];
			$file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
			$extensions = array("jpeg", "jpg", "png", "gif");

			if (in_array($file_ext, $extensions) === false) {
				$errors[] = "Extension not allowed, please choose a GIF, JPEG or PNG file.";
			}
			if ($file_size > 2097152) {
				$errors[] = 'File size must be exactly 2 MB';
			}
			if (empty($errors)) {
				move_uploaded_file($file_tmp, "../eventimg/".$file_name);
				$ev->seteventphoto($file_name);
			} else {
				print_r($errors);
				exit; // Stop execution if there are errors
			}
		} 
    $ev->setlocation($_POST['location']);
    $ev->setdatee($_POST['datee']);
    $ev->setdetails($_POST['details']);
    $ev->setuser_id($_SESSION['user_id']);
    $ev->addevent();
    // var_dump($_FILES);
    // var_dump($_POST);
    // var_dump($user_id);
    // echo "<script>alert('Your Event has been created successfully');document.location='../userdata/profile.php'</script>";
}
?>

