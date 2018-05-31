<?php


$code = $_POST['code'];



if($code == 0) // get user homework and corrections, remarks etc.
{
    $userDir = $_POST['user'];
    $taskid = $_POST['taskid'];


    $path = '../USERS_HW/' . $userDir . '/workfile.json';
    $afile = file_get_contents($path);
    $fileArr = json_decode($afile);

    $corrected = $fileArr->corrected;

    for($i=0;$i<count($corrected);$i++)
    {
        if($corrected[$i]->id == $taskid)
        {
            echo json_encode($corrected[$i]);
            break;
        }
    }


}

if($code == 1) // get the task file
{
    $taskPath = $_POST['taskPath'];
    $path = '../FELADATOK/' . $taskPath;
    $tFile = file_get_contents($path);
    $taskFileArr = json_decode($tFile);

    echo json_encode($taskFileArr);

}











?>