<?php
if(isset($_POST['signup'])){
    require_once("../configuration/configuration.php");
    $sc = new configuration();
    $sc->setname($_POST['name']);
    $sc->setemail($_POST['email']);
    $sc->setphone($_POST['phone']);
    $sc->setfile($_FILES['file']['name']);
    // Check if file field is empty
	if (!empty($_FILES['file']['name'])) {
		$errors = array();
		$file_name = $_FILES['file']['name'];
		$file_size = $_FILES['file']['size'];
		$file_tmp = $_FILES['file']['tmp_name'];
		$file_type = $_FILES['file']['type'];
		$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
		$extensions = array("jpeg", "jpg", "png", "gif");

		if (in_array($file_ext, $extensions) === false) {
			$errors[] = "Extension not allowed, please choose a GIF, JPEG or PNG file.";
			}
			if ($file_size > 2097152) {
				$errors[] = 'File size must be exactly 2 MB';
			}
			if (empty($errors)) {
				move_uploaded_file($file_tmp, "../profileimg/".$file_name);
				$sc->setfile($file_name);
			} else {
				print_r($errors);
				exit; // Stop execution if there are errors
			}
		}
    $sc->setpasssword($_POST['passsword']);
    $sc->Insertuserinfo();
echo "<script>alert('Your Account has been created successfully');document.location='login.php'</script>";
}
?>

