<?php
require_once "checklogin.php";
?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">
    <script src="commonjs.js"></script>
    <title>assign homework</title>

<script>

function choseTask(el)
{
    var step1 = el.innerHTML.split('FELADATOK');
    // var res = str.charAt(0);
    var path1 = step1[1];
    var elso = path1.charAt(0);
    if(elso == "/")
    {
        path1 = path1.replace("/", "");
    }
    if(elso == "\\")
    {
        path1 = path1.replace("\\", "");
    }
  document.getElementById("selExer").innerHTML = path1;
}

function choseTask2(el)
{
    document.getElementById("selExer").innerHTML = el.innerHTML;
}

function sendHW(fullUserArr)
{

    if(fullUserArr.length <= 0)
    {
        alert("You have not selected any users.");
        return;
    }
var afeladat = document.getElementById("fileName").value;

if(afeladat.trim().length <= 0)
{
  alert("No selected task!");
  return;
}




    var toSend = {};
    toSend.users = fullUserArr; // array of users objects
    toSend.task = afeladat; // just one task path

    var adatok = JSON.stringify(toSend) + "&code=0";



var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

        document.getElementById('message').innerHTML = this.responseText;
    }
};
var kuld = "tasks=" + adatok;
xhttp.open("POST", "ajaxAssignHW.php", true);
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhttp.send(kuld);

}


function openit(opi)
{

    var azid = "files" + opi;
    var afil = document.getElementById(azid);
    var nyitvae = afil.style.display;
    if(nyitvae == "none")
    {
        afil.style.display = "block";
    }
    else
    {
        afil.style.display = "none";
    }

}

function fileNevClick(eli)
{


    var step1 = eli.innerHTML.split('FELADATOK');

    var path1 = step1[1];
    document.getElementById("fileName").innerHTML = path1;
    var elso = path1.charAt(0);
    if(elso == "/")
    {
        path1 = path1.replace("/", "");
    }
    if(elso == "\\")
    {
        path1 = path1.replace("\\", "");
    }




    /*
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


          //  showInfo(this.responseText);

        }
    };
    kuld = "openThis=" + path1;
    xhttp.open("POST", "../ajaxsendBasic.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);
    */
}


    function getUsers()
    {
        var kuld = "";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {


                showUsers(this.responseText);

            }
        };

        xhttp.open("POST", "ajaxGetUsers.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send(kuld);
    }

    var userFile = "";
    function showUsers(inpu)
    {

        userFile = JSON.parse(inpu);
        var user = "";
        for(var i = 0;i<userFile.length;i++)
        {
            user += "<div><span><input class='userCheck' type='checkbox' value='" + userFile[i].id + "' > </span><span>" + userFile[i].userName + "</span></div>";
        }
        document.getElementById("info2").innerHTML = user;
    }

    function sendHomeWork()
    {
        var checked = document.getElementsByClassName("userCheck");

        var usersArr = []; // has only the id-s
        for(var i = 0;i<checked.length;i++)
        {
            if(checked[i].checked)
            {
                usersArr.push(checked[i].value);
            }
        }

        var fullUserArr = [];
        for(i=0;i<usersArr.length;i++)
        {
            for(var z = 0;z<userFile.length;z++)
            {
                if(userFile[z].id == usersArr[i])
                {
                    fullUserArr.push(userFile[z]);
                }
            }
        }

        sendHW(fullUserArr);
    }

</script>



</head>
<body style="background-color: #05cbe6" >
<div style="padding-top: 44px;padding-bottom: 44px;background-color: #25719e;font-family: Aldrich, Tahoma, Arial, sans-serif;width: 90%;color: #ffffff;margin-left: auto;margin-right: auto;font-size: 36px" >
    <span style="margin-left: 24px" >ASSIGN HOMEWORK</span>
</div>
<div id="nagyWrap" style="width: 90%;margin-left: auto;margin-right: auto;background-color: #efefef;padding-bottom: 60px">

    <?php
    $amenu = file_get_contents("menusor.html");
    echo $amenu;
    ?>
<div id="taskFrame" style="width: 40%;padding: 4px;display: inline-block;margin-left: 40px" >
<?php
/*
$fils = preg_grep('/^([^.])/', scandir("../FELADATOK"));
$fils = array_values($fils);

$path = realpath('../FELADATOK');

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
$kezdDir = false;
$zar = true;
$zz = 0;
foreach($objects as $name => $object)
{
    if(is_dir($name))
    {

        if(strpos($name, "..") !== false && strpos($name, ".") !== false )
        {

            if($kezdDir == true)
            {
                $kezdDir = false;
                echo "</div>"; // záródiv
            }

            $foldName = "<span style='background-color: #f1dd31' >" . "$name" . "</span>";
            echo "<div id='folder1' style='background-color: #ccddf0;padding: 2px' onclick='openit(" . $zz . ")' >" . $foldName . "</div><div id='files" . $zz . "' style='background-color: #ffaff2;display:none'>"; // nyitódiv
            $kezdDir = true;

            $zz++;
        }

    }
    else
    {
        echo "<span onclick='fileNevClick(this);' >" . "$name" . "</span><br />";
    }

}
echo "</div>"; // végső záró div
*/
?>

    <div style="background-color: #c1ffb0">

        <div id="info">?</div>

        <div  >
            <div class="dirFrame" id="FELADATOK" ><div class="dirHead" onclick="getSome('0', this)" >FELADATOK</div><div id='second' >????</div></div>

        </div>
    </div>


</div> <!-- taskFrame vege -->

<div style="display: inline-block;width: 50%;margin-left: 40px;background-color: #f4d5ce;vertical-align: top;margin-top: 12px;padding-left: 24px;padding-bottom: 24px" id="taskPlace" >
    <div>Selected excersise:</div>
    <div id='fileName2'></div>
    <input type="text" id="fileName" style="width: 360px" >
    <div id='message'>Nincs üzenet.</div>

    <button onclick="getUsers();"  > get user </button>
    <div id="info2" >????</div>
    <button onclick="sendHomeWork();" >uj send</button>

</div>
    <div style="margin-left: 36px;margin-top: 16px" >Taks types:
        <span style="background-color:#5a9ddd"><label for='task0'>MC grammar</label> <input  type='radio' name="tasktype" id='task0'></span>
        <span style="background-color:#69c879"><label for='task1'>Gap grammar</label> <input type='radio' name="tasktype" id='task1'></span>
        <span style="background-color:#eb44ae"><label for='task2'>ABC grammar</label> <input type="radio" name="tasktype" id='task2'></span>

        <span style="background-color:#fff300"><label for='task3'>VOCAB</label> <input type="radio" name="tasktype" id='task3'></span>
        <span style="background-color:#557755"><label for='task4'>GRAM 5</label> <input type="radio" name="tasktype" id='task4'></span>
        <span style="background-color:#666666"><label for='task5'>GRAM 6</label> <input type="radio" name="tasktype" id='task5'></span>

    </div>
    <div style="margin-left: 36px;margin-top: 16px"><span>TASK LEVEL: </span><span>?</span></div>
    <div style="margin-left: 36px;margin-top: 4px">Task level:
        <label for="level0">Level beginner</label>
        <input type='radio' name="taskLevel" class="taskWeight" id='level0'>|
        <label for="level0">Level pre-int</label>
        <input type='radio' name="taskLevel" class="taskWeight" id='level1'>|
        <label for="level0">Level intermed</label>
        <input type='radio' name="taskLevel" class="taskWeight" id='level2'>|
        <label for="level0">Level upper-int</label>
        <input type='radio' name="taskLevel" class="taskWeight" id='level3'>|
        <label for="level0">Level advanced</label>
        <input type='radio' name="taskLevel" class="taskWeight" id='level4'>|
        <label for="level0">Level legend</label>
        <input type='radio' name="taskLevel" class="taskWeight" id='level5'>
    </div>
    <div style="margin-left: 36px">
        <div id="taskTitle" >title</div>
        <div id="instru" >instru</div>
    </div>

<div style="margin-left: auto;margin-right: auto;width: 700px;background-color: #ffffff;padding: 24px" id="theTask">

</div>



<!-- <button onclick="sendHW();" >send</button> -->


    </div><!-- nagyWrap vege -->
</body>
</html>
