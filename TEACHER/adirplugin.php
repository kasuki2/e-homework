<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>dirs</title>
</head>

<style>

    .dirFrame
    {
        background-color: #d5c3d1;
        padding: 4px;
    }
    .dirHead
    {
        background-color: #25719e;
        color: #ffffff;
        font-family: Arial, sans-serif;
        padding: 2px;
        cursor: pointer;
    }
    .fileSor
    {
        background-color: #efefef;
        color:#111111;
        padding-left: 12px;
        cursor: pointer;
    }

</style>

<script>

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
        if(foldConten.children.length != 0)
        {
            foldConten.innerHTML = "";
        }
        else
        {
            var fileName = "adirscan.php";
            var kuld = "apath=" + pa;

            updateHW(fileName, kuld).then(function (res) {
                fillSg(res, elem);
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

    var fileNevClick = function (apa, elem) {
        alert(apa + elem.innerHTML);
    };

    function fillSg(inp, elem)
    {

        var alldirs = JSON.parse(inp);
        var bele = "";

        for(var i = 0;i<alldirs.length;i++)
        {
            if(alldirs[i].dir === true)
            {
                bele += "<div class='dirFrame' id=" + "'" + alldirs[i].name  + "'" + " ><div class='dirHead' onclick='testit(this, this, " + getSome + ")' >" + alldirs[i].name + "</div><div></div></div>";
            }
            else
            {
                bele += "<div class='fileSor' onclick='testit(this, this, " + fileNevClick + ")' >" + alldirs[i].name + "</div>";
            }
        }


        var pari = elem.parentElement;
        var kids = pari.children;
        kids[1].innerHTML = bele;




        document.getElementById("info").innerHTML = alldirs.length;
    }

</script>


<body style="background-color: #44826e" >

<div style="width: 90%;margin-left: auto;margin-right: auto;background-color: #ffffff">

    <div id="info">?</div>

    <div style="width: 50%" >
        <div class="dirFrame" id="FELADATOK" ><div class="dirHead" onclick="getSome('0', this)" >FELADATOK</div><div id='second' >????</div></div>



    </div>
</div>



</body>
</html>