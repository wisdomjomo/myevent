<?php
session_start();
require_once("../includes/header.php");
require_once("../configuration/configuration.php");
$user = new configuration();
if(isset($_POST["login"])){
	$email = $_POST["email"];
	$passsword = $_POST["passsword"];
    // var_dump($_POST);
    $user_id = $user->login($email, $passsword);
	// var_dump($user_id);
	// die();
	if($user_id){
        // $_SESSION['login'] = $count;
        $_SESSION['user_id'] = $user_id;
        header('location:../userdata/profile.php');
	}
	else {
		echo '<script>
		alert("login failed. Invalied username or password")
		</script>';
	}
}
?>
	<div class="formbody">
		<div class="secondbody">
			<h1>Welcome Back</h1>
			<p>Thanks for choosing Jomo Event Planner</p>
		<div class="alreadyhaveanaccount">
			<p>Already have an account? <a href="signup.php">Sign up.</a></p>
		</div>
		</div>
		<form action="" method="post" enctype="multipart/form-data">
			<h1>Sign in</h1>
			<div class="myform">
				<input type="email" id="email" name="email" placeholder="Enter Your Email e.g johndoe@demo.com" required> <br>
				<input type="password" id="password" name="passsword" placeholder="Enter Your Password" required><br>
				<input type="submit" id="btn" name="login" value="Sign in" id="submit"> 
			</div>
		</form>
	</div>
	<?php
		require_once("../includes/footer.php");
	?> 