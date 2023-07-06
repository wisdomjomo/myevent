<?php
require_once("../configuration/eventconfiguration.php");
$myrecord = new eventconfig();

if(isset($_GET['id']) && isset($_GET['reg'])) {
    if($_GET['reg'] == "delete") {
        $myrecord->setid($_GET['id']);
        $myrecord->deletevent();
        echo "<script>alert('Event deleted Successfully');document.location='../userdata/profile.php'</script>";
    
    }
}
?>