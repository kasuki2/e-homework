<?php
require_once "checklogin.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">
    <title>hw logs</title>


    <style>
        .userDiv
         {
             background-color: #b8f3ff;
            padding-left: 12px;
            padding-top: 6px;
            padding-bottom: 6px;
         }
        .hwTitle
        {
            padding-left: 36px;
            padding-top: 4px;
            padding-bottom: 4px;
        }
    </style>

</head>
<body style="background-color: #478166" >




<div style="width: 90%;margin-left: auto;margin-right: auto;background-color: white;padding: 36px">

    <?php
    $amenu = file_get_contents("menusor.html");
    echo $amenu;
    ?>

    <?php
class Hwhistory
{
public $user;
public $cont;
}

class Content
{
public $title;
public $path;
}
$apth = "assignedhw.json";

$afile = file_get_contents($apth);
$fileArray = json_decode($afile);

for($i=0;$i<count($fileArray);$i++)
{
    echo "<div class='userDiv' >" . $fileArray[$i]->user . "</div>";
    for($b=0;$b<count($fileArray[$i]->cont);$b++)
    {
        echo "<div class='hwTitle' >" . $fileArray[$i]->cont[$b]->date . " - <b>" . $fileArray[$i]->cont[$b]->title . "</b></div>";
    }

}


?>



</div>
</body>
</html>