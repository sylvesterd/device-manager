<?php
include 'libs/init.php';

$gets = $_POST;

$newValues='';
$status = $gets['status'];
foreach ($gets['id'] as $value) {
    $newValues .= $value.',';
}

$newValues2=rtrim($newValues,',');


$d="UPDATE ".TBL_REQUEST." SET RStatus = '$status'  WHERE RId IN($newValues2)";

$dbase->plainquery($d);

die(json_encode([
    "code" => 'NETAPPS 0059:',
    "flag" => 0,
    "msg" => "Records updated successfully",
]));