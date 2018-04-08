<?php
session_start();
require_once "config.php";
if(!isset($_SESSION["ajsz"]) ||  $_SESSION["ajsz"] != "Kasuki2009"  )
{
    header("Location: " . $TEACHER_LOGIN); /* Redirect browser */
    exit();
}

?>
