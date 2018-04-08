<?php



class user
{
    public $id;
    public $userName;
    public $passw;
    public $omail;
    public $group;
    public $tempid;
    public $myFolder;
}

$code = stripcslashes($_POST['code']);

$max = 10;

if(isset($_POST['num']))
{
    $max = $_POST['num'];
}


if($code == 1)
{
    if(isset($_POST['user']))
    {
        $username = $_POST['user'];
        // check user is password is okay
        $aFileNev = "../FELHASZ/ausers.json";

        $afile = file_get_contents($aFileNev);
        $userArray = json_decode($afile);
        $aMappa = "0";
        for($i=0;$i<count($userArray);$i++)
        {
            if($userArray[$i]->userName == $username)
            {
               $aMappa = $userArray[$i]->myFolder;
                break;
            }
        }

        if($aMappa != "0")
        {
            $hwFilePath = "../USERS_HW/" . $aMappa . "/workfile.json";
            $aWorkfile = file_get_contents($hwFilePath);


            if($aWorkfile != null)
            {
                $homeArr = json_decode($aWorkfile);
                $beadottHossz = count($homeArr->corrected);
                // show only the last $max of the corrected homework sheets
                if($beadottHossz > $max) // has to be shortened
                {
                    $homeArr->corrected = array_slice($homeArr->corrected, $beadottHossz - $max);
                    echo json_encode($homeArr);
                }
                else // send it as it is
                {
                    echo json_encode($homeArr);
                }
            }
            else
            {
                echo json_encode($aWorkfile);
            }
        }
        else
        {
            echo "valami nem jo";
        }

    }


}
else
{
    echo "code error";
}




?>