<?php


$passw = "";

$passw = $_POST['passw'];

if($passw != "Kasuki2009")
{
    echo "Bad password.";
     exit;
}


$code = $_POST['code'];
$taskweight = 0;
if(isset($_POST['taskWeight']))
{
  $taskweight = $_POST['taskWeight'];
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
    if(count($fileArray)<=0)
    {
        $bFrame = new BigFrame();
        $bFrame->title = $taskTit;
        $bFrame->type = 3;
        $bFrame->instructions = $instr;
        $bFrame->weight = $taskweight;

        $cont = array();
        $azUjArr = json_decode($fullText);
        array_push($cont, $azUjArr);

        $bFrame->contents = $cont;

        $toMent = json_encode($bFrame);
        file_put_contents($aFileNev, $toMent);
        echo "SAVED 1";

    }
    else
    {
      $fileArray->instructions = $instr;
      $fileArray->title = $taskTit;
        $azUjArr = json_decode($fullText);
        $azUjArr->id = ujid();

        array_push($fileArray->contents, $azUjArr);
        $toMent = json_encode($fileArray);
        file_put_contents($aFileNev, $toMent);
        echo "SAVED 2";
    }
}
elseif ($code == 1) // delete item
 {
  # code...  $egym = json_decode($cont); // sent from page
    $egym = json_decode($fullText);

    for($i=0;$i<count($fileArray->contents);$i++)
    {
      if($fileArray->contents[$i]->id == $egym->id)
      {
      unset($fileArray->contents[$i]);
      $fileArray->contents = array_values($fileArray->contents);
      //  echo count($fileArray->contents);

        break;
      }
    }


    $menteni = json_encode($fileArray);
    file_put_contents($aFileNev, $menteni);
    echo "Item deleted.";
}
elseif ($code == 2) // update item
{
  $egym = json_decode($fullText); // sent from page

  for($i=0;$i<count($fileArray->contents);$i++)
  {
    if($fileArray->contents[$i]->id == $egym->id)
    {
      $fileArray->contents[$i] = $egym;
      break;
    }
  }


  $menteni = json_encode($fileArray);
  file_put_contents($aFileNev, $menteni);
  echo "Item updated.";
}

  //  echo "minden ok";




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
