<?php
include 'libs/init.php';

$posts = $_POST;

$newValues='';

foreach ($posts['id'] as $value) {
    $newValues .= $value.',';
}

$newValues2=rtrim($newValues,',');


 $u="UPDATE ".TBL_USERS." SET UApprovalStatus = 'A' WHERE UId IN($newValues2)";
$dbase->plainquery($u);

die(json_encode([
    "code" => 'NETAPPS 0059:',
    "flag" => 0,
    "msg" => "Records authorized successfully",
]));