<?php





   /*
   class BigFrame
    {
        public $title;
        public $instructions;
        public $weight;
        public $exa; // examples, some html?
        public $type;
        public $helps; // array for helping documents, but only for grammar
        public $contents; // array of arrays of OneItem
    }
*/
require_once("BigFrame.php");

    class OneItem
    {
        public $id;
        public $sentence;
        public $solutions;
        public $distractors;
        public $solu;
        public $remarks;
    }

    $cont = "semmi";
    $van = false;
    $js = "";


    if($_POST['jsz'] != "Kasuki2009")
    {
        echo "Bad password";
        exit;
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
        $cont = $_POST['text1'];
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

if(isset($_POST['tasktip']))
{
  $feladatTipus = $_POST['tasktip'];
}
else {
  echo 'no task type error.';
  exit;
}
$taskweight = 0;
if(isset($_POST['taskWeight']))
{
    $taskweight = $_POST['taskWeight'];
}
$helps = "";
if(isset($_POST['helps']))
{
    $helps = $_POST['helps'];
}
// cim




        $aFileNev = "../FELADATOK/" . $fileNeve;
        // van-e file
        $van = file_exists($aFileNev);
        if(!$van)
        {
           // create file
            $myfile = fopen($aFileNev, "w");
        }



        $afile = file_get_contents($aFileNev);
        $fileArray = json_decode($afile);



        if($code == "x") // write in uj item
        {
            if(count($fileArray)<=0)
            {
                $bFrame = new BigFrame();
                $bFrame->title = $atitle;
                $bFrame->instructions = $instructions;
                $bFrame->type = $feladatTipus;
                $bFrame->helps = json_decode($helps); // becuase helps is an array
                $bFrame->weight = $taskweight;


                $elsoArr2 = array();
                $egym = new OneItem();
                $egym = json_decode($cont);



                array_push($elsoArr2, $egym);
                $bFrame->contents = $elsoArr2;


                $menteni = json_encode($bFrame);
                file_put_contents($aFileNev, $menteni);
                echo "saved 1";

            }
            else
            {

                $egym = json_decode($cont);

                $egym->id = ujid();
                $fileArray->title = $atitle;
                $fileArray->instructions = $instructions;
                $fileArray->helps = json_decode($helps); // becuase helps is an array
                $fileArray->weight = $taskweight;
                array_push($fileArray->contents, $egym);

                $menteni = json_encode($fileArray);
                file_put_contents($aFileNev, $menteni);
                echo "saved 2";
            }
        }
        else if($code == "1") // delete item
        {
            $egym = json_decode($cont); // sent from page

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
        else if($code == 2) // update item
        {
          $egym = json_decode($cont); // sent from page

          for($i=0;$i<count($fileArray->contents);$i++)
          {
            if($fileArray->contents[$i]->id == $egym->id)
            {
              $fileArray->contents[$i] = $egym;
              $fileArray->helps = json_decode($helps); // becuase helps is an array
              break;
            }
          }


          $menteni = json_encode($fileArray);
          file_put_contents($aFileNev, $menteni);
          echo "Item updated.";
          
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
