<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head lang="en">
    <meta charset="UTF-8">
    <title>Manage Assigned hw</title>

    <style>
        .naviButt
        {
            background-color: #00a100;
            color: #ffffff;
            padding-left: 24px;
            padding-right: 24px;
            padding-top: 8px;
            padding-bottom: 8px;
            display: inline-block;
            cursor: pointer;
        }

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

        var tipusColors = ["#5a9ddd", "#69c879", "#eb44ae", "#fff300", "#557755", "#aaaaaa", "#5894ab"];

        function choseStudent(ele)
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
            var kuld = "tasks=" + inpu + "&code=6"; // get assigned tasks
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
                        bele += "<tr id='tip-" + i + "' style='background-color: " + tipusColors[obj[i].tipus] + "' onclick='checkVonalas(this);' ><td>" + parseInt(i + 1) + "</td><td><input class='taskIDs' value='" + obj[i].id + "' type='checkbox'>" + obj[i].date1 + " </td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td style='color: " + tipusColors[obj.tipus] + "' >" + obj[i].tipus + "</td></tr>";
                    }
                    else
                    {
                        bele += "<tr id='tip-" + i + "' style='background-color: " + tipusColors[obj[i].tipus] + "' onclick='checkVonalas(this);' ><td>" + parseInt(i + 1) + "</td><td><input class='taskIDs' value='" + obj[i].id + "' type='checkbox'>" + obj[i].date1 + " </td><td>"  + obj[i].apath + "</td><td>" + obj[i].atitle + "</td><td style='color: " + tipusColors[obj.tipus] + "' >" + obj[i].tipus + "</td></tr>";
                    }


                }
                fill = "<table>" + bele + "</table>";
            }


            document.getElementById('resu').innerHTML = fill;
        }

        function deleteSel()
        {
            var cboxes = document.getElementsByClassName("taskIDs");
            var taskArr = [];
            for(var i = 0;i<cboxes.length;i++)
            {
                if(cboxes[i].checked)
                {
                    taskArr.push(cboxes[i].value); // task id-s
                }
            }

            var tosend = {};
            tosend.userfolder = document.getElementById("selStud").innerHTML.trim();
            tosend.taskids = taskArr;

            var kuld = "content=" + JSON.stringify(tosend) + "&code=7";



            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    //  document.getElementById('results').innerHTML = this.responseText;
                   // alert(this.responseText);
                    document.getElementById("taskBody").innerHTML = this.responseText;
                }
            };

            xhttp.open("POST", "ajaxSendVonalas.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);

        }



        var GLOBTASKPATH;
        function checkVonalas(elem)
        {
            var sorszam = elem.id.split('-'); // sorszam az 1-esben
            var sor = sorszam[1];



            GLOBTASKPATH = obj[sor].apath;
           // GLOBTASKID = obj[sor].id;

            //getUserTipps(obj[sor].id);
            getTheTaskFile();
        }

        var GLOBALUSERTIPS = "";
        var GLOBTASKID = "";


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

         //   alert(inpu);
            //    alert(globTaskFile[0].contents.length);
            var hossz = globTaskFile.contents.length;
            var tipus = globTaskFile.type;
            if(tipus == 0)
            {
                procType0(inpu);
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



        function procType0(inp)
        {

            // GET NEW HOMEWORK AND SHOW THE TAKS
            var minden = "";

            objtype0 = JSON.parse(inp);
            //  document.getElementById("title").innerHTML = obj[0].title;
            //  document.getElementById("instru").innerHTML = obj[0].instructions;

            var contents = objtype0.contents;
            glogTaskCim = objtype0.title;

            globUserTipps = [];
            var bele = "";
            var gap = 0;
            for(i=0;i<contents.length;i++)
            {

                var sentence = contents[i].sentence;


                var sor = "";

                for(var k=0;k<sentence.length;k++)
                {




                    //  var vonal = "<div class='tooltip2' id='" + i + k  + "' onclick='vonalClick(this);' > <span class='vona'>__________</span><span>" + agi[k] + "</span> <span id='s" + i + k + "' class='tooltiptext2'>" + inn + "</span></div>";
                    var vonal = " ____________ ";

                    if(k == sentence.length -1)
                    {
                        vonal = " ";
                    }

                    sor = sor +  sentence[k] + vonal;
                    //  minden = "<tr><td>" + vonal + sentence[k] + vonal + "</td></td>";
                }


                var sorszam = parseInt(i+1);
                bele = bele + "<tr><td>" + sorszam + ".</td><td>" + sor + "</td></td>";
                // alert(bele);



            }

            var instuc = objtype0.instructions;
            // alert(obj.helps);
            var bel = "";
            if(objtype0.helps && objtype0.helps != null)
            {

                for(var h = 0;h<objtype0.helps.length;h++)
                {
                    var nevL = objtype0.helps[h];
                    bel = bel + "<span class='helpSpan' onclick='loadHelper(" + '"' + nevL + '"' + ");' >h</span>";
                }
            }



            var atit = "<tr><td colspan='2' class='tabTitle' >" + objtype0.title + "</td></tr>";
            var azinst = "<tr><td colspan='2' class='tabInstru' >" + instuc + "</td></tr>";
            var helper = "<tr><td colspan='2'>" + bel + "</td></tr>";
            //  var butto = "<tr><td colspan='2' style='padding-top: 16px;padding-bottom: 24px' ><div  style='text-align: center;background-color: #ffffff' ><span id='beadGomb' onclick='check(this)' class='beadomButt'>" + globLang.beadom + "</span></div></td></tr>";



            document.getElementById("taskBody").innerHTML = "<div id='coverMCgram' class='coverMCgram' style='background-color: #ffffff' ><div style='position: relative' >" + "<table class='mondatTable' style='text-align: left;margin-top: 14px;padding-left: 36px;padding-right: 36px' id='montab' >" + atit + azinst +  helper + bele +"</table></div></div>";






        }

    </script>

</head>
<body style="background-color: #4f6f68" >


<div style="width: 90%;background-color: #efefef;margin-left: auto;margin-right: auto" id="wrapper" >
    <div style="width: 100%;background-color: #723a14">
        <h2 style="color: #ffffff;padding: 24px" >MANAGE ASSIGNED HOMEWORK</h2>
    </div>
    <div style="padding: 4px" >
        <div class="naviButt" >CORRECT HW</div>
        <div class="naviButt" >ASSIGN HW</div>
        <div class="naviButt" >CREATE GR 5</div>
        <div class="naviButt" >CREATE GR 6</div>
    </div>

    <div style="padding: 4px">
        <p>SELECT THE STUDENT</p>
        <?php

        $fils = preg_grep('/^([^.])/', scandir("../USERS_HW"));
        $fils = array_values($fils);

        for($i=0;$i<count($fils);$i++)
        {
            echo "<div class='studButt'   onclick='choseStudent(this);' >" . $fils[$i] . "</div>";
        }


    ?>

</div>

<div><span>Selected student: </span><span id="selStud" style="padding: 4px" >?</span></div>
<div id="resu" style="padding: 8px;background-color: #ffffff;overflow: auto">

</div>
<div><button onclick="deleteSel();" >delete selected</button></div>
<div style="padding: 4px;margin-top: 12px;margin-bottom: 12px" id="results" ></div>

<div id="acime" style="margin-top: 12px;padding: 4px;color:#2c8aff" >cime</div>

<div id="taskBody">???</div>



<div style="width: 100%;height: 120px;background-color: #ffffff"></div>
</div><!-- wrapper vege -->

</body>
</html>