<?php
require_once "checklogin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">

    <link rel="stylesheet" type="text/css" href="../css_sender2.css">
    <link rel="stylesheet" type="text/css" href="../style1.css">
    <link rel="stylesheet" type="text/css" href="../helpers.css">

    <script src="procType0.js"></script>
    <title>assigned hw</title>

    <style>
        body
        {
            background-color: #578fbf;
        }
        #wrapper
        {
            background-color: #ececec;
            margin-left: auto;
            margin-right: auto;
            padding: 36px;
        }
        .headF
        {
            background-color: #d1ffd3;
            padding: 4px;
            margin-top: 8px;
            cursor: pointer;
        }
    </style>


    <script>




        function updateHW(filename, azurl)
        {
            return new Promise(function (resolve, reject){


                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        resolve(this.responseText);
                    }
                };

                xhttp.onerror = function () {
                    //  reject(this.status + " " + this.statusText);
                    reject("");
                };

                xhttp.open("POST", filename, true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(azurl);
            })
        }


        var elem;
        var globalUserDir;
        function getFiles(el)
        {
            elem = el;
            globalUserDir = el.innerHTML;
            updateHW("ajaxAssagnedHw.php" , "user=" + el.innerHTML + "&code=0").then(function (res) {
                fillResult(res);
            });
        }


        function delElem() {
            var checkBoxes = document.getElementsByClassName('acb');
            var checked = [];
            for(var i = 0;i<checkBoxes.length;i++)
            {
                if(checkBoxes[i].checked)
                {
                    checked.push(globalObj.assigned[i].id);
                }
            }


            if(checked.length >0)
            {
                updateHW("ajaxAssagnedHw.php" , "user=" + elem.innerHTML + "&code=1" + "&numbers=" + JSON.stringify(checked)).then(function (res) {

                    getFiles(elem);
                    alert(res);
                });
            }
            else
            {
                alert("Nem jelöltél ki egy feladatot sem.");
            }

        }

        var globalObj;
        var tomax = 16;

        function showAll() {
            if(tomax === 16)
            {
                tomax = 0;
            }
            else
            {
                tomax = 16;
            }
        }


        var globalCorrected;

        function fillResult(res)
        {

          var obj = JSON.parse(res);
            globalObj = obj;

            var resultDiv = document.getElementById("result");
          var assigned = obj.assigned;
          var submitted = obj.submitted;
          var corrected = obj.corrected;
            globalCorrected = corrected;

          var bele = "";
            bele += "<tr style='background-color: #9a2392;color:#ffd5f4' ><td></td><td>" + "ASSIGNED" + "</td><td></td><td>" + "</td><td>" +  "</td><td></td></tr>";
            bele += "<tr style='background-color: #9a2392;color:#ffd5f4' ><td></td><td><button onclick='delElem();' >delete</button></td><td><button onclick='showAll();' >show all</button></td><td>" + "</td><td>" +  "</td><td></td></tr>";

          if(assigned != null)
          {
              if(assigned.length > 0)
              {
                  assigned.reverse();
                  for(var i = 0;i<assigned.length;i++)
                  {
                      bele += "<tr><td><input type='checkbox' class='acb' id='" + i + "' ><td>" + parseInt(i+1) +  ".</td><td>" + assigned[i].atitle + "</td><td>" + assigned[i].date1 + "</td><td>" + assigned[i].tipus + "</td><td>redo: " + assigned[i].redo + "</td></tr>";
                  }

              }
              else
              {
                  bele += "<tr style='background-color: #fbe3f2;color:#000000' ><td></td><td>" + "no assigned hw" + "</td><td></td><td>" + "</td><td>" +  "</td><td></td></tr>";
              }
          }



            bele += "<tr style='background-color: #fb530d;color:#fcffc2' ><td></td><td>" + "SUBMITTED" + "</td><td></td><td>" + "</td><td>" +  "</td><td></td></tr>";

          if(submitted != null)
          {
              if(submitted.length > 0)
              {
                  submitted.reverse();
                  for(var i = 0;i<submitted.length;i++)
                  {
                      bele += "<tr><td><td>" + parseInt(i+1) +  ".</td><td>" + submitted[i].atitle + "</td><td>" + submitted[i].date1 + "</td><td>" + submitted[i].tipus + "</td><td>redo: " + submitted[i].redo + "</td></tr>";
                  }

              }
              else
              {
                  bele += "<tr style='background-color: #ffd5f4;color:#000000' ><td></td><td>" + "no submitted" + "</td><td></td><td>" + "</td><td>" +  "</td><td></td></tr>";
              }
          }




            bele += "<tr style='background-color: #169a1e;color:#c8ffd1' ><td></td><td>" + "CORRECTED" + "</td><td></td><td>" + "</td><td>" +  "</td><td></td></tr>";

            if(corrected != null)
            {
                if(corrected.length > 0)
                {
                    if(corrected.length > tomax && tomax !== 0)
                    {
                        var localMax = tomax
                    }
                    else if(tomax === 0)
                    {
                        localMax = corrected.length;
                    }
                    else
                    {
                        localMax = corrected.length;
                    }

                    for(var i = 0;i<localMax;i++)
                    {
                        bele += "<tr onclick='showTask(" + parseInt(i) + ");' ><td><td>" + parseInt(i+1) +  ".</td><td>" + corrected[i].atitle + "</td><td>" + corrected[i].viewed + "</td><td>" + corrected[i].tipus + "</td><td>redo: " + corrected[i].redo + "</td></tr>";
                    }

                }
                else
                {
                    bele += "<tr style='background-color: #d1ffd3;color:#000000' ><td></td><td>" + "no corrected" + "</td><td></td><td>" + "</td><td>" +  "</td><td></td></tr>";
                }
            }


            var fillbody = elem.nextSibling;

            if(fillbody.innerHTML.length < 8)
            {
                fillbody.innerHTML = "<table>" + bele + "</table>";
            }
            else
            {
                fillbody.innerHTML = "";
            }




        }

        function showTask(ss) {

            var cime = globalCorrected[ss].apath;
            var id = globalCorrected[ss].id;

            // get task file and user hw file from the corrected ones
            var ajaxFileNav = "ajaxGetCorrHw.php";
            var path = "user=" + globalUserDir + "&taskid=" + id + "&code=0";
            updateHW(ajaxFileNav , path).then(function (res) {

               document.getElementById("userResult").innerHTML = res;

               path = "taskPath=" + cime + "&code=1";
               updateHW(ajaxFileNav, path).then(function (value) {
                   processTask(value, res);
               })

            });
        }

        function processTask(taskFile, res) {

            var studHw = JSON.parse(res);
            var obj = JSON.parse(taskFile);
            var Type = obj.type;

            if(Type == 0)
            {
                type0(taskFile, studHw);
            }
            else if(Type == 1)
            {
                type1(taskFile, studHw);
            }
            else
            {
                alert(Type);
            }

        }

        var popupVon;


        function bodyClick() {

            var popups = document.getElementsByClassName("vonalasExp");
            for(var i = 0;i<popups.length;i++)
            {
                popups[i].style.visibility = "hidden";
            }
        }

    </script>

</head>
<body onclick="bodyClick();" >

<div id="wrapper">



<?php

$amenu = file_get_contents("menusor.html");
echo $amenu;
?>

<div style="width: 50%;display: inline-block;background-color: #ffffff;padding: 4px ">

<?php

$userFolders = "../USERS_HW/";
$mappak = scandir($userFolders);
$mapFilt = array_values(array_diff($mappak, array('.', '..')));

for($i=0;$i<count($mapFilt);$i++)
{
    echo "<div>"; // nagy keret
    echo "<div class='headF' onclick='getFiles(this);' >" . $mapFilt[$i] . "</div>";
    echo "<div class='bele'></div>";
    echo "</div>"; // nagy keret vege
}

?>
</div>
    <div id="taskDiv" style="width: 45%;display: inline-block;background-color: #b4ccfb;vertical-align: top">

        <div id="userResult" style="padding: 8px;background-color: #ffffff" ></div>
        <div id="taskResult" style="background-color: white;margin-top: 4px" ></div>
    </div>


    <div id="result"></div>



</div><!-- wrapper vege -->
</body>
</html>