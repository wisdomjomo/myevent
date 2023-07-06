<?php
		require_once("../includes/header.php");
		require_once("../configuration/eventconfiguration.php");
		$eventdata = new eventconfig();
		$result = $eventdata->homeeventdata();
	?> 
	<div class="home">
		<div class="section">
			<h1>Schedule your events 
			the easy way</h1>
			<p>You get to plan your events and automatically get notified close to your event date. A perfect site and app for event planners and basically anybody who likes to get their events planned out ahead of time. Now, you can't say you forgot that special day!!</p>
			<button><a href="../process/signup.php" style="color:#fff; text-decoration:none;">Get Started</a></button>
		</div>
		<div class="homeimg">
			<img src="images/home.jpg">
		</div>
	</div>
	<div class="up">
		<h2>Events</h2>
		<p>Make plans for future events; birthdays, graduation, conferences, parties and lots more.</p>
	</div>
	<div class="eventrow">
	<?php
			foreach($result as $key=>$user) {
       
				?>
	<div class="singleevent">
      <div class="eventphoto">
       <img src="../eventimg/<?= $user['eventphoto'];?>">
      </div>
      <div class="eventdata">
        <p><span class="label"> <?= $user['eventname']; ?></span></p>
        <p><span class="label">Event Location:</span> <?= $user['location']; ?></p>
        <p><span class="label">Event Date:</span> <?= $user['datee']; ?></p>
        <div style="margin-top:7px; margin-left: 10px;">
        	<a  href="viewoneevent.php?id=<?=$user['id']?>" style="text-decoration: none; color:#2986cc;">View Event</a>
        </div>
      </div>
      <div style="display: flex;">
        <!-- <a  id="download" style="margin-left:25px; margin-top: 5px;"><i class="fa-sharp fa-solid fa-download"></i></a> -->
        <!-- <a id="download">Download</a> -->
      </div>
      </div>
	  <?php
			}
		?>
	</div>
	<div class="up">
		<h2>Testimonials</h2>
	</div>
	<div class="testimony">
		<div class="testimony_section">
			<img src="images/per2.jpg">
			<p><b>James Micheal</b></p> 
			<p><b>Canada</b></p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia purus vitae dui scelerisque, at faucibus mauris pellentesque.</p>
		</div>
		<div class="testimony_section">
			<img src="images/per1.jpg">
			<p><b>Ruth Wendy</b></p>
			<p><b>United Kingdom</b></p>
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas lacinia purus vitae dui scelerisque, at faucibus mauris pellentesque.</p>
		</div>
	</div>
	<?php
		require_once("../includes/footer.php");
	?> 