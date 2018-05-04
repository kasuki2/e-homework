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
    <title>crt Gram6</title>
<style>


</style>
<script>



        function fileNevClick(eli)
        {
          var fne = eli.innerHTML;
          if(eli.innerHTML === null)
          {
              fne = eli.value;
          }
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


                    showBasicInfo(this.responseText);

                }
            };
            kuld = "openThis=" + path1;
            xhttp.open("POST", "../ajaxsendBasic.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);

        }

        function update(fneve)
        {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    showBasicInfo2(this.responseText);

                }
            };
            kuld = "openThis=" + fneve;
            xhttp.open("POST", "ajaxsendBasic.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);
        }


        function showBasicInfo2(inpu) {

            showInfo(inpu);
        }

        function showBasicInfo(inpu)
        {

           var infok = inpu.split('~');
            document.getElementById("taskTitle").innerHTML = infok[0];
            document.getElementById("instru").value = infok[1];
            document.getElementById("examples").value = infok[4];
            var tipusa = infok[2];
            var contents = JSON.parse(infok[3]);



            if(contents.length > 0)
            {

                var sent = "";

                for(var i = 0;i<contents.length;i++)
                {
                    sent += "<tr><td>" + (parseInt(i) + 1) + ".</td><td>" + contents[i].longsent + "</td></tr>";
                }

                document.getElementById("theTask").innerHTML = "<table>" + sent + "</table>";

            }

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



function mondatClick(cod)
{
  var awords = document.getElementById("wordsText").value;
  awords = awords.replace(/\n/g, "");
  var atext = document.getElementById("mondat").value;
  atext = atext.replace(/\n/g, "");
  var alters = document.getElementById('alternatives').value;
 alters = alters.replace(/\n/g, "");

  alters = alters.split('_');

  var examp = document.getElementById("examples").value;
  examp = examp.replace(/\n/g, "");

    var helps =  document.getElementById("helperFile").value;
    helps = helps.replace(/\n/g, "");

    var helpArr = helps.split("€");
    var helper = JSON.stringify(helpArr);

  var oneUnit = {};
  oneUnit.id = 0;
  oneUnit.longsent = awords;
  oneUnit.starter = atext;
  oneUnit.alters = alters;


    if(cod == 1 || cod == 2) // update or delete item
    {
        var jsontext = document.getElementById("tobecorrected").value;
        if(jsontext.trim() == "")
        {
            alert("A javítandó mező üres. Katt a mondatra, amit javítani vagy törölni akarsz.");
            return;
        }

        var fullJson1 = JSON.parse(jsontext);
        var fullJson = JSON.stringify(fullJson1);

    }
    else
    {
         fullJson = JSON.stringify(oneUnit);
    }




    var tWeig = document.getElementsByClassName("taskWeight");
    var taskWe = 0;
    for(var i = 0;i<tWeig.length;i++)
    {
        if(tWeig[i].checked)
        {
            taskWe = i;
            break;
        }
    }



  var pw = document.getElementById("jelsz").value.trim();
  var fileN = document.getElementById("fileName").value.trim();
  var taskTit = document.getElementById("taskTitle").value.trim();
  var inst = document.getElementById("instru").value.trim();

  var kuld = "passw=" + pw + "&code=" + cod + "&fileName=" + fileN + "&helps=" + helper + "&taskTitle=" + taskTit + "&instru=" + inst + "&exampl=" + examp + "&weight=" + taskWe + "&fullText=" + fullJson;


  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {


          showGram6(this.responseText);

      }
  };

  xhttp.open("POST", "receiveGram6.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(kuld);



}

function showGram6(inp)
{
    document.getElementById("okdiv").innerHTML = inp;
    var azElem = document.getElementById("fileName");
    update(azElem.value);
}


</script>




  </head>
  <body style="background-color:#557755" >

<div style="background-color:#efefef;width:90%;margin-left:auto;margin-right:auto" >

<div style="padding-top: 36px;padding-bottom: 36px;background-color: #44826e" >
    <div style="margin-left: 36px;color: #ffffff;font-size: 26px" >CREATE GRAMMAR TASK 6</div>
    <span style="margin-left: 36px;color: #f3e82d" >Egy hosszú mondat, amit át kell alakítani. Néha van egy-két kezdő szó. </span>
</div>

    <?php
    $amenu = file_get_contents("menusor.html");
    echo $amenu;

    ?>

<div style="backgroundColor:#aaffaa">
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

    <div style="background-color: #c1ffb0;width: 50%;margin-left: 36px;display: inline-block;vertical-align: top">

        <div id="info">?</div>

        <div  >
            <div class="dirFrame" id="FELADATOK" ><div class="dirHead" style="vertical-align: top" onclick="getSome('0', this)" >FELADATOK</div><div id='second' >????</div></div>

        </div>
    </div>
    <div style="display: inline-block;width: 30%;background-color: #05cbe6;vertical-align: top" >
        <div>
        <div class="dirFrame2" id="HELPERS" ><div class="dirHead2" style="vertical-align: top" onclick="getSome('0', this)" >HELPERS</div><div id='second2' >????</div>
        </div>

    </div>

</div>
  <div style="margin-left: 36px;margin-top: 24px" >
      File neve:<input type="text" id="fileName" style="width: 280px" ><span> Jelszó: </span><input type="text" id="jelsz" name="pw"  ><br />
      <div style="margin-top: 4px" >HELPER FILE:<textarea  id="helperFile" style="color: #ff0000;font-weight: bold" ></textarea></div>
      <div>feladat címe: </div>
      <textarea cols="60" rows="2" id="taskTitle" >

      </textarea>
      <br />
  </div>

  <div style="margin-left: 36px">Instructions:</div>
  <div style="margin-left: 36px" ><textarea cols="50" rows="2" id="instru" name="inst" ></textarea></div>

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

    <hr style="margin-left: 36px;margin-right: 36px" >
  <div style="margin-left: 36px" >Példamondatok (az alternatívákat underscore-ral elválasztani, kivéve az elsőt)</div>
  <textarea id='examples' style="width:70%;margin-left: 36px" ></textarea>


  <div id="theTask" style="background-color: #ffffff;padding: 4px;margin-left: 36px;margin-right: 36px" >

  </div>

    <textarea style="background-color:#ffaaaa;width:90%;margin-top:8px;margin-left:40px;margin-right:40px" id='tobecorrected' >??</textarea>
    <div style="margin-top:4px;text-align:right" ><button onclick="mondatClick(1);">delete this</button><button onclick="mondatClick(2);" >update this</button></div>

<div style="margin-top:8px;margin-left: 36px" >a szöveg kihagyott szavait underscore-ral kell jelölni</div>

<div style="margin-left: 36px" >INPUT MONDAT, AMIT ÁT KELL ALAKÍTANI</div>
<textarea id='wordsText' style="width:80%;margin-left: 36px" ></textarea>

<div style="margin-left: 36px" >ESETLEGES KEZDŐ SZÓ</div>
  <textarea cols="50" rows="1" id="mondat"  style="margin-top: 12px;margin-left: 36px" >

  </textarea>

<div style="margin-left: 36px" >A MEGOLDÁSOK ALTERNATÍVÁI: az alternatívákat underscore-ral kell elválasztani egymástól, kivéve az elsőt.</div>

<textarea id='alternatives' style="width:80%;margin-left: 36px" ></textarea>

  <div style="margin-left: 36px" ><button onclick="mondatClick(0);" >mondat</button></div>


  <div id='okdiv' style="margin-left: 36px">??</div>
</div>



  </body>
</html>
