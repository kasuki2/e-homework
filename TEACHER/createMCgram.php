<?php
require_once "checklogin.php";
?>
<!DOCTYPE html>
<html>
<<?php

$fils = preg_grep('/^([^.])/', scandir("../FELADATOK"));
$fils = array_values($fils);

 ?>
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">
    <script src="commonjs.js"></script>

    <title>cr gram</title>


    <style>

        body
        {
            background-color: #306f55;
        }
        #container
        {
            width: 90%;
            background-color: #efefef;
            margin-right: auto;
            margin-left: auto;
        }
        #workSpace
        {

            background-color: #ffffff;
            margin-right: auto;
            margin-left: auto;
            padding-top: 24px;
            padding-left: 12px;
            padding-right: 12px;
            padding-bottom: 36px;
        }
        .textAreaDist
        {
            margin: 12px;
            overflow: hidden;
        }
        .textSolus
        {
            margin: 8px;
        }
        .filNevek
        {
          padding: 4px;
          margin: 4px;
          cursor: pointer;
        }

        textarea
        {
            overflow:hidden;
        }

    </style>

    <script>


        var gaps = 0;
        function mondatClick()
        {
            var szoveg = document.getElementById("mondat").value;
            var reszek = szoveg.split('_');
            gaps = reszek.length - 1;
            var bele = "";
            var sol = "";
            var exp = "";

            var taskTy = document.getElementById('task0').checked;
            var taskty2 = document.getElementById('task2').checked;
            var tastipus = 0;
            if(taskTy === true)
            {
              tastipus = 0;
            }
            if(taskty2 === true)
            {
              tastipus = 2;
            }
            var upto = reszek.length-1;
            if(tastipus == 2)
            {
              upto = 1;
            }
            for(i=0;i<upto;i++)
            {
                bele = bele + "<textarea class='textAreaDist' id='dists" + i + "' ></textarea>";
              //  sol = sol + "<input class='textSolus' type='text' id='solu" + i + "'>";
                exp = exp + "<textarea class='textAreaDist' id='expl" + i + "' ></textarea>";
                if(i+1%3==0)
                {
                    bele = bele + "<br />";
                }
            }

            document.getElementById("distractors").innerHTML = bele;
            document.getElementById("solus").innerHTML = "<input class='textSolus' type='text' id='solus2' >";
            document.getElementById("explana").innerHTML = exp;

            setTimeout(focu, 100);

        }


        function check()
        {
            var dists = document.getElementsByClassName("textAreaDist");
            alert(dists.length);
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

        function focu()
        {
            document.getElementById("dists0").focus();
        }


        function sendin()
        {
            var totaltext = "";

            // mondat
            var amondat = document.getElementById("mondat").value.trim();
            amondat = amondat + "§"; // mondat lezárása

            // get distractors
            var dist = "";
            for(i=0;i<gaps;i++)
            {
                var distText = document.getElementById("dists" + i).value.trim();
                dist = dist + distText + "ß";
            }



                var megoText = document.getElementById("solus2").value.trim();



            var expli = "";
            for(i=0;i<gaps;i++)
            {
                var expText = document.getElementById("expl" + i).value.trim();
                expli = expli + expText + "ß";
            }

            document.getElementById("totalText").innerHTML = amondat + dist + "§" + megoText + "§" + expli;
        }


      function sendin2()
      {
        // generate
        var totaltext = "";

        // mondat
        var amondat = document.getElementById("mondat").value.trim();

        var sent = amondat.split("_");

        var taskTy = document.getElementById('task0').checked;
        var taskTy1 = document.getElementById('task1').checked;
        var taskty2 = document.getElementById('task2').checked;

        if(taskTy === true || taskTy1 === true)
        {
          var agaps = sent.length - 1;
        }
        if(taskty2 === true)
        {
           agaps = 1;
        }


        var distAll = [];

        var solG = [];
        var solforGap = "GGG_";
        for(i=0;i<agaps;i++)
        {
            var distText = document.getElementById("dists" + i).value.trim();
            distText = distText.replace(/\n/g, "");
            dist = distText.split("_");
            distAll.push(dist);
            solG.push("GGG");
            solforGap += "GGG_";
        }



        var megoText = document.getElementById("solus2").value.trim();
          var sol = [];

          if(megoText.includes("_"))
          {
              sol = megoText.split("_"); // separate alternatives
              //sol.push(kisSol);
          }
          else
          {
              sol.push(megoText);
          }



        var expliAll = [];
        var explforGAp = [];
        for(i=0;i<agaps;i++)
        {
            var expText = document.getElementById("expl" + i).value.trim();
            expText = expText.replace(/\n/g, "");
            var exp = expText.split("_");
            expliAll.push(exp);
            explforGAp.push(expText);
        }

        var allEnt = {};
        if(taskTy === true || taskty2 === true) // MC gram and ABC gram
        {
          allEnt.id = 0;
          allEnt.sentence = sent; // good for GAP
          allEnt.solutions = solG; // good for GAP
          allEnt.distractors = distAll;
          allEnt.solu = sol;
          allEnt.remarks = expliAll;
        }


        if(taskTy1 === true) // GAP Grammar
        {
          allEnt.id = 0;
          allEnt.sentence = sent; // good for GAP
          allEnt.solutions =  distAll; // alternatives
          allEnt.userTipps = solforGap; // GGG GGG

          allEnt.explain = explforGAp; // explanations
        }

        var ajson = JSON.stringify(allEnt);

        document.getElementById("totalText").innerHTML = ajson;
      }



        function sendData(bel)
        {

          if(bel == "x")
          {
          var totalText =  document.getElementById("totalText").innerHTML.trim();

          }
          else
           {
          totalText = document.getElementById("tobecorrected").value.trim();

          }



            var filNev = document.getElementById("fileName").value.trim();
            var instr = document.getElementById("instru").value.trim();
            var cime = document.getElementById("taskTitle").value.trim();
            var ajsz = document.getElementById("jelsz").value.trim();

            var taskTy = document.getElementById('task0').checked;
            var taskt1 = document.getElementById('task1').checked;
            var taskty2 = document.getElementById('task2').checked;
            var tastipus = 0;
            if(taskTy === true)
            {
              tastipus = 0;
            }
            if(taskt1 === true)
            {
                tastipus = 1;
            }
            if(taskty2 === true)
            {
              tastipus = 2;
            }

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

            var helps =  document.getElementById("helperFile").value;
            helps = helps.replace(/\n/g, "");

            var helpArr = helps.split("€");
            var helper = JSON.stringify(helpArr);

          //  alert(tastipus);

            if(filNev == "")
            {
                alert("Nincs file név.");
                return;
            }

            if(instr == "")
            {
                alert("Nincs instrukció megadva.");
                return;
            }

            if(cime == "")
            {
                alert("Nincs címe.");
                return;
            }

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    uzenet(this.responseText);

                }
            };
            kuld = "text1=" + totalText + "&fnev=" + filNev + "&inst=" + instr + "&cim=" + cime + "&jsz=" + ajsz + "&tasktip=" + tastipus + "&helps=" + helper + "&taskWeight=" + taskWeight + "&code=" + bel; // code x means we append a new item
            xhttp.open("POST", "ajaxRecGram1.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);
        }


        function uzenet(inpe)
        {
            document.getElementById("totalText").innerHTML = inpe;

            var azElem = document.getElementById("fileName");
            update(azElem.value);
        }


        function update(fneve)
        {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    showInfo(this.responseText);

                }
            };
            kuld = "openThis=" + fneve;
            xhttp.open("POST", "ajaxsendBasic.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);
        }



        /*
        function fileNevClick(eli)
        {
          var fne = eli.innerHTML;
          var fn = fne.split('.');

            var step1 = eli.innerHTML.split('FELADATOK');

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

          document.getElementById("fileName").value = path1;



            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    showInfo(this.responseText);

                }
            };
            kuld = "openThis=" + path1;
            xhttp.open("POST", "ajaxsendBasic.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);

        }

        var globalContents = "";
        function showInfo(inpu)
        {
           var infok = inpu.split('~');
            document.getElementById("taskTitle").value = infok[0];
            document.getElementById("instru").value = infok[1];
            var tipusa = infok[2];
            var contents = "";

            if(tipusa == 0)
            {

                radiobtn = document.getElementById("task0");
                radiobtn.checked = true;
                contents = infok[3];

            }
            if(tipusa == 1)
            {

                radiobtn = document.getElementById("task1");
                radiobtn.checked = true;
                contents = infok[3];

            }
            if(tipusa == 2)
            {

                radiobtn = document.getElementById("task2");
                radiobtn.checked = true;
                contents = infok[3];

            }

            if(contents.length > 0)
            {
                var contents2 = JSON.parse(contents);
                globalContents = JSON.parse(contents);
                var sent = "";
                for(var i = 0;i<contents2.length;i++)
                {
                    var von = " _________ ";
                    var sentenceArr = contents2[i].sentence;
                    var kis = "";
                    for(var s = 0;s<sentenceArr.length;s++)
                    {
                        if(s === sentenceArr.length -1)
                        {
                            von = "";
                        }

                        kis += sentenceArr[s] + von;

                    }
                    var so = i+1;
                    sent += "<tr onclick='itemInfo("+ i +");' ><td>" + so + ".</td><td>" + kis + "</td></tr>";
                }

                document.getElementById("theTask").innerHTML = "<table>" + sent + "</table>";

            }

        }

        function itemInfo(be) {

          document.getElementById("tobecorrected").innerHTML = JSON.stringify(globalContents[be]);
        }
        */

    </script>


</head>
<body>


<div id="container">
    <div style="padding: 24px;background-color: #3e475a" >
        <div style="color: #ffffff;font-size: 28px;font-family: Source Serif Pro, PT Sans, Trebuchet MS, Helvetica, Arial " >CREATE MC GRAM AND ABC GRAM</div>
        <div style="margin-top: 0;color: #05cbe6">create a task file type 0 or type 2</div>
    </div>
    <div>
      <?php
        $amenu = file_get_contents("menusor.html");
        echo $amenu;
      ?>


    </div>
    <div id="workSpace">

      <?php

        /*
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

        <div style="background-color: #c1ffb0;width: 50%;display: inline-block">

            <div id="info">?</div>

            <div  >
                <div class="dirFrame" id="FELADATOK" ><div class="dirHead" onclick="getSome('0', this)" >FELADATOK</div><div id='second' >????</div></div>

            </div>
        </div>

        <div style="display: inline-block;width: 30%;background-color: #05cbe6;vertical-align: top" >
            <div>
                <div class="dirFrame2" id="HELPERS" ><div class="dirHead2" style="vertical-align: top" onclick="getSome('0', this)" >HELPERS</div><div id='second2' >????</div>
                </div>
         </div>
            </div>


        <div style="margin-top: 24px" >File neve:<input type="text" id="fileName" style="width: 320px" ><span> Jelszó: </span><input type="text" id="jelsz" name="pw"  ><br />
            <div>feladat címe: </div>
            <textarea cols="60" rows="2" id="taskTitle" >

            </textarea>
            <br />
            <div style="margin-top: 4px" >HELPER FILE:<textarea  id="helperFile" style="color: #ff0000;font-weight: bold" ></textarea></div>
        </div>

        <div>Instructions:</div>
        <div><textarea cols="50" rows="2" id="instru" name="inst" ></textarea></div>
        <div>Taks types:
          <span style="background-color:#aaaaff"><label for='task0'>MC grammar</label> <input  type='radio' name="tasktype" id='task0'></span>
            <span style="background-color:#aaffaa"><label for='task1'>Gap grammar</label> <input type='radio' name="tasktype" id='task1'></span>
           <span style="background-color:#ffffaa"><label for='task2'>ABC grammar</label> <input type="radio" name="tasktype" id='task2'></span>

         </div>
        <br />
        <div><span>TASK LEVEL: </span><span>?</span></div>
        <div>Task level:
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

        <div id="theTask" style="background-color: #dfdfdf;padding: 4px" >

        </div>
        <textarea style="background-color:#ffaaaa;width:90%;margin-top:8px" id='tobecorrected' >??</textarea>
        <div style="margin-top:4px;text-align:right" ><button onclick="sendData('1');">delete this</button><button onclick="sendData('2');" >update this</button></div>

        <textarea cols="100" rows="4" id="mondat" onkeypress="onTestChange();" style="margin-top: 12px" >

        </textarea>

        <div><button onclick="mondatClick();" >mondat</button></div>
        <div>Distractors. Start each word with an underscore: _ OR if GAP grammar, write in the acceptable solutions</div>
        <div id="distractors"></div>
        <div>Solutions. Write them this way: _0-1-1 _0-0-0 If they bind: _1a-1-1a _0a-1-1a.</div>
        <div id="solus" ></div>
        <div>Explanations. Write: _correct solution _Correct: much, because advice is an uncount</div>
        <div id="explana"></div>
        <!-- <button onclick="check();" >check</button>
        <button onclick="focu();">focus</button> -->
        <button onclick="sendin2();" >generate</button>
        <button onclick="sendData('x');">SEND</button>
        <div></div>
        <div id="totalText">??</div>
    </div>


</div>




</body>
</html>
