<?php
/**
 * Created by PhpStorm.
 * User: telaw
 * Date: 2018. 02. 26.
 * Time: 19:54
 */

$aFileNev = "../FELHASZ/ausers.json";

$afile = file_get_contents($aFileNev);
//$userArray = json_decode($afile);

echo $afile;

?>