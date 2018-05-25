<?php


$userMappa = $_POST['tasks'];
$code = $_POST['code'];

if(isset($_POST['corrects']))
{
  $corrSor = $_POST['corrects'];
}
else {
  $corrSor = "null";
}

if(isset($_POST['remarks']))
{
    $remar = $_POST['remarks'];
}
else {
    $remar = "null";
}

if(isset($_POST['message']))
{
    $messa = $_POST['message'];
}
else {
    $messa = "null";
}

if(isset($_POST['perf']))
{
    $perfect = $_POST['perf'];
}
else
{
    $perfect = null;
}

include_once("OneHomework.php"); // import class




if($code == 0) {

    $apa = "../USERS_HW/" . $userMappa . "/workfile.json";
    $afile = file_get_contents($apa);
    $fileArr = json_decode($afile);

    if ($fileArr != null)
    {

        if (count($fileArr->submitted) != 0) {
            echo json_encode($fileArr->submitted);
        } else {
            echo "0";
        }
    } else {
        echo "1";
    }
}
elseif($code == 1 || $code == 2) // correct hw
{

    // ha code 1, akkor csak MC házi
    // ha code 2, akkor vonalas házi, még a corrected is át kell másolni


    $doText = $_POST['tasks'];
    $doArr = json_decode($doText); // at 0 in the array is the user mappa

    $corMail = sendMail($doArr[0]);

    if($corMail == "1")
    {
        echo " Today already got mail. ";
    }
    elseif($corMail == "2")
    {
        echo " User does not want e-mail. ";
    }
    else
    {
        goMail($corMail);
        echo " Mail sent ";
    }

    $apa = "../USERS_HW/" . $doArr[0] . "/workfile.json";
    $afile = file_get_contents($apa);

    $fileArr = json_decode($afile);

    //$beadott = $fileArr->submitted;


    $old = count($fileArr->submitted);
    $fullTaskArr = array(); // collect the full object into this

    $ujCorr = array();
    $ujSub = $fileArr->submitted;
    $temi = $fileArr->submitted;


    for($i=1;$i<count($doArr);$i++)
    {
        // DELETE SUBMITTED HOMEWORK
        $azide = $doArr[$i];
        $ujSub = array_values(array_filter($ujSub, function($v) use($azide) { if($v->id != $azide) return $v; } ));
    }


    // GET CORRECTED
    for($i=0;$i<count($fileArr->submitted);$i++)
    {
        for($g=1;$g<count($doArr);$g++)
        {
            if($fileArr->submitted[$i]->id == $doArr[$g])
            {
                array_push($ujCorr, $fileArr->submitted[$i]);
            }
        }
    }

    $fileArr->submitted = $ujSub;

    // CHECK IF REALLY PERFECT, NO MISTAKES AT ALL

    $perfi = False;
    for($i=0;$i<count($ujCorr);$i++)
    {
        if($ujCorr[$i]->redo == 'no')
        {
            $tipe = $ujCorr[$i]->tipus;
            if($tipe == 0 || $tipe == 2) // MC, ABC
            {
                if($perfect == "OK")
                {
                    $perfi = True;
                }
                else
                {
                    $perfi = False;
                }
            }
            elseif($tipe == 3) // vocab check if perfect
            {

                $tipArr = explode('_', $ujCorr[$i]->userTipps);
                $perfi = True;
                $t1 = "";
                $t2 = "";
                for($i=0;$i<count($tipArr)-1;$i++)
                {
                    $t1 .= $tipArr[$i] . "_";
                    $t2 .= $i . "_";
                    if($tipArr[$i] + 0 !== $i)
                    {
                        $perfi = False;
                        break;
                    }
                }


            }
            else // tipus 1 vonalas, tipus 5 és typus 6
            {
                // check if all
                $okek = explode("_", $corrSor);
                if(!in_array("NO", $okek)) // perfect homework!!!
                {
                    //$ujCorr[$i]->perf = 9;
                    $perfi = True;
                }


            }

            $aMap = json_decode($userMappa);

            if($perfi)
            {
                echo  upDateMacik($aMap[0]) . " Perfect, macik updated  ";
            }

            // update bears
        }




    }


    if($fileArr->corrected != null)
    {

        for($i=0;$i<count($ujCorr);$i++)
        {

            $ujCorr[$i]->correct = $corrSor;
            $ujCorr[$i]->remarks = $remar;
            $ujCorr[$i]->message = $messa;
            if($perfi)
            {
                $ujCorr[$i]->perf = 9; // perfect hw
            }
            else
            {
                $ujCorr[$i]->perf = 1; // not perfect hw
            }

            array_push($fileArr->corrected, $ujCorr[$i]);
        }
    }
    else
    {
        $upCorrs = array();

        for($i=0;$i<count($ujCorr);$i++)
        {
            $ujHW = new OneHomework;
            $ujHW->id = $ujCorr[$i]->id;
            $ujHW->apath = $ujCorr[$i]->apath;
            $ujHW->atitle = $ujCorr[$i]->atitle;
            $ujHW->userTipps = $ujCorr[$i]->userTipps;
            $ujHW->redo = $ujCorr[$i]->redo;
            $ujHW->perf = $ujCorr[$i]->perf;


            $date = new DateTime();
            $ujHW->date1 = $date->format('Y-m-d');
            $ujHW->message = $messa;
            $ujHW->tipus = $ujCorr[$i]->tipus; // MC grammar 1


            $ujHW->correct = $corrSor;
            $ujHW->remarks = $remar;

            if($perfi)
            {
                $ujHW->perf = 9; // perfect hw
            }
            else
            {
                $ujHW->perf = 1; // not perfect
            }

            /*
            if($ujCorr[$i]->tipus == 1 || $ujCorr[$i]->tipus == 3) // if vonalas gram or vocab
            {
               // $ujHW->correct = $ujCorr[$i]->correct;
                $ujHW->correct = $corrSor;
                $ujHW->remarks = $remar;
            }
            if($ujCorr[$i]->tipus == 2) // ABC grammar
            {
                $ujHW->remarks = $remar;
            }
            */

            $ujHW->viewed = "no";
            array_push($upCorrs, $ujHW);
        }



        $fileArr->corrected = $upCorrs;
       // echo count($fileArr->corrected);
    }

    /*
    $mind = "0- ";
    for($i=0;$i<count($ujCorr);$i++)
    {
        $mind = $mind . $ujCorr[$i]->id . " " . $ujCorr[$i]->apath;
    }
    */

    // saving
    $toment = json_encode($fileArr);
    file_put_contents($apa, $toment);
    echo "mentve";

}
elseif($code == 5) // recorrect hw, so get corrected hw
{
    $apa = "../USERS_HW/" . $userMappa . "/workfile.json";
    $afile = file_get_contents($apa);
    $fileArr = json_decode($afile);

    if ($fileArr != null)
    {

        if (count($fileArr->corrected) != 0) {

            echo json_encode($fileArr->corrected);
        } else {
            echo "0";
        }
    } else {
        echo "1";
    }
}
elseif($code == 6) // MANAGE ASSIGNED HW, DELETE THEM IF NECESSARY
{
    $apa = "../USERS_HW/" . $userMappa . "/workfile.json";
    $afile = file_get_contents($apa);
    $fileArr = json_decode($afile);

    if ($fileArr != null)
    {

        if (count($fileArr->assigned) != 0) {

            echo json_encode($fileArr->assigned);
        } else {
            echo "0";
        }
    } else {
        echo "1";
    }
}

function sendMail($userFold)
{
    $apath = "../FELHASZ/ausers.json";
    $fullFile = file_get_contents($apath);
    $allUsers = json_decode($fullFile);

    $aret = "1"; // ok send
    for($i=0;$i<count($allUsers);$i++)
    {
        if($allUsers[$i]->myFolder == $userFold)
        {
            $ifmail = $allUsers[$i]->mnotify2;
            if($ifmail == "true") // kért-e mail értesítést?
            {
                $lastMail = $allUsers[$i]->lastMail2;
                $today = date("Y-m-d");
                if($lastMail == $today)
                {
                    $aret = "1"; // kapott már
                }
                else
                {
                    $aret = $allUsers[$i]->omail;
                    $allUsers[$i]->lastMail2 = date("Y-m-d"); //
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



function goMail($to)
{

    $subject = "Corrected homework";
    $message = "Te teacher has corrected your homework! Feel like checking it out now? Then go to https://ehw.cloud";
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

function upDateMacik($userFold)
{
    $aFileNev = "../FELHASZ/ausers.json";
    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);


    $valto = 6;
    $megvan = "NINCS";
    for ($i = 0; $i < count($fileArray); $i++)
    {
        if ($fileArray[$i]->myFolder == $userFold)
        {

            $megvan = "OK";
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

    return $megvan;
}


?>
