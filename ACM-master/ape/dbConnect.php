<?php

$conn = mysqli_connect("localhost","root","","acm_site") or die('Cannot connect');
mysqli_select_db($conn,'acm_site') or die('Cannot select DB');
?>
