<?php
// Start the session
session_start();
require_once "config.php";
?>
<!DOCTYPE html>
<html>
<head>

    <style>

        html, body {
            margin: 0;
            height: 100%;
        }

        .Absolute-Center {
            margin: auto;
            position: absolute;
            top: 0; left: 0; bottom: 0; right: 0;
            width:600px;
            height:300px;

        }

        #cim
        {
            color:white;
            margin-bottom:12px;

        }
    </style>

</head>
<body style="background-color:#aabbcc;vertical-align:middle">

<?php

if(isset($_POST["logout"]))
{
    if($_POST["logout"] == "over")
    {
        unset($_SESSION['ajsz']);

        echo "logged out";
    }


}

?>


<div class="Absolute-Center" style="background-color:#ffffff;background-image: url('../IMAGES/login_box.png');background-repeat: no-repeat" >



    <div id="cim" style="margin-left: auto;margin-right: auto;width: 340px;color: #25719e" >
        <div style="font-family: Aldrich, Tahoma, Arial, serif;font-size: 20px;font-weight: bold;padding-top: 84px" >TEACHER'S LOGIN TO EHW</div>

    <form action= "<?php echo $TEACHER_FIRST; ?>" method="post">
        Password:<br>
        <input type="text" name="jesz" value=""><br>
        The code you got in the e-mail:<br>
        <input type="text" name="pincode" value="" ><br><br>
        <input type="submit" value="Submit">


    </form>
    </div>

</div>
</body>
</html>
