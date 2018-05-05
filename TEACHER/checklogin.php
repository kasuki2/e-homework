<?php
session_start();
require_once "config.php";
$acr = "$2y$10$01xBy.dEmWE9yYXCzAHCTeTMrjzhSjzvHhoV3f0wf94Rxx.KKllXO"; // Kasuki2009
$acrS = '$2y$10$H1T6yJiVpnmHaXC3QKG7O.3lnktfZ3cXIsZL.8.NzNwq79LUNzfOK'; // 20092009
if(!isset($_SESSION["ajsz"]) || !CheckUser2($acr, $_SESSION["ajsz"]))
{

    header("Location: " . $TEACHER_LOGIN); /* Redirect browser */
    exit();
}



function CheckUser2($pass_crypt, $pass)
{
    if ($pass_crypt == password_verify($pass, $pass_crypt)) {
        return true;
    } else {
        return false;
    }
}


// $2y$10$01xBy.dEmWE9yYXCzAHCTeTMrjzhSjzvHhoV3f0wf94Rxx.KKllXO
?>
