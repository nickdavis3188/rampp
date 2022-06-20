<form action="index2.php" method="get">
  <div class="form-check">
    <label class="form-check-label" style="background:#02679a;color:white;">
      <input name="ch" type="checkbox" class="form-check-input"  style="background:#02679a;color:white;" value="1">
      Salable
    </label>
  </div>
  <input type="submit" name="sub">
</form>
<?php 
 
if(isset($_GET['sub'])){
  if (isset($_GET['ch'])) {
    echo "check box value ==".$_GET['ch'];
  }else{
    print_r($_GET);
  }
}
  // $data = array(array("itemname"=>"book","description"=>"hard cover","qut"=>21,"subtotal"=>4220.58),array("itemname"=>"table","description"=>"flat","qut"=>4,"subtotal"=>12000));
  // for ($i=0; $i < count($data); $i++) { 
  //   $v = "";
  //   $k = "";
  //   foreach ($data[$i] as $key => $value) {
  //       $k[] = $key;
  //       $v[] = "'".$value."'";
  //   }
  //   $k = implode(",",$k);
  //   $v = implode(",",$v);
  //   echo($k);
  //   echo ($v);
    
  // }
  

?>

