<?php
session_start();


$tepoId = $_SESSION["tempide"];
$userName = $_SESSION["felhasz"];
$aPassWord = $_SESSION["jelszo"];

//echo $tepoId . " " . $userName . " " . $aPassWord;

// userNev - this comes from js

if(trim($_POST['tempi']) != trim($tepoId))
{
    echo "9";
    exit;
}

$aFileNev = "../FELHASZ/ausers.json" ;


$afile = file_get_contents($aFileNev);
$fileArray = json_decode($afile);

$code = $_POST['cod'];

class accdata
{
    public $neve;
    public $bear;
    public $fox;
    public $owl;
    public $subm; // number of submitted hw
    public $opn; // date of opening account
    public $mai;
    public $notif; // e-mail about new hw assigned
    public $notif2; // e-mail about corrected hw
}

if($code == 0)
{
    $mac1 = 0;
    $mac2 = 0;
    $mac3 = 0;
    $bea = 0;
    $opn = 0;

    for($i=0;$i<count($fileArray);$i++)
    {
        if($fileArray[$i]->userName == $userName)
        {
            $apa = $fileArray[$i]->passw;
            if(CheckUser2($apa, $aPassWord))
            {
                $accd = new accdata();
                $accd->neve = $userName;
                $accd->bear = $fileArray[$i]->m1;
                $accd->fox = $fileArray[$i]->m2;
                $accd->owl = $fileArray[$i]->m3;
                $accd->subm = $fileArray[$i]->beadott;
                $accd->opn = $fileArray[$i]->opened;
                $accd->mai = $fileArray[$i]->omail;
                $accd->notif = $fileArray[$i]->mnotify;
                $accd->notif2 = $fileArray[$i]->mnotify2;


                break;
            }

        }
    }
sleep(1);
    echo json_encode($accd);

}

if($code == 1)
{
    for($i=0;$i<count($fileArray);$i++)
    {
        if($fileArray[$i]->userName == $userName)
        {
            $apa = $fileArray[$i]->passw;
            if(CheckUser2($apa, $aPassWord))
            {
               // törlés
                $userFold = $fileArray[$i]->myFolder;
                deleteUserDir("../USERS_HW/" . $userFold);
                unset($fileArray[$i]);
                $fileArray = array_values($fileArray);
                break;
            }
        }
    }

    $toment = json_encode($fileArray);
    file_put_contents($aFileNev, $toment);
    echo "Dada";
}


function deleteUserDir($dir)
{

    $it = new RecursiveDirectoryIterator($dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it,
        RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) {
        if ($file->isDir()){
            rmdir($file->getPathname());
        } else {
            unlink($file->getPathname());
        }
    }
    rmdir($dir);
}


function CheckUser2($pass_crypt, $pass)
{
    if ($pass_crypt == password_verify($pass, $pass_crypt)) {
        return true;
    } else {
        return false;
    }
}
