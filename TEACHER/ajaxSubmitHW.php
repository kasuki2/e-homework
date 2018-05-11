<?php

session_start();
// kuld = "user=" + userNAME + "&pw=" + userPASS + "&tempid=" + tempID + "&taskID=" + globFeladatID + "&tipps=" + userTipps;

$user = $pass = $tempid = $taskID = $Tipps = "";
$taskType = "0";

if(isset($_POST['code']))
{
    $code = $_POST['code'];
}
else
{
    echo "ERROR: no code;";
    exit;
}


if(isset($_POST['user']))
{
    $user = $_POST['user'];
}
else
{
    echo "ERROR: no user;";
    exit;
}


if(isset($_POST['pw']))
{
    $pass = $_POST['pw'];
}
else
{
    echo "ERROR: no pw;";
    exit;
}


$tempid = $_POST['tempid'];
if(!isset($_SESSION["tempide"]))
{
    echo "1";
    exit;
}
else
{
    if($tempid !=  $_SESSION["tempide"])
    {
        echo "1";
        exit;
    }
}



if(isset($_POST['taskID']))
{
    $taskID = $_POST['taskID'];
}
else
{
    echo "ERROR: no taskID;";
    exit;
}



class Homeworks
{
    public $assigned;
    public $submitted;
    public $corrected;
}

include_once("OneHomework.php"); // import class





if($code == 0)
{

    if(isset($_POST['tipps']))
    {
        $Tipps = $_POST['tipps'];
    }
    else
    {
        echo "ERROR: no tipps;";
        exit;
    }
//taskName
    if(isset($_POST['taskName']))
    {
        $taskName = $_POST['taskName'];
    }
    else
    {
        echo "ERROR: no taskName;";
        exit;
    }

    if(isset($_POST['cime']))
    {
        $taskCim = $_POST['cime'];
    }
    else
    {
        echo "ERROR: no task cime";
        exit;
    }
    if(isset($_POST['tip']))
    {
        $taskType = $_POST['tip'];
        if($taskType != 0 && $taskType != 1 && $taskType != 2 && $taskType != 3 && $taskType != 5 && $taskType != 6)
        {
            echo "ERROR: No such task type: " . $taskType . ".";
            exit;
        }
        else
        {
                // check user input when type vonalas, type 5 and 6
                $maxi = 150;
                if($taskType == 1) // vonalas, max 50 chr in one answer
                {
                    $maxi = 50;
                }
                elseif($taskType == 5)
                {
                    $maxi = 60;
                }
                elseif($taskType == 6)
                {
                    $maxi = 150;
                }
                else
                {
                    $maxi = 8;
                }

                if($taskType == 1 || $taskType == 5 || $taskType == 6)
                {
                    $tippArray = json_decode($Tipps); // tipps are sent here in JSON
                    for($i=0;$i<count($tippArray);$i++)
                    {
                        if(strlen($tippArray[$i]) > $maxi)
                        {
                            echo "ERROR: The submitted text is too long - 5 6.";
                            exit;
                        }
                    }
                    // vissza kell alakítani az array-t erre a formátumra: valami_GGG_szoveg_szoveg_GGG_
                    $Tipps = "";
                    for($i=0;$i<count($tippArray);$i++)
                    {
                       $Tipps .= $tippArray[$i] . "_";
                    }
                }







        }
    }
    else
    {
        echo "ERROR: no task type.";
    }
    if(isset($_POST['redone']))
    {
        $redone = $_POST['redone'];
    }
    else
    {
        $redone = "no";
    }




    $aFileNev = "../FELHASZ/ausers.json";


    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);

// check user and password
    $userok = false;
    $userMapp = "";
    for ($i = 0; $i < count($fileArray); $i++) {
        if ($fileArray[$i]->userName == $user) {
            $apa = $fileArray[$i]->passw;
            if (CheckUser2($apa, $pass)) {
                $userok = true;
                $userMapp = $fileArray[$i]->myFolder;
                $bea = $fileArray[$i]->beadott;
                $sendMail = $fileArray[$i]->tempid;
                $maiDatum = date("Y-m-d");
                if(trim($sendMail) != trim($maiDatum))
                {
                    $fileArray[$i]->tempid = $maiDatum;
                    sendTeacherMail($fileArray[$i]->userName);
                }
                $fileArray[$i]->beadott = $bea + 1;

                break;
            }
        }

    }

    if ($userok) {
        // SAVE UPDATEDEN NUMBER OF SUBMITTED HOMEWORK
        $menteni = json_encode($fileArray);
        file_put_contents($aFileNev, $menteni);

        $myPath = "../USERS_HW/" . $userMapp . "/workfile.json";
        $homeworkFile = file_get_contents($myPath);

        $homeworkArr = json_decode($homeworkFile);

        // IS THIS ID IN THE SUBMITTED TASKS ALREADY?
        // IF YES, YOU CANNOT SUBMIT IT - CANNOT SUMBIT IT TWOCE



        $old = count($homeworkArr->assigned);
        // DELETE TASK FROM ASSIGNED
        $ujAss = array_values(array_filter($homeworkArr->assigned, function ($v) use ($taskID) {
            if ($v->id != $taskID) return $v;
        }));
        $homeworkArr->assigned = $ujAss;

        for($v=0;$v<count($homeworkArr->submitted);$v++)
        {
            if($homeworkArr->submitted[$v]->id == $taskID)
            {
                echo "This task has already been submitted and lost forever.";
                $toment = json_encode($homeworkArr);
                file_put_contents($myPath, $toment);
                exit;
            }
        }


        if ($homeworkArr->submitted != null) {

            $ujHW = new OneHomework;
            $ujHW->id = $taskID;
            $ujHW->apath = $taskName;
            $ujHW->atitle = $taskCim;
            $ujHW->userTipps = $Tipps; // ez a legfontosabb !!!
            $date = new DateTime();
            $ujHW->date1 = $date->format('Y-m-d');
            $ujHW->tipus = $taskType;
            $ujHW->viewed = "no";
            $ujHW->redo = $redone;
          //  $ujHW->remarks = "-";
          //  $ujHW->message = "-";

            array_push($homeworkArr->submitted, $ujHW);
            $toment = json_encode($homeworkArr);
            file_put_contents($myPath, $toment);
            echo "0";


        } else {

            $ujHW = new OneHomework;
            $ujHW->id = $taskID;
            $ujHW->apath = $taskName;
            $ujHW->atitle = $taskCim;
            $ujHW->userTipps = $Tipps; // ez a legfontosabb !!!
            $date = new DateTime();
            $ujHW->date1 = $date->format('Y-m-d');
            $ujHW->tipus = $taskType;
            $ujHW->viewed = "no";
            $ujHW->redo = $redone;
          //  $ujHW->remarks = "-";
          //  $ujHW->message = "-";

            $ujHWs = array();

            array_push($ujHWs, $ujHW);
            $homeworkArr->submitted = $ujHWs;

            $toment = json_encode($homeworkArr);
            file_put_contents($myPath, $toment);
            echo "0";


        }


    } else {
        echo "Ön nincs regisztrálva itt.";
    }
//echo count($fileArray);

}
elseif($code == 1 || $code == 2) // NEM HIÁBTALN, SZÓVAL CSAK VIEw THE TASK
{
    $aFileNev = "../FELHASZ/ausers.json";


    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);

// check user and password
    $userok = false;
    $userMapp = "";
    for ($i = 0; $i < count($fileArray); $i++) {
        if ($fileArray[$i]->userName == $user) {
            $apa = $fileArray[$i]->passw;
            if (CheckUser2($apa, $pass)) {
                $userok = true;
                $userMapp = $fileArray[$i]->myFolder;
                break;
            }
        }

    }

    if($userok) // FIND TASK AND SET VIEWED TO YES
    {
        $myPath = "../USERS_HW/" . $userMapp . "/workfile.json";
        $homeworkFile = file_get_contents($myPath);

        $homeworkArr = json_decode($homeworkFile);
        $mevan = "nincs";
        $alle = "";
        for($k=0;$k<count($homeworkArr->corrected);$k++)
        {
          //  $alle = $alle . $homeworkArr->corrected[$k]->id . " - ";
            if(strcmp($homeworkArr->corrected[$k]->id, $taskID) == 0)
            {
                $mevan = "OKOK";
                $date = new DateTime();
                $homeworkArr->corrected[$k]->viewed = $date->format('Y-m-d H:i:s');
                break;
            }

        }

        $toment = json_encode($homeworkArr);
        file_put_contents($myPath, $toment);
      //  echo "viewed entered " . $homeworkArr->corrected[$i]->id . " küldött: " . $taskID . " " . $mevan;

        echo  $mevan;
    }
    else
    {
        echo "ERROR, NO USER.";
    }

    // ha hibátlan is, akkor update macik
    if($code == 9)
    {
        /*
        $valto = 6;
        $userMapp = "";
        for ($i = 0; $i < count($fileArray); $i++)
        {
            if ($fileArray[$i]->userName == $user)
            {


                    $mac1 = $fileArray[$i]->m1;
                    $mac2 = $fileArray[$i]->m2;
                    $mac3 = $fileArray[$i]->m3;

                    if($mac1 == $valto)
                    {
                        $fileArray[$i]->m1 = 0;
                        if($mac2 == $valto)
                        {
                            $fileArray[$i]->m2 = 0;
                            $mac3++;

                            $fileArray[$i]->m3 = $mac3;
                        }
                        else
                        {
                            $mac2++;
                            $fileArray[$i]->m2 = $mac2;
                        }
                    }
                    else
                    {
                        $mac1++;
                        $fileArray[$i]->m1 = $mac1;
                    }

                    // save
                    $toMent = json_encode($fileArray);
                    file_put_contents($aFileNev, $toMent);

                  //  echo " HIBÁTLAN IS";
                    break;

            }

        }
        */
    }
}




/*
               $mac1 = $fileArray[$i]->m1;
               $mac2 = $fileArray[$i]->m2;
               $mac3 = $fileArray[$i]->m3;

               if($mac1 == $valto)
               {
                   $mac1 = 0;
                   if($mac2 == $valto)
                   {
                       $mac2 = 0;
                       $mac3++;
                       $fileArray[$i]->m3 = $mac3;
                   }
                   else
                   {
                       $mac2++;
                       $fileArray[$i]->m2 = $mac2;
                   }
               }
               else
               {
                   $mac1++;
                   $fileArray[$i]->m1 = $mac1;
               }

               // save
               $toMent = json_encode($fileArray);
               file_put_contents($aFileNev, $toMent);

               */
function CheckUser2($pass_crypt, $pass)
{
    if ($pass_crypt == password_verify($pass, $pass_crypt)) {
        return true;
    } else {
        return false;
    }
}

function sendTeacherMail($userNeve)
{
    $message = $userNeve . " submitted some homework.";

// In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70, "\r\n");

// $headers = "From: kashusof@s5.tarhely.com;Content-Type:text/html;charset=utf-8";
// Send
    mail("immer2001@gmail.com", 'Homework sumbitted', $message);
}

?>
