<?php
session_start();

$taskCim = "";

if(isset($_POST['taskCime']))
{
    $taskCim = $_POST['taskCime'];
}
else
{
    echo "ERROR: no task cim.";
    exit;
}

if(!isset($_SESSION["tempide"]))
{
    echo "1";
    exit;
}


$temp = $_POST['tempid'];




if($temp !=  $_SESSION["tempide"])
{
    echo "1";
    exit;
}

$aFileNev = "../FELADATOK/" . $taskCim;

$afile = file_get_contents($aFileNev);
$fileArray = json_decode($afile);

echo $afile;




?>