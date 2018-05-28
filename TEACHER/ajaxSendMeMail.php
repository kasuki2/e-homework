<?php

$mailAdd = $_POST['mailadd'];
$msCont = $_POST['msCont'];



if(checkMail($mailAdd) !== "0")
{
    if(trim($msCont) !== "")
    {
        if(!filter_input(INPUT_POST, 'msCont', FILTER_SANITIZE_STRING))
        {
            echo "Az üzenet nem feldolgozható. ";
        }
        else
        {
            if(sendTeacherMail($mailAdd, $msCont))
            {
                echo "Üzenetét elküldtük. Hamarosan válaszolunk. <br> Köszönjük érdeklődését.";
            }
            else
            {
                echo "Az üzenet nem lett elküldve valamilyen probláma miatt. Talán próbálja később.";
            }

        }
    }
    else
    {
        echo "Nem írt üzenetet. ";
    }
}
else
{
    echo "Érvénytelen e-mail cím.";
}



function sendTeacherMail($userNeve, $msCont)
{
    $subject = "Contact";
    $headers = "from: postmaster@ehw.cloud \n";
    $headers .= "X-mailer: phpWebmail \n";
    $ifsent = mail($userNeve, $subject, $msCont, $headers);

    if($ifsent)
    {
        return true;
    }
    else
    {
        return false;
    }
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


?>