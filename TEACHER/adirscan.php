<?php

$cod = $_POST['code'];

if($cod == 0)
{
    $dir = "../FELADATOK/";
}
elseif($cod == 1)
{
    $dir = "../HELPERS/";
}


if(isset($_POST['apath']))
{
   if($_POST['apath'] != "0")
   {
        $dir .= $_POST['apath'];
   }

}

// Sort in ascending order - this is default
$dirs = scandir($dir);
class folders
{
    public $name;
    public $dir;
}
$dirArr = array();

for($i=0;$i<count($dirs);$i++)
{
    if($dirs[$i] != "." && $dirs[$i] != "..")
    {
        $adir = new folders();
        $adir->name = $dirs[$i];
        $adir->dir = is_dir($dir . $dirs[$i]);
        array_push($dirArr, $adir);
    }
}

echo json_encode($dirArr);

//print_r($dirs);


?>