<?php
		require_once("../includes/header.php");
?>
	<div class="formbody">
		<div class="secondbody">
			<h1>Come join us!</h1>
			<p>We are so excited to have you here. if you <br> haven't 
			already, create an account to get <br> access to create your own event, <br> 
		PLEASE CREATE AN ACCOUNT</p>
		<div class="alreadyhaveanaccount">
			<p>Already have an account? <a href="login.php">Signin.</a></p>
		</div>
		</div>
		<form action="profileprocess.php" method="post" enctype="multipart/form-data">
			<h1>Signup</h1>
			<div class="myform">
				<input type="text" name="name" id="user" placeholder="Enter Your Full Name e.g John Doe"> <br>
				<input type="email" id="email" name="email" placeholder="Enter Your Email e.g johndoe@demo.com" > <br>
				<input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number e.g 0123456789" > <br>
				<input type="file" id="file" name="file" > <br>
				<input type="password" id="password" name="passsword" placeholder="Enter Your Password" > <br>
				<input type="password" name="confirmpassword" placeholder="Confirm Password"> <br>
				<input type="submit" id="btn" name="signup" value="Signup" id="submit"> 
			</div>
		</form>
	</div>
	<?php
		require_once("../includes/footer.php");
	?> 