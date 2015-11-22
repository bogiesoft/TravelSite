<!--
Author: Mark Wilson
File: logout.php
SAIT OOSD Spring Track 2015
-->
<?php
session_start();
//Whent the user clicks the Log Out button in the header.php, this executes and destroys the $_SESSION
session_destroy();
header("Location: index.php");