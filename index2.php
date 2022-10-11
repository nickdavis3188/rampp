
<?php 
// echo date('m');
        // $items = array(array("amount"=>3),array("amount"=>3));
        // $deduc = 0;
        // foreach ($items as $index => $value1) { 
        //     $deduc += $value1["amount"];
        // }
        // echo $deduc;

        $dd = date("Y-m-d g:i a",strtotime("04/10/2022 1:35 pm"));
        $dd2 = date("Y-m-d g:ia",strtotime("07/10/2022 1:58 pm"));
      //   $dd2 = date("Y-m-d g:i a",strtotime("04/10/2022 1:30 pm +3 minute"));
      //   $dd2 = date("Y-m-d g:i a",strtotime("04/10/2022 1:30 pm +3 hours"));
      $ff = date("Y-m-d g:ia");
      // echo  $ff;
      
      // echo  date("h")+1;
      echo $dd2 > $ff?"true":"false";
   
      // $dt = new DateTime();
      // $dt->add(new DateInterval("PT5M"));
      // $dt->format("Y-m-d g:i a");
      // echo $dd2;
?>

