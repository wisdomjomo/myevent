<?php
  include("profileinclude/profileheader.php");
	require_once("../configuration/eventconfiguration.php");
    $eventdata = new eventconfig();
    $result = $eventdata->collecteventdata();
?>
<?php
if(count($result)===0){
  echo "<div style='text-align:center; margin-top:18%;'><h4>No Events found</h4>
          <labe>click to start</label> <a href='addevent.php'>create event</a>
      </div>";
}
else{
			foreach($result as $key=>$user) {
       
				?>
	<div class="one" id="htmlContent">
      <div class="eventphoto">
        <img src="../eventimg/<?= $user['eventphoto'];?>">
      </div>
      <div class="eventdata">
        <p><span class="label">Event Name:</span> <span class="useee"> <?= $user['eventname']; ?></span></p>
        <p><span class="label">Event Location:</span> <span class="useee"> <?= $user['location']; ?></span></p>
        <p><span class="label">Event Date:</span> <span class="useee"> <?= $user['datee']; ?></span></p>
        <p><span class="label">Event Details:</span> <span class="useee"> <?= $user['details']; ?></span></p>
      </div>
      <div style="display: flex;">
        <button class="btnn"><a href="editevent.php?id=<?=$user['id']?>" style="color:#fff; text-decoration:none;">Edit Event</a></button> 
        <button class="btnnn"><a href="delete.php?id=<?=$user['id']?>&reg=delete" style="color:#fff; text-decoration:none;">Delete Event</a></button>
        <!-- <a  id="download" style="margin-left:25px; margin-top: 5px;"><i class="fa-sharp fa-solid fa-download"></i></a> -->
        <!-- <a id="download">Download</a> -->
      </div>
      </div>
      <?php
			}
    }
		?>
<?php 
	include("profileinclude/profilefooter.php");
?>