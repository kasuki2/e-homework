<?php


$passw = "";

$passw = $_POST['passw'];

if($passw != "Kasuki2009")
{
    echo "Bad password.";
    // exit;
}

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

if(isset($_POST['helps']))
{
    $helps = $_POST['helps'];
}
else
{
    $helps = "";
}

$code = $_POST['code'];

if($code == 0) // add item
{



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



    require_once ("BigFrame.php");


    if(count($fileArray)<=0)
    {
        $bFrame = new BigFrame();
        $bFrame->title = $taskTit;
        $bFrame->type = 5;
        $bFrame->instructions = $instr;
        $bFrame->helps = json_decode($helps); // becuase helps is an array
        $bFrame->weight = $weight;

        $cont = array();
        $azUjArr = json_decode($fullText);

        array_push($cont, $azUjArr);

        $bFrame->contents = $azUjArr;

        $toMent = json_encode($bFrame);
        file_put_contents($aFileNev, $toMent);
        echo "SAVED 1";

    }
    else
    {
        $azUjArr = json_decode($fullText);
        $azUjArr->id = ujid();
        $fileArray->helps = json_decode($helps); // becuase helps is an array
        $fileArray->weight = $weight;

        array_push($fileArray->contents, $azUjArr);
        $toMent = json_encode($fileArray);
        file_put_contents($aFileNev, $toMent);
        echo "SAVED 2";
    }

  //  echo "minden ok";

}
elseif ($code == 1) // delete item
 {
  echo "delete item - not implemented";
}
elseif ($code == 2) // update item
 {
   $aFileNev = "../FELADATOK/" . $fileNev;
   // van-e file
   $van = file_exists($aFileNev);
   if(!$van)
   {
       // create file
      echo "This file does not exist: " . $aFileNev;
      exit;
   }

   $afile = file_get_contents($aFileNev);
   $fileArray = json_decode($afile);
   $fileArray->contents = json_decode($fullText);
     $fileArray->weight = $weight;
     $fileArray->helps = json_decode($helps); // becuase helps is an array
   $toMent = json_encode($fileArray);
   file_put_contents($aFileNev, $toMent);
   echo "item updated";
}
elseif ($code == 3) // add only one item to existing file
 {
//  echo "add one item";
$aFileNev = "../FELADATOK/" . $fileNev;
$afile = file_get_contents($aFileNev);
$fileArray = json_decode($afile);
    $fileArray->weight = $weight;

  $egyItem = json_decode($fullText);
//  echo $egyItem->words . " " . $egyItem->text;


    $fileArray->contents->words = array_merge($fileArray->contents->words, $egyItem->words);


  //array_push($fileArray->contents->words, $egyItem->words);
  $fileArray->contents->text .= "#" . $egyItem->text;

    $fileArray->contents->alterns = array_merge($fileArray->contents->alterns, $egyItem->alterns);


    $fileArray->contents->wordforms = array_merge($fileArray->contents->wordforms, $egyItem->wordforms);

  
  //array_push($fileArray->contents->wordforms, $egyItem->wordforms);


  $toMent = json_encode($fileArray);
  file_put_contents($aFileNev, $toMent);
  echo "One item added";


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
