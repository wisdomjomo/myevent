<?php
	include("profileinclude/profileheader.php");
?>
	<div class="form-container">
    <h1>Contact Us</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Name:</label> 
      <input type="text" name="eventname"> 
    </div>
    <div class="form-group">
      <label>Email:</label> <br>
      <input type="email" name="eventphoto">
    </div> 
    <div class="form-group">
      <label>Message:</label> 
      <textarea></textarea>
    </div> 
    <div class="form-group">
      <input type="submit" name="addevent" value="Send Message">
    </div>
</form>
</div>
		<?php 
	include("profileinclude/profilefooter.php");
?>