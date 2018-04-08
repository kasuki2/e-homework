<?php
require_once "checklogin.php";
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">
    <script src="commonjs.js"></script>
    <title>create vocab</title>

    <style>
        .wordSpan
        {
            color: #111111;
        }
    </style>

    <script>

        function choseTask(elem)
        {

            var pathe = elem.innerHTML.split('FELADATOK/VOCAB/');
            var path1 = pathe[1];
            var elso = path1.charAt(0);
            if(elso == "/")
            {
                path1 = path1.replace("/", "");
            }
            if(elso == "\\")
            {
                path1 = path1.replace("\\", "");
            }
            document.getElementById("selExer").value = path1;

        }

        function onTestChange()
        {
            var key = window.event.keyCode;

            // If the user has pressed enter
            // alert(key);
            if (key === 13) {
                mondatClick();
            }

        }


        function mondatClick()
        {
            var szoveg = document.getElementById("sentence").value;
            var reszek = szoveg.split('_');
            var words = reszek.length-1;

        }

        var globParts;
        function party()
        {
            var szoveg = document.getElementById("sentence").value.trim();
            var parts = szoveg.split(' ');
            globParts = parts;
            var mind = "";

            for(var i = 0;i<parts.length;i++)
            {
                mind = mind + "<span class='wordSpan' onclick='selectWord(this)' id='mark_" + i + "' >" + parts[i] + " " + "</span>";
            }


            document.getElementById("processed").innerHTML = mind;

        }

        var word1Arr = [];
        var word2Arr = [];
        var last1 = 0;
        var last2 = 5000;

        function selectWord(elem)
        {

            var azidArr = elem.id.split('_');
            var azidNum = azidArr[1];

            // ha az utolsó előtt van vagy rögtön utána jön
            if(word1Arr.length == 0) // if this is the first word
            {
                word1Arr.push(azidNum);
                last1 = azidNum;
            }
            else // this is not the first word
            {
                if(word1Arr.length < 3) // ha még befér, közv. előtte vagy utána
                {
                    word1Arr.sort();
                    if(parseInt(azidNum) + 1 == parseInt(word1Arr[0]))
                    {
                        alert("1: directly before, so include");
                        word1Arr.push(azidNum);
                    }
                    else if(parseInt(azidNum) -1 == parseInt(word1Arr[word1Arr.length-1]))
                    {
                        alert("1: directly after it, so include");
                        word1Arr.push(azidNum);
                    }
                    else
                    {
                        alert("ez nincs se kozvetlen előtte, se utána. Try box 2? " + azidNum + " " + word1Arr[0]);
                        if(word1Arr.includes(azidNum))
                        {
                            alert("Ez már az 1-es boxban van, teht remove");
                            word1Arr.splice(word1Arr.indexOf(azidNum), 1);
                        }
                        else
                        {


                                box2(azidNum);

                        }


                    }
                }
                else // box 1 tele van
                {
                    alert("1: box 1 tele, ha már benne van, eltávolítani, ha nem talán befér a 2. boxba");
                    if(word1Arr.includes(azidNum)) // benne van már az 1-esbe, try to remove
                    {
                        word1Arr.sort();
                        if(parseInt(azidNum) != parseInt(word1Arr[1]))
                        {
                            alert("1: not in the middle, so remove");

                            word1Arr.splice(word1Arr.indexOf(azidNum), 1);
                        }
                        else
                        {
                            alert("Cannot remove because it is the middle word.");
                        }
                    }
                    else
                    {
                        // try to put it into box 2
                        if(azidNum <= word1Arr[0])
                        {
                            alert("ez még a box1 első szava előtt van, tehát nem jó.")
                        }
                        else
                        {
                            box2(azidNum);
                        }
                    }
                }

            }



            wordKiir();
        }


        function box2(azidNum)
        {
            alert("try to put it into box 2");


            // ha a 2. box első szava előtt van, akkor nem jó
            if(azidNum <= word1Arr[word1Arr.length-1])
            {
                alert("Ez a szó az első szó elé esik, így nem lehet berakni.");
                return;
            }


            if(word1Arr.includes(azidNum))
            {
                alert("ez a szó már az 1-esben benn van, tehát nem lehet sehová sem tenni.");
            }
            else
            {
                if(word2Arr.length == 0)
                {
                    word2Arr.push(azidNum);
                }
                else
                {
                    if(word2Arr.length < 3) // ha belefér még, akkor közv. előtte vagy utána
                    {
                        word2Arr.sort();
                        alert(parseInt(azidNum) + 1 + " " + word2Arr[0]);
                        if(parseInt(azidNum) + 1 == parseInt(word2Arr[0]))
                        {
                            alert("2: directly before, so include");
                            word2Arr.push(azidNum);
                        }
                        else if(parseInt(azidNum -1) == parseInt(word2Arr[word2Arr.length-1]))
                        {
                            alert("2: directly after it, so include");
                            word2Arr.push(azidNum);
                        }
                        else
                        {
                            alert("nincs se előtt se utána, ha benne van, akkor remove");
                            if(word2Arr.includes(azidNum))
                            {
                                word2Arr.splice(word2Arr.indexOf(azidNum), 1);
                            }
                        }
                    }
                    else
                    {
                        alert("box 2 tele van, if it is in box 2, remove it");
                        if(word2Arr.includes(azidNum))
                        {
                            word2Arr.sort();
                            if(parseInt(azidNum) != parseInt(word2Arr[1]))
                            {
                                alert("2: not in the middle, so remove");

                                word2Arr.splice(word2Arr.indexOf(azidNum), 1);
                            }
                            else
                            {
                                alert("2 Cannot remove because it is the middle word.");
                            }
                        }
                        else
                        {
                            alert("box 2 tele van, ide már nem jöhet.");
                        }
                    }
                }
            }
        }

        function wordKiir()
        {
            // mindet feketére
            var szavak = document.getElementsByClassName("wordSpan");

            for(var c = 0;c<szavak.length;c++)
            {
                szavak[c].style.color = "#111111";
            }

            var minde = "";
            word1Arr.sort();
            for(var i = 0;i<word1Arr.length;i++)
            {
                var ide = "mark_" + word1Arr[i];
                var szo = document.getElementById(ide).innerHTML;
                document.getElementById(ide).style.color = "#3344ff";
                minde = minde + "<span>" + szo + " " + "</span>";
            }

            document.getElementById("szo1").innerHTML = minde;

            minde = "";
            word2Arr.sort();
            for(i = 0;i<word2Arr.length;i++)
            {
                ide = "mark_" + word2Arr[i];
                szo = document.getElementById(ide).innerHTML;
                document.getElementById(ide).style.color = "#3344ff";
                minde = minde + "<span>" + szo + " " + "</span>";
            }

            document.getElementById("szo2").innerHTML = minde;
        }

        function generateSen()
        {


            var take1 = false;
            var take2 = false;
            var take3 = false;

            var szavak = document.getElementsByClassName("wordSpan");

            var i = 0;

            if(word2Arr.length == 0) // csak egy szavas
            {
                if(word1Arr.includes("0"))
                {
                    // első szó ki van véve target wordnek, so: mon1 = ""
                    mon1 = "";
                    for(i = 0;i<szavak.length;i++)
                    {
                        var ben = i + "";
                        if(!word1Arr.includes(ben))
                        {
                            mon2 = mon2 + szavak[i].innerHTML + " ";
                        }

                    }
                }
                else
                {
                    for(var k = 0;k<szavak.length;k++)
                    {
                        var benk = k + "";
                        if(!word1Arr.includes(benk))
                        {
                            if(!take1)
                            {
                                // szavak[k].innerHTML;
                                mon1 = mon1 + szavak[k].innerHTML + " ";
                            }
                            else
                            {
                                mon2 = mon2 + szavak[k].innerHTML + " ";
                            }
                        }
                        else
                        {
                            take1 = true;

                        }
                    }
                }

            }
            else // két szavas
            {
                if(word1Arr.includes("0"))
                {
                    // első szó ki van véve target wordnek, so: mon1 = ""
                    take1 = false;
                    mon1 = "";
                    for(i = 0;i<szavak.length;i++)
                    {
                        var ben2 = i + "";
                        if(!word1Arr.includes(ben2))
                        {
                            if(word2Arr.includes(ben2))
                            {
                                take1 = true;
                            }
                            if(take1 === false)
                            {
                                mon2 = mon2 + szavak[i].innerHTML + " ";
                            }
                            else
                            {
                                if(!word2Arr.includes(ben2))
                                {
                                    mon3 = mon3 + szavak[i].innerHTML + " ";
                                }

                            }
                        }
                    }
                }
                else // az első szó nincs kivéve
                {
                    for(i = 0;i<szavak.length;i++)
                    {
                            var ben2 = i + "";

                            if(word1Arr.includes(ben2))
                            {
                                take1 = true;
                            }

                            if(take1 === false)
                            {
                                mon1 = mon1 + szavak[i].innerHTML + " ";
                            }
                            else
                            {

                                    if(word2Arr.includes(ben2))
                                    {
                                        take2 = true;
                                    }



                                    if(take2 === false)
                                    {
                                            if(!word1Arr.includes(ben2))
                                            {
                                                mon2 = mon2 + szavak[i].innerHTML + " ";
                                            }

                                    }
                                    else
                                    {
                                        if(!word2Arr.includes(ben2))
                                        {
                                            mon3 = mon3 + szavak[i].innerHTML + " ";
                                        }

                                    }





                            }

                    }
                }



            }


            for(i=0;i<word1Arr.length;i++)
            {
                szo1 = szo1 + szavak[word1Arr[i]].innerHTML + " ";
            }

            for(i=0;i<word2Arr.length;i++)
            {
                szo2 = szo2 + szavak[word2Arr[i]].innerHTML + " ";
            }


            document.getElementById("result1").innerHTML = "<span id='gel1'>" + mon1 + "</span>" + "<span id='gom1' style='color: #536eca;font-weight: bold' > " + szo1 + "</span><span id='gel2'>" + mon2 + "</span><span id='gom2' style='color: #536eca;font-weight: bold'> " + szo2 + "</span><span id='gel3' >" + mon3 + "</span>";
        }

        var szo1 = "";
        var szo2 = "";

        var mon1 = "";
        var mon2 = "";
        var mon3 = "";


        function sendData(cod)
        {

            var pw = document.getElementById("jelszo").value.trim();
            var fileNave = document.getElementById("fileName").value.trim();
            var taskTit = document.getElementById("taskTitle").value.trim();
            var instruct = document.getElementById("instru").value.trim();

          //  alert(fileNave + " " + taskTit + " " + instruct);


            var mean1 = document.getElementById("mean1").value.trim();
            var mean2 = document.getElementById("mean2").value.trim();

            var egyMondat = {};
            egyMondat.id = 0;
            egyMondat.gel = mon1.trim();
            egyMondat.ge2 = mon2.trim();
            egyMondat.ge3 = mon3.trim();

            egyMondat.go1 = szo1.trim();
            egyMondat.go2 = szo2.trim();

            egyMondat.meaning = mean1.trim();

            var fullMond = JSON.stringify(egyMondat);

            if(cod == 1 || cod == 2)
            {
              fullMond = document.getElementById("tobecorrected").value.trim();
            }
            alert(fullMond);
            var taskWeight = 0;
            var allTaskLevel = document.getElementsByClassName("taskWeight");
            for(var i = 0;i<allTaskLevel.length;i++)
            {
                if(allTaskLevel[i].checked)
                {
                    taskWeight = i;
                    break;
                }
            }

            var kuld = "passw=" + pw + "&code=" + cod + "&fileName=" + fileNave + "&taskTitle=" + taskTit + "&taskWeight=" + taskWeight + "&instru=" + instruct + "&fullText=" + fullMond;

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    var back = this.responseText;
                    if(back == "SAVED 1" || back == "SAVED 2")
                    {
                        deleteEvery();
                    }
                    document.getElementById("message").innerHTML = back;

                }
            };

            xhttp.open("POST", "ajaxReceiveVocab.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);

        }


        function deleteEvery()
        {
           document.getElementById("mean1").value = "";
            mon1 = "";
            mon2 = "";
            mon3 = "";
            szo1 = "";
            szo2 = "";
            var ujar = [];
            word1Arr = ujar;
            var ujar2 = [];
            word2Arr = ujar2;
            document.getElementById("processed").innerHTML = "";
            document.getElementById("szo1").innerHTML = "";
            document.getElementById("szo2").innerHTML = "";
        }

    </script>


</head>
<body style="background-color: #596183" >


<div id="wrapper" style="background-color: #ffffff;width: 1200px;margin-right: auto;margin-left: auto;padding: 24px">

    <div style="background-color: #114411;padding: 24px;color:#ffffff" >CREATE VOCAB</div>



    <?php
    $amenu = file_get_contents("menusor.html");
    echo $amenu;
    ?>


<?php
/*
$path = realpath('../FELADATOK/VOCAB/');

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
foreach($objects as $name => $object)
{
    if(is_dir($name))
    {
        if(strpos($name, "..") !== false && strpos($name, ".") !== false )
        {
            echo "<span style='background-color: #00cf00' >" . "$name" . "</span><br />";
        }

    }
    else
    {
        echo "<span onclick='choseTask(this);' >" . "$name" . "</span><br />";
    }

}
*/

//require_once("fileSor.php");
?>
    <div style="background-color: #c1ffb0">

        <div id="info">?</div>

        <div style="width: 50%" >
            <div class="dirFrame" id="FELADATOK" ><div class="dirHead" onclick="getSome('0', this)" >FELADATOK</div><div id='second' >????</div></div>

        </div>
    </div>

<div><span>Selected task:</span><input type="text" id="fileName" style="color:#ff0000;font-weight: bold" ></div>

<div style="margin-top: 4px" > Feladat címe: <textarea id="taskTitle" ></textarea> Jelszó: <input type="text" id="jelszo" ><button onclick="deleteEvery();" >delete</button></div>
    <div style="margin-top: 4px" >HELPER FILE:<textarea  id="helperFile" style="color: #ff0000;font-weight: bold" ></textarea></div>
    <div>Instructions:</div>
    <textarea id="instru" style="width: 90%" ></textarea><br />
    <?php
    echo file_get_contents("tasklevels.html");
    ?>
    <div id='theTask' style="background-color:#bbccdd;padding:4px" ></div>
    <textarea style="background-color:#ffaaaa;width:90%;margin-top:8px" id='tobecorrected' >??</textarea>
    <div style="margin-top:4px;text-align:right" ><button onclick="sendData('1');">delete this</button><button onclick="sendData('2');" >update this</button></div>

    <div>Write the sentence here. Write one underscore: _ where there is the missing word.</div>
    <textarea id="sentence" style="width: 90%" onkeypress="onTestChange();" > </textarea><br />

    <button onclick="party();" >selected part</button>
    <div>PROCESSED SENTENCE:</div>
    <div id="processed" style="margin-top: 12px;font-size: 20px" ></div>


    <div>word 1: <span id="szo1" style="margin-top: 12px;font-size: 20px;color: #209b1c;font-weight: bold;" >szo 1</span><input id="mean1" type="text" ></div>
    <div>word 2: <span id="szo2" style="margin-top: 4px;font-size: 20px;color: #209b1c;font-weight: bold" >szo 1</span><input id="mean2" type="text"> </div>
    <button onclick="generateSen();" >generate</button>
    <div id="result1"></div>
    <button onclick="sendData('0');" >SEND</button>

    <div id="message" style="margin-top: 16px" >?</div>


</div>
</body>
</html>
