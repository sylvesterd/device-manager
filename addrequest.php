<?php
include 'libs/init.php';

$posts = $_POST;
$udata= $session->get("activeUser");
$date = date_create($posts['date']);
$newDate = date_format($date, "Y-m-d");

$requestedBy = $udata['_id'];

$arraydata=array(
    "RCatId"=>$posts['category'],
    "RBrand"=>$posts['brand'],
    "RDevice"=>$posts['device'],
    "ROffice"=>$posts['office'],
    "RDate"=>$newDate,
    "RDspecification"=>$helpers->h($posts['spec']),
    "RReason"=>$helpers->h($posts['reason']),
    "RUser"=>$requestedBy
);

$query=$dbase->inserts(TBL_REQUEST, $arraydata);

if (!empty($query)) {

    print json_encode([
        "flag"=>$query ? 1 :0,
        "msg"=>$query ? "Request created successfully":'There was problem creating device. please try again later.',
    ]);
    die();

}