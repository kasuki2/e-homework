<?php

session_start();
$jelsz = "";
$login = false;

// arriving here from another page, not from the login page
if(!isset($_POST["jesz"])) // ha máshonnan jön, és nem küld jelszót, de már be vagyun lépve, akkor OK
{
    if( $_SESSION["ajsz"] == "Kasuki2009")
    {
        $login = true;
    }
}

if(isset($_SESSION["ajsz"]))
{
    if($_SESSION["ajsz"] == "Kasuki2009")
    {
        $login = true;
    }

}
// log in from log-in page, there is a password sent
if(isset($_POST["jesz"]))
{
    if($_POST["jesz"] == "Kasuki2009")
    {
        $login = true;
        $_SESSION["ajsz"] = $_POST["jesz"];
    }

}

if(!$login)
{
    require_once "config.php";
    header("Location: " . $TEACHER_LOGIN);
    exit();
}

/*
if(!isset($_SESSION["ajsz"]) ||  $_SESSION["ajsz"] != "Kasuki2009"  )
{
    $_SESSION["ajsz"] = $_POST["jesz"];
}
else
{
    header("Location: http://localhost:8888/ehome/TEACHER/teacherlogin.php");
    exit();
}
*/
?>



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>correct hw</title>
    <link rel="stylesheet" type="text/css" href="css_sender2.css">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">
    <style>
        body
        {
            background-color: #536eca;
        }
        #container
        {
            width: 1200px;
            margin-left: auto;
            margin-right: auto;
            background-color: #ffffff;
            padding: 12px;
        }
        button
        {
            margin: 4px;
        }
        .alter
        {
          padding: 4px;
          background-color: #bbccdd;
        }
        .sendGomb
        {
            padding-left: 24px;
            padding-right: 24px;
            padding-top: 4px;
            padding-bottom: 4px;
            background-color: #c50000;
            color:#ffffff;
            cursor: pointer;
            border-radius: 12px;
        }
        .appraise
        {
            padding-left: 8px;
            padding-right: 8px;
            padding-top: 4px;
            padding-bottom: 4px;
            margin-left: 8px;
            display: inline-block;
            background-color: #f5e7e5;
            color: #404040;
            cursor: pointer;
            border-radius: 4px;
        }
    </style>

    <script>
        var tipusColors = ["#5a9ddd", "#69c879", "#eb44ae", "#fff300", "#557755", "#666666", "#5894ab"];
        function choseTask(ele)
        {
            document.getElementById("selStud").innerHTML = ele.innerHTML;
            getFile(ele.innerHTML);
        }


        function getFile(inpu)
        {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {

                    processResponse(this.responseText);
                   // document.getElementById('resu').innerHTML = this.responseText;
                }
            };
            kuld = "tasks=" + inpu + "&code=0"; //
            xhttp.open("POST", "ajaxCorrectHw.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);
        }

        var obj = "";
        function processResponse(inpu)
        {
            var fill = "";
            if(inpu == "0")
            {
                fill = "Nincs beadott házi.";
            }
            else if(inpu == "1")
            {
                fill = "Még nem adott be házit.";
            }
            else
            {
                obj = JSON.parse(inpu);
                fill = obj.length;
                var bele = "";


                for(var i = 0;i<obj.length;i++)
                {
                    var tipusa = obj[i].tipus; // 0-a akkor MC, ha 1, akkor vonalas nyelvtan
                    if(tipusa == "0")
                    {
                        bele += "<tr style='background-color:#ffffff' id='tip-" + i + "' onclick='checkVonalas(this);' ><td style='background-color: " + tipusColors[tipusa] +"' ><input class='taskIDs' value='" + obj[i].id + "' type='checkbox'> " + obj[i].date1 + "  </td><td></td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td>" + obj[i].tipus + "</td></tr>";
                    }
                    else if(tipusa == "1") // vonalas
                    {
                        bele += "<tr style='background-color:#ffffff' id='tip-" + i + "' onclick='checkVonalas(this);' ><td style='background-color: " + tipusColors[tipusa] +"' >" + obj[i].date1 + " </td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td>" + obj[i].tipus + "</td></tr>";
                    }
                    else
                    {
                        bele += "<tr style='background-color:#ffffff' id='tip-" + i + "'  onclick='checkVonalas(this);' ><td style='background-color: " + tipusColors[tipusa] +"' >" + obj[i].date1 + " </td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td>" + obj[i].tipus + "</td></tr>";
                    }


                }
                fill = "<table>" + bele + "</table>";
            }


            document.getElementById('resu').innerHTML = fill;
        }


        function correctHW()
        {
            var aStud = document.getElementById("selStud").innerHTML.trim();

            if(aStud == "")
            {
                alert("Nem választottál diákot.");
                return;
            }

            var checkBoxes = document.getElementsByClassName("taskIDs");


                var taskID = [];
                taskID.push(aStud); // a 0-ik elem a diák mappájának a neve
            var pipa = 0;

            for(var i = 0;i<checkBoxes.length;i++)
            {
                if(checkBoxes[i].checked)
                {
                    pipa++;
                }
            }

            if(pipa == 0)
            {
                alert("Nem választottál feladatot.");
                return;
            }

               for(var i = 0;i<checkBoxes.length;i++)
               {
                   if(checkBoxes[i].checked)
                   {
                       taskID.push(checkBoxes[i].value);
                   }
               }

                var perf = document.getElementById("perfi").innerHTML.trim();


               var akuld = JSON.stringify(taskID);
            var amess = document.getElementById("studMessage").value;
            alert(amess);
                var kuld = "tasks=" + akuld + "&message=" + amess + "&perf=" + perf + "&code=1"; // code 1 correct the homeworks

                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {


                        document.getElementById('resu2').innerHTML = this.responseText;
                    }
                };

                xhttp.open("POST", "ajaxCorrectHw.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send(kuld);



        }


        var GLOBTASKPATH = "";
        function checkVonalas(elem)
        {
            document.getElementById("studMessage").value = "";

            var sorszam = elem.id.split('-'); // sorszam az 1-esben
            var sor = sorszam[1];
            var fileAdatok = obj[sor].apath + " id: " + obj[sor].id;
            GLOBTASKPATH = obj[sor].apath;
            GLOBTASKID = obj[sor].id;
          //  alert(fileAdatok);
            // get users tipps
            // get original task file
            getUserTipps(obj[sor].id);
        }


        var GLOBALUSERTIPS = "";
        var GLOBTASKID = "";
        function getUserTipps(taskid)
        {

            var studMappa = document.getElementById("selStud").innerHTML;
            if(studMappa.trim() == "")
            {
                alert("nincs választott diák.");
                return;
            }


            var kuld = "studMappa=" + studMappa + "&taskID=" + taskid + "&code=0"; // code 1 correct the homeworks

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    document.getElementById('results').innerHTML = this.responseText;
                    GLOBALUSERTIPS = this.responseText;
                    getTheTaskFile();
                }
            };

            xhttp.open("POST", "ajaxSendVonalas.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);
        }


        function getTheTaskFile()
        {
           // alert(GLOBTASKPATH);

            var kuld = "taskPath=" + GLOBTASKPATH + "&code=1"; // code 1 send the task file

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                  //  document.getElementById('results').innerHTML = this.responseText;
                    processTaskFile(this.responseText);
                }
            };

            xhttp.open("POST", "ajaxSendVonalas.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);
        }

        var globTaskFile;
        function processTaskFile(inpu)
        {

            globTaskFile = JSON.parse(inpu);
        //    alert(globTaskFile[0].contents.length);
            var hossz = globTaskFile.contents.length;
            var tipus = globTaskFile.type;
            if(tipus == 0)
            {
              processType0(inpu);
              return;
            }
            if(tipus == 3)
            {

                procVocab();
                return;
            }
            if(tipus == 2)
            {
                procABCgram();
                return;
            }
            if(tipus == 5)
            {
                procGram5();
                return;
            }
            if(tipus == 6)
            {
                procGram6();
                return;
            }

            var userTippek = GLOBALUSERTIPS.split('_');
          //  alert(userTippek.length);
            var mind = "";
            var correctSolus = [];
            var veg = "";
            var coArr = [];
            for(var i = 0;i<hossz;i++)
            {
                soluArr = globTaskFile.contents[i].solutions;

                for(var s = 0;s<soluArr.length;s++)
                {

                  var singleSolArr = soluArr[s];
                  var alternats = "";
                  if(singleSolArr.length > 1)
                  {

                    for(u=0;u<singleSolArr.length;u++)
                    {
                      alternats = alternats + singleSolArr[u] + "__";
                    }
                  }
                  else
                  {
                    alternats = singleSolArr;
                  }


                    correctSolus.push(alternats);
                    /*
                    var egyMondat = globTaskFile.contents[i].sentence;
                    var belem = "";
                    var vonal = " ________ ";
                    for(var s = 0;s<egyMondat.length;s++)
                    {
                        if(s === egyMondat.length-1)
                        {
                            vonal = "";
                        }
                        belem += egyMondat[s] + vonal;
                    }
                    */
              }

            }
          //  alert(correctSolus.length);
            var mus = "";

            for(c=0;c<correctSolus.length;c++)
            {
              var corr = false;
              if(correctSolus[c].includes('__'))
              {

                var solalt = correctSolus[c].split('__');
                for(var t=0;t<solalt.length;t++)
                {
                 // alert(solalt[t] + " " + userTippek[c]);
                  if(solalt[t] == userTippek[c])
                  {
                    //  alert('stimmel');
                    corr = true;
                    break;
                  }
                }
              }
              else {
                if(correctSolus[c] == userTippek[c])
                {
                  corr = true;
                }
              }
              var szin = "style='background-color:#88ff44'";
              var ok = "OK";
              if(!corr)
              {
                szin = "style='background-color:#ff8888'";
                ok = "NO";
              }



              mus = mus + "<tr " + szin + " ><td>" + correctSolus[c] + "</td><td>" + userTippek[c] + "</td><td class='azOK' onclick='changeOk(this)' >" + ok + "</td><td><input class='Trem' type='text' value='-'></tr></tr>";
              coArr.push("<span>(" + correctSolus[c] + ") </span><span " + szin +" >" + userTippek[c] + "</span><span class='azOK' onclick='changeOk2(this)' >" + ok + "</span><span><input class='Trem' type='text' value='-'></span>");
            }


            var egyMondat = globTaskFile.contents;


            var asor = "";
            var z = 0;
            for(var s = 0;s<egyMondat.length;s++)
            {
                var belem = "";
                var cori = "";
                var vonal = " ________ ";
               var egySor = egyMondat[s].sentence;
               for(var k=0;k<egySor.length;k++)
               {
                   if(k === egySor.length -1)
                   {
                       vonal = "";
                   }
                   else
                   {
                       cori += coArr[z];
                       z++;
                   }
                   belem += egySor[k] + vonal;


               }

               asor += "<tr><td>" + belem + "</td></tr>";
               asor += "<tr><td>" + cori + "</td></tr>";

            }


            //  alert("<table>" + mind + "</table>");
            var gombSor = "<span style='padding: 4px;cursor: pointer;background-color: #1a6cfb;color:white' onclick='sendCorr();' >SEND CORRECTED</span>";
            var headSor = "<tr><td>CORRECT SOL.</td><td colspan=2 >USER TIPS</td><td>Teacher Remarks</td></tr>";
          // document.getElementById('vonalasResult').innerHTML = "<table>" + headSor + mus + gombSor + "</table>" + "<br>" + "<table>" + asor + "</table>" + gombSor;
            document.getElementById('vonalasResult').innerHTML = "<table>" + asor + "</table>" + gombSor;
        }


        function changeOk2(elem)
        {
            if(elem.innerHTML == "OK")
            {
                elem.innerHTML = "NO";
                elem.previousSibling.style.backgroundColor = "#ff7978";
            }
            else
            {
                elem.innerHTML = "OK";
                elem.previousSibling.style.backgroundColor = "#89ffa3";
            }

        }

        function procABCgram()
        {
            var sentences = globTaskFile.contents;
            glogTaskCim = globTaskFile.title;

            var userTips = GLOBALUSERTIPS.split('_');

            var mondatSor = "";
            var corrSolu = [];
            var corrects = 0;
            var incorrects = 0;
            for(var i = 0;i<sentences.length;i++)
            {

               // corrSolu.push(sentences[i].solu);
                var correctSol = sentences[i].solu;
                var kisSor = "";
                var egyMond = sentences[i].sentence;
                var corr = false;

                if(userTips[i] == correctSol)
                {
                    corr = true;
                }
                for(var s = 0;s<egyMond.length;s++)
                {

                    var von = " _________ ";
                    if(s == egyMond.length-1)
                    {
                        von = "";
                    }
                    kisSor = kisSor + egyMond[s] + von;
                }
                var sori = i+1;
                mondatSor = mondatSor + "<tr><td style='padding-top: 12px;width: 18px' >" + sori + ".</td><td style='padding-top: 12px' >" +  kisSor + "</td></tr>";

                // distracor choices

                var dist = sentences[i].distractors;
                var realDist = "";
                var distSor = "";
                var cc = userTips[i];
                for(var d = 0;d<dist.length;d++)
                {

                    var kisDist = dist[d];
                    for(var k = 0;k<kisDist.length;k++)
                    {

                        var usTip = "";
                        if(cc == k)
                        {

                            usTip = "style='color:#0000ff;font-weight:bold'";
                        }
                        else
                        {

                            usTip = "style='color:#111111;font-weight:normal'";
                        }
                        var betu = String.fromCharCode(65 + k);
                        realDist = realDist + "<td "+ usTip+" >" +  betu + ") " + kisDist[k] + "</td>";
                    }

                }

                var azok = "NO";
                var stil = "style='color:#aa0000'";
                if(corr)
                {
                    azok = "OK";
                    stil = "style='color:#00aa00'";
                    corrects++;
                }
                else
                {
                    incorrects++;
                }
                distSor = "<tr><td colspan='3' ><table style='width: 100%' id='tab_" + i + "' ><tr>" + realDist + "</tr></table></td><td " + stil +" onclick='toggOK(this);' class='abcOK' >" + azok + "</td><td><input class='abcTrem' type='text' value='' ></td></tr>";
                mondatSor = mondatSor + distSor;

            }

            var acim = "<tr><td colspan='2'  class='tabTitle' >" + globTaskFile.title + "</td></tr>";

            var inst = "<tr><td colspan='2' class='tabInstru'>" + globTaskFile.instructions + "</td></tr>";

            var foTab = "<table class='mondatTable' style='max-width: 700px;background-color: #efefef;margin-left: auto;margin-right: auto;padding: 36px;' >" + acim + inst + mondatSor + "</table>";

            if(incorrects == 0)
            {
                var aperf = "OK";
                var ast = "style='color:#009900;font-weight:bold;background-color:#ffffff;padding:4px;cursor:pointer;text-align:center'";
            }
            else
            {
                aperf = "NO";
                ast = "style='color:#ff0000;font-weight:bold;background-color:#ffffff;padding:4px;ursor:pointer;;text-align:center'";
            }

            var perfDiv = "<div id='perfi' " + ast +" onclick='toggOK(this);' >" + aperf +"</div>";

            var corrIt = perfDiv + "<div style='text-align: center' ><span style='cursor: pointer;background-color: #2ea1cb;padding: 4px;margin-top: 8px' onclick='sendABCcorr();' >ABC GRAM JAVÍTÁS KÜLDÉSE</span></div>";
            document.getElementById("vonalasResult").innerHTML = foTab + corrIt;


        }

        function sendABCcorr()
        {

            // getting teacher's remarks
           var trems = document.getElementsByClassName("abcTrem");
            var allRems = "";
            for(var i = 0;i<trems.length;i++)
            {
                var ert = "";
                if(trems[i].value.trim() == "")
                {
                    ert = "-";
                }
                else
                {
                    ert = trems[i].value.trim();
                }
                allRems += ert + "_";
            }

            // getting the teacher's corrections, OK or NO
            var azokek = document.getElementsByClassName("abcOK");
            var azOK = "";

            for(i=0;i<azokek.length;i++)
            {
                azOK = azOK + azokek[i].innerHTML.trim() + "_";
            }

            var amess = document.getElementById("studMessage").value;

            var aStud = document.getElementById("selStud").innerHTML.trim();
            if(aStud == "")
            {
                alert("Nem választottál diákot.");
                return;
            }


            var taskID = [];
            taskID.push(aStud); // a 0-ik elem a diák mappájának a neve
            taskID.push(GLOBTASKID); // ide a task id-je kerül


            var akuld = JSON.stringify(taskID);

            var perf = document.getElementById("perfi").innerHTML.trim();


            var kuld = "tasks=" + akuld + "&corrects=" + azOK +  "&perf=" + perf + "&remarks=" + allRems + "&message=" + amess + "&code=1"; // code 1 correct the homeworks
           // alert(kuld);

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    document.getElementById('resu2').innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "ajaxCorrectHw.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);


        }
        var number = 0;
        function procGram5()
        {
            glogTaskCim = globTaskFile.title;

            var solus = globTaskFile.contents.alterns;

            var userTips = GLOBALUSERTIPS.split('_');

            var soluTab = "";
            number = solus.length;

            for(var i = 0;i<solus.length;i++)
            {
                var ok = "?";
                if(solus[i].indexOf(userTips[i]) !== -1)
                {
                    ok = "<span style='cursor: pointer;color: #00a100;font-weight: bold' onclick='toggOK(this)' class='azOK' >OK</span>";
                }
                else
                {
                    ok = "<span style='cursor: pointer;color: #ff0000;font-weight: bold' onclick='toggOK(this)' class='azOK'>NO</span>";
                }
                soluTab += "<tr><td>" + solus[i] + "</td><td>" + userTips[i] + "</td><td>" + ok + "</td><td><input type='text' class='Trem' id='trem" + i + "' value='-' ></td></tr>";
            }

            var cimdiv = "<div style='padding-top:12px;padding-bottom: 12px;padding-left: 12px;font-weight: bold;color: #723a14;' >Correcting: " + glogTaskCim + "</div>";
            var sendButt = "<div style='padding: 8px;text-align: center' ><button  onclick='sendCorr();' >SEND</button></div>";
            document.getElementById("vonalasResult").innerHTML = cimdiv + "<table style='margin-left: auto;margin-right: auto;padding: 4px;background-color: #ffffff' >" + soluTab + "</table>" + sendButt;

        }

        function procGram6()
        {
            var taskItems = globTaskFile.contents;
            var userTips = GLOBALUSERTIPS.split('_');
            var soluTab = "";

            for(var i = 0;i<taskItems.length;i++)
            {
                var solu = taskItems[i].alters;
                var ok = "?";
                var allSolus = "";
                for(var s = 0;s<solu.length;s++)
                {

                    if(solu[s].includes(userTips[i]))
                    {
                        ok = "<span style='cursor: pointer;color: #00a100;font-weight: bold' onclick='toggOK(this)' class='azOK' >OK</span>";
                        break;
                    }
                    else
                    {
                        ok = "<span style='cursor: pointer;color: #ff0000;font-weight: bold' onclick='toggOK(this)' class='azOK' >NO</span>";
                    }
                }
                for(s = 0;s<solu.length;s++)
                {
                    allSolus += solu[s] + " - ";
                }


                soluTab += "<tr><td>" + allSolus + "</td></tr><tr><td>" + userTips[i] + "</td><td>" + ok + "</td><td><input type='text' class='Trem' id='trem" + i + "' value='-' ></td></tr>";
            }

            var cimdiv = "<div style='padding-top:12px;padding-bottom: 12px;padding-left: 12px;font-weight: bold;color: #723a14;' >Correcting: " + globTaskFile.title + "</div>";
            var sendButt = "<div style='padding: 8px;text-align: center' ><button  onclick='sendCorr();' >SEND</button></div>";
            document.getElementById("vonalasResult").innerHTML = cimdiv + "<table style='margin-left: auto;margin-right: auto;padding: 4px;background-color: #ffffff' >" + soluTab + "</table>" + sendButt;


        }




        function toggOK(elem)
        {

            if(elem.innerHTML.trim() == "OK")
            {
                elem.innerHTML = "NO";
                elem.style.color = "#bb0000";
            }
            else
            {
                elem.innerHTML = "OK";
                elem.style.color = "#00bb00";
            }
        }

        function procVocab()
        {
            var sentences = globTaskFile.contents;
            glogTaskCim = globTaskFile.title;
            //alert(sentences.length);
            var tabrow = "";
            var userTips = GLOBALUSERTIPS.split('_');

            for (var i = 0; i < sentences.length; i++) {
                var egyWord = {};

                var egysor = "";
                var vonal1;
                var vonal2;


                // vonal1 = "<span class='beirtWord' id='von_" + i + "' >  __________ </span>";
                // vonal2 = "<span class='beirtWord' id='von2_" + i + "' >  __________ </span>";
                egysor = egysor + sentences[i].gel.trim() + " " + sentences[i].go1.trim() + " " + sentences[i].ge2.trim() + " " + sentences[i].go2.trim() + " " + sentences[i].ge3.trim();
                egyWord.w1 = sentences[i].go1;
                egyWord.w2 = sentences[i].go2;
                egyWord.id = i;
                egyWord.mean = sentences[i].meaning;

                var corr = "";
                var sti = "";
                if(userTips[i] == i)
                {
                    corr = "OK";
                    sti = "style='background-color:#77ff77'";
                }
                else
                {
                    corr = "NO";
                    sti = "style='background-color:#ff7777'";
                }

                var sorS = i + 1;
                tabrow = tabrow + "<tr " + sti + "  ><td style='vertical-align: top' >" + sorS + ".</td><td>" + egysor + "</td><td>" + corr + "</td><td><input type='text' class='vocRemark' value='-' ></td></tr>";

                var sendDiv = "<div style='text-align: center' ><span style='padding: 4px;cursor: pointer' onclick='corrVoc();' >VOCAB CORRECT</span></div>";

                document.getElementById('vonalasResult').innerHTML = "<table>" + tabrow + "</table>" + sendDiv;
            }
        }



        function corrVoc()
        {
            var vocRams = document.getElementsByClassName("vocRemark");
            var allRem = "";
            for(var i = 0;i<vocRams.length;i++)
            {
                allRem = allRem + vocRams[i].value.trim() + "_";
            }

            var amess = document.getElementById("studMessage").value;

            var aStud = document.getElementById("selStud").innerHTML.trim();
            if(aStud == "")
            {
                alert("Nem választottál diákot.");
                return;
            }

            var taskID = [];
            taskID.push(aStud); // a 0-ik elem a diák mappájának a neve
            taskID.push(GLOBTASKID); // ide a task id-je kerül


            var akuld = JSON.stringify(taskID);
            // here &correctc= is not send because it is not necessary
            var kuld = "tasks=" + akuld + "&remarks=" + allRem + "&message=" + amess + "&code=1"; // code 1 correct the homeworks

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    document.getElementById('resu2').innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "ajaxCorrectHw.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);

        }

        function sendCorr()
        {
          // megosor
          var okek = document.getElementsByClassName('azOK');
            alert(okek.length);
          var megoSor = "";
          for(var i = 0;i<okek.length;i++)
          {
            megoSor = megoSor + okek[i].innerHTML + "_";
          }


            // teachers remarks

            var remas = document.getElementsByClassName("Trem");
            var remSor = "";
            for(var g = 0;g<remas.length;g++)
            {
                var aval = remas[g].value.trim();
                if(aval == "")
                {
                    aval = "-";
                }
                remSor = remSor + aval + "_";
            }



          // student mappa
          var aStud = document.getElementById("selStud").innerHTML.trim();
            if(aStud == "")
            {
                alert("Nem választottál diákot.");
                return;
            }

            // message to the student
            var amess = document.getElementById("studMessage").value;
            alert(amess);

          var taskID = [];
          taskID.push(aStud); // a 0-ik elem a diák mappájának a neve
          taskID.push(GLOBTASKID); // ide a task id-je kerül


          var akuld = JSON.stringify(taskID);
           var kuld = "tasks=" + akuld + "&corrects=" + megoSor + "&remarks=" + remSor + "&message=" + amess + "&code=1"; // code 1 correct the homeworks

           var xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
               if (this.readyState == 4 && this.status == 200) {


                   document.getElementById('resu2').innerHTML = this.responseText;
               }
           };

           xhttp.open("POST", "ajaxCorrectHw.php", true);
           xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
           xhttp.send(kuld);

        }

        function changeOk(elem)
        {
          if(elem.innerHTML == "OK")
          {
            elem.innerHTML = "NO";
            elem.parentElement.style.backgroundColor = "#ff8888";
          }
          else {
            {
              elem.innerHTML = "OK";
              elem.parentElement.style.backgroundColor = "#88ff44";
            }
          }
        }



        function processType0(inp)
        {

          var userSol = GLOBALUSERTIPS.split('_');


          //  alert(userSol.length);
          var minden = "";
          var bele = "";
          chekObj = JSON.parse(inp);


          var contents = chekObj.contents;
          var von = 0;
          var corrSolu = 0;
          var incorrect = 0;
          var notProvided = 0;

          for(var i=0;i<contents.length;i++)
          {

              var sentence = contents[i].sentence;
              var sor = "";
              var distract1 = [];
              distract1 = contents[i].distractors;
              // var_dump($distract1);

              var remarks = [];
              remarks = contents[i].remarks;

              //  var corSolu = contents[i].solu; // ez egy array???
              var corSolu = [];
              corSolu = contents[i].solu;

              var corr = "";

              var kulsoSols = "";
              var bestsolus = [];
              for(var k=0;k<sentence.length;k++)
              {
                  var sols = "";
                  if(k==0)
                  {
                      for(var v=von;v<von + sentence.length-1;v++)
                      {
                          sols = sols + userSol[v] + "-";
                      }
                      kulsoSols = sols;
                      var mindi = "";
                      for(var q=0;q<corSolu.length;q++)
                      {
                          if(q==0)
                          {
                              var sepi = "";
                          }
                          else
                          {
                              sepi = "-";
                          }
                          mindi = mindi + sepi + corSolu[q];
                      }
                      //  alert(kulsoSols + " ::: " + corSolu);
                      //

                      var totcor = 0;
                      for(var c=0;c<corSolu.length;c++)
                      {
                          var corrects = "";
                          var ajo = corSolu[c].split('-');
                          var kuls = kulsoSols.split('-');
                          var ok = false;
                          for(var w=0;w<ajo.length;w++)
                          {
                              if(ajo[w].includes('a'))
                              {
                                  for(var u=0;u<ajo.length;u++)
                                  {
                                      if(ajo[u].includes('a') && ajo[u].includes(kuls[u]) === false)
                                      {
                                          ok = false;
                                          break;
                                      }
                                      else
                                      {
                                          ok = true;
                                      }
                                  }
                                  if(ok)
                                  {
                                      corrects = corrects + "1";
                                      totcor++;
                                  }
                                  else
                                  {
                                      corrects = corrects + "0";
                                  }
                              }
                              else
                              {
                                  if(ajo[w].includes(kuls[w]))
                                  {
                                      corrects = corrects + "1";
                                      totcor++;
                                  }
                                  else
                                  {
                                      corrects = corrects + "0";
                                  }
                              }


                          }
                          var bestsolu = {};
                          bestsolu.sol = corrects;
                          bestsolu.total = totcor;
                          bestsolus.push(bestsolu);

                      }

                      bestsolus.sort(function(a, b){return b.total - a.total});

                  }

                  // egy sor összes user tipple egy stringbe, pl: 1-1-0

                  var jok = bestsolus[0].sol.split("");
                  var astyle = "";

                  if(k<sentence.length-1)
                  {
                      var inn = "";

                      var dist = [];
                      var remi = [];
                      for(var d=0;d<distract1[k].length;d++)
                      {
                          dist = distract1[k];
                          remi = remarks[k];
                      }


                      var ajoSol = false;
                      if(jok[k] == "1")
                      {
                          astyle = "style='color:#008800'"; // correct solution
                          inn = "";
                          corrSolu++;

                      }
                      else
                      {
                          astyle = "style='color:#ff0000'"; // incorrect solution
                          inn = "<span class='word' id='" + i + "w" + k + "w" + "'  >" + remi[userSol[von]] + "</span>";
                          incorrect++;

                      }

                      if(userSol[von].trim() === "GGG")
                      {
                          inn = "<span class='word' id='" + i + "w" + k + "w" + "' onclick='checkerVonalClick(this, event)' >" + "no answer" + "</span>";
                          notProvided++;
                      }

                  }

                  var vonalRa = "??";

                  if(userSol[von].trim() != "GGG")
                  {
                      vonalRa = dist[userSol[von]]; // de még nem tudjuk, hogy ez jó-e
                  }
                  else
                  {
                      vonalRa = "__________";
                  }

                  var vonal = "<div class='tooltip2' id='" + i + "-" + k  + "' onclick='checkerVonalClick(this, event);' style='background-color:#ebebeb;display:inline-block' >";
                  vonal += "<span class='vona' " + astyle + " >" + vonalRa + "</span>";
                  vonal += "<span  id='s" + i + k + "' class='checkeTipText'>" + inn + "</span>";
                  vonal += "</div>";

                  if(k == sentence.length -1)
                  {
                      vonal = " ";
                  }
                  else
                  {
                      von++;
                  }

                  sor = sor +  sentence[k] + vonal;

              }

              var sorszam = parseInt(i+1);
              //bele += "<tr><td colspan='2' ><div class='sorexp' style='height: 0'><div class='vonalasExp' id='tool2" + i + "' ></div></div></td></tr>";
              bele += "<tr><td class='sorsz' >" + sorszam + ".</td><td style='background-color:#ffffff' >" + sor + "</td></td>";

          }


          var instuc =  chekObj.instructions.replace(/B1/g, '<b>');
          instuc =  instuc.replace(/B2/g, '</b>');

          var atit = "<div class='taskInstFrame'><div class='tabTitle' >" + chekObj.title + "</div><div class='tabInstru' >" + instuc + "</div></div>";

          var oss = corrSolu + incorrect;



          var messSor = "<tr><td colspan='2' class='techerMessage'>" + "teacher message" + "</td></tr>";

          var eredMenyTab = "<tr><td colspan='2' style='padding-top: 12px;text-align: right' ><span class='resultInfo' >Correct: "+ corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</td></tr>";

          var eredDiv = "<div class='kisParal' ><span class='resultInfo' >Correct: "+ corrSolu +" / "+ oss +"</span> | <span class='resultInfoIncorr'> Incorrect: "+ incorrect + "</span> of which not answered: " + notProvided + "</div>";
          minden = "<div class='parallaxOuterDiv'>" + atit + "<div class='parallaxDiv'><table style='width:100%;background-color:#ffffff' >" + bele + messSor +"</table>" + eredDiv + "</div></div>";

            if(incorrect == 0)
            {
                var aperf = "OK";
                var ast = "style='color:#009900;font-weight:bold;background-color:#efefef;padding:4px;cursor:pointer'";
            }
            else
            {
                aperf = "NO";
                 ast = "style='color:#ff0000;font-weight:bold;background-color:#efefef;padding:4px;ursor:pointer'";
            }

            var perfDiv = "<div id='perfi' " + ast +" onclick='toggOK(this);' >" + aperf +"</div>";
            var sendDiv = perfDiv + "<div style='text-align: center;padding-top: 24px' ><span class='sendGomb' onclick='correctHW();' >SEND MC GRAM CORRECTED (TYPE 0)</span></div>";

            //  <div style="text-align: center;display: none" id="tipe0Send" ><span onclick="correctHW();" >KÜLDÉS TYPE 0</span></div>

          document.getElementById("vonalasResult").innerHTML =  "<div style='width:700px;background-color:#ccddee;padding:8px;margin-left: auto;margin-right: auto' >" +  minden + sendDiv + "</div>";


        }



        function writeAppraise(elem)
        {
            document.getElementById('studMessage').value = elem.innerHTML
        }
    </script>

</head>
<body>

<div id="container">

    <div style="padding: 8px;background-color: #05cbe6" >
      <span>  CORRECT HOMEWORK</span>
    </div>
    <?php

    $amenu = file_get_contents("menusor.html");
    echo $amenu;

    $fils = preg_grep('/^([^.])/', scandir("../USERS_HW"));
    $fils = array_values($fils);

    for($i=0;$i<count($fils);$i++)
    {
        echo "<div style='padding:8px;background-color: #a6c2ca;color:#111111;display: inline-block;margin-left: 8px;cursor: pointer' onclick='choseTask(this);' >" . $fils[$i] . "</div>";
    }


    ?>
    <div><span>Selected Student: </span><span style="font-weight: bold;color: #bb0000" id="selStud"></span></div>
    <div id="resu" style="padding: 4px;background-color: #efefef" ></div>

    <div id="resu2">??</div>
    <div id='results'></div>
    <div style="margin-left: auto;margin-right: auto;padding: 8px;background-color: #efefef" id="vonalasResult">---</div>
    <div style="text-align: center;display: none" id="tipe0Send" ><span onclick="correctHW();" >KÜLDÉS TYPE 0</span></div>
    <div style="margin-top: 24px" ><span>A short message to the student: </span></div>
    <div><textarea id="studMessage" ></textarea>
        <div class="appraise" onclick="writeAppraise(this);" >EXCELLENT!</div>
        <div class="appraise" onclick="writeAppraise(this);" >Perfect job!</div>
        <div class="appraise" onclick="writeAppraise(this);" >Great job!</div>
        <div class="appraise" onclick="writeAppraise(this);" >Good job!</div>
        <div class="appraise" onclick="writeAppraise(this);" >Very good!</div>
        <div class="appraise" onclick="writeAppraise(this);" >Superb.</div>
        <div class="appraise" onclick="writeAppraise(this);" >Could have been better.</div>
        <div class="appraise" onclick="writeAppraise(this);" >Next time it'll be better.</div>


    </div>
</div>







</body>
</html>
