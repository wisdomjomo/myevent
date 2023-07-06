<?php
session_start();
include("../configuration/configuration.php");
if (!isset($_SESSION['user_id'])) {
    header("location:../process/login.php");
    die();
}
  $fetchuser = new configuration();
  $result = $fetchuser->fetchuser($_SESSION['user_id']);
  $user = $result;
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="../assest/css/css1ss.css">
  <link rel="stylesheet" type="text/css" href="../assest/css/myaccount7.css">
  <link rel="stylesheet" type="text/css" href="../assest/css/updateaccount.css">
  <link rel="stylesheet" type="text/css" href="../assest/css/createevent4.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="  sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity=" sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script src="https://kit.fontawesome.com/ed19698af5.js" crossorigin="anonymous"></script>
  <title></title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
  <!-- <a class="navbar-brand" href="#">Vertical Navbar</a> -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto flex-column vertical-nav">
      <div class="myview">
          <img src="../profileimg/<?= $user['file']; ?>" style="width:70px; height:70px; border-radius: 50%; margin-left: 13px; margin-bottom: 15px;">
        <li class="nav-item">
          <b><?= $user['name']; ?></b>
        </li>
        <li class="nav-item">
          <b><small><?= $user['email']; ?></small></b>
        </li>
      </div>
      <li class="nav-item li">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-house"></i></div>
          <div><a class="nav-link" href="profile.php">Home</a></div>
        </div>
      </li>
      <li class="nav-item li">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-calendar-plus"></i></div>
          <div><a class="nav-link" href="addevent.php?id=<?=$user['id']?>">Create Event</a></div>
        </div>
      </li>
      <li class="nav-item li">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-user"></i></div>
          <div><a class="nav-link" href="account.php">Profile</a></div>
        </div>
      </li>
      </li>
      <li class="nav-item li">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-headset"></i></div>
          <div><a class="nav-link" href="contactus.php">Contact Us</a></div>
        </div>
      </li>
      <li class="nav-item li">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-circle-dollar-to-slot"></i></div>
          <div><a class="nav-link" href="#">Support Us</a></div>
        </div>
      </li>
      <li class="nav-item li">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-gear"></i></div>
          <div><a class="nav-link" href="#">Setting</a></div>
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
    <li class="nav-item">
        <!-- <input type="search" name="" id=""> -->
      </li>
      <li class="nav-item">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-user-pen"></i></div>
          <div><a class="nav-link" href="setting.php?id=<?=$user['id']?>">Edit Account</a></div>
        </div>
      </li>
      <li class="nav-item">
        <div class="jointo">
          <div class="goup"><i class="fa-solid fa-right-from-bracket"></i></div>
          <div><a class="nav-link" href="logout.php">Log Out</a></div>
        </div>
      </li>
    </ul>
  </div>
</nav>
<div class="main">
  <div class="cover">
  
    
 
