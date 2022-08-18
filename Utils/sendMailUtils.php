<?php
    function sendMail($email,$destination,$fileName)
    {
        try {
            $email = new PHPMailer();
            $email->From = "buadors@bualogistics.com";
            $email->FromName = "RAMPP";
            // $to_email ="nyaknodavis318@gmail.com";
           
            $email->AddAddress($email);
            $email->Subject = "Local Purchase Order";
            
            $body = "<table>
                         <tr>
                            <th align='left'>Greetings,</th>
                            <th></th>
                         </tr>
                         <tr>
                            <td colspan='2'><p>Please find attached a Local Purchase Order for your company.</p>
                            </td>
                         </tr>
                         <tr>
                          <td colspan='2'><p>Thanks</p><br>Best Regards<br></td>
                          
                        </tr>	
                        <table>";
            $body = preg_replace('/\\\\/','', $body);
            $email->MsgHTML($body);		
            $email->IsSendmail();
            $email->AltBody    = "To view the message, please use an HTML compatible email viewer!"; 
            $email->WordWrap   = 80; 
            $email->AddAttachment($destination,$fileName);
            $email->IsHTML(true);
             $email->Send();

            header("Location: ../View/Procurement/sendLpo1.php?msg='The LPO has been successfully sent.'");
            }
            catch (phpmailerException $e) {
                // echo $e->errorMessage();
                header("Location: ../View/Procurement/sendLpo1.php?fail=".$e->errorMessage());
            }
    }
?>