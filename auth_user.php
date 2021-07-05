<?php
include 'libs/init.php';
$posts = $_POST;

$updatedAt = date("Y-m-d H:i:s");
$condition = array("UId =" => $posts['user_id']);
$arraydata=array(
    "UFromDate"=>$helpers->newlovely_date($posts['fromdate']),
    "UToDate"=>$helpers->newlovely_date($posts['todate']),
    "UFromTime"=>$helpers->newpretty_time($posts['fromtime']),
    "UToTime"=>$helpers->newpretty_time($posts['totime']),
    "UApprovalStatus"=>$posts['authstatus'],
    "UUpdatedAt"=>$updatedAt
);

//print_r($arraydata); die();

$check = $dbase->updates(TBL_USERS, $arraydata, $condition);

if($check){

    print json_encode([
        "code"=>"NETAPPS 0104:",
        "flag"=> 1,
        "msg"=>'Account authorized Successfully',
    ]);
    die();
} else {
    print json_encode([
        "code"=>"NETAPPS 0025:",
        "flag"=>0,
        "msg"=> 'There was a problem authorizing user.',
    ]);
    die();
}



