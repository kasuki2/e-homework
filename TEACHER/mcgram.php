<?php

$taskPath = "../FELADATOK/" . "CONDITIONALS/Conditionals.json";

//$taskPath = "../FELADATOK/" . "Tang.json";

$taskFile = file_get_contents($taskPath);
$taskArr = json_decode($taskFile);


$userTipps = "1_2_1_4_5_6_7_8_9_10_11_12_13_14_15_16_17_1_1_1_21_"; // sg like this.

$kuls = explode("_", $userTipps);


class BestSolu
{
    public $sol;
    public $total;
    public $user;
}

$bestsolus = array();
$NagySolue = array();

$contents = $taskArr->contents;
$q = 0;
$corrTips = array();
for($i=0;$i<30;$i++)
{
    $corrTips[$i]= "x";
}

for($i=0;$i<count($contents);$i++)
{
    $soluArr = $contents[$i]->solu;

    for($s=0;$s<count($soluArr);$s++)
    {
        $egyGap = explode("-", $soluArr[$s]);

        for($k=0;$k<count($egyGap);$k++)
        {
            echo $egyGap[$k] . "_ (" . $kuls[$q + $k] . ")";
            if(strpos($egyGap[$k], "a") !== false) // ha van benne "a"
            {
                $ok = false;
                $bel = array();
                for($w=0;$w<count($egyGap);$w++) // az összeset egyenkétn vizsgálni
                {

                    if(strpos($egyGap[$w], "a") !== false && strpos($egyGap[$w], $kuls[$q + $k]) === false)
                    {
                        $ok = false;
                        array_push($bel, "v0");

                    }
                    else
                    {
                       $ok = true;
                        array_push($bel, "v1");

                    }
                    $corrTips[$q + $k] = $bel;
                }

                if($ok)
                {

                }
                else
                {

                }


            }
            else
            {
                if(strpos($egyGap[$k], $kuls[$q + $k]) !== false)
                {
                    $bel = array();
                    array_push($bel, "k1");
                    $corrTips[$q + $k] = $bel;
                }
                else
                {
                    $bel = array();
                    array_push($bel, "k0");
                    $corrTips[$q + $k] = $bel;
                }
            }
        }



    }
    $q = $q + count($egyGap);


    echo "<br>";




}

var_dump($corrTips);
echo "<br><br>";






function ujSor($array)
{
    usort($array, function($a, $b)
    {
        return strnatcmp($a->total, $b->total);
    }
    );
}
?>