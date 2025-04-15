<?php
header("Content-Type:application/json");

$data =[
    "status" =>"success",
    "message"=>"Hello!"
];
echo json_encode($data);
 ?>