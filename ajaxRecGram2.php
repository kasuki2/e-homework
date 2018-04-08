<?php



class BigFrame
{
    public $title;
    public $instructions;
    public $type; // 0, akkor MC gram, ha 1, akkor vonalas grammar
    public $helps; // array for helping documents, but only for grammar
    public $contents; // array of arrays of OneItem
}

class OneItem
{
    public $id;
    public $sentence;
    public $solutions;
    public $userTipps;
    public $explain;
    public $teacher;

}

$cont = "semmi";
$van = false;
$js = "";


if($_POST['jsz'] != "Kasuki2009")
{
  //  echo "Bad password";
  //  exit;
}
$code = $_POST['code'];

if(isset($_POST['sorsz']))
{
    $sorsz = $_POST['sorsz'];
}
else
{
    $sorsz = 0;
}

if(isset($_POST['text1']))
{
    $fullText = $_POST['text1'];
    $van = true;
}

if(isset($_POST['fnev']))
{
    $fileNeve = $_POST['fnev'];
}
else
{
    echo "Nincs file neve.";
    exit;
}

if(isset($_POST['inst']))
{
    $instructions = $_POST['inst'];
}
else
{
    echo "Nincs instrukció megadva.";
    exit;
}

if(isset($_POST['cim']))
{
    $atitle = $_POST['cim'];
}
else
{
    echo "Nincs cím megadva.";
    exit;
}


if($van) // text was sent
{
    $EGYMOND = new OneItem;

    $mainParts =  explode("§", $fullText);

    $sentenceParts = explode("_", $mainParts[0]);


    $EGYMOND->sentence = $sentenceParts; // array

    $mind = "";
    for($i=0;$i<count($sentenceParts);$i++)
    {
            $mind = $mind . "GGG_";
    }

    $EGYMOND->userTipps = $mind;

    $solutions = explode("@", $mainParts[1]);

    $altSolu = array();

    for($i=0;$i<count($solutions);$i++)
    {
        if(trim($solutions[$i]) != "")
        {
            $egyAltSol = (explode("_", $solutions[$i]));
            array_push($altSolu, $egyAltSol);
        }

    }

    $EGYMOND->solutions = $altSolu;



    $explanations = explode("@", $mainParts[2]);
    $explanations = array_filter($explanations, function($v) { if($v != "") return $v; });
    $EGYMOND->explain = $explanations;

    $teacherRem = explode("@", $mainParts[3]);
    $teacherRem = array_filter($teacherRem, function($v) { if($v != "") return $v; });
    $EGYMOND->teacher = $teacherRem;


    //$toment = json_encode($EGYMOND);
    //echo $toment;

    $aFileNev = "FELADATOK/" . $fileNeve;
    // van-e file
    $van = file_exists($aFileNev);
    if(!$van)
    {
        // create file
        $myfile = fopen($aFileNev, "w");
    }



    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);



    if($code == "x") // APPEND NEW ITEM TO FILE OR CREATE NEW FILE
    {
        if(count($fileArray)<=0)
        {
            $bFrame = new BigFrame();
            $bFrame->title = $atitle;
            $bFrame->instructions = $instructions;
            $bFrame->type = 1; // vagyis vonalas nyelvtan, not MC


            $elsoArr2 = array();
            $EGYMOND->id = 0;


            array_push($elsoArr2, $EGYMOND);
            $bFrame->contents = $elsoArr2;


            $menteni = json_encode($bFrame);
            file_put_contents($aFileNev, $menteni);
            echo "saved 1";

        }
        else
        {
            $EGYMOND->id = ujid();
            $fileArray->title = $atitle;
            $fileArray->instructions = $instructions;
            $fileArray->type = 1;

            array_push($fileArray->contents, $EGYMOND);

            $menteni = json_encode($fileArray);
            file_put_contents($aFileNev, $menteni);
            echo "saved 2";
        }
    }




}
else
{
    echo "No sentence was sent";
}
















function ujid()
{
    global $fileArray;
    $idarray = $fileArray->contents;

    ujSor($idarray);

    return $idarray[count($idarray)-1]->id + 1;
}


function ujSor($array)
{
    usort($array, function($a, $b)
    {
        return strnatcmp($a->id, $b->id);
    }
    );
}
?>