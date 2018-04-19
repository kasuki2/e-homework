<?php



$user = $_POST['user'];



$path = "../USERS_HW/" . $user . "/workfile.json";

$aFile = file_get_contents($path);
$file1 = json_decode($aFile);

$cod = $_POST['code'];

if($cod == 0)
{
    echo json_encode($file1);
}

if($cod == 1) // delete assigned hw
{
    $numbers = json_decode($_POST['numbers']);

        for($k=0;$k<count($numbers);$k++)
        {
            removeElement($numbers[$k]);
        }


    $toment = json_encode($file1);
    file_put_contents($path, $toment);

  //  echo json_encode($file1);
    echo count($numbers) . " element(s) deleted.";
}

function removeElement($id)
{
    global $file1;

    for($i=0;$i<count($file1->assigned);$i++)
    {
       if($file1->assigned[$i]->id == $id)
       {
           unset($file1->assigned[$i]);
       }
    }
    $file1->assigned = array_values($file1->assigned);
}


?>