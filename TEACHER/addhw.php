<?php


$path = "../USERS_HW/Imre_0/workfile.json";

$afile = file_get_contents($path);

$filArr = json_decode($afile);

$corrhw = $filArr->corrected;

include_once("BigFrame.php");
include_once("OneHomework.php"); // import class

$egyTask = $corrhw[0];


$atasks = array();

for($i=0;$i<100;$i++)
{
   $ujTask = new OneHomework();
    $ujTask->id = uniqid();
    $ujTask->apath = $egyTask->apath;
    $ujTask->atitle = $egyTask->atitle;
    $ujTask->correct = $egyTask->correct;
    $ujTask->date1 = $egyTask->date1;
    $ujTask->message = $egyTask->message;
    $ujTask->perf = $egyTask->perf;
    $ujTask->redo = $egyTask->redo;
    $ujTask->remarks = $egyTask->remarks;
    $ujTask->tipus = $egyTask->tipus;
    $ujTask->userTipps = $egyTask->userTipps;
    $ujTask->viewed = $egyTask->viewed;

    array_push($filArr->corrected, $ujTask);

}

//var_dump($filArr->corrected);

$toment = json_encode($filArr);
file_put_contents($path, $toment);

echo "<br>";echo "<br>";

echo count($filArr->corrected);

?>