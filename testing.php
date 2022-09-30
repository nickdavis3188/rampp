<?php
    header('Access-Control-Allow-Origin: *');
    $get = (array) json_decode(file_get_contents('php://input'),false);
    $data = $get["cat"];
    // $dd = implode(',',$data);
    header('Content-Type:application/json; charset-utf-8',true,200);
    echo json_encode( array("status"=>"success","data"=>$data));

?>