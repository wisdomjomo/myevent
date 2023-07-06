<?php
session_start();
	require_once("../includes/header.php");
  require_once("../configuration/eventconfiguration.php");
  $event = new eventconfig();
	$id = $_GET['id'];
	$event->setid($id);;
  $myrecord = $event->collectoneeventdataone($id);
	$user = $myrecord;
?>
	<div class="eventrow">
	<div class="singleevent" id = "htmlContent">
      <div class="eventphoto">
        <img src="../eventimg/<?= $user['eventphoto'];?>">
      </div>
      <div class="eventdata">
        <p style="text-decoration:underline #2986cc 3px;"><?= $user['eventname']; ?></p>
        <p><span class="label">Event Date:</span> <?= $user['datee']; ?></p>
        <p style="color:#2986cc;"><span class="label">Event Location:</span> <?= $user['location']; ?></p>
        <p><span class="label">Event Details:</span> <?= $user['details']; ?></p>
        <!-- <p><span class="label">Event Created by:</span> <?= $user['user_id']; ?></p> -->
      </div>
      </div>
	</div>
  <div style="display: flex; width:27%; margin:auto; margin-top:15px;">
        <a  id="download" title="download"><i class="fa-sharp fa-solid fa-download" style="font-size:25px;"></i></a>
      </div>
  <script type="text/javascript">
      function autoClick(){
        $("#download").click();
      }

      $(document).ready(function(){
        var element = $("#htmlContent");

        $("#download").on('click', function(){

          html2canvas(element, {
            onrendered: function(canvas) {
              var imageData = canvas.toDataURL("image/jpg");
              var newData = imageData.replace(/^data:image\/jpg/, "data:application/octet-stream");
              $("#download").attr("download", "image.jpg").attr("href", newData);
            }
          });

        });
      });
    </script>
  <?php
		require_once("../includes/footer.php");
	?> 