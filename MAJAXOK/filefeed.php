<?php


$fileToOpen = $_POST['taskCime'];
//$fileToOpen = $_GET['taskCime'];

$afile = file_get_contents("../FELADATOK/" . $fileToOpen);

$fileArray = json_decode($afile);

if($fileArray->type == 0 || $fileArray->type == 2)
{
    for($i=0;$i<count($fileArray->contents);$i++)
    {
        $fileArray->contents[$i]->solu = "fu";
    }
}
elseif($fileArray->type == 1)
{
    for($i=0;$i<count($fileArray->contents);$i++)
    {
        $fileArray->contents[$i]->solutions = "fu";
        $fileArray->contents[$i]->explain = "fu";
    }
}
elseif($fileArray->type == 5)
{
    for($i=0;$i<count($fileArray->contents);$i++)
    {
        $fileArray->contents->alterns = "fu";
    }
}
elseif($fileArray->type == 6)
{
    for($i=0;$i<count($fileArray->contents);$i++)
    {
        $fileArray->contents[$i]->alters = "fu";
    }
}






echo json_encode($fileArray);
?>
