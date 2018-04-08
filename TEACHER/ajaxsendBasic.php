<?php


$fileToOpen = $_POST['openThis'];

$afile = file_get_contents("../FELADATOK/" . $fileToOpen);

$fileArray = json_decode($afile);

$cime = $fileArray->title;
$inst = $fileArray->instructions;
$tipe = $fileArray->type;

if(property_exists($fileArray, "exa"))
{
    $exa = $fileArray->exa;
}
else
{
    $exa = "";
}

if(property_exists($fileArray, "weight"))
{
    $wei = $fileArray->weight;
}
else
{
    $wei = "";
}

$cont = json_encode($fileArray->contents);

echo json_encode($fileArray);
//echo $cime . "~" . $inst . "~" . $tipe . "~" . $cont . "~" . $exa . "~" . "$wei";

?>
