<?php


$passw = "";

$passw = $_POST['passw'];

if($passw != "Kasuki2009")
{
    echo "Bad password.";
    // exit;
}


$code = $_POST['code'];



    if(isset($_POST['fileName']))
    {
        $fileNev = $_POST['fileName'];
    }
    else
    {
        echo "ERROR: No file name.";
        exit;
    }

    if(isset($_POST['taskTitle']))
    {
        $taskTit = $_POST['taskTitle'];
    }
    else
    {
        echo "ERROR: No taskTitle.";
        exit;
    }

    if(isset($_POST['instru']))
    {
        $instr = $_POST['instru'];
    }
    else
    {
        echo "ERROR: No instru.";
        exit;
    }

    if(isset($_POST['fullText']))
    {
        $fullText = $_POST['fullText'];
    }
    else
    {
        echo "ERROR: No fullText.";
        exit;
    }

    if(isset($_POST['weight']))
    {
        $weight = $_POST['weight'];
    }
    else
    {
        $weight = 0;
    }
    $examples = "";

    if(isset($_POST['exampl']))
    {
      $examples = $_POST['exampl'];
    }

    $helps = "";
    if(isset($_POST['helps']))
    {
        $helps = $_POST['helps'];
    }

    $aFileNev = "../FELADATOK/" . $fileNev;
    // van-e file
    $van = file_exists($aFileNev);
    if(!$van)
    {
        // create file
        $myfile = fopen($aFileNev, "w");

    }





    $afile = file_get_contents($aFileNev);
    $fileArray = json_decode($afile);



    require_once("BigFrame.php");

if($code == 0) // add vocab
{
    if (count($fileArray) <= 0) {
        $bFrame = new BigFrame();
        $bFrame->title = $taskTit;
        $bFrame->type = 6;
        $bFrame->instructions = $instr;
        $bFrame->exa = $examples;
        $bFrame->helps = json_decode($helps); // becuase helps is an array
        $bFrame->weight = $weight;

        $cont = array();
        $azUjArr = json_decode($fullText);
        array_push($cont, $azUjArr);

        $bFrame->contents = $cont;

        $toMent = json_encode($bFrame);
        file_put_contents($aFileNev, $toMent);
        echo $taskTit . "~" . $instr . "~" . $examples . "~" . $toMent;

    } else {
        $azUjArr = json_decode($fullText);
        $azUjArr->id = ujid();
        $fileArray->exa = $examples;
        $fileArray->helps = json_decode($helps); // becuase helps is an array
        $fileArray->weight = $weight;

        array_push($fileArray->contents, $azUjArr);
        $toMent = json_encode($fileArray);
        file_put_contents($aFileNev, $toMent);
       // echo $taskTit . "~" . $instr . "~" . $examples . "~" . $toMent;
        echo "ITEM ADDED " . count($fileArray->contents);
    }

    //  echo "minden ok";

}
elseif($code == 1) // delete one item
{

    $egyIt = json_decode($fullText);

    $cont = $fileArray->contents;
    for($i=0;$i<count($fileArray->contents);$i++)
    {
        if($fileArray->contents[$i]->id == $egyIt->id)
        {
            unset($fileArray->contents[$i]);
            $fileArray->contents = array_values($fileArray->contents);
            break;
        }
    }
    $toMent = json_encode($fileArray);
    file_put_contents($aFileNev, $toMent);
    echo "Item deleted";

}
elseif($code == 2) // update one item
{
    $egyIt = json_decode($fullText);
    echo $egyIt->id;
    $cont = $fileArray->contents;
    for($i=0;$i<count($fileArray->contents);$i++)
    {
        if($fileArray->contents[$i]->id == $egyIt->id)
        {
            $fileArray->helps = json_decode($helps); // becuase helps is an array
            $fileArray->contents[$i] = $egyIt;
            $fileArray->contents = array_values($fileArray->contents);
            break;
        }
    }
    $toMent = json_encode($fileArray);
    file_put_contents($aFileNev, $toMent);
    echo "Item updated";
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
