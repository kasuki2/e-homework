<?php
require_once "checklogin.php";
?>


<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">
    <script src="commonjs.js"></script>
    <title>crt Gram5</title>


    <style>


    </style>

<script>



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
            xhttp.open("POST", "../ajaxsendBasic.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);

        }








function mondatClick(cod)
{
  var awords = document.getElementById("wordsText").value;
  awords = awords.replace(/\n/g, "");
  var atext = document.getElementById("mondat").value;
  atext = atext.replace(/\n/g, "");
    var alternat = document.getElementById("alternatives").value.trim();
    alternat = alternat.replace(/\n/g, "");

    var corForms = document.getElementById("correctForms").value.trim();
    corForms = corForms.replace(/\n/g, "");
    var corArr = corForms.split("_");

  var wordsArr = awords.split("_");


  //  var textArr = atext.split("_"); // array only on the basis of gaps
    var helps =  document.getElementById("helperFile").value;
    helps = helps.replace(/\n/g, "");

    var helpArr = helps.split("€");
    var helper = JSON.stringify(helpArr);

    var alterArr = alternat.split("_");

  var oneUnit = {};
  oneUnit.id = 0;
  oneUnit.words = wordsArr;
  oneUnit.text = atext; // nem kell szétválasztani semmivel
    oneUnit.alterns = alterArr;
    oneUnit.wordforms = corArr;
  var fullJson = JSON.stringify(oneUnit);
if(cod == 2)
{
  var updatedText = document.getElementById("tobecorrected").value;
  fullJson1 = JSON.parse(updatedText);
  fullJson = JSON.stringify(fullJson1);
}
if(cod == 3)
{

  oneUnit.id = 0;
  oneUnit.words = wordsArr;
  oneUnit.text = atext; // nem kell szétválasztani semmivel
    oneUnit.alterns = alterArr;
    oneUnit.wordforms = corArr;
  var fullJson = JSON.stringify(oneUnit);
  //alert(fullJson);

}

    var tWeig = document.getElementsByClassName("taskWeight");
    var taskWe = 0;
    for(var i = 0;i<tWeig.length;i++)
    {
        if(tWeig[i].checked)
        {
            tWeig = i;
            break;
        }
    }

  var pw = document.getElementById("jelsz").value.trim();
  var fileN = document.getElementById("fileName").value.trim();
  var taskTit = document.getElementById("taskTitle").value.trim();
  var inst = document.getElementById("instru").value.trim();

  var kuld = "passw=" + pw + "&code=" + cod + "&fileName=" + fileN + "&taskTitle=" + taskTit + "&instru=" + inst + "&helps=" + helper + "&weight=" + tWeig + "&fullText=" + fullJson;


  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {


          showGram5(this.responseText);

      }
  };

  xhttp.open("POST", "receiveGram5.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(kuld);



}


function showGram5(inpu)
{
    alert(inpu);
}

    function navto(page)
    {
        window.location.href = page;
    }
</script>




  </head>
  <body style="background-color:#aa6666" >

<div style="background-color:#efefef;width:90%;margin-left:auto;margin-right:auto" >

    <div style="background-color: #489ba1;color: #ffffff;padding-top: 36px;padding-bottom: 36px">
        <div style="margin-left: 24px;font-size: 24px" >CREATE GRAMMAR TASK 5</div>
    </div>


    <?php
    $amenu = file_get_contents("menusor.html");
    echo $amenu;

    ?>

<div style="background-color:#f0fff1">
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


  <div style="margin-left: 36px;margin-top: 16px">File neve:<input type="text" id="fileName" ><span> Jelszó: </span><input type="text" id="jelsz" name="pw"  ><br />
      <div style="margin-top: 4px" >HELPER FILE:<textarea  id="helperFile" style="color: #ff0000;font-weight: bold" ></textarea></div>
      <div style="margin-top:4px">feladat címe: </div>
      <textarea cols="60" rows="2" id="taskTitle" >

      </textarea>
      <br />
  </div>

  <div style="margin-left: 36px;margin-top: 16px">Instructions:</div>
  <div style="margin-left: 36px"><textarea cols="50" rows="2" id="instru" name="inst" ></textarea></div>

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

  <div id="theTask" style="background-color: #dfdfdf;padding: 4px;margin-left:36px;max-width:700px" >

  </div>
  <textarea style="background-color:#ffaaaa;width:90%;margin-top:8px;margin-left:40px;margin-right:40px" id='tobecorrected' >??</textarea>
  <div style="margin-top:4px;text-align:right" ><button onclick="mondatClick(1);">delete this</button><button onclick="mondatClick(2);" >update this</button></div>

<div style="margin-top:8px;margin-left:36px" >a szavakat underscore-ral kell elválasztani, kivéve az elsőt: word _word _word</div>
<div style="margin-top:8px;margin-left:36px" >a szöveg kihagyott szavait underscore-ral kell jelölni</div>

<div style="margin-top:8px;margin-left:36px">SZAVAK</div>
<textarea id='wordsText' style="margin-top:8px;margin-left:36px"></textarea>

    <div style="margin-top:8px;margin-left:36px">A SZAVAK MEGFELELŐ ALAKJAI (a program tudja, hogy melyik szót használta már fel a diák</div>
    <textarea id="correctForms" style="margin-top:8px;margin-left:36px"></textarea>

<div style="margin-top:8px;margin-left:36px">SZÖVEG - a gap helyére underscore-t kell tenni. Ha számozott mondatokat akarunk, akkor a mondat végére ezt kell tenni: # De ha csak egy mondatot adunk a már meglévő szöveghez, akkor nem kell a mondat végére a kettős kereszt.</div>
  <textarea cols="100" rows="4" id="mondat"  style="margin-top: 12px;margin-left:12px" ></textarea>


    <div style="margin-top:8px;margin-left:36px">Alternatív megoldáasok - underscore-ral kell elválasztani őket, kivéve az elsőt</div>
    <textarea id="alternatives" style="margin-top:8px;margin-left:36px" ></textarea>

  <div style="margin-top:8px;margin-left:36px"><button onclick="mondatClick(0);" >send full text</button><button onclick="mondatClick(3);" >send plus one sentence</button></div>


  <div id='okdiv' style="margin-top:8px;margin-left:36px">??</div>
</div>



  </body>
</html>
