<?php
$path = realpath('../FELADATOK');

$objects = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($path), RecursiveIteratorIterator::SELF_FIRST);
$kezdDir = false;
$zar = true;
  $zz = 0;
foreach($objects as $name => $object)
{
    if(is_dir($name))
    {

        if(strpos($name, "..") !== false && strpos($name, ".") !== false )
        {

            if($kezdDir == true)
            {
                $kezdDir = false;
                echo "</div>"; // záródiv
            }

            $foldName = "<span style='background-color: #f1dd31' >" . "$name" . "</span>";
            echo "<div id='folder1' style='background-color: #ccddf0;padding: 2px' onclick='openit(" . $zz . ")' >" . $foldName . "</div><div id='files" . $zz . "' style='background-color: #ffaff2;display:none'>"; // nyitódiv
            $kezdDir = true;

            $zz++;
        }

    }
    else
    {
          echo "<span onclick='fileNevClick(this);' >" . "$name" . "</span><br />";
    }

}
  echo "</div>"; // végső záró div

?>
