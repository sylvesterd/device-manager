<?php
include 'libs/init.php';
$posts = $_POST;

$username=$helpers->h($posts['uname']);

$condition = array("UUsername="=>'$username');
$arraydata=array(
    "UPassword"=> password_hash($posts['pword'], PASSWORD_BCRYPT),
);

//check if username exist

$sql="SELECT * FROM ".TBL_USERS." WHERE UUsername='$username'";

$check=$dbase->dbquery($sql);

if(!empty($check)){
    $query=$dbase->updates(TBL_USERS, $arraydata, $condition);

    print json_encode([
        "code"=>"NETAPPS 0102:",
        "flag"=> 1,
        "msg"=> 'Password changed Successfully',
    ]);
    die();
}else{

    print json_encode([
        "code" => "NETAPPS 0009:",
        "flag"=>0,
        "msg"=> '\'<strong style="color: #F00">Username does not exist!</strong>\'',
    ]);
    die();
}


