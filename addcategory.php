<?php
include 'libs/init.php';
$posts = $_POST;
$udata= $session->get("activeUser");
$category = $posts['category'];
$cateditid = $posts['cateditid'];

$createdAt = date("Y-m-d H:i:s");
$createdBy = $udata['username'];
$postdata=array(
    "CDescription"=>$helpers->h($category),
    "CCreatedAt"=>$createdAt,
    "CCreatedBy"=>$createdBy
);

//check if user already registered

if($cateditid !=''){
    $dbase->updates(TBL_CATEGORY,$postdata,["CId ="=>$cateditid]);
    print json_encode([
        "code" => "NETAPPS 0009:",
        "flag"=>1,
        "msg"=> 'Category updated successfully!',
    ]);
}else{
    $query=$dbase->inserts(TBL_CATEGORY,$postdata);
    print json_encode([
        "code"=>"NETAPPS 0102:",
        "flag"=>is_numeric($query) ? 1 :0,
        "msg"=>is_numeric($query) ? 'Category Created Successfully':'There was problem. please try again.',
    ]);
}



