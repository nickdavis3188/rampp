<!DOCTYPE html>
<html lang="en">
<?php

require("../Controller/generalController.php");
require("../Connection/dbConnection.php");
require("../Utils/completeOrderUtils.php");


$conn = conString1();

$UserUtils = new GeneralController();
$id = $_REQUEST['id'];

$query ="UPDATE orders SET `receipt`='1' WHERE customerId ='$id'";
$results = mysqli_query($conn,$query);
$noofrows = mysqli_affected_rows($conn);
if ($noofrows >= 1)
{}

?>
<head>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'PT Sans', sans-serif;
        }

        @page {
            size: 2.8in 11in;
            margin-top: 0cm;
            margin-left: 0cm;
            margin-right: 0cm;
        }

        table {
            width: 100%;
        }

        tr {
            width: 100%;

        }

        h1 {
            text-align: center;
            vertical-align: middle;
        }

        #logo {
            width: 60%;
            text-align: center;
            -webkit-align-content: center;
            align-content: center;
            padding: 5px;
            margin: 2px;
            display: block;
            margin: 0 auto;
        }

        header {
            width: 100%;
            text-align: center;
            -webkit-align-content: center;
            align-content: center;
            vertical-align: middle;
        }

        .items thead {
            text-align: center;
        }

        .center-align {
            text-align: center;
        }

        .bill-details td {
            font-size: 12px;
        }

        .receipt {
            font-size: medium;
        }

        .items .heading {
            font-size: 12.5px;
            text-transform: uppercase;
            border-top:1px solid black;
            margin-bottom: 4px;
            border-bottom: 1px solid black;
            vertical-align: middle;
        }

        .items thead tr th:first-child,
        .items tbody tr td:first-child {
            width: 47%;
            min-width: 47%;
            max-width: 47%;
            word-break: break-all;
            text-align: left;
        }

        .items td {
            font-size: 12px;
            text-align: right;
            vertical-align: bottom;
        }

        .price::before {
             content: "\20B9";
            font-family: Arial;
            text-align: right;
        }

        .sum-up {
            text-align: right !important;
        }
        .total {
            font-size: 13px;
            border-top:1px dashed black !important;
            border-bottom:1px dashed black !important;
        }
        .total.text, .total.price {
            text-align: right;
        }
        .total.price::before {
            content: "\20B9"; 
        }
        .line {
            border-top:1px solid black !important;
        }
        .heading.rate {
            width: 20%;
        }
        .heading.amount {
            width: 25%;
        }
        .heading.qty {
            width: 5%
        }
        p {
            padding: 1px;
            margin: 0;
        }
        section, footer {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <br><br><br><br><br>
    <header>
     <h2>RAMPP</h2>

     <?php
    
    $data2 = $UserUtils->getorderById($conn,$_REQUEST['id']);
    
     ?>
    </header>
    <b><p>Type: Receipt</p></b>
    <p>Receipt No : <?php echo $_REQUEST['id'] ?></p>
    <table class="bill-details">
        <tbody>
            <tr>
                <td>Date : <span class="dt"><?php echo date('d/m/Y',strtotime( $data2[0]['date'])) ?></span></td>
                <td>Time : <span class="tm"><?php echo $data2[0]['time'] ?></span></td>
            </tr>
            <tr>
                <th class="center-align" colspan="2"><span class="receipt">Original Receipt</span></th>
            </tr>
        </tbody>
    </table>
    
    <table class="items">
        <thead>
            <tr>
                <th class="heading name">Item</th>
                <th class="heading qty">Qty</th>
                <th class="heading rate">Rate</th>
                <th class="heading amount">Amount</th>
            </tr>
        </thead>
       
        <tbody>
            <?php
                $UserUtils->deleteCustomer($conn,$_REQUEST['id']);
                $data = $UserUtils->getorderItemById($conn,$_REQUEST['id']);
                $serviceCharge = $UserUtils->orderById($conn,$_REQUEST['id']);
                // completeOrder($conn,$data);
           
             foreach ($data as $index => $value) { 
            ?>
            <tr>
                <td><?php echo $value['productname']?></td>
                <td><p class="font-weight-bold mb-0"><?php echo $value["quantity"]."".$value["unitOfMeasure"]."" ?></p></td>
                <td class="pricec"><?php echo "#".number_format($value['price'],2,".",",") ?></td>
                <td class="pricec"><?php echo "#".number_format($value['amount'],2,".",",") ?></td>
            </tr>
           <?php
             }
           ?>
            <tr>
                <td colspan="3" class="sum-up line">Service charge</td>
                <td class="line pricec"><?php echo "#".number_format($serviceCharge,2,".",",") ?></td>
            </tr>
            <!-- <tr>
                <td colspan="3" class="sum-up line">Subtotal</td>
                <td class="line pricec">#12112.00</td>
            </tr>
            <tr>
                <td colspan="3" class="sum-up">Vat</td>
                <td class="pricec">#10.00</td>
            </tr>
            <tr>
                <td colspan="3" class="sum-up">Dis</td>
                <td class="pricec">#10.00</td>
            </tr> -->
            <?php
            $tott = $UserUtils->totalAmus($conn,$_REQUEST['id']);
           
        ?>
            <tr>
                <th colspan="3" class="total text">Total</th>
                <th class="total pricec"><?php echo "#".number_format($tott,2,".",",")?></th>
            </tr>
        </tbody>
    </table>
    <section>
      
        <p>
            Paid by : <span class="pm"><?php echo $_REQUEST['pay']?></span>
        </p>
        <p style="text-align:center">
            Thank you for your visit!
        </p>
    </section>
    <footer style="text-align:center">
        <p>www.Ramp.com</p>
    </footer>
    <?php

    ?>
    <script>
    window.print();
    </script>
</body>

</html>