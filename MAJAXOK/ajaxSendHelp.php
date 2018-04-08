<?php
/**
 * Created by PhpStorm.
 * User: telaw
 * Date: 2018. 01. 24.
 * Time: 14:28
 */

$fnev = $_POST['fn'];
$fullPa = "../HELPERS/" . $fnev;

$van = file_exists($fullPa);
if(!$van)
{
   echo "nofile";
}
else
{
    $afile = file_get_contents($fullPa);
    echo $afile;
}





?>