<?php
/**
 * Created by PhpStorm.
 * User: telaw
 * Date: 2018. 03. 01.
 * Time: 20:39
 */


$afile = "";

if(isset($_POST['fileNev']))
{
    $afile = $_POST['fileNev'];
}


$directory = 'vocabgems';
$scanned_directory = array_values(array_diff(scandir($directory), array('..', '.')));

$numbefOffiles = count($scanned_directory);

$selectedFile = mt_rand(0, $numbefOffiles-1);

if($afile != "")
{
    $fullfile = file_get_contents("vocabgems/" . $scanned_directory[$selectedFile]);

    echo $fullfile . "<div></div>";
}
else
{
    echo "0";
}





?>