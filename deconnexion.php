<?php
session_start();
$_SESSION['Id']="";
$_SESSION['role']=0;
header("Location:index.php");
?>