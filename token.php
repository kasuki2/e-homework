<?php


echo date('Y-m-d-H');
echo "<br>";
$ora = date('G');
//$ora = 14;
if($ora>=5 && $ora <=9) // 5 és 9 között
{
    $ora = facto($ora);
    $ora = round($ora * 7.35);
}
elseif($ora == 0 || $ora <5) // 0 és 4 között
{
    $ora = $ora * 2 + 14;
}
else
{
    $ora = round($ora * 3.14 * 10 + 9.84);
}

echo "<br>";
echo "fact ora: " . $ora;


function facto($num)
{
    $factorial = 1;
    $num = 5;
    for ($x=$num; $x>=1; $x--)
    {
        $factorial = $factorial * $x;
    }
    return $factorial;
}

?>