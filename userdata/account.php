<?php
	include("profileinclude/profileheader.php");
?>
	<div class="container">
    <h1>My Profile</h1>
    <div class="profile-picture">
      <img src="../profileimg/<?= $user['file']; ?>" alt="Profile Picture">
    </div>
    <div class="profile-details">
      <p><span class="label">Full Name:</span> <?= $user['name']; ?></p>
      <p><span class="label">Email:</span> <?= $user['email']; ?></p>
      <p><span class="label">Phone:</span> <?= $user['phone']; ?></p>
      <p><span class="label">Date Account was created:</span> <?= $user['date']; ?></p>
    </div>
  </div>
  <?php 
	include("profileinclude/profilefooter.php");
?>