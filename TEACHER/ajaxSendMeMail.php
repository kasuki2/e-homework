<?php


$mailAdd = $msCont = $result = "";

$mailAdd = $_POST['mailadd'];
$msCont = $_POST['msCont'];

$result = $_POST['resu'];
$captcha = false;

$url = 'https://www.google.com/recaptcha/api/siteverify';
$data = array('secret' => "6LfIFFwUAAAAADd96NLjpFaxakVco7q7Vz_2CFXp", 'response' => $result);

// use key 'http' even if you send the request to https://...
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data)
    )
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
if ($result === FALSE) { $captcha = false; }
else
{
    $resp = json_decode($result);
    if($resp->success)
    {
        $captcha = true;

    }
    else
    {
        $captcha = false;
    }
}




if($captcha) {

    if (checkMail($mailAdd) !== "0") {
        if (trim($msCont) !== "") {
            if (!filter_input(INPUT_POST, 'msCont', FILTER_SANITIZE_STRING)) {
                echo "Az üzenet nem feldolgozható. ";
            } else {
                if (sendTeacherMail($mailAdd, $msCont)) {
                    echo "Üzenetét elküldtük. Hamarosan válaszolunk. <br> Köszönjük érdeklődését.";

                } else {
                    echo "Az üzenet nem lett elküldve valamilyen probláma miatt. Talán próbálja később.";
                }

            }
        } else {
            echo "Nem írt üzenetet. ";
        }
    } else {
        echo "Érvénytelen e-mail cím.";
    }
}
else
{
    echo "Hibás Captcha. <button onclick='resetCap();' >reset</button>";
}


function sendTeacherMail($userNeve, $msCont)
{
    $message = $userNeve . "\r\n" . $msCont;

// In case any of our lines are larger than 70 characters, we should use wordwrap()
    $message = wordwrap($message, 70, "\r\n");

// $headers = "From: kashusof@s5.tarhely.com;Content-Type:text/html;charset=utf-8";
// Send
    $ifsent = mail("immer2001@gmail.com", 'Contact', $message);


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