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

    if(inpu.charAt(0) != "{") // HELPER FILE
    {
        return;
    }

    var taskFile = JSON.parse(inpu);
   // var infok = inpu.split('~');


    var tit = document.getElementById("taskTitle");
    if(tit.tagName == "textarea")
    {
        alert("it's textaerea");
        document.getElementById("taskTitle").value = taskFile.title;
        document.getElementById("instru").value = taskFile.instructions;
    }
    else
    {
        document.getElementById("taskTitle").innerHTML = taskFile.title;
        document.getElementById("instru").innerHTML = taskFile.instructions;
    }

    var tipusa = taskFile.type;
    var contents = "";
    contents = taskFile.contents;

    var allTaskLevel = document.getElementsByClassName("taskWeight");
    if(allTaskLevel.length >0)
    {
      for(var i = 0;i<allTaskLevel.length;i++)
      {
        allTaskLevel[i].checked = false;
      }

        var wei = taskFile.weight;

        if(typeof wei != 'undefined')
        {

            allTaskLevel[wei].checked = true;
        }

    }


    if(tipusa == 0)
    {
        radiobtn = document.getElementById("task0");
        radiobtn.checked = true;
    }
    if(tipusa == 1)
    {
        radiobtn = document.getElementById("task1");
        radiobtn.checked = true;
    }
    if(tipusa == 2)
    {
        radiobtn = document.getElementById("task2");
        radiobtn.checked = true;
    }
    if(tipusa == 3)
    {
        radiobtn = document.getElementById("task3");
        if(radiobtn != null)
        {
            radiobtn.checked = true;
        }

    }

    if(tipusa == 5)
    {
        radiobtn = document.getElementById("task4");
        radiobtn.checked = true;
    }
    if(tipusa == 6)
    {
        radiobtn = document.getElementById("task5");
        radiobtn.checked = true;
    }


    if(taskFile.helps != null)
    {
        var helps =  document.getElementById("helperFile");
        var allHelps = "";
        if(taskFile.helps.length>1)
        {
            var veg = "€";
        }
        else
        {
            veg = "";
        }
        for(i=0;i<taskFile.helps.length;i++)
        {
            if(i==taskFile.helps.length-1)
            {
                veg = "";
            }
            allHelps += taskFile.helps[i] + veg;
        }
        helps.value = allHelps;
    }


    if(tipusa == 0 || tipusa == 2 || tipusa == 1)
    {
      if(contents.length > 0)
      {
          var contents2 = taskFile.contents;
          globalContents = taskFile.contents;
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
              sent += "<tr onclick='itemInfo("+ i +", 0);' ><td>" + so + ".</td><td>" + kis + "</td></tr>";
          }

          document.getElementById("theTask").innerHTML = "<table>" + sent + "</table>";

      }


    }
    else if(tipusa == 1)
    {
      var contents2 = taskFile.contents;
      globalContents = taskFile.contents;

      if(contents2.length > 0)
      {
        for(var i = 0;i<contents2.length;i++)
        {

        }
      }
    }
    else if(tipusa == 3)
    {
      var contents2 = taskFile.contents;
      globalContents = taskFile.contents;

      if(contents2.length > 0)
      {

        var tabSor = "";
        var words = "";
        var wordDivs = "";
          for(var i = 0;i<contents2.length;i++)
          {
            var sor = "";
            var ge1 = contents2[i].gel;
            var ge2 = contents2[i].ge2;
            var ge3 = contents2[i].ge3;
            sor += ge1 + " __________ " + ge2;
            if(ge3.trim() != "")
            {
              sor += " _________ " + ge3;
            }

            var w1 = contents2[i].go1;
            var w2 = contents2[i].go2;
            var fullWo = w1 + " " + w2;
            wordDivs += "<div style='display:inline-block;margin-left:4px;padding:4px;background-color:#9999ff' >"+ fullWo.trim() +"</div>";

            tabSor += "<tr onclick='itemInfo("+ i +", 0);' ><td>"+ parseInt(i+1) + ".</td><td>" + sor + "</td></tr>";

          }

          var wordSor = "<tr><td colspan='2' >"+ wordDivs +"</td></tr>"


          document.getElementById("theTask").innerHTML = "<table>" + wordSor + tabSor + "</table>";
      }
    }
    else if(tipusa == 5)
    {
        contents2 = taskFile.contents;
        globalContents = taskFile.contents;
        var awords = contents2.words;
        wordDivs = "";
        for(i=0;i<awords.length;i++)
        {
            wordDivs += "<div style='display:inline-block;margin-left:4px;padding:4px;background-color:#9999ff' >"+ awords[i] +"</div>";
        }

        var atext = contents2.text;

        var numbered = false;

        if(atext.includes("#"))
        {
            numbered = true;
        }


         tabSor = "";
        if(numbered) // we have to number the sentences line by line
        {
            var senti = atext.split("#");

            for(var t = 0;t<senti.length;t++)
            {

                var monDarab = senti[t].split("_");

                var mondsor = "";
                for(var m = 0;m<monDarab.length;m++)
                {
                    var vonal = "<input class='texInp'  id='" + t + m + "' type='text'  >";
                    if(m == monDarab.length -1)
                    {
                        vonal = ""; // last input text not needed
                    }
                    mondsor += monDarab[m] + vonal;
                }
                tabSor += "<tr onclick='itemInfo("+ i +", 5);' ><td style='vertical-align: top' >" + parseInt(t+1) + ".</td><td>" + mondsor + "</td></tr>";
            }
        }
        else
        {

            var nagytext = atext.split("_");
            var textsor = "";
            for(t = 0;t<nagytext.length;t++)
            {
                vonal = "<input class='texInp'  id='" + t + "' type='text'  >";
                if(t == nagytext.length -1)
                {
                    vonal = ""; // last input text not needed
                }
                textsor += nagytext[t] + vonal;
            }

            tabSor = "<tr onclick='itemInfo("+ i +", 5);'><td>" + textsor + "</td></tr>";

        }

        tabSor = "<table>" + tabSor + "</table>";
        wordDivs = "<div>" + wordDivs + "</div>";
        document.getElementById("theTask").innerHTML = wordDivs + tabSor;
    }
    else if(tipusa == 6)
    {
        globalContents = taskFile.contents;
        contents2 = taskFile.contents;
        document.getElementById("examples").value = taskFile.exa;
        var longSe = "";
        for(i=0;i<contents2.length;i++)
        {
             longSe += "<tr onclick='itemInfo("+ i +", 6);' ><td>" + parseInt(i+1) + ".</td><td>" + contents2[i].longsent + "</td></tr>";
             longSe += "<tr><td></td><td>" + contents2[i].starter + "</td></tr>";
             longSe += "<tr><td></td><td>____________________________</td></tr>";

        }

        document.getElementById("theTask").innerHTML = "<table>" + longSe + "</table>";

    }


}

function itemInfo(be, type) {

  if(type != 5)
  {
    document.getElementById("tobecorrected").value = JSON.stringify(globalContents[be]);
  }
  else
    {
      document.getElementById("tobecorrected").innerHTML = JSON.stringify(globalContents);
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

function updateHW(filename, kuld)
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
        xhttp.send(kuld);
    })
}



var getSome = function(pa, elem)
{
    var foldConten = elem.nextSibling;

    if(foldConten.children.length != 0) // close
    {
        foldConten.innerHTML = "";
    }
    else
    {
        if(elem.className == "dirHead")
        {
            var code = 0;
        }
        else
        {
            code = 1;
        }

        var fileName = "adirscan.php";
        var kuld = "apath=" + pa + "&code=" + code;

        updateHW(fileName, kuld).then(function (res) {
            fillSg(res, elem, code); // if 0, then it is TASK file, it it is 1, then it is a HELPER file
        });
    }

};

function testit(elem, elemo, afun)
{

    var nodes = [];

    nodes.push(elem);
    while(elem.parentNode) {
        nodes.unshift(elem.parentNode);
        elem = elem.parentNode;
    }


    var apa = "";
    for(var i = 0;i<nodes.length;i++)
    {
        if(nodes[i].className == "dirFrame")
        {
            if(nodes[i].id != "FELADATOK")
            {
                apa += nodes[i].id + "/";
            }

        }
    }



    // if it is a folder, go to getSome
    // if it is just a file, go to fileNevClick

    afun(apa, elemo);

}

var fileNameClick = function (apa, elem) {
    // alert(apa + elem.innerHTML);
    var path1 = apa + elem.innerHTML;
    if(elem.className == "fileSor")
    {
        document.getElementById("fileName").value = path1;
    }
    else
    {
        document.getElementById("helperFile").value = path1;
    }




    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {


            showInfo(this.responseText);

        }
    };
    var kuld = "openThis=" + path1;
    xhttp.open("POST", "ajaxsendBasic.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(kuld);


};

function fillSg(inp, elem, code)
{

    if(code == 0)
    {
        var aclass = "class='dirHead'";
        var aclass2 = "class='fileSor'";
    }
    else
    {
         aclass = "class='dirHead2'";
         aclass2 = "class='fileSor2'";
    }


    var alldirs = JSON.parse(inp);
    var bele = "";

    for(var i = 0;i<alldirs.length;i++)
    {
        if(alldirs[i].dir === true)
        {
            bele += "<div class='dirFrame' id=" + "'" + alldirs[i].name  + "'" + " ><div " + aclass + " onclick='testit(this, this, " + getSome + ")' >" + alldirs[i].name + "</div><div></div></div>";
        }
        else
        {
            bele += "<div " + aclass2 + " onclick='testit(this, this, " + fileNameClick + ")' >" + alldirs[i].name + "</div>";
        }
    }


    var pari = elem.parentElement;
    var kids = pari.children;
    kids[1].innerHTML = bele;

   // document.getElementById("info").innerHTML = alldirs.length;

}
