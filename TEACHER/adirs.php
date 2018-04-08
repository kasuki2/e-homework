<!DOCTYPE html>
<html>
<head>
    <style>
        #wrap
        {
            width: 1000px;
            background-color: #ffffff;
            margin-left: auto;
            margin-right: auto;
            padding: 12px;
        }

        .results
        {
            background-color: #ddeeff;
            margin-top: 16px;
            padding: 4px;

        }
    </style>

    <script>
        function getPath(ele)
        {
            var aPa = ele.childNodes;
            var azPa = aPa[0].innerHTML;

            document.getElementById("resu").innerHTML = azPa;
            gettingSub(azPa)
        }


        function gettingSub(pathy)
        {

            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {


                    uzenet(this.responseText);

                }
            };
            kuld = "path=" + pathy;
            xhttp.open("POST", "ajaxEzdir.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send(kuld);
        }


        function uzenet(cb)
        {
            document.getElementById("resu2").innerHTML = cb;
        }
    </script>


</head>
<body>
<div id="wrap">
<?php




//$apath = $_POST['apath'];


//echo $apath;

// GET DIRS AND FILES

$apath = "../FELADATOK";

$fils = preg_grep('/^([^.])/', scandir($apath, 2));
$fils = array_values($fils);



$path = realpath('../FELADATOK');

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
        echo "<span>" . "$name" . "</span><br />";
    }

}








$mind = "";
for($i=0;$i<count($fils);$i++)
{
    $fullPa = "../FELADATOK/" . $fils[$i];
    if(is_dir("../FELADATOK/". $fils[$i]))
    {

        $mind .= "<span onclick='getPath(this);' ><span class='fullPa' > " . $fullPa  . " </span><span style='background-color:#00a100' >" . $fils[$i] . "</span></span><br />";
    }
    else
    {
        $mind .= "<span  ><span class='fullPa' > " . $fullPa  . " </span><span style='background-color:#efefef' >" . $fils[$i] . "</span></span><br />";
    }

}

//echo $mind;
?>




    <div class="results" id="resu">

    </div>
    <div class="results" id="resu2">

    </div>
</div>

</body>
</html>
