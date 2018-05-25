<?php
session_start();

// kuld = "user=" + userNev + "&amail=" + emailAdd + "&group1=" + groupTo + "&pw=" + pass1 + "&code=" + "0"; // code 0 registration


$jelszo = $userNeve = $amail = $group = $code = "";

$aMail = "";
$aGroup = "";

class user
{
    public $id;
    public $userName;
    public $passw;
    public $omail;
    public $group;
    public $tempid;
    public $myFolder;
    public $mnotify; // bool send mail when new hw sent
    public $mnotify2; // bool send mail when corrected hw sent
    public $m1;
    public $m2;
    public $m3;
    public $beadott;
}

$aFileNev = "../FELHASZ/ausers.json";
// CODE
if(isset($_POST['code']))
{
    $code = $_POST['code'];
}
else
{
    echo "Code error.";
    exit;
}


if($code == 5) // CHANGE E-MAIL
{
    if(isset($_POST['user']))
    {
        $aUser = $_POST['user'];
    }
    else
    {
        echo "noname";
        exit;
    }
    if(isset($_POST['pw']))
    {
        $apassw = $_POST['pw'];
    }
    else
    {
        echo "nopw";
        exit;
    }
    if(isset($_POST['ujmail']))
    {
        $ujmail = $_POST['ujmail'];
        if(checkMail($ujmail))
        {
            //echo "jó az új mail " . $aUser . " " . $apassw;
            $afile = file_get_contents($aFileNev);
            $fileArray = json_decode($afile);
            $mailok = false;

            $vane = array_values(array_filter($fileArray, function($it) use ($ujmail) { if($it->omail == $ujmail) return true; }));
            if(count($vane)!=0)
            {
                echo "1"; // used by someone else
                exit;
            }
            for($i=0;$i<count($fileArray);$i++)
            {
                if($fileArray[$i]->userName == $aUser)
                {
                    $apa = $fileArray[$i]->passw; // check password
                    if(CheckUser2($apa, $apassw))
                    {

                        $fileArray[$i]->omail = $ujmail;
                        $toSave = json_encode($fileArray);
                        file_put_contents($aFileNev, $toSave); // SAVE WITH THE NEW EMAIL ADDRESS
                        $mailok = true;
                        break;
                    }
                }
            }

            if($mailok)
            {
                echo "0"; // success
            }
            else
            {
                echo "2"; // error
            }
        }
        else
        {
            echo "3"; // not valid e-mail
            exit;
        }
    }
    else
    {
        echo "mailno";
        exit;
    }
}

if($code == 6) // GET E-MAIL WHEN NEW HW ASSIGNED
{
    if(isset($_POST['user']))
    {
        $aUser = $_POST['user'];
    }
    else
    {
        echo "noname";
        exit;
    }
    if(isset($_POST['pw']))
    {
        $apassw = $_POST['pw'];
    }
    else
    {
        echo "nopw";
        exit;
    }
    if(isset($_POST['notify']))
    {
        $notif = $_POST['notify'];
    }
    else
    {
        $notif = "true";
    }

    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);

    for($i=0;$i<count($fileArray);$i++)
    {
        if($fileArray[$i]->userName == $aUser)
        {
            $apa = $fileArray[$i]->passw; // check password
            if(CheckUser2($apa, $apassw))
            {

                $fileArray[$i]->mnotify = $notif;
                $toSave = json_encode($fileArray);
                file_put_contents($aFileNev, $toSave); // SAVE WITH THE NEW EMAIL ADDRESS

                break;
            }
        }
    }
    echo $notif;

}

if($code == 7) // GET E-MAIL WHEN HW IS CORRECTED
{
    if(isset($_POST['user']))
    {
        $aUser = $_POST['user'];
    }
    else
    {
        echo "noname";
        exit;
    }
    if(isset($_POST['pw']))
    {
        $apassw = $_POST['pw'];
    }
    else
    {
        echo "nopw";
        exit;
    }
    if(isset($_POST['notify']))
    {
        $notif = $_POST['notify'];
    }
    else
    {
        $notif = "true";
    }

    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);

    for($i=0;$i<count($fileArray);$i++)
    {
        if($fileArray[$i]->userName == $aUser)
        {
            $apa = $fileArray[$i]->passw; // check password
            if(CheckUser2($apa, $apassw))
            {

                $fileArray[$i]->mnotify2 = $notif;
                $toSave = json_encode($fileArray);
                file_put_contents($aFileNev, $toSave); // SAVE WITH THE NEW EMAIL ADDRESS

                break;
            }
        }
    }
    echo $notif;

}

if($code == 4)
{

    if(isset($_POST['user']))
    {
        $aUser = $_POST['user'];
    }
    else
    {
        echo "Nincs megadva felhasználónév.";
        exit;
    }

    if(isset($_POST['oldpw']))
    {
        $oldPassword = $_POST['oldpw'];
    }
    else
    {
        echo "Nincs megadva a régi jelszó.";
        exit;
    }

    if(isset($_POST['ujpw']))
    {
        $ujPassword = $_POST['ujpw'];
        if(strlen($ujPassword)<8)
        {
            echo "Től rövid a jelszó. Min. 8 karakter kell.";
            exit;
        }
    }
    else
    {
        echo "Nincs megadva az új jelszó.";
        exit;
    }

    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);


    $regiok = false;

    for($i=0;$i<count($fileArray);$i++)
    {
        if($fileArray[$i]->userName ==  $aUser) // if user name matches
        {
            $apa = $fileArray[$i]->passw; // check password
            if(CheckUser2($apa, $oldPassword))
            {

                $fileArray[$i]->passw = storePassword($ujPassword); // hash uj pw
                $toSave = json_encode($fileArray);
                file_put_contents($aFileNev, $toSave); // SAVE WITH THE NEW PASSWORD
                $regiok = true;
                break;
            }
        }

    }

   if($regiok)
   {
       echo "0";
       exit;
   }
    else
    {
        echo "1";
        exit;
    }



}

if($code == 3) // FORGOTTEN PASSWORD
{

    if(isset($_POST['amail']))
    {
        $ama = $_POST['amail'];
        $afile = file_get_contents($aFileNev);
        $fileArray = json_decode($afile);

       // $fileArray = array_values(array_filter($fileArray, function($v) use ($ama) { if($v->omail == $ama) return $v;}));
       // $fileArray = array_values($fileArray);




        for($i=0;$i<count($fileArray);$i++)
        {
            if($fileArray[$i]->omail == $ama)
            {
                $ranStr = rndString(); // 8 chr random string
                $hashedPw = storePassword($ranStr);
                $fileArray[$i]->passw = $hashedPw;

                $toSave = json_encode($fileArray);
                file_put_contents($aFileNev, $toSave); // SAVE WITH THE NEW PASSWORD
                // NOW SEND A MAIL ABOUT THE NEW PASSWORD

                $to = $ama;
                $subject = "Elfelejtett jelszo";
                $txt = "Kedves " . $fileArray[$i]->userName . "!" . "\r\n" . "Ezzel a jelszóval beléphet: " . $ranStr . "\r\n" . "Kérem, változtassa meg ezt a jelszót, amint belépett." . "\r\n" . "Üdvözli az ehw.cloud.";
                $headers = "from: postmaster@ehw.cloud \n";
                $headers .= "X-mailer: phpWebmail \n";
                // Content-Type:text/html;charset=utf-8'

                $sikerMail =  mail($to,$subject,$txt,$headers);

                if($sikerMail)
                {
                    echo "A fenti e-mailre elküldtük az új jelszavát.";
                    exit;
                }
                else
                {
                    echo "Nem sikerült elküldeni az e-mailt.";
                    exit;
                }


            }
        }
        echo "Nem ezzel az e-mail címmel regisztrált.";
        exit;
    }
    else
    {
        echo "Nem adott meg e-mail címet.";
        exit;
    }

}


// USER NAME
if(isset($_POST['user']))
{
    $usNev = filtString($_POST['user']);

    if(strlen($usNev) < 3)
    {
        echo "A név túl rövid. Min. 3 karakter.";
      //  exit;
    }
    if(strlen($usNev) > 26)
    {
        echo "A név túl hosszú. Max. 26 karakter lehet.";
        exit;
    }


}
else
{
    echo "Nincs felhasználónév.";
    exit;
}





// PASSWORD
if(isset($_POST['pw']))
{
    $apass = $_POST['pw'];
    if(strlen($apass) < 8)
    {
        echo "A jelszó túl rövid. Min. 8 karakter kell.";
       // exit;
    }

    if(strlen($apass) > 16)
    {
        echo "A jelszó túl hosszú.Max. 16 karakter lehet. " . $apass;
        exit;
    }

}
else
{
    echo "Nincs jelszó, vagy túl rövid, vagy túl hosszú.";
    exit;
}

if($code == 0) // csak regisztrációnál kell ellenőrizni ezeket
{
    // EMAIL
    if(isset($_POST['amail']))
    {
        $cheMa = checkMail($_POST['amail']);

        if($cheMa != "0")
        {
            $aMail = $cheMa;
        }
        else
        {

            echo "Nem jó e-mail cím.";
            exit;
        }


    }
    else
    {
        echo "Nincs e-mail megadva.";
        exit;
    }


// GROUP NAME
    if(isset($_POST['group1']))
    {
        $aGroup = $_POST['group1'];
    }
    else
    {
        echo "Nincs csoport kiválasztva.";
        exit;
    }
}







// echo "Ok" . $usNev . " - " . $aMail . " - " . $apass . " - " . $aGroup;


if($code == 0) // registration
{

    $notif = false;
    $notif = $_POST['mailNoti'];
    $notif2 = $_POST['mailNoti2'];

    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);

    $User = new user();

    $User->userName = $usNev;
    $User->passw = storePassword($apass);
    $User->omail = $aMail;
    $User->group = $aGroup;
    $User->tempid = "0";
    $User->mnotify = $notif;
    $User->mnotify2 = $notif2;
    $User->lastMail = "0";
    $User->lastMail2 = "0";
    $User->opened = date("Y-m-d");
    $User->m1 = 0;
    $User->m2 = 0;
    $User->m3 = 0;
    $User->beadott = 0;

    $userFolderName = preg_replace("/[^a-zA-Z0-9]+/", "", $usNev);



    if(count($fileArray)<=0)
    {
        $User->id = 0;

        $userFolderName = $userFolderName . "_" . $User->id;
        $User->myFolder = $userFolderName;

        $aFold = createUserFolder($userFolderName);

        if($aFold == 0)
        {
            $usersArr = array();
            array_push($usersArr, $User);

            $toSave = json_encode($usersArr);
            file_put_contents($aFileNev, $toSave);

            // send mail about registration
            regiMail($usNev);

            echo "Sikeres regisztráció." . count($fileArray);


        }
        elseif($aFold == 1)
        {
            echo "Sikertelen regisztráció. Nincs mappa.";
        }
        else
        {
            echo "Sikertelen regisztráció. Nincs file.";
        }
    }
    else
    {
        // check if we have him?
        for($i=0;$i<count($fileArray);$i++)
        {
            if($fileArray[$i]->userName == $usNev)
            {
                echo "Valaki már regisztrált ezzel a névvel.";
                exit;
            }
            if($fileArray[$i]->omail == $aMail)
            {
                echo "Valaki már regisztrált ezzel az e-mail címmel. Talán te?";
                exit;
            }


        }
        $User->id = ujid();


        $userFolderName = $userFolderName . "_" . $User->id;
        $User->myFolder = $userFolderName;

        $aFold = createUserFolder($userFolderName);

        if($aFold == 0)
        {
            array_push($fileArray, $User);
            $toSave = json_encode($fileArray);
            file_put_contents($aFileNev, $toSave);
            echo "Sikeres regisztráció." . count($fileArray);

            // send mail about registration
            regiMail($usNev);
        }
        elseif($aFold == 1)
        {
            echo "Sikertelen regisztráció. Nincs mappa.";
        }
        else
        {
            echo "Sikertelen regisztráció. Nincs file.";
        }
        /*
        if($adir)
        {
            $myfile = fopen("USERS_HW/" . $usNev . "/" . "workfile.json", "w");
            if($myfile)
            {
                echo "Sikeres regisztráció." . count($fileArray);
            }
            else
            {
                echo "Valami probléma adódott.";
            }

        }
        else
        {
            echo "Valami probléma adódott.";
        }
        */

    }



}
elseif($code == 1) // BEJELENTKEZÉS
{
    $aFileNev = "../FELHASZ/ausers.json" ;


    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);
    $regiok = false;
    for($i=0;$i<count($fileArray);$i++)
    {
        if($fileArray[$i]->userName == $usNev || $fileArray[$i]->omail == $usNev)
        {
            $usNev = $fileArray[$i]->userName;
            $apa = $fileArray[$i]->passw;
           if(CheckUser2($apa, $apass))
           {
               $regiok = true;

               $fileArray[$i]->tempid = "0"; // e helyett unique id?
               break;
           }
        }
    }


    if($regiok)
    {
        $uniID =  uniqid();
        $_SESSION["tempide"] = $uniID;
        $_SESSION["felhasz"] = $usNev;
        $_SESSION["jelszo"] = $apass;
        echo "0+" . $uniID . "+" . $usNev; // e helyett a uniqe
        // we need to save again because of the tempid

        $toSave = json_encode($fileArray);
        file_put_contents($aFileNev, $toSave);
    }
    else
    {
        echo "1+0";
    }


}
elseif($code == 2) // LOG OUT
{


    $aFileNev = "../FELHASZ/ausers.json" ;


    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);
    $regiok = false;
    for($i=0;$i<count($fileArray);$i++)
    {
        if($fileArray[$i]->userName == $usNev)
        {
            $apa = $fileArray[$i]->passw;
            if(CheckUser2($apa, $apass))
            {
                $regiok = true;
                $fileArray[$i]->tempid = "0";
                break;
            }
        }
    }


    if($regiok)
    {
           $_SESSION["tempide"] = "0";
        // remove all session variables
        session_unset();
        // destroy the session
        session_destroy();
        echo "3+0"; // 3 == siker
        // we need to save again because of the tempid
        $toSave = json_encode($fileArray);
        file_put_contents($aFileNev, $toSave);
    }
    else
    {
        echo "4+0"; // sikertelen log out?
    }

}



function filtString($in)
{
    return filter_var($in, FILTER_SANITIZE_STRING);
}

function checkMail($in)
{
    $email = filter_var($in, FILTER_SANITIZE_EMAIL);

// Validate e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
    {
        return $email;
    }
    else
    {
       return "0";
    }
}


function storePassword($user_input)
{
    $pass = urlencode($user_input);
    //$pass_crypt = crypt($pass);
    $pass_crypt2 = password_hash($pass, PASSWORD_DEFAULT);
    return $pass_crypt2;
}

function CheckUser2($pass_crypt, $pass)
{
    if ($pass_crypt == password_verify($pass, $pass_crypt)) {
        return true;
    } else {
        return false;
    }
}


function ujid()
{
    global $fileArray;
    $idarray = $fileArray;

    ujSor($idarray);

    return $idarray[count($idarray)-1]->id + 1;
}


function ujSor($array)
{
    usort($array, function($a, $b)
    {
        return strnatcmp($a->id, $b->id);
    }
    );
}

function rndString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < 8; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function createUserFolder($foldName)
{
    $adir = mkdir("../USERS_HW/" . $foldName, 0711);
    if($adir)
    {
        $myfile = fopen("../USERS_HW/" . $foldName . "/" . "workfile.json", "w");
        if($myfile)
        {
            $mode = '600';
            chmod("../USERS_HW/" . $foldName . "/" . "workfile.json", octdec($mode));
            return 0; // everything is OKAY
        }
        else
        {
            return 1; // problem no file was created
        }

    }
    else
    {
       return 2; // problem, no dir was created
    }
}



function regiMail($userNe)
{

    $subject = "New ehw student.";
    $message = $userNe . " has registered on ehw.";
    $headers = "from: postmaster@ehw.cloud \n";
    $headers .= "X-mailer: phpWebmail \n";
    mail("immer2001@gmail.com", $subject, $message, $headers);

}





    ?>