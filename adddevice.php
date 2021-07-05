<?php
include 'libs/init.php';

$posts = $_POST;
$sNo=$helpers->h($posts['snumber']);
$date = date_create($posts['date']);
$newDate = date_format($date, "Y-m-d");
$createdAt = date("Y-m-d H:i:s");

$dest = "uploads/";

$data=array(
    "DName"=>$helpers->h($posts['devicename']),
    "DSerialNo"=>$sNo,
    "DModelNo"=>$helpers->h($posts['modelNo']),
    "DBrandId"=> $helpers->h($posts['brand']),
    //"DImage"=>$helpers->uploadfile($origin, $dest, $tmp_name),
    "DPurchaseDate"=>$newDate,
    "DCreatedAt"=>$createdAt
);

$query="SELECT * FROM " . TBL_DEVICE." WHERE DSerialNo='$sNo'";

$check=$dbase->dbquery($query);


if (empty($check)) {
    
    $query=$dbase->inserts(TBL_DEVICE,$data);

   // $files = array_filter($_FILES["image"]["name"]);

    $total_count = count($_FILES["image"]["name"]);

    if($_FILES["image"]["name"]) {
        for ($i = 0; $i < $total_count; $i++) {
            $origin = $_FILES["image"]["name"][$i];
            $tmp_name = $_FILES["image"]["tmp_name"][$i];

            $dataPhoto = array(
                'DEviceId' => $query,
                'DPhoto' => $helpers->uploadfile($origin, $dest, $tmp_name),
            );
            $dbase->inserts(TBL_DEVICE_IMAGE, $dataPhoto);

        }
    }
    print json_encode([
        "flag"=>is_numeric($query) ? 1 :0,
        "msg"=>is_numeric($query) ? "Device created successfully":'There was problem creating device. please try again later.',
    ]);
    die();
    
}else{

    print json_encode([
        "flag"=>0,
        "msg"=> 'Device is already registered.',
    ]);
    die();
}