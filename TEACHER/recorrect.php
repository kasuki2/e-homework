<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="teacherstyle.css">
    <title>Recorrect hw</title>

    <style>


        .studButt
        {
            padding:8px;
            background-color: #a6c2ca;
            color:#111111;
            display: inline-block;
            margin-left: 8px;
            cursor: pointer;
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

                }
            };
            var kuld = "tasks=" + inpu + "&code=5"; // get corrected tasks
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
                fill = "Nincs javított házi.";
            }
            else if(inpu == "1")
            {
                fill = "Még nem javítottál ki neki házit.";
            }
            else
            {
                obj = JSON.parse(inpu);
                obj.reverse();
                fill = obj.length;
                var bele = "";


                for(var i = 0;i<obj.length;i++)
                {
                    var tipusa = obj[i].tipus; // 0-a akkor MC, ha 1, akkor vonalas nyelvtan
                    if(tipusa == "0")
                    {
                        bele += "<tr id='tip-" + i + "' onclick='checkVonalas(this);' ><td>" + parseInt(i + 1) + "</td><td><input class='taskIDs' value='" + obj[i].id + "' type='checkbox'>" + obj[i].date1 + "  </td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td>" + obj[i].tipus + "</td></tr>";
                    }
                    else if(tipusa == "1") // vonalas
                    {
                        bele += "<tr id='tip-" + i + "' style='background-color: " + tipusColors[obj[i].tipus] + "' onclick='checkVonalas(this);' ><td>" + parseInt(i + 1) + "</td><td>" + obj[i].date1 + " </td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td style='color: " + tipusColors[obj.tipus] + "' >" + obj[i].tipus + "</td></tr>";
                    }
                    else
                    {
                        bele += "<tr id='tip-" + i + "' style='background-color: " + tipusColors[obj[i].tipus] + "' onclick='checkVonalas(this);' ><td>" + parseInt(i + 1) + "</td><td>" + obj[i].date1 + " </td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td style='color: " + tipusColors[obj.tipus] + "' >" + obj[i].tipus + "</td></tr>";
                    }


                }
                fill = "<table>" + bele + "</table>";
            }


            document.getElementById('resu').innerHTML = fill;
        }

        function checkVonalas(elem)
        {
            var sorszam = elem.id.split('-'); // sorszam az 1-esben
            var sor = sorszam[1];
            var fileAdatok = obj[sor].apath + " id: " + obj[sor].id;
            GLOBTASKPATH = obj[sor].apath;
            GLOBTASKID = obj[sor].id;

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


            var kuld = "studMappa=" + studMappa + "&taskID=" + taskid + "&code=5"; // code 5 get info from corrected file

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





        function processTaskFile(inpu) {

            globTaskFile = JSON.parse(inpu);


            //    alert(globTaskFile[0].contents.length);
            var hossz = globTaskFile.contents.length;
            var tipus = globTaskFile.type;
            if(tipus == 0)
            {
                procType0();
            }
            if(tipus == 1)
            {
                alert("proc type 1");
            }
            if (tipus == 3) {

                alert("proc vocab");
                return;
            }
            if (tipus == 2) {
                alert("proc ABC grammar");
                return;
            }
            if (tipus == 5) {
                alert("proc gram 5");
                return;
            }
            if (tipus == 6) {
                alert("proc gram 6");
                return;
            }
        }



        function procType0()
        {
          //  GLOBALUSERTIPS

            var corrItem = JSON.parse(GLOBALUSERTIPS);
            var userTippek = corrItem.userTipps.split("_");



            document.getElementById("acime").innerHTML = globTaskFile.title;

            var ho = globTaskFile.contents.length;
           var sor = "";
            var contents = globTaskFile.contents;
            var soluArr = [];
            var userCoices = [];
            var userSorTipp = [];

            for(var i = 0;i<contents.length;i++)
            {
                var goods = "";
                var sent = "";
                var sentences = contents[i].sentence;
                var bel = "";
                var ust = "";
                for(var s=0;s<sentences.length;s++)
                {
                    var vege = " ________ ";
                    if(s == sentences.length-1)
                    {
                        vege = "";
                    }
                    else
                    {
                        soluArr.push(contents[i].solu);
                        ust += userTippek[i] + "-";


                        var gapSolu = contents[i].solu;
                        var gapSolAr = [];
                        for(var x = 0;x<gapSolu.length;x++)
                        {
                            if(gapSolu[x].includes("-"))
                            {
                                gapSolAr = gapSolu[x].split("-");
                            }
                            else
                            {
                                gapSolAr = [gapSolu[x]];
                            }


                            for(var z=0;z<gapSolAr.length;z++)
                            {
                                //  if(gapSolAr[z].includes(userTippek[i]))
                                if(gapSolAr[z].indexOf(userTippek[i]) !== -1)
                                {
                                    bel += "OK-";
                                }
                                else
                                {
                                    alert(gapSolAr[z] + ":::" + userTippek[i]);
                                    bel += "NO-";
                                }
                            }
                        }

                    }

                    sent += sentences[s] + vege;
                    // compare ust and contents[i].solu.split("-";


                }
                goods += bel;
                userSorTipp.push(ust); // 0, GGG

                var distractors = contents[i].distractors;

                var userChosenAns = [];
                var distWords = "";
                for(var d = 0;d<distractors.length;d++) // number of gaps in a row
                {
                  distWords += distractors[d] + "-";
                }
              //  alert(i + " - " + distWords);
                userChosenAns.push(distWords);


                if(parseInt(i+1)%2==0)
                {
                    var col = "#ffffff";
                }
                else
                {
                    col = "#cdcdcd";
                }

                sor += "<tr style='background-color: " + col + "' ><td>" + parseInt(i+1) + "</td><td>" +  sent + "</td><td>" + distWords  + "</td><td>" + contents[i].solu + "</td><td>" + userSorTipp[i] + "</td><td>" + goods +"</td></tr>";
            }


            var atab = "<table style='max-width: 700px;margin-left: auto;margin-right: auto;padding: 8px' >" + sor + "</table>";
            document.getElementById("taskBody").innerHTML = atab;

        }

    </script>

</head>
<body style="background-color: #4f6f68" >


<div style="width: 90%;background-color: #efefef;margin-left: auto;margin-right: auto" id="wrapper" >
    <div style="width: 100%;background-color: #444444">
        <div style="color: #ffffff;margin-left: 24px;padding-top: 24px;font-size: 34px;font-family: Tahoma, Helvetica, Arial, sans-serif" >RECORRECT HOMEWORK</div>
        <div style="color: #05cbe6;margin-left: 24px;margin-top: 4px" >Recheck corrected homework</div>
    </div>
    <?php
    $amenu = file_get_contents("menusor.html");
    echo $amenu;
    ?>
    
    <div style="padding: 4px">
        <p>SELECT THE STUDENT</p>
        <?php

        $fils = preg_grep('/^([^.])/', scandir("../USERS_HW"));
        $fils = array_values($fils);

        for($i=0;$i<count($fils);$i++)
        {
            echo "<div class='studButt'   onclick='choseTask(this);' >" . $fils[$i] . "</div>";
        }


        ?>

        </div>

        <div><span>Selected student: </span><span id="selStud" style="padding: 4px" >?</span></div>
        <div id="resu" style="padding: 8px;background-color: #ffffff;height: 600px;overflow: auto">

        </div>
    
    <div style="padding: 4px;margin-top: 12px;margin-bottom: 12px" id="results" ></div>

    <div id="acime" style="margin-top: 12px;padding: 4px;color:#2c8aff" >cime</div>

    <div id="taskBody">???</div>



    <div style="width: 100%;height: 120px;background-color: #ffffff"></div>
</div><!-- wrapper vege -->

</body>
</html>