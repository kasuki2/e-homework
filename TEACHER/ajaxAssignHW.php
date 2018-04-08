<?php





class Homeworks
{
  public $assigned;
  public $submitted;
  public $corrected;
}

include_once("OneHomework.php"); // import class



// only first user



$code = $_POST['code'];

if($code == "0") {

    $feladatok = $_POST['tasks'];
    $felad = json_decode($feladatok); // 0= a feladat neve a tobbi a diákok nevei

    $feladatNeve = $felad->task; // ami a path to the file
    $userArr = $felad->users;

    for ($i = 0; $i < count($userArr); $i++) {
        assignTheHomeWork($userArr[$i]->myFolder, $feladatNeve, "no");

        // if user does not want a mail, or got one today,
        // then sendMail() returns "0';
        // otherwise it returns the e-mail address itself,
        // which can be used in the goMail() function
        $sendi = sendMail($userArr[$i]->userName);

        if ($sendi == "1") {
            echo " Today already got mail. ";
        } elseif ($sendi == "2") {
            echo " User does not want e-mail. ";
        } else {
            goMail($sendi);
            echo " Mail sent ";
        }

    }
}


if($code == "1") // student wants to redu the hw
{
    // userNeve + "&taskpa=" + apathja + "&code=1";
    class bubu
    {
        public $bub1;
    }

    $userName = $_POST['user'];
    $apa = $_POST['taskpa'];

    $userMapp = getUserFolder($userName);
    $abub = new bubu();
    if($userMapp != "")
    {
        assignTheHomeWork($userMapp, $apa, "yes");

        $abub->bub1 = $userName . " " . $apa;
    }
    else
    {
        $abub->bub1 = "error";
    }



echo json_encode($abub);
}

if($code == "2") // student delets his corrected homework
{
    $userName = $_POST['user'];
    $apa = $_POST['taskpa'];
    $taskID = $_POST['taskid'];

    $userMapp = getUserFolder($userName);

    $apth = "../USERS_HW/" . $userMapp . "/workfile.json";

    $afile = file_get_contents($apth);
    $fileArray = json_decode($afile);

    $correctedHW = $fileArray->corrected;
    $fileArray->corrected = array_values(array_filter($correctedHW, function($x) use($taskID) {return $x->id != $taskID;}));

    $toment = json_encode($fileArray);
    file_put_contents($apth, $toment);
    echo "OK";
}



function getUserFolder($userN)
{
    $apath = "../FELHASZ/ausers.json";
    $fullFile = file_get_contents($apath);
    $allUsers = json_decode($fullFile);
    $aret = "";
    for($i=0;$i<count($allUsers);$i++)
    {
        if ($allUsers[$i]->userName == $userN)
        {
            $aret = $allUsers[$i]->myFolder;
            break;
        }

    }

    return $aret;
}

function sendMail($userN)
{
    $apath = "../FELHASZ/ausers.json";
    $fullFile = file_get_contents($apath);
    $allUsers = json_decode($fullFile);

    $aret = "1"; // ok send
    for($i=0;$i<count($allUsers);$i++)
    {
        if($allUsers[$i]->userName == $userN)
        {
             $ifmail = $allUsers[$i]->mnotify;
            if($ifmail == "true") // kért-e mail értesítést?
            {
                $lastMail = $allUsers[$i]->lastMail;
                $today = date("Y-m-d");
                if($lastMail == $today)
                {
                    $aret = "1"; // kapott már
                }
                else
                {
                    $aret = $allUsers[$i]->omail;
                    $allUsers[$i]->lastMail = date("Y-m-d"); //
                    $toMent = json_encode($allUsers);
                    file_put_contents($apath, $toMent);
                }


            }
            else
            {
                $aret = "2"; // nem kér e-mailt
            }
            break;
        }
    }
    return $aret;
}

function goMail2($to)
{
    $subject = "New homework";
    $txt = "You have received some homework. If you feel like doing it now, go to your ehw account and check it: https://ehw.kashusoft.org";
    $headers = "From: immer2001@gmail.com;Content-Type:text/html;charset=utf-8";

    mail($to, $subject, $txt, $headers);
}

function goMail($to)
{
    $message = "You have received some homework! Feel like checking it out now? Then go to your ehw account: https://ehw.cloud";


    $subject = "new homework";
    $message = "You have received some new homework. If you wish to see it now, go to https://ehw.cloud.";
    $headers = "from: postmaster@ehw.cloud \n";
    $headers .= "X-mailer: phpWebmail \n";
    $ifsent = mail($to, $subject, $message, $headers);

    if($ifsent)
    {
        return "OK";
    }
    else
    {
        return "NO";
    }


}


function assignTheHomeWork($userFolder, $feladatNeve, $redone)
{


    $apth = "../USERS_HW/" . $userFolder . "/workfile.json";

    $afile = file_get_contents($apth);
    $fileArray = json_decode($afile);

    $cimPath = "..". DIRECTORY_SEPARATOR . "FELADATOK" . DIRECTORY_SEPARATOR .$feladatNeve;
    $cimTip = getTitle($cimPath);
    $acim = $cimTip[0];

    if ($fileArray == null) {
        $ujArr = array();


        $ujAdat = new OneHomework;
        $ujAdat->id = uniqid();
        $ujAdat->apath = $feladatNeve;
        $ujAdat->atitle = $acim;

        $date = new DateTime();
        $ujAdat->date1 = $date->format('Y-m-d');
        $ujAdat->correct = "-";
        $ujAdat->tipus = $cimTip[1]; // grammar type MC fill in, 1 provide answers fill in
        $ujAdat->viewed = "no";
        $ujAdat->redo = $redone;
        $ujAdat->perf = 0; // nem tudjuk, hibátlan-e

        array_push($ujArr, $ujAdat);

        $hws = new Homeworks;
        $hws->assigned = $ujArr;

        $toSave = json_encode($hws);
        file_put_contents($apth, $toSave);
        echo 'oke';
    } else {
        if (count($fileArray->assigned) <= 0) {
            $ujAdat = new OneHomework;
            $ujAdat->apath = $feladatNeve;
            $ujAdat->atitle = $acim;
            $ujAdat->id = uniqid();
            $ujAdat->correct = "-";
            $date = new DateTime();
            $ujAdat->date1 = $date->format('Y-m-d');
            $ujAdat->tipus = $cimTip[1]; // grammar type MC fill in, 1 provide answers fill in
            $ujAdat->viewed = "no";
            $ujAdat->redo = $redone;
            $ujAdat->perf = 0; // nem tudjuk, hibátlan-e

            $ujAdatok = array();
            array_push($ujAdatok, $ujAdat);
            $fileArray->assigned = $ujAdatok;
            $toSave = json_encode($fileArray);
            file_put_contents($apth, $toSave);
            echo 'oke 2';
        } else {
            $ujAdat = new OneHomework;
            $ujAdat->apath = $feladatNeve;
            $ujAdat->atitle = $acim;
            $ujAdat->correct = "-";
            $ujAdat->id = uniqid();
            $date = new DateTime();
            $ujAdat->date1 = $date->format('Y-m-d');
            $ujAdat->tipus = $cimTip[1]; // grammar type MC fill in, 1 provide answers fill in
            $ujAdat->viewed = "no";
            $ujAdat->redo = $redone;
            $ujAdat->perf = 0; // nem tudjuk, hibátlan-e

            array_push($fileArray->assigned, $ujAdat);
            $toSave = json_encode($fileArray);
            file_put_contents($apth, $toSave);
            echo 'oke 3';
        }
    }

}


function getTitle($feladatPath)
{
    // a path sg like this: "../FELADATOK/taskfile.json"
  //  echo $feladatPath;
  //  exit;
    $taskFile = file_get_contents($feladatPath);
    $taskArr = json_decode($taskFile);
    return array($taskArr->title, $taskArr->type);
}


 ?>
