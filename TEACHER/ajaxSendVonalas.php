<?php

$code = $_POST['code'];





if($code == 0) {

    // just send the users tipps
    if (isset($_POST['studMappa'])) {
        $studFolder = $_POST['studMappa'];
    } else {
        echo "No studMappe.";
        exit;
    }

    if (isset($_POST['taskID'])) {
        $taskID = $_POST['taskID'];
    } else {
        echo "No taskID.";
        exit;
    }


    $filePath = "../USERS_HW/" . $studFolder . "/workfile.json";

    $afile = file_get_contents($filePath);

    $fileArr = json_decode($afile);
    $aTips = "";
    for ($i = 0; $i < count($fileArr->submitted); $i++) {
        if ($fileArr->submitted[$i]->id == $taskID) {
            $aTips = $fileArr->submitted[$i]->userTipps;
            break;
        }
    }
    if ($aTips == "") {
        echo "error";
    } else {
        echo $aTips;
    }
}
elseif($code == '1')
{
    if (isset($_POST['taskPath'])) {
        $taskPath = $_POST['taskPath'];
    } else {
        echo "No taskPath.";
        exit;
    }


    $filePath = "../FELADATOK/" . $taskPath;
    $afile = file_get_contents($filePath);
    echo $afile;

}
elseif($code == "5") // recorrect HW send from corrected
{
    // just send the users tipps
    if (isset($_POST['studMappa'])) {
        $studFolder = $_POST['studMappa'];
    } else {
        echo "No studMappe.";
        exit;
    }

    if (isset($_POST['taskID'])) {
        $taskID = $_POST['taskID'];
    } else {
        echo "No taskID.";
        exit;
    }


    $filePath = "../USERS_HW/" . $studFolder . "/workfile.json";

    $afile = file_get_contents($filePath);

    $fileArr = json_decode($afile);
    $aTips = "";
    for ($i = 0; $i < count($fileArr->corrected); $i++) {
        if ($fileArr->corrected[$i]->id == $taskID) {
           // $aTips = $fileArr->corrected[$i]->userTipps;
            $aTips = $fileArr->corrected[$i];
            break;
        }
    }
    if ($aTips == "") {
        echo "error";
    } else {
        echo json_encode($aTips);
    }
}
elseif($code == "7") // delete assigned homework
{
    $cont = $_POST['content'];
    $contObj = json_decode($cont);

    if(strlen($contObj->userfolder)<= 2)
    {
        echo "ERROR: No user folder.";
        return;
    }

    $filePath = "../USERS_HW/" . $contObj->userfolder . "/workfile.json";
    $afile = file_get_contents($filePath);
    $fileArr = json_decode($afile);

    $taskids = $contObj->taskids;
    if(count($taskids)<=0)
    {
        echo "ERROR: No tasks were chosen.";
        return;
    }
    for($t=0;$t < count($taskids);$t++)
    {
        for ($i = 0; $i < count($fileArr->assigned); $i++) {
             if ($fileArr->assigned[$i]->id == $taskids[$t]) {
                 unset($fileArr->assigned[$i]);

             }
        }
    }

    $fileArr->assigned = array_values($fileArr->assigned);

    // save changes
    $toment = json_encode($fileArr);
    file_put_contents($filePath, $toment);



}


?>