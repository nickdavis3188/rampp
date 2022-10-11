<?php
    include("../Env/env.php");
    require("../Connection/dbConnection.php");
    require('../vendor/autoload.php');
    require("../Utils/updateCompleteOrderCountUtils.php");
    $post = (array) json_decode(file_get_contents('php://input'),false);
    
     $conn = conString1();

     $jsonData = $post["orderId"];
     $jsonData2 = $post["prepAt"];

     $items = array();
    //  echo json_encode(array("status" =>"success"));
     $query ="UPDATE orderditems SET finish='1' WHERE orderid ='$jsonData' AND prepAt='$jsonData2'";
     $results = mysqli_query($conn,$query);
     $noofrows = mysqli_affected_rows($conn);
     if ($noofrows >= 1)
     {
   
        $items3 = array();
                 
        $query3 ="SELECT * FROM  orders WHERE orderid ='$jsonData'";
        $results3 = mysqli_query($conn,$query3);
        
        while($row3 = mysqli_fetch_array($results3)){
           $items3[] = $row3;
       }
       
       $kch = $items3["0"]["kch"];
       $br = $items3["0"]["br"];

      

       if ($kch == '1' && $br == '0') {
        $query ="UPDATE orders SET `status`='1',`k`='1' WHERE orderid ='$jsonData'";
        $results = mysqli_query($conn,$query);
        $noofrows = mysqli_affected_rows($conn);
        if ($noofrows == 1)
        {            
            $retV = customerComplete($conn,$jsonData);
            if ($retV) {
                $options = array(
                    'cluster' => 'eu',
                    'useTLS' => true
                  );
                  $pusher = new Pusher\Pusher(
                    '6635d1fe09ee5548385f',
                    '94187085362faba7043f',
                    '1438712',
                    $options
                  );
                
                  $data['message'] = array("signal"=>"1","c"=>"1","ff"=>"1","ord"=>"$jsonData");
                  $pusher->trigger('my-channel', 'my-event', $data);
                  echo json_encode(array("status" =>"success"));
            }else{
                echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
            }   
           
        }else{
            echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
        }

       }else if($kch == '0' && $br == '1'){
            $query ="UPDATE orders SET `status`='1',`b`='1' WHERE orderid ='$jsonData'";
            $results = mysqli_query($conn,$query);
            $noofrows = mysqli_affected_rows($conn);
            if ($noofrows == 1)
            {
                $retV = customerComplete($conn,$jsonData);
                if ($retV) {
                    $options = array(
                        'cluster' => 'eu',
                        'useTLS' => true
                      );
                      $pusher = new Pusher\Pusher(
                        '6635d1fe09ee5548385f',
                        '94187085362faba7043f',
                        '1438712',
                        $options
                      );
                    
                      $data['message'] = array("signal"=>"1","c"=>"1","ff"=>"1","ord"=>"$jsonData");
                      $pusher->trigger('my-channel', 'my-event', $data);
                      echo json_encode(array("status" =>"success"));
                }else{
                    echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
                }        
           
            }else{
                echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
            }
       }else if ($kch == '1' && $br == '1') {
       
          $items4 = array();
  
          $query4 ="SELECT * FROM  orderditems WHERE orderid ='$jsonData' AND finish = 0";
          $results4 = mysqli_query($conn,$query4);
          
          while($row4 = mysqli_fetch_array($results4)){
              $items4[] = $row4;
          }
          
          $k = $jsonData2 == "Kitchen"?1:0;
            if (count($items4) != 0) {
                if ($k == 1) {
                
                    $query ="UPDATE orders SET `k`='1' WHERE orderid ='$jsonData'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                    if ($noofrows == 1)
                    {
                        $options = array(
                            'cluster' => 'eu',
                            'useTLS' => true
                          );
                          $pusher = new Pusher\Pusher(
                            '6635d1fe09ee5548385f',
                            '94187085362faba7043f',
                            '1438712',
                            $options
                          );
                        
                          $data['message'] = array("signal"=>"1","c"=>"0","ff"=>"1","ord"=>"$jsonData");
                          $pusher->trigger('my-channel', 'my-event', $data);
                        echo json_encode(array("status" =>"success"));
                    }else{
                        echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
                    }
                                               
                }else {
           
                    $query ="UPDATE orders SET `b`='1' WHERE orderid ='$jsonData'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                    if ($noofrows == 1)
                    {
                        $options = array(
                            'cluster' => 'eu',
                            'useTLS' => true
                          );
                          $pusher = new Pusher\Pusher(
                            '6635d1fe09ee5548385f',
                            '94187085362faba7043f',
                            '1438712',
                            $options
                          );
                        
                          $data['message'] = array("signal"=>"1","c"=>"0","ff"=>"1","ord"=>"$jsonData");
                          $pusher->trigger('my-channel', 'my-event', $data);
                        echo json_encode(array("status" =>"success"));
                    }else{
                        echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
                    }
                }
            }else{
                if ($k == 1) {

                    $query ="UPDATE orders SET `status`='1',`k`='1' WHERE orderid ='$jsonData'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                    if ($noofrows == 1)
                    {
                        $retV = customerComplete($conn,$jsonData);
                        if ($retV) {
                            $options = array(
                                'cluster' => 'eu',
                                'useTLS' => true
                              );
                              $pusher = new Pusher\Pusher(
                                '6635d1fe09ee5548385f',
                                '94187085362faba7043f',
                                '1438712',
                                $options
                              );
                            
                              $data['message'] = array("signal"=>"1","c"=>"0","ff"=>"1","ord"=>"$jsonData");
                              $pusher->trigger('my-channel', 'my-event', $data);
                           
                              echo json_encode(array("status" =>"success"));
                        }else{
                            echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
                        }
                    }else{
                        echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
                    }
                }else {
                    $query ="UPDATE orders SET `status`='1',`b`='1' WHERE orderid ='$jsonData'";
                    $results = mysqli_query($conn,$query);
                    $noofrows = mysqli_affected_rows($conn);
                    if ($noofrows == 1)
                    {
                        $retV = customerComplete($conn,$jsonData);
                        if ($retV) {
                            $options = array(
                                'cluster' => 'eu',
                                'useTLS' => true
                              );
                              $pusher = new Pusher\Pusher(
                                '6635d1fe09ee5548385f',
                                '94187085362faba7043f',
                                '1438712',
                                $options
                              );
                            
                              $data['message'] = array("signal"=>"1","c"=>"1","ff"=>"1","ord"=>"$jsonData");
                              $pusher->trigger('my-channel', 'my-event', $data);
                              echo json_encode(array("status" =>"success"));
                        }else{
                            echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
                        }
                        
                    }else{
                        echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
                    }
                }
            }    
       }
    }else{
        echo json_encode(array("status" =>"fail","msg"=>"Error: ".mysqli_error($conn)));
    }
?>