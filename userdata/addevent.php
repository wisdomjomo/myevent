<?php
	include("profileinclude/profileheader.php");
?>
				<div class="form-container">
    <h1>Add a new event</h1>
<form action="../process/eventprocess.php" method="post" enctype="multipart/form-data">
    <div class="form-group">
      <label>Event Name:</label> 
      <input type="text" name="eventname"> 
    </div>
    <div class="form-group">
      <label>Event file:</label> <br>
      <input type="file" name="eventphoto">
    </div> 
    <div class="form-group">
      <label>Event Location:</label> 
      <input type="text" name="location">
    </div> 
    <div class="form-group">
      <label>Event Date</label> 
      <input type="date" name="datee">
    </div> 
    <div class="form-group">
      <label>Event Details:</label> 
      <textarea name="details"></textarea>
    </div>
    <input type="hidden" name="id">
    <div class="form-group">
      <input type="submit" name="addevent" value="Add Event">
    </div>
</form>
</div>
<?php 
	include("profileinclude/profilefooter.php");
?>
