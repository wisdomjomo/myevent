<?php
	include("profileinclude/profileheader.php");
	$data = new configuration();
	$id = $_GET['id'];
	$data->setid($id);

	if(isset($_POST['update'])) {
		$data->setname($_POST['name']);
		$data->setemail($_POST['email']);
		$data->setphone($_POST['phone']);

		// Check if file field is empty
		if (!empty($_FILES['file']['name'])) {
			$errors = array();
			$file_name = $_FILES['file']['name'];
			$file_size = $_FILES['file']['size'];
			$file_tmp = $_FILES['file']['tmp_name'];
			$file_type = $_FILES['file']['type'];
			$file_ext = strtolower(end(explode('.', $_FILES['file']['name'])));
			$extensions = array("jpeg", "jpg", "png");

			if (in_array($file_ext, $extensions) === false) {
				$errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
			}
			if ($file_size > 2097152) {
				$errors[] = 'File size must be exactly 2 MB';
			}
			if (empty($errors)) {
				move_uploaded_file($file_tmp, "../profileimg/".$file_name);
				$data->setfile($file_name);
			} else {
				print_r($errors);
				exit; // Stop execution if there are errors
			}
		} else {
			$data->setfile($user['file']); // Keep the existing file name
		}

		// Update the database
		echo $data->Edituser($_POST['name'], $_POST['email'], $_POST['phone'], $data->getfile(), $id);
		
		echo "<script>alert('Your Account has been updated successfully');document.location='profile.php'</script>";
		die();
	}

	$record = $data->fetchuser($id);
	// $user = $record[0];
?>
<form action="" method="post" enctype="multipart/form-data">
    <h1>Update Your Information</h1>
    <label for="fullName">Full Name:</label>
    <input type="text" id="fullName" name="name" value="<?= $user['name']; ?>">
    
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?= $user['email']; ?>">
    
    <label for="phone">Phone:</label>
    <input type="text" id="phone" name="phone" value="<?= $user['phone']; ?>">
    
    <label for="profilePicture">Profile Picture:</label>
    <div class="profile-picture">
      <img src="../profileimg/<?= $user['file']; ?>" alt="Profile Picture">
    </div>
    <input type="file" id="profilePicture" name="file">
    
    <input type="submit" value="Update" name="update">
  </form>
<?php 
	include("profileinclude/profilefooter.php");
?>