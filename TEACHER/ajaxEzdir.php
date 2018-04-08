<?php



$apath = $_POST['path'];



echo $apath;

$fils = scandir($apath);
$fils = array_values($fils);

$mind = "";
for($i=0;$i<count($fils);$i++)
{
    $fullPa = $fils[$i];
    if(is_dir($fils[$i]))
    {

        $mind .= "<span onclick='getPath(this);' ><span class='fullPa' > " . $fullPa  . " </span><span style='background-color:#00a100' >" . $fils[$i] . "</span></span><br />";
    }
    else
    {
        $mind .= "<span  ><span class='fullPa' > " . $fullPa  . " </span><span style='background-color:#efefef' >" . $fils[$i] . "</span></span><br />";
    }

}

echo $mind;

?>