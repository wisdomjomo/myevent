<?php
	include("profileinclude/profileheader.php");
	require_once("../configuration/eventconfiguration.php");
	$event = new eventconfig();
	$id = $_GET['id'];
	$event->setid($id);
	if(isset($_POST['updateevent'])) {
		$event->seteventname($_POST['eventname']);
		$event->setlocation($_POST['location']);
		$event->setdatee($_POST['datee']);
		$event->setdetails($_POST['details']);

		// Check if file field is empty
		if (!empty($_FILES['eventphoto']['name'])) {
			$errors = array();
			$file_name = $_FILES['eventphoto']['name'];
			$file_size = $_FILES['eventphoto']['size'];
			$file_tmp = $_FILES['eventphoto']['tmp_name'];
			$file_type = $_FILES['eventphoto']['type'];
			$file_ext = strtolower(end(explode('.', $_FILES['eventphoto']['name'])));
			$extensions = array("jpeg", "jpg", "png");

			if (in_array($file_ext, $extensions) === false) {
				$errors[] = "Extension not allowed, please choose a JPEG or PNG file.";
			}
			if ($file_size > 2097152) {
				$errors[] = 'File size must be exactly 2 MB';
			}
			if (empty($errors)) {
				move_uploaded_file($file_tmp, "../eventimg/".$file_name);
				$event->seteventphoto($file_name);
			} else {
				print_r($errors);
				exit; // Stop execution if there are errors
			}
			// Update the database
			echo $event->updateeventimg($_POST['eventname'], $_POST['location'],  $_POST['datee'], $_POST['details'], $event->geteventphoto(), $id);
			echo "<script>alert('updated Successfully');document.location='../userdata/profile.php'</script>";
		
			die();
		} 
		else {
			// Keep the existing file name
			// Update the database
			echo $event->updateevent($_POST['eventname'], $_POST['location'],  $_POST['datee'], $_POST['details'], $id);
			echo "<script>alert('updated Successfully');document.location='../userdata/profile.php'</script>";
		
		die();
			// print_r($user['eventphoto']);
			// die();
			
		}

		
	}

	$myrecord = $event->collectoneeventdata($id);
	$user = $myrecord;

	// Ensure 'eventphoto' key is set in the $user array
	if (!isset($user['eventphoto'])) {
		$user['eventphoto'] = ''; // Set a default value if 'eventphoto' is not set
	}
?>
<div class="form-container">
    <h1>Update your event</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label>Event Name:</label>
            <input type="text" name="eventname" value="<?= $user['eventname'] ?? ''; ?>">
        </div>
        <div class="profile-picture">
            <?php if (isset($user['eventphoto'])): ?>
                <img src="../eventimg/<?= $user['eventphoto']; ?>" alt="Profile Picture">
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label>Event file:</label><br>
            <input type="file" name="eventphoto">
        </div>
        <div class="form-group">
            <label>Event Location:</label>
            <input type="text" name="location" value="<?= $user['location'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label>Event Date</label>
            <input type="date" name="datee" value="<?= $user['datee'] ?? ''; ?>">
        </div>
        <div class="form-group">
            <label>Event Details:</label>
            <textarea name="details"><?= $user['details'] ?? ''; ?></textarea>
        </div>
        <div class="form-group">
            <input type="submit" name="updateevent" value="Update Event">
        </div>
    </form>
</div>
<?php 
	include("profileinclude/profilefooter.php");
?>