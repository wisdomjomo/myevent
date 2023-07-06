<?php
require_once("../includes/header.php");
require_once("../configuration/eventconfiguration.php");
$eventdata = new eventconfig();
$result = $eventdata->alleventdata();
?>
	<div class="eventrow">
    <?php
			foreach($result as $key=>$user) {
       
				?>
	<div class="singleevent" >
      <div class="eventphoto">
        <img src="../eventimg/<?= $user['eventphoto'];?>">
      </div>
      <div class="eventdata">
        <p style="text-decoration:underline #2986cc 3px;"><?= $user['eventname']; ?></p>
        <p><span class="label">Event Date:</span> <?= $user['datee']; ?></p>
        <p style="color:#2986cc;"><span class="label">Event Location:</span> <?= $user['location']; ?></p>
        <div style="margin-top:7px; margin-left: 10px;">
        	<a  href="viewoneevent.php?id=<?=$user['id']?>" style="text-decoration: none; color:#2986cc;">View Event</a>
        </div>
      </div>
      </div>
      <?php
			}
		?>
	</div>
  <?php
		require_once("../includes/footer.php");
	?> 